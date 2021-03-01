<?php

namespace Evrinoma\LiveVideoBundle\Fixtures;

use Evrinoma\LiveVideoBundle\Entity\Cam;
use Evrinoma\LiveVideoBundle\Entity\Group;
use Evrinoma\LiveVideoBundle\Voter\LiveVideoRoleInterface;

/**
 * Class LiveCamKzkt45Fixtures
 *
 * @package Evrinoma\LiveVideoBundle\Fixtures
 */
class LiveCamKzkt45Fixtures extends AbstractLiveCamFixtures
{

//region SECTION: Public
    public function createGroup(): LiveVideoFixtureInterface
    {
        $repository  = $this->objectManager->getRepository(Group::class);
        $this->group= $repository->findOneBy(['alias' => 'live_kzkt45']);

        if (!$this->group) {
            $this->group= new Group();
            $this->group
                ->setAlias('live_kzkt45')
                ->setName('Курганский завод комплексных технологий')
                ->setMaxColumn(3)
                ->addRole(LiveVideoRoleInterface::ROLE_KZKT_CONTROL_VIDEO)
                ->addRole(LiveVideoRoleInterface::ROLE_CONTROL_VIDEO_ALL);

            $this->objectManager->persist($this->group);
        }

        return $this;
    }

    public function createVideo(): LiveVideoFixtureInterface
    {

        $repository = $this->objectManager->getRepository(Cam::class);

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.39.10_HD.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('One')
                ->setIp('172.16.39.10')
                ->setUserName('ite')
                ->setPassword('video2014')
                ->setTitle('Kurgan KZKT CAM1')
                ->setStream('cam_172.16.39.10_HD.stream')
                ->setControl(true)
                ->setType($this->axisType)
                ->setGroup($this->group)
                ->setActiveToDelete();
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.39.23_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('One')
                ->setIp('172.16.39.23')
                ->setUserName('ite')
                ->setPassword('video2014')
                ->setTitle('Kurgan KZKT CAM1 1 пролет')
                ->setStream('cam_172.16.39.23_LQ.stream')
                ->setControl(true)
                ->setType($this->axisType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.39.11_HD.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Two')
                ->setIp('172.16.39.11')
                ->setUserName('ite')
                ->setPassword('video2014')
                ->setTitle('Kurgan KZKT CAM2')
                ->setStream('cam_172.16.39.11_HD.stream')
                ->setControl(true)
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.39.12_HD.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Three')
                ->setIp('172.16.39.12')
                ->setUserName('ite')
                ->setPassword('video2014')
                ->setTitle('Kurgan KZKT CAM3')
                ->setStream('cam_172.16.39.12_HD.stream')
                ->setControl(true)
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.39.36_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Four')
                ->setIp('172.16.39.36')
                ->setUserName('ite')
                ->setPassword('video2014')
                ->setTitle('Kurgan KZKT CAM4')
                ->setStream('cam_172.16.39.36_LQ.stream')
                ->setControl(true)
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.39.38_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Five')
                ->setIp('172.16.39.38')
                ->setUserName('ite')
                ->setPassword('video2014')
                ->setTitle('Kurgan KZKT CAM5')
                ->setStream('cam_172.16.39.38_LQ.stream')
                ->setControl(true)
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.39.39_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Six')
                ->setIp('172.16.39.39')
                ->setUserName('admin')
                ->setPassword('rehufy2014')
                ->setTitle('3 пролет восточная сторона')
                ->setStream('cam_172.16.39.39_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.39.40_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Seven')
                ->setIp('172.16.39.40')
                ->setUserName('admin')
                ->setPassword('rehufy2014')
                ->setTitle('2 пролет восточная сторона')
                ->setStream('cam_172.16.39.40_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.39.48_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Seven')
                ->setIp('172.16.39.48')
                ->setUserName('ite')
                ->setPassword('video2014')
                ->setTitle('3 пролет центр -49')
                ->setStream('cam_172.16.39.48_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.39.49_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Seven')
                ->setIp('172.16.39.49')
                ->setUserName('ite')
                ->setPassword('video2014')
                ->setTitle('3 пролет центр -1')
                ->setStream('cam_172.16.39.49_LQ.stream')
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
        return ['LiveCamAllFixtures', 'LiveCamKzkt45Fixtures'];
    }
//endregion Getters/Setters
}
