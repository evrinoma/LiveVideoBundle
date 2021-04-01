<?php

namespace Evrinoma\LiveVideoBundle\Fixtures;

use Evrinoma\LiveVideoBundle\Entity\Cam;
use Evrinoma\LiveVideoBundle\Entity\Group;

/**
 * Class LiveCamGusevFixtures
 *
 * @package Evrinoma\LiveVideoBundle\Fixtures
 */
class LiveCamGusevFixtures extends AbstractLiveCamFixtures
{
//region SECTION: Public
    public function createGroup(): LiveVideoFixtureInterface
    {
        $repository  = $this->objectManager->getRepository(Group::class);
        $this->group = $repository->findOneBy(['alias' => 'live_gusev']);

        if (!$this->group) {
            $this->group = new Group();
            $this->group
                ->setAlias('live_gusev')
                ->setName('Гусев')
                ->setMaxColumn(3)
                ->setActiveToBlocked();

            $this->objectManager->persist($this->group);
        }

        return $this;
    }

    public function createVideo(): LiveVideoFixtureInterface
    {
        $repository = $this->objectManager->getRepository(Cam::class);

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.42.31_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('One')
                ->setIp('172.16.42.31')
                ->setUserName('ite')
                ->setPassword('rfvuec2016')
                ->setTitle('Камера #1 (КПП №1, ГК)')
                ->setStream('cam_172.16.42.31_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.42.39_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Two')
                ->setIp('172.16.42.39')
                ->setUserName('ite')
                ->setPassword('rfvuec2016')
                ->setTitle('Камера #2 (БЩУ)')
                ->setStream('cam_172.16.42.39_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.42.33_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Three')
                ->setIp('172.16.42.33')
                ->setUserName('ite')
                ->setPassword('rfvuec2016')
                ->setTitle('Камера #3 (ГК: общий вид)')
                ->setStream('cam_172.16.42.33_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.42.34_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Four')
                ->setIp('172.16.42.34')
                ->setUserName('ite')
                ->setPassword('rfvuec2016')
                ->setTitle('Камера #4 (ГК Машзал)')
                ->setStream('cam_172.16.42.34_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.42.32_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Five')
                ->setIp('172.16.42.32')
                ->setUserName('ite')
                ->setPassword('rfvuec2016')
                ->setTitle('Камера #5 (ЭТП ГК)')
                ->setStream('cam_172.16.42.32_LQ.stream')
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
            LiveVideoFixtureInterface::LIVE_CAM_GUSEV_FIXTURES,
        ];
    }
//endregion Getters/Setters
}
