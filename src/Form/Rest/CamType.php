<?php

namespace Evrinoma\LiveVideoBundle\Form\Rest;

use Evrinoma\DtoBundle\Factory\FactoryDto;
use Evrinoma\LiveVideoBundle\Dto\LiveVideoDto;
use Evrinoma\LiveVideoBundle\Entity\Cam;
use Evrinoma\LiveVideoBundle\Entity\Group;
use Evrinoma\LiveVideoBundle\Manager\LiveVideoManagerInterface;

use Evrinoma\UtilsBundle\Form\Rest\RestChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class CamType
 *
 * @package Evrinoma\LiveVideoBundle\Form\Rest
 */
class CamType extends AbstractType
{
//region SECTION: Fields
    /**
     * LiveVideoManager
     */
    private $liveVideoManager;

    /**
     * @var FactoryDto
     */
    private $factoryDto;
//endregion Fields
//endregion Fields

//region SECTION: Constructor
    /**
     * ServerType constructor.
     *
     * @param LiveVideoManagerInterface $liveVideoManager
     * @param FactoryDto                $factoryDto
     */
    public function __construct(LiveVideoManagerInterface $liveVideoManager, FactoryDto $factoryDto)
    {
        $this->liveVideoManager = $liveVideoManager;
        $this->factoryDto       = $factoryDto;
    }

//endregion Constructor
//region SECTION: Public
    public function configureOptions(OptionsResolver $resolver)
    {
        $callback = function (Options $options) {
            $streams      = [];
            $liveVideoDto = $this->factoryDto->cloneDto(LiveVideoDto::class);
            /** @var Group $data */
            foreach ($this->liveVideoManager->getGroup($liveVideoDto)->getData() as $data) {
                /** @var Cam $cam */
                foreach ($data->getLiveStreams() as $cam) {
                    if ($cam->isControl()) {
                        $streams[] = $cam->getStream();
                    }
                }
            }

            return $streams;
        };
        $resolver->setDefault(RestChoiceType::REST_COMPONENT_NAME, 'camera');
        $resolver->setDefault(RestChoiceType::REST_DESCRIPTION, 'cameraList');
        $resolver->setDefault(RestChoiceType::REST_CHOICES, $callback);
    }
//endregion Public
//endregion Public

//region SECTION: Getters/Setters
    public function getParent()
    {
        return RestChoiceType::class;
    }
//endregion Getters/Setters
}