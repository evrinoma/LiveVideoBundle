<?php

namespace Evrinoma\LiveVideoBundle\Voter;

use Evrinoma\UtilsBundle\Voter\RoleInterface;

/**
 * Interface LiveVideoRoleInterface
 *
 * @package Evrinoma\LiveVideoBundle\Voter
 */
interface LiveVideoRoleInterface extends RoleInterface
{
//region SECTION: Fields
    public const ROLE_VIDEO_ALL = 'ROLE_VIDEO_ALL';

    public const ROLE_VIDEO = 'ROLE_VIDEO';
    public const ROLE_KZKT_VIDEO = 'ROLE_KZKT_VIDEO';
    public const ROLE_KPSZ_VIDEO = 'ROLE_KPSZ_VIDEO';
    public const ROLE_ISHIM_VIDEO = 'ROLE_ISHIM_VIDEO';
    public const ROLE_IPARK_VIDEO = 'ROLE_IPARK_VIDEO';
    public const ROLE_TOBOLSK_VIDEO = 'ROLE_TOBOLSK_VIDEO';
    public const ROLE_VANKOR_VIDEO = 'ROLE_VANKOR_VIDEO';

    public const ROLE_CONTROL_VIDEO_ALL = 'ROLE_CONTROL_VIDEO_ALL';

    public const ROLE_KZKT_CONTROL_VIDEO = 'ROLE_KZKT_CONTROL_VIDEO';
    public const ROLE_KPSZ_CONTROL_VIDEO = 'ROLE_KPSZ_CONTROL_VIDEO';
    public const ROLE_ISHIM_CONTROL_VIDEO = 'ROLE_ISHIM_CONTROL_VIDEO';
    public const ROLE_IPARK_CONTROL_VIDEO = 'ROLE_IPARK_CONTROL_VIDEO';
    public const ROLE_VANKOR_CONTROL_VIDEO = 'ROLE_VANKOR_CONTROL_VIDEO';
    public const ROLE_TOBOLSK_CONTROL_VIDEO = 'ROLE_TOBOLSK_CONTROL_VIDEO';

    public const ROLE_CONTROL_VIDEO_MIXED = [
        self::ROLE_CONTROL_VIDEO_ALL,
        self::ROLE_KZKT_CONTROL_VIDEO,
        self::ROLE_KPSZ_CONTROL_VIDEO,
        self::ROLE_ISHIM_CONTROL_VIDEO,
        self::ROLE_IPARK_CONTROL_VIDEO,
        self::ROLE_TOBOLSK_CONTROL_VIDEO,
        self::ROLE_VANKOR_CONTROL_VIDEO,
    ];
}