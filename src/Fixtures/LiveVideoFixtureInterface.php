<?php


namespace Evrinoma\LiveVideoBundle\Fixtures;

use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

/**
 * Interface LiveVideoFixtureInterface
 *
 * @package Evrinoma\LiveVideoBundle\Fixtures
 */
interface LiveVideoFixtureInterface extends FixtureGroupInterface, DependentFixtureInterface
{
//region SECTION: Fields
    public const LIVE_CAM_ALL_FIXTURES        = 'LIVE_CAM_ALL_FIXTURES';
    public const LIVE_CAM_IPARK45_FIXTURES    = 'LIVE_CAM_IPARK45_FIXTURES';
    public const LIVE_CAM_KZKT45_FIXTURES     = 'LIVE_CAM_KZKT45_FIXTURES';
    public const LIVE_CAM_KPSZ_FIXTURES       = 'LIVE_CAM_KPSZ_FIXTURES';
    public const LIVE_CAM_KZET_FIXTURES       = 'LIVE_CAM_KZET_FIXTURES';
    public const LIVE_CAM_VANKOR_FIXTURES     = 'LIVE_CAM_VANKOR_FIXTURES';
    public const LIVE_CAM_ISHIM_FIXTURES      = 'LIVE_CAM_ISHIM_FIXTURES';
    public const LIVE_CAM_GUSEV_FIXTURES      = 'LIVE_CAM_GUSEV_FIXTURES';
    public const LIVE_CAM_PREGOLSKAY_FIXTURES = 'LIVE_CAM_PREGOLSKAY_FIXTURES';
    public const LIVE_CAM_PRIMORSKY_FIXTURES  = 'LIVE_CAM_PRIMORSKY_FIXTURES';
    public const LIVE_CAM_SOVETSK_FIXTURES    = 'LIVE_CAM_SOVETSK_FIXTURES';
    public const LIVE_CAM_TOBOLSK_FIXTURES    = 'LIVE_CAM_TOBOLSK_FIXTURES';
    public const LIVE_CAM_TUMEN_FIXTURES      = 'LIVE_CAM_TUMEN_FIXTURES';
//endregion Fields

//region SECTION: Public
    public function createGroup(): LiveVideoFixtureInterface;

    public function createVideo(): LiveVideoFixtureInterface;
//endregion Public
}