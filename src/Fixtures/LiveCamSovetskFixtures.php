<?php

namespace Evrinoma\LiveVideoBundle\Fixtures;

use Evrinoma\LiveVideoBundle\Entity\Cam;
use Evrinoma\LiveVideoBundle\Entity\Group;

/**
 * Class LiveCamSovetskFixtures
 *
 * @package Evrinoma\LiveVideoBundle\Fixtures
 */
class LiveCamSovetskFixtures extends AbstractLiveCamFixtures
{
//region SECTION: Public
    public function createGroup(): LiveVideoFixtureInterface
    {
        $repository  = $this->objectManager->getRepository(Group::class);
        $this->group = $repository->findOneBy(['alias' => 'live_sovetsk']);

        if (!$this->group) {
            $this->group = new Group();
            $this->group
                ->setAlias('live_sovetsk')
                ->setName('Советск')
                ->setMaxColumn(3)
                ->setActiveToBlocked();

            $this->objectManager->persist($this->group);
        }

        return $this;
    }

    public function createVideo(): LiveVideoFixtureInterface
    {
        $repository = $this->objectManager->getRepository(Cam::class);

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.41.26_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('One')
                ->setIp('172.16.41.26')
                ->setUserName('ite')
                ->setPassword('rfvcjd2016')
                ->setTitle('Камера №1 (ЭТП ГК)')
                ->setStream('cam_172.16.41.26_LQ.stream')
                ->setType($this->axisType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.41.27_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Two')
                ->setIp('172.16.41.27')
                ->setUserName('ite')
                ->setPassword('rfvcjd2016')
                ->setTitle('Камера #2 (АБК-ОВК)')
                ->setStream('cam_172.16.41.27_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.41.28_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Three')
                ->setIp('172.16.41.28')
                ->setUserName('ite')
                ->setPassword('rfvcjd2016')
                ->setTitle('Камера #3 (ГК)')
                ->setStream('cam_172.16.41.28_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.41.29_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Four')
                ->setIp('172.16.41.29')
                ->setUserName('ite')
                ->setPassword('rfvcjd2016')
                ->setTitle('Камера #4 (Резервуары ДТ)')
                ->setStream('cam_172.16.41.29_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.41.30_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Five')
                ->setIp('172.16.41.30')
                ->setUserName('ite')
                ->setPassword('rfvcjd2016')
                ->setTitle('Камера #5 (ГК Машзал)')
                ->setStream('cam_172.16.41.30_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.41.31_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Six')
                ->setIp('172.16.41.31')
                ->setUserName('ite')
                ->setPassword('rfvcjd2016')
                ->setTitle('Камера #6 (ГК Общий вид)')
                ->setStream('cam_172.16.41.31_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.41.222_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Seven')
                ->setIp('172.16.41.222')
                ->setUserName('ite')
                ->setPassword('rfvcjd2016')
                ->setTitle('Камера #7 (БЩУ)')
                ->setStream('cam_172.16.41.222_LQ.stream')
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
        return ['LiveCamAllFixtures', 'LiveCamSovetskFixtures'];
    }
//endregion Getters/Setters
}
