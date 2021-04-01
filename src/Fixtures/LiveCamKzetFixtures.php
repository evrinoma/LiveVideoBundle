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
class LiveCamKzetFixtures extends AbstractLiveCamFixtures
{

//region SECTION: Public
    public function createGroup(): LiveVideoFixtureInterface
    {
        $repository  = $this->objectManager->getRepository(Group::class);
        $this->group= $repository->findOneBy(['alias' => 'live_kzet']);

        if (!$this->group) {
            $this->group= new Group();
            $this->group
                ->setAlias('live_kzet')
                ->setName('Курганский завод энергетических технологий')
                ->setMaxColumn(5)
                ->addRole(LiveVideoRoleInterface::ROLE_KZET_CONTROL_VIDEO)
                ->addRole(LiveVideoRoleInterface::ROLE_CONTROL_VIDEO_ALL);

            $this->objectManager->persist($this->group);
        }

        return $this;
    }

    public function createVideo(): LiveVideoFixtureInterface
    {

        $repository = $this->objectManager->getRepository(Cam::class);

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.38.20_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('One')
                ->setIp('172.16.38.20:31774')
                ->setUserName('ite')
                ->setPassword('video2014')
                ->setTitle('Kurgan KZET 1')
                ->setStream('cam_172.16.38.20_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.38.21_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Two')
                ->setIp('172.16.38.21:31784')
                ->setUserName('ite')
                ->setPassword('video2014')
                ->setTitle('Kurgan KZET 2')
                ->setStream('cam_172.16.38.21_LQ.stream')
                ->setControl(true)
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.38.22_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Three')
                ->setIp('172.16.38.22:31794')
                ->setUserName('ite')
                ->setPassword('video2014')
                ->setTitle('Kurgan KZET 3')
                ->setStream('cam_172.16.38.22_LQ.stream')
                ->setControl(true)
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.38.23_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Four')
                ->setIp('172.16.38.23:31804')
                ->setUserName('ite')
                ->setPassword('video2014')
                ->setTitle('Kurgan KZET 4')
                ->setStream('cam_172.16.38.23_LQ.stream')
                ->setControl(true)
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.38.24_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Five')
                ->setIp('172.16.38.24:31814')
                ->setUserName('ite')
                ->setPassword('video2014')
                ->setTitle('Kurgan KZET 5')
                ->setStream('cam_172.16.38.24_LQ.stream')
                ->setControl(true)
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.38.25_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Six')
                ->setIp('172.16.38.25:31824')
                ->setUserName('ite')
                ->setPassword('video2014')
                ->setTitle('Kurgan KZET 6')
                ->setStream('cam_172.16.38.25_LQ.stream')
                ->setControl(true)
                ->setType($this->axisType)
                ->setGroup($this->group)
                ->setActiveToDelete();
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
            LiveVideoFixtureInterface::LIVE_CAM_KZET_FIXTURES,
        ];
    }
//endregion Getters/Setters
}
