<?php

namespace Evrinoma\LiveVideoBundle\Manager;

use Doctrine\ORM\EntityManagerInterface;
use Evrinoma\DtoBundle\Dto\DtoInterface;
use Evrinoma\LiveVideoBundle\Dto\LiveVideoDto;
use Evrinoma\LiveVideoBundle\Entity\Cam;
use Evrinoma\UtilsBundle\Manager\AbstractEntityManager;
use Evrinoma\UtilsBundle\Rest\RestTrait;
use ponvif;

/**
 * Class LiveControlManager
 *
 * @package App\Manager
 */
class LiveControlManager extends AbstractEntityManager implements LiveControlManagerInterface
{
    use RestTrait;

//region SECTION: Fields
    private const ACTION_TOP                              = 'actionTop';
    private const ACTION_BOTTOM                           = 'actionBottom';
    private const ACTION_LEFT                             = 'actionLeft';
    private const ACTION_RIGHT                            = 'actionRight';
    private const ACTION_ZOOM_IN                          = 'actionZoomIn';
    private const ACTION_ZOOM_OUT                         = 'actionZoomOut';
    private const ACTION_SAVE_POSITION_AND_MOVE_TO_PRESET = 'actionSavePositionAndMoveToPreset';
    private const ACTION_MOVE_TO_PRESET                   = 'actionMoveToPreset';
    private const ACTION_RETURN_FROM_PRESET               = 'actionReturnFromPreset';
    private const DELETE_ALL_PRESETS_BY_NAME              = 'deleteAllPresetsByName';

    protected $repositoryClass = Cam::class;
    /**
     * @var array
     */
    private $actions = [
        self::ACTION_TOP,
        self::ACTION_BOTTOM,
        self::ACTION_LEFT,
        self::ACTION_RIGHT,
        self::ACTION_ZOOM_IN,
        self::ACTION_ZOOM_OUT,
        self::ACTION_SAVE_POSITION_AND_MOVE_TO_PRESET,
        self::ACTION_MOVE_TO_PRESET,
        self::ACTION_RETURN_FROM_PRESET,
        self::DELETE_ALL_PRESETS_BY_NAME,
    ];
    /**
     * @var null
     */
    private $action;
    /**
     * @var null | ponvif
     */
    private $onvif;
    /**
     * @var string
     */
    private $presetCallToken = '';
    /**
     * @var string
     */
    private $presetSaveToken = '300';
    /**
     * @var string
     */
    private $presetSaveName = 'Save current';
    /**
     * @var null| Cam
     */
    private $camera = null;
    /**
     * @var LiveVideoManagerInterface
     */
    private $liveVideoManager;
//endregion Fields

//region SECTION: Constructor
    /**
     * LiveControlManager constructor.
     *
     * @param EntityManagerInterface    $entityManager
     * @param LiveVideoManagerInterface $liveVideoManager
     */
    public function __construct(EntityManagerInterface $entityManager, LiveVideoManagerInterface $liveVideoManager)
    {
        parent::__construct($entityManager);
        $this->liveVideoManager = $liveVideoManager;
    }
//endregion Constructor

//region SECTION: Public
    /**
     * @param DtoInterface $liveVideoDto
     *
     * @return self
     * @throws \Exception
     */
    public function controlAction(DtoInterface $liveVideoDto)
    {
        $cams = $this->liveVideoManager->getCamera($liveVideoDto)->getData();

        foreach ($cams as $camera) {
            $this->makeAction($camera);
            if (!$this->isRestStatusOk()) {
                return $this;
            }
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getModelActions()
    {
        return $this->actions;
    }

    /**
     * @return null
     */
    public function getAction()
    {
        return $this->action;
    }

    public function getRestStatus(): int
    {
        return $this->status;
    }

    /**
     * @param $action
     *
     * @return $this
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }
//endregion Public

//region SECTION: Private
    /**
     * @param Cam $camera
     *
     * @return $this
     * @throws \Exception
     */
    private function makeAction($camera)
    {
        $this->setRestServerErrorUnknownError();

        if ($this->action) {
            if ($camera->isControl()) {
                $this->onvif = new ponvif();
                $this->onvif->setIPAddress($camera->getIp());
                $this->onvif->setUsername($camera->getUserName());
                $this->onvif->setPassword($camera->getPassword());
                $this->onvif->initialize();
                $token = null;
                foreach ($this->onvif->media_GetProfiles() as $source) {
                    if (isset($source['PTZConfiguration']) && isset($source['@attributes']) && isset($source['@attributes']['token'])) {
                        $token = $source['@attributes']['token'];
                        break;
                    }
                }
                if (null !== $token) {
                    if ($this->isActionCallable($this->action)) {
                        $this->{$this->action}($token);
                        $this->setRestSuccessOk();
                    } else {
                        $this->setRestServerErrorServiceUnavailable();
                    }
                }
            } else {
                $this->setRestSuccessOk();
            }
        }

        return $this;
    }

    /**
     * @param $action
     *
     * @return bool
     */
    private function isActionCallable($action)
    {
        if (in_array($action, $this->actions, true)) {
            if (is_callable(array($this, $action))) {
                return true;
            }
        }

        return false;
    }

    private function actionLeft($token)
    {
        $this->onvif->ptz_RelativeMove($token, -0.01, 0, 0, 0);
    }

    private function actionRight($token)
    {
        $this->onvif->ptz_RelativeMove($token, 0.01, 0, 0, 0);
    }

    private function actionTop($token)
    {
        $this->onvif->ptz_RelativeMove($token, 0, 0.05, 0, 0);
    }

    private function actionBottom($token)
    {
        $this->onvif->ptz_RelativeMove($token, 0, -0.05, 0, 0);
    }

    private function actionZoomIn($token)
    {
        $this->onvif->ptz_RelativeMoveZoom($token, 0.1, 0);
    }

    private function actionZoomOut($token)
    {
        $this->onvif->ptz_RelativeMoveZoom($token, -0.1, 0);
    }

    private function actionSavePositionAndMoveToPreset($token)
    {
        $this->createSavePreset($token);
        $this->moveToPreset($token);
    }

    private function actionMoveToPreset($token)
    {
        $this->moveToPreset($token);
    }

    private function actionReturnFromPreset($token)
    {
        $this->moveToSavePreset($token);
        //  $this->deletePresetByToken($token, $this->presetSaveToken);
    }

    private function deletePresetByToken($token, $tokenName)
    {
        $this->onvif->ptz_RemovePreset($token, $tokenName);
    }

    private function moveToPresetPosition($token, $tokenName)
    {
        if ($this->presetCallToken !== '') {
            $presets = $this->onvif->ptz_GetPresets($token);
            foreach ($presets as $preset) {
                if ($tokenName === $preset["Token"]) {
                    $x    = $preset['PTZPosition']['PanTilt']['@attributes']['x'];
                    $y    = $preset['PTZPosition']['PanTilt']['@attributes']['y'];
                    $zoom = $preset['PTZPosition']['Zoom']['@attributes']['x'];
                    $this->onvif->ptz_GotoPreset($token, $preset['Token'], $x, $y, $zoom);

                    break;
                }
            }
        }
    }

    private function moveToPreset($token)
    {
        $this->moveToPresetPosition($token, $this->presetCallToken);
    }

    private function moveToSavePreset($token)
    {
        $this->moveToPresetPosition($token, $this->presetSaveToken);
    }

    private function createSavePreset($token)
    {
        $this->onvif->ptz_SetPreset($token, $this->presetSaveName, $this->presetSaveToken);
    }

    private function deleteAllPresetsByName($token)
    {
        $presets = $this->onvif->ptz_GetPresets($token);
        foreach ($presets as $preset) {
            if ($this->presetSaveName === $preset["Name"]) {
                $this->deletePresetByToken($token, $preset["Token"]);
            }
        }
    }

    private function getPreset($token)
    {
        $this->onvif->ptz_GetPresets($token);
    }
//endregion Private

//region SECTION: Getters/Setters
}
