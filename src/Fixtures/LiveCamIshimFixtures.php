<?php

namespace Evrinoma\LiveVideoBundle\Fixtures;

use Evrinoma\LiveVideoBundle\Entity\Cam;
use Evrinoma\LiveVideoBundle\Entity\Group;
use Evrinoma\LiveVideoBundle\Voter\LiveVideoRoleInterface;

/**
 * Class LiveCamIshimFixtures
 *
 * @package Evrinoma\LiveVideoBundle\Fixtures
 */
class LiveCamIshimFixtures extends AbstractLiveCamFixtures
{
//region SECTION: Public
    public function createGroup(): LiveVideoFixtureInterface
    {
        $repository  = $this->objectManager->getRepository(Group::class);
        $this->group = $repository->findOneBy(['alias' => 'live_ishim']);

        if (!$this->group) {
            $this->group = new Group();
            $this->group
                ->setAlias('live_ishim')
                ->setName('Ишим')
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

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.47.243_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('One')
                ->setIp('172.16.47.243')
                ->setUserName('admin')
                ->setPassword('N.vtym2017')
                ->setTitle('Камера №1')
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
        return ['LiveCamAllFixtures', 'LiveCamIshimFixtures'];
    }
//endregion Getters/Setters
}
