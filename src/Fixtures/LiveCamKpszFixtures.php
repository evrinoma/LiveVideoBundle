<?php

namespace Evrinoma\LiveVideoBundle\Fixtures;

use Evrinoma\LiveVideoBundle\Entity\Cam;
use Evrinoma\LiveVideoBundle\Entity\Group;
use Evrinoma\LiveVideoBundle\Voiter\LiveVideoRoleInterface;

/**
 * Class LiveCamKpszFixtures
 *
 * @package Evrinoma\LiveVideoBundle\Fixtures
 */
class LiveCamKpszFixtures extends AbstractLiveCamFixtures
{

//region SECTION: Public
    public function createGroup(): LiveVideoFixtureInterface
    {
        $repository  = $this->objectManager->getRepository(Group::class);
        $this->group= $repository->findOneBy(['alias' => 'live_kpsz']);

        if (!$this->group) {
            $this->group= new Group();
            $this->group
                ->setAlias('live_kpsz')
                ->setName('Курганский приборостроительный завод')
                ->setMaxColumn(3)
                ->addRole(LiveVideoRoleInterface::ROLE_KPSZ_CONTROL_VIDEO)
                ->addRole(LiveVideoRoleInterface::ROLE_CONTROL_VIDEO_ALL);

            $this->objectManager->persist($this->group);
        }

        return $this;
    }

    public function createVideo(): LiveVideoFixtureInterface
    {

        $repository = $this->objectManager->getRepository(Cam::class);

        $cam = $repository->findOneBy(['stream' => 'cam_172.23.20.221_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('One')
                ->setIp('172.23.20.221')
                ->setUserName('ite')
                ->setPassword('video2014')
                ->setTitle('Kurgan KPSZ CAM1')
                ->setStream('cam_172.23.20.221_LQ.stream')
                ->setControl(true)
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.23.20.222_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Two')
                ->setIp('172.23.20.222')
                ->setUserName('ite')
                ->setPassword('video2014')
                ->setTitle('Kurgan KPSZ CAM2')
                ->setStream('cam_172.23.20.222_LQ.stream')
                ->setControl(true)
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.23.20.223_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Three')
                ->setIp('172.23.20.223')
                ->setUserName('ite')
                ->setPassword('video2014')
                ->setTitle('Kurgan KPSZ CAM3')
                ->setStream('cam_172.23.20.223_LQ.stream')
                ->setControl(true)
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.23.20.224_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Four')
                ->setIp('172.23.20.224')
                ->setUserName('ite')
                ->setPassword('video2014')
                ->setTitle('Kurgan KPSZ CAM4')
                ->setStream('cam_172.23.20.224_LQ.stream')
                ->setControl(true)
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.23.20.225_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Five')
                ->setIp('172.23.20.225')
                ->setUserName('ite')
                ->setPassword('video2014')
                ->setTitle('Kurgan KPSZ CAM5')
                ->setStream('cam_172.23.20.225_LQ.stream')
                ->setControl(true)
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.23.20.226_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Six')
                ->setIp('172.23.20.226')
                ->setUserName('admin')
                ->setPassword('video2014')
                ->setTitle('Kurgan KPSZ CAM6')
                ->setStream('cam_172.23.20.226_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.23.20.227_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Seven')
                ->setIp('172.23.20.227')
                ->setUserName('admin')
                ->setPassword('video2014')
                ->setTitle('Kurgan KPSZ CAM7')
                ->setStream('cam_172.23.20.227_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.23.20.228_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Eight')
                ->setIp('172.23.20.228')
                ->setUserName('ite')
                ->setPassword('video2014')
                ->setTitle('Kurgan KPSZ CAM5')
                ->setStream('cam_172.23.20.228_LQ.stream')
                ->setControl(true)
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.23.20.229_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Nine')
                ->setIp('172.23.20.229')
                ->setUserName('admin')
                ->setPassword('video2014')
                ->setTitle('Kurgan KPSZ CAM6')
                ->setStream('cam_172.23.20.229_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.23.20.230_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Ten')
                ->setIp('172.23.20.230')
                ->setUserName('admin')
                ->setPassword('video2014')
                ->setTitle('Kurgan KPSZ CAM7')
                ->setStream('cam_172.23.20.230_LQ.stream')
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
        return ['LiveCamAllFixtures', 'LiveCamKpszFixtures'];
    }
//endregion Getters/Setters
}
