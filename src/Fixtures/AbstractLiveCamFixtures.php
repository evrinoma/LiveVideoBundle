<?php


namespace Evrinoma\LiveVideoBundle\Fixtures;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Evrinoma\LiveVideoBundle\Entity\Group;
use Evrinoma\LiveVideoBundle\Entity\Type;

abstract class AbstractLiveCamFixtures extends Fixture implements LiveVideoFixtureInterface
{
    /**
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     * @var Group
     */
    protected $group;

    /**
     * @var Type
     */
    protected $hikvisionType;

    /**
     * @var Type
     */
    protected $axisType;
//endregion Fields

//region SECTION: Public
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $this->objectManager = $manager;
        $this->axisType      = $this->getReference(TypeFixtures::AXIS_REFERENCE);
        $this->hikvisionType = $this->getReference(TypeFixtures::HIKVISION_REFERENCE);
        $this
            ->createGroup()
            ->createVideo();

        $this->objectManager->flush();
    }
}