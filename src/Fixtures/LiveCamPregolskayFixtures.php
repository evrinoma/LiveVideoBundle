<?php

namespace Evrinoma\LiveVideoBundle\Fixtures;

use Evrinoma\LiveVideoBundle\Entity\Cam;
use Evrinoma\LiveVideoBundle\Entity\Group;

/**
 * Class LiveCamPregolskayFixtures
 *
 * @package Evrinoma\LiveVideoBundle\Fixtures
 */
class LiveCamPregolskayFixtures extends AbstractLiveCamFixtures
{
//region SECTION: Public
    public function createGroup(): LiveVideoFixtureInterface
    {
        $repository  = $this->objectManager->getRepository(Group::class);
        $this->group = $repository->findOneBy(['alias' => 'live_pregolskay']);

        if (!$this->group) {
            $this->group = new Group();
            $this->group
                ->setAlias('live_pregolskay')
                ->setName('Прегольская')
                ->setMaxColumn(2)
                ->setActiveToBlocked();

            $this->objectManager->persist($this->group);
        }

        return $this;
    }

    public function createVideo(): LiveVideoFixtureInterface
    {
        $repository = $this->objectManager->getRepository(Cam::class);

        $cam = $repository->findOneBy(['stream' => 'cam_188.168.34.45_12554_LQ.stream']);

        if (!$cam) {
            $camOne = new Cam();
            $camOne
                ->setName('One')
                ->setIp('188.168.34.45')
                ->setUserName('energo')
                ->setPassword('energo123')
                ->setTitle('Камера #1 (портал на тер-рии ОРУ)')
                ->setStream('cam_188.168.34.45_12554_LQ.stream')
                ->setType($this->axisType)
                ->setGroup($this->group);
            $this->objectManager->persist($camOne);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_188.168.34.45_12555_LQ.stream']);

        if (!$cam) {
            $camTwo = new Cam();
            $camTwo
                ->setName('Two')
                ->setIp('188.168.34.46')
                ->setUserName('energo')
                ->setPassword('energo123')
                ->setTitle('Камера #2 (портал на тер-рии ОРУ)')
                ->setStream('cam_188.168.34.45_12555_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($camTwo);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_188.168.34.45_12556_LQ.stream']);

        if (!$cam) {
            $camThree = new Cam();
            $camThree
                ->setName('Three')
                ->setIp('188.168.34.46')
                ->setUserName('energo')
                ->setPassword('energo123')
                ->setTitle('Камера #3 (осветительная вышка на тер-рии ОРУ)')
                ->setStream('cam_188.168.34.45_12556_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($camThree);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_188.168.34.45_12557_LQ.stream']);

        if (!$cam) {
            $camFour = new Cam();
            $camFour
                ->setName('Four')
                ->setIp('188.168.34.46')
                ->setUserName('energo')
                ->setPassword('energo123')
                ->setTitle('Камера #4 (осветительная вышка у АБК, смотрит на градирни)')
                ->setStream('cam_188.168.34.45_12557_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($camFour);
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
        return ['LiveCamAllFixtures', 'LiveCamPregolskayFixtures'];
    }
//endregion Getters/Setters
}
