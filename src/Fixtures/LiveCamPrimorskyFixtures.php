<?php

namespace Evrinoma\LiveVideoBundle\Fixtures;

use Evrinoma\LiveVideoBundle\Entity\Cam;
use Evrinoma\LiveVideoBundle\Entity\Group;

/**
 * Class LiveCamPrimorskyFixtures
 *
 * @package Evrinoma\LiveVideoBundle\Fixtures
 */
class LiveCamPrimorskyFixtures extends AbstractLiveCamFixtures
{
//region SECTION: Public
    public function createGroup(): LiveVideoFixtureInterface
    {
        $repository  = $this->objectManager->getRepository(Group::class);
        $this->group = $repository->findOneBy(['alias' => 'live_primorsky']);

        if (!$this->group) {
            $this->group = new Group();
            $this->group
                ->setAlias('live_primorsky')
                ->setName('Приморский')
                ->setMaxColumn(2)
                ->setActiveToBlocked();

            $this->objectManager->persist($this->group);

        }

        return $this;
    }

    public function createVideo(): LiveVideoFixtureInterface
    {
        $repository = $this->objectManager->getRepository(Cam::class);

        $cam = $repository->findOneBy(['stream' => 'cam_78.36.203.246_555_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('One')
                ->setIp('78.36.203.246:554')
                ->setUserName('reception1')
                ->setPassword('Qq123456')
                ->setTitle('Камера #1 (Пятно застройки ГК)')
                ->setStream('cam_78.36.203.246_555_LQ.stream')
                ->setType($this->axisType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_78.36.203.246_554_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Two')
                ->setIp('78.36.203.246:555')
                ->setUserName('reception1')
                ->setPassword('Qq123456')
                ->setTitle('Камера #4 (Общий вид #2)')
                ->setStream('cam_78.36.203.246_554_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_83.220.254.3_11554_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Three')
                ->setIp('83.220.254.3:11554')
                ->setUserName('reception1')
                ->setPassword('Qq123456')
                ->setTitle('Камера #3 (Общий вид #1)')
                ->setStream('cam_83.220.254.3_11554_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_78.36.203.246_556_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Four')
                ->setIp('78.36.203.246:556')
                ->setUserName('reception1')
                ->setPassword('Qq123456')
                ->setTitle('Камера #2 (КПП)')
                ->setStream('cam_78.36.203.246_556_LQ.stream')
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
            LiveVideoFixtureInterface::LIVE_CAM_PRIMORSKY_FIXTURES,
        ];
    }
//endregion Getters/Setters
}
