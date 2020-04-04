<?php

namespace Evrinoma\LiveVideoBundle\Fixtures;

use Evrinoma\LiveVideoBundle\Entity\Cam;
use Evrinoma\LiveVideoBundle\Entity\Group;
use Evrinoma\LiveVideoBundle\Voiter\LiveVideoRoleInterface;

/**
 * Class LiveCamVankorFixtures
 *
 * @package Evrinoma\LiveVideoBundle\Fixtures
 */
class LiveCamVankorFixtures extends AbstractLiveCamFixtures
{
//region SECTION: Public
    public function createGroup(): LiveVideoFixtureInterface
    {
        $repository  = $this->objectManager->getRepository(Group::class);
        $this->group = $repository->findOneBy(['alias' => 'live_vankor']);

        if (!$this->group) {
            $this->group = new Group();
            $this->group
                ->setAlias('live_vankor')
                ->setName('Ванкор')
                ->setMaxColumn(2)
                ->addRole(LiveVideoRoleInterface::ROLE_VANKOR_CONTROL_VIDEO)
                ->addRole(LiveVideoRoleInterface::ROLE_CONTROL_VIDEO_ALL);
            $this->objectManager->persist($this->group);
        }

        return $this;
    }

    public function createVideo(): LiveVideoFixtureInterface
    {

        $repository = $this->objectManager->getRepository(Cam::class);

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.22.243_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('One')
                ->setIp('176.118.25.162:31243')
                ->setUserName('ite')
                ->setPassword('video2014')
                ->setTitle('Камера #1')
                ->setStream('cam_172.16.22.243_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.22.244_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Two')
                ->setIp('176.118.25.162:31244')
                ->setUserName('ite')
                ->setPassword('video2014')
                ->setTitle('Камера #2')
                ->setStream('cam_172.16.22.244_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.22.245_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Three')
                ->setIp('176.118.25.162:31245')
                ->setUserName('ite')
                ->setPassword('video2014')
                ->setTitle('Камера #3 ')
                ->setStream('cam_172.16.22.245_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        return $this;
    }
//endregion Public
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
        return ['LiveCamAllFixtures', 'LiveCamVankorFixtures'];
    }
//endregion Getters/Setters
}
