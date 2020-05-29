<?php

namespace Evrinoma\LiveVideoBundle\Fixtures;

use Evrinoma\LiveVideoBundle\Entity\Cam;
use Evrinoma\LiveVideoBundle\Entity\Group;
use Evrinoma\LiveVideoBundle\Voiter\LiveVideoRoleInterface;

/**
 * Class LiveCamIpark45Fixtures
 *
 * @package Evrinoma\LiveVideoBundle\Fixtures
 */
class LiveCamIpark45Fixtures extends AbstractLiveCamFixtures
{

//region SECTION: Public
    public function createGroup(): LiveVideoFixtureInterface
    {
        $repository  = $this->objectManager->getRepository(Group::class);
        $this->group = $repository->findOneBy(['alias' => 'live_ipark45']);

        if (!$this->group) {
            $this->group = new Group();
            $this->group
                ->setAlias('live_ipark45')
                ->setName('Курганский Индустриальный парк')
                ->setMaxColumn(5)
                ->addRole(LiveVideoRoleInterface::ROLE_IPARK_CONTROL_VIDEO)
                ->addRole(LiveVideoRoleInterface::ROLE_CONTROL_VIDEO_ALL);
            $this->objectManager->persist($this->group);
        }

        return $this;
    }

    public function createVideo(): LiveVideoFixtureInterface
    {
        $repository = $this->objectManager->getRepository(Cam::class);

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.39.14_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('One')
                ->setIp('172.16.39.14')
                ->setUserName('admin')
                ->setPassword('Qve12345')
                ->setTitle('Восточная сторона производственного цеха')
                ->setStream('cam_172.16.39.14_LQ.stream')
                ->setControl(true)
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.39.24_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Two')
                ->setIp('83.146.116.47:31524')
                ->setUserName('admin')
                ->setPassword('Qve12345')
                ->setTitle('Восточная точка, здание Вейсалова')
                ->setStream('cam_172.16.39.24_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.39.25_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Three')
                ->setIp('83.146.116.47:31534')
                ->setUserName('admin')
                ->setPassword('qwe12345')
                ->setTitle('Западная сторона производственного цеха, первая от улицы Бажова')
                ->setStream('cam_172.16.39.25_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.39.26_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Four')
                ->setIp('83.146.116.47:31544')
                ->setUserName('admin')
                ->setPassword('QWE12345')
                ->setTitle('Западная сторона производственного цеха, вторая от улицы Бажова')
                ->setStream('cam_172.16.39.26_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.39.27_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Five')
                ->setIp('83.146.116.47:31554')
                ->setUserName('admin')
                ->setPassword('qwe12345')
                ->setTitle('Западная сторона производственного цеха, вторая от улицы К.Мяготина')
                ->setStream('cam_172.16.39.27_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.39.28_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Six')
                ->setIp('83.146.116.47:31564')
                ->setUserName('admin')
                ->setPassword('qwe12345')
                ->setTitle('Западная сторона производственного цеха, первая от улицы К.Мяготина')
                ->setStream('cam_172.16.39.28_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.39.29_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Seven')
                ->setIp('83.146.116.47:31574')
                ->setUserName('admin')
                ->setPassword('Hikvision1234')
                ->setTitle('КПП 1')
                ->setStream('cam_172.16.39.29_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.39.30_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Eighth')
                ->setIp('83.146.116.47:31584')
                ->setUserName('admin')
                ->setPassword('Hikvision1234')
                ->setTitle('КПП 2')
                ->setStream('cam_172.16.39.30_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.39.31_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Nine')
                ->setIp('83.146.116.47:31594')
                ->setUserName('admin')
                ->setPassword('Hikvision1234')
                ->setTitle('КПП 3')
                ->setStream('cam_172.16.39.31_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.39.32_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Ten')
                ->setIp('83.146.116.47:31604')
                ->setUserName('admin')
                ->setPassword('Qwer12345')
                ->setTitle('N1 по исполнительной схеме')
                ->setStream('cam_172.16.39.32_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.39.33_LQ.stream']);

        if (!$cam) {
            $camEleven = new Cam();
            $camEleven
                ->setName('Eleven')
                ->setIp('83.146.116.47:31614')
                ->setUserName('admin')
                ->setPassword('Qwer12345')
                ->setTitle('N2 по исполнительной схеме')
                ->setStream('cam_172.16.39.33_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($camEleven);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.39.34_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Twelve')
                ->setIp('83.146.116.47:31624')
                ->setUserName('admin')
                ->setPassword('Qwer12345')
                ->setTitle('N3 по исполнительной схеме')
                ->setStream('cam_172.16.39.34_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.39.35_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Thirteen')
                ->setIp('83.146.116.47:31624')
                ->setUserName('admin')
                ->setPassword('Qwer12345')
                ->setTitle('N3 по исполнительной схеме')
                ->setStream('cam_172.16.39.35_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.39.37_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Fourteen')
                ->setIp('83.146.116.47:31654')
                ->setUserName('admin')
                ->setPassword('Qwer12345')
                ->setTitle('NX по исполнительной схеме')
                ->setStream('cam_172.16.39.37_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.39.43_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Sixteen')
                ->setIp('172.16.39.43')
                ->setUserName('admin')
                ->setPassword('rehufy2014')
                ->setTitle('Indpark kur 14')
                ->setStream('cam_172.16.39.43_LQ.stream')
                ->setControl(true)
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.39.44_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Seventeen')
                ->setIp('172.16.39.44')
                ->setUserName('admin')
                ->setPassword('rehufy2014')
                ->setTitle('Indpark kur 15')
                ->setStream('cam_172.16.39.44_LQ.stream')
                ->setControl(true)
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.39.45_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Eighteen')
                ->setIp('172.16.39.45')
                ->setUserName('admin')
                ->setPassword('rehufy2014')
                ->setTitle('Indpark kur 16')
                ->setStream('cam_172.16.39.45_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }

        $cam = $repository->findOneBy(['stream' => 'cam_172.16.39.46_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Eighteen')
                ->setIp('172.16.39.46')
                ->setUserName('admin')
                ->setPassword('rehufy2014')
                ->setTitle('Indpark kur 17')
                ->setStream('cam_172.16.39.46_LQ.stream')
                ->setType($this->hikvisionType)
                ->setGroup($this->group);
            $this->objectManager->persist($cam);
        }


        $cam = $repository->findOneBy(['stream' => 'cam_172.16.39.47_LQ.stream']);

        if (!$cam) {
            $cam = new Cam();
            $cam
                ->setName('Eighteen')
                ->setIp('172.16.39.47')
                ->setUserName('admin')
                ->setPassword('rehufy2014')
                ->setTitle('Indpark kur 18')
                ->setStream('cam_172.16.39.47_LQ.stream')
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
        return ['LiveCamAllFixtures', 'LiveCamIpark45Fixtures'];
    }
//endregion Getters/Setters
}
