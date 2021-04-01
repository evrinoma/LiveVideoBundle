<?php

namespace Evrinoma\LiveVideoBundle\Fixtures;

use Evrinoma\LiveVideoBundle\Entity\Cam;
use Evrinoma\LiveVideoBundle\Entity\Group;

/**
 * Class LiveCamTumenFixtures
 *
 * @package Evrinoma\LiveVideoBundle\Fixtures
 */
class LiveCamTumenFixtures extends AbstractLiveCamFixtures
{
//region SECTION: Public
    public function createGroup(): LiveVideoFixtureInterface
    {
        $repository  = $this->objectManager->getRepository(Group::class);
        $this->group = $repository->findOneBy(['alias' => 'live_tumen']);

        if (!$this->group) {
            $this->group = new Group();
            $this->group
                ->setAlias('live_tumen')
                ->setName('Тюмень')
                ->setMaxColumn(2)
                ->setActiveToBlocked();

            $this->objectManager->persist($this->group);
        }

        return $this;
    }

    public function createVideo(): LiveVideoFixtureInterface
    {
        $repository = $this->objectManager->getRepository(Cam::class);

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.47.245_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('One')
                ->setIp('172.16.47.245')
                ->setUserName('admin')
                ->setPassword('N.vtym2017')
                ->setTitle('Камера №1')
                ->setStream('cam_172.16.47.245_LQ.stream')
                ->setType($this->axisType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.47.244_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Two')
                ->setIp('172.16.47.244')
                ->setUserName('admin')
                ->setPassword('N.vtym2017')
                ->setTitle('Камера №2')
                ->setStream('cam_172.16.47.244_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.47.243_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Three')
                ->setIp('172.16.47.243')
                ->setUserName('admin')
                ->setPassword('N.vtym2017')
                ->setTitle('Камера №3')
                ->setStream('cam_172.16.47.243_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        return $this;
    }
//endregion Public

//region SECTION: Getters/Setters
    /**
     * @inheritDoc
     */
    public function getDependencies()
    {
        return [TypeFixtures::class];
    }

    public static function getGroups(): array
    {
        return [
            LiveVideoFixtureInterface::LIVE_CAM_ALL_FIXTURES,
            LiveVideoFixtureInterface::LIVE_CAM_TUMEN_FIXTURES,
        ];
    }
//endregion Getters/Setters
}
