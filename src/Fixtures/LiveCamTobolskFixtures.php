<?php

namespace Evrinoma\LiveVideoBundle\Fixtures;

use Evrinoma\LiveVideoBundle\Entity\Cam;
use Evrinoma\LiveVideoBundle\Entity\Group;
use Evrinoma\LiveVideoBundle\Voter\LiveVideoRoleInterface;

/**
 * Class LiveCamTobolskFixtures
 *
 * @package Evrinoma\LiveVideoBundle\Fixtures
 */
class LiveCamTobolskFixtures extends AbstractLiveCamFixtures
{
//region SECTION: Public
    public function createGroup(): LiveVideoFixtureInterface
    {
        $repository  = $this->objectManager->getRepository(Group::class);
        $this->group = $repository->findOneBy(['alias' => 'live_tobolsk']);

        if (!$this->group) {
            $this->group = new Group();
            $this->group
                ->setAlias('live_tobolsk')
                ->setName('Тобольск')
                ->setMaxColumn(3)
                ->addRole(LiveVideoRoleInterface::ROLE_ISHIM_CONTROL_VIDEO)
                ->addRole(LiveVideoRoleInterface::ROLE_CONTROL_VIDEO_ALL);

            $this->objectManager->persist($this->group);
        }

        return $this;
    }

    public function createVideo(): LiveVideoFixtureInterface
    {
        $repository = $this->objectManager->getRepository(Cam::class);

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.48.244_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('One')
                ->setIp('172.16.48.244')
                ->setUserName('admin')
                ->setPassword('N.vtym2017')
                ->setTitle('Камера №1')
                ->setStream('cam_172.16.48.244_LQ.stream')
                ->setControl(true)
                ->setType($this->axisType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.48.245_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Two')
                ->setIp('172.16.48.245')
                ->setUserName('admin')
                ->setPassword('N.vtym2017')
                ->setTitle('Камера №2')
                ->setStream('cam_172.16.48.245_LQ.stream')
                ->setControl(true)
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
        return ['LiveCamAllFixtures', 'LiveCamTobolskFixtures'];
    }
//endregion Getters/Setters
}
