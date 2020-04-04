<?php

namespace Evrinoma\LiveVideoBundle\Manager;

use Doctrine\ORM\EntityManagerInterface;
use Evrinoma\LiveVideoBundle\Dto\LiveVideoDto;
use Evrinoma\LiveVideoBundle\Entity\Cam;
use Evrinoma\LiveVideoBundle\Entity\Group;
use Evrinoma\UtilsBundle\Manager\AbstractEntityManager;
use Evrinoma\UtilsBundle\Rest\RestTrait;
use Evrinoma\UtilsBundle\Voiter\VoiterInterface;

/**
 * Class LiveVideoManager
 *
 * @package Evrinoma\LiveVideoBundle\Manager
 */
class LiveVideoManager extends AbstractEntityManager implements LiveVideoManagerInterface
{
    use RestTrait;

//region SECTION: Fields
    protected $repositoryClass = Group::class;
    /**
     * @var VoiterInterface
     */
    private $voterManager;

//endregion Fields

//region SECTION: Constructor
    /**
     * LiveVideoManager constructor.
     *
     * @param EntityManagerInterface $entityManager
     * @param VoiterInterface         $voterManager
     */
    public function __construct(EntityManagerInterface $entityManager, VoiterInterface $voterManager)
    {
        parent::__construct($entityManager);
        $this->voterManager = $voterManager;
    }
//endregion Constructor

//region SECTION: Getters/Setters
    /**
     * @return int
     */
    public function getRestStatus(): int
    {
        return $this->status;
    }

    /**
     * @param LiveVideoDto $liveVideoDto
     *
     * @return self
     */
    public function getLiveVideo($liveVideoDto)
    {
        $this->getGroup($liveVideoDto);

        return $this;
    }

    /**
     * @param LiveVideoDto $liveVideoDto
     *
     * @return self
     */
    public function getGroup($liveVideoDto)
    {
        $builder = $this->repository->createQueryBuilder('groups');

        $builder->where('groups.active = \'a\'');

        if ($liveVideoDto && $liveVideoDto->getAlias()) {
            $builder->andWhere('groups.alias = :alias')
                ->setParameter('alias', $liveVideoDto->getAlias());
        }

        $this->setData($builder->getQuery()->getResult());

        return $this;
    }

    /**
     * @param LiveVideoDto $liveVideoDto
     *
     * @return self
     */
    public function getCamera($liveVideoDto)
    {
        $repository = $this->entityManager->getRepository(Cam::class);

        $builder = $repository->createQueryBuilder('cams');

        $builder
            ->where('cams.active = \'a\'')
            ->leftJoin('cams.group', 'group');

        if ($liveVideoDto && $liveVideoDto->getLiveStreams()) {
            $streams = $liveVideoDto->getLiveStreams()->getStreams();
            if ($streams) {
                $builder->andWhere('cams.stream IN (:streams)')
                    ->setParameter('streams', $streams);
            }
        }

        if ($liveVideoDto && $liveVideoDto->getLiveStreams()) {
            $builder->andWhere('cams.control = :control')
                ->setParameter('control', $liveVideoDto->getLiveStreams()->hasControl());
        }


        $this->setData($builder->getQuery()->getResult());

        return $this;
    }

    /**
     * @param LiveVideoDto|null $dto
     *
     * @return mixed
     */
    public function getData($dto = null)
    {
        if ($dto && $dto->isEmptyResult() && !$this->hasSingleData()) {
            return [];
        } else {
            return parent::getData();
        }
    }

    /**
     * @param mixed $data
     *
     * @return AbstractEntityManager
     */
    public function setData($data)
    {

        /** @var Group $item */
        foreach ($data as $item) {
            if ($item instanceof Group && !$this->voterManager->checkPermission($item->getRole())) {
                /** @var Cam $camera */
                foreach ($item->getLiveStreams() as $camera) {
                    $camera->setControl(false);
                }
            }
        }

        return parent::setData($data);
    }
//endregion Getters/Setters
}