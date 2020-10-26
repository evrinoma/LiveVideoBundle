<?php


namespace Evrinoma\LiveVideoBundle\Menu;


use Doctrine\ORM\EntityManagerInterface;
use Evrinoma\LiveVideoBundle\Voter\LiveVideoRoleInterface;
use Evrinoma\MenuBundle\Entity\MenuItem;
use Evrinoma\MenuBundle\Menu\MenuInterface;
use Evrinoma\UtilsBundle\Voter\RoleInterface;

/**
 * Class LiveVideoMenu
 *
 * @package Evrinoma\LiveVideoBundle\\Menu
 */
final class LiveVideoMenu implements MenuInterface
{

//region SECTION: Public
    public function create(EntityManagerInterface $em): void
    {
        $iparkVideo = new MenuItem();
        $iparkVideo
            ->setRole([RoleInterface::ROLE_SUPER_ADMIN, LiveVideoRoleInterface::ROLE_IPARK_VIDEO, LiveVideoRoleInterface::ROLE_VIDEO_ALL])
            ->setName('ipark45')
            ->setRoute('live_video')
            ->setRouteParameters(['alias' => 'live_ipark45'])
            ->setTag($this->tag());

        $em->persist($iparkVideo);

        $kzktVideo = new MenuItem();
        $kzktVideo
            ->setRole([RoleInterface::ROLE_SUPER_ADMIN, LiveVideoRoleInterface::ROLE_KZKT_VIDEO, LiveVideoRoleInterface::ROLE_VIDEO_ALL])
            ->setName('kzkt45')
            ->setRoute('live_video')
            ->setRouteParameters(['alias' => 'live_kzkt45'])
            ->setTag($this->tag());

        $em->persist($kzktVideo);


        $kpszVideo = new MenuItem();
        $kpszVideo
            ->setRole([RoleInterface::ROLE_SUPER_ADMIN, LiveVideoRoleInterface::ROLE_KPSZ_VIDEO, LiveVideoRoleInterface::ROLE_VIDEO_ALL])
            ->setName('КПСЗ')
            ->setRoute('live_video')
            ->setRouteParameters(['alias' => 'live_kpsz'])
            ->setTag($this->tag());

        $em->persist($kpszVideo);

        $ishimVideo = new MenuItem();
        $ishimVideo
            ->setRole([RoleInterface::ROLE_SUPER_ADMIN, LiveVideoRoleInterface::ROLE_ISHIM_VIDEO, LiveVideoRoleInterface::ROLE_VIDEO_ALL])
            ->setName('Ишим')
            ->setRoute('live_video')
            ->setRouteParameters(['alias' => 'live_ishim'])
            ->setTag($this->tag());

        $em->persist($ishimVideo);

        $tobolskVideo = new MenuItem();
        $tobolskVideo
            ->setRole([RoleInterface::ROLE_SUPER_ADMIN, LiveVideoRoleInterface::ROLE_TOBOLSK_VIDEO, LiveVideoRoleInterface::ROLE_VIDEO_ALL])
            ->setName('Тобольск')
            ->setRoute('live_video')
            ->setRouteParameters(['alias' => 'live_tobolsk'])
            ->setTag($this->tag());

        $em->persist($tobolskVideo);

        $vankorVideo = new MenuItem();
        $vankorVideo
            ->setRole([RoleInterface::ROLE_SUPER_ADMIN, LiveVideoRoleInterface::ROLE_VANKOR_VIDEO, LiveVideoRoleInterface::ROLE_VIDEO_ALL])
            ->setName('Ванкор')
            ->setRoute('live_video')
            ->setRouteParameters(['alias' => 'live_vankor'])
            ->setTag($this->tag());

        $em->persist($vankorVideo);

        $video = new MenuItem();
        $video
            ->setRole([RoleInterface::ROLE_SUPER_ADMIN, LiveVideoRoleInterface::ROLE_VIDEO, LiveVideoRoleInterface::ROLE_VIDEO_ALL])
            ->setName('Live Cam')
            ->setUri('#')
            ->addChild($iparkVideo)
            ->addChild($kzktVideo)
            ->addChild($kpszVideo)
            ->addChild($ishimVideo)
            ->addChild($tobolskVideo)
            ->addChild($vankorVideo)
            ->setTag($this->tag());

        $em->persist($video);
    }

    public function order(): int
    {
        return 20;
    }

    public function tag(): string
    {
        return MenuInterface::DEFAULT_TAG;
    }
//endregion Public
}