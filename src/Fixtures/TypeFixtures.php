<?php

namespace Evrinoma\LiveVideoBundle\Fixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Persistence\ObjectManager;
use Evrinoma\LiveVideoBundle\Entity\Type;

/**
 * Class TypeFixtures
 *
 * @package Evrinoma\LiveVideoBundle\Fixtures
 */
class TypeFixtures extends Fixture implements FixtureGroupInterface
{
//region SECTION: Fields
    public const HIKVISION_REFERENCE = 'hikvision';
    public const AXIS_REFERENCE      = 'axis';

    private $hikvisionType;

    private $axisType;
//endregion Fields

//region SECTION: Public
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $this->createTypes($manager);

        $manager->flush();
    }
//endregion Public

//region SECTION: Private
    private function createTypes(ObjectManager $manager)
    {
        $repository = $manager->getRepository(Type::class);

        $this->hikvisionType = $repository->findOneBy(['type' => self::HIKVISION_REFERENCE]);

        if (!$this->hikvisionType) {
            $this->hikvisionType = new Type();
            $this->hikvisionType->setType(self::HIKVISION_REFERENCE);
            $manager->persist($this->hikvisionType);
        }

        $this->axisType = $repository->findOneBy(['type' => self::AXIS_REFERENCE]);
        if (!$this->axisType) {
            $this->axisType = new Type();
            $this->axisType->setType(self::AXIS_REFERENCE);
            $manager->persist($this->axisType);
        }

        $this->addReference(self::HIKVISION_REFERENCE, $this->hikvisionType);
        $this->addReference(self::AXIS_REFERENCE, $this->axisType);

        return $this;
    }

//endregion Private

//region SECTION: Getters/Setters
    public static function getGroups(): array
    {
        return [
            LiveVideoFixtureInterface::LIVE_CAM_ALL_FIXTURES,
            LiveVideoFixtureInterface::LIVE_CAM_IPARK45_FIXTURES,
            LiveVideoFixtureInterface::LIVE_CAM_KZKT45_FIXTURES,
            LiveVideoFixtureInterface::LIVE_CAM_KPSZ_FIXTURES,
            LiveVideoFixtureInterface::LIVE_CAM_KZET_FIXTURES,
            LiveVideoFixtureInterface::LIVE_CAM_VANKOR_FIXTURES,
            LiveVideoFixtureInterface::LIVE_CAM_ISHIM_FIXTURES,
            LiveVideoFixtureInterface::LIVE_CAM_GUSEV_FIXTURES,
            LiveVideoFixtureInterface::LIVE_CAM_PREGOLSKAY_FIXTURES,
            LiveVideoFixtureInterface::LIVE_CAM_PRIMORSKY_FIXTURES,
            LiveVideoFixtureInterface::LIVE_CAM_SOVETSK_FIXTURES,
            LiveVideoFixtureInterface::LIVE_CAM_TOBOLSK_FIXTURES,
            LiveVideoFixtureInterface::LIVE_CAM_TUMEN_FIXTURES,
        ];
    }
//endregion Getters/Setters
}