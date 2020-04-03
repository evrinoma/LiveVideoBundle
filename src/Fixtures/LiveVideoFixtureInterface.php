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
    public function createGroup():LiveVideoFixtureInterface;
    public function createVideo():LiveVideoFixtureInterface;
}