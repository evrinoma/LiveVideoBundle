<?php


namespace Evrinoma\LiveVideoBundle\Manager;

use Evrinoma\UtilsBundle\Manager\EntityInterface;
use Evrinoma\UtilsBundle\Rest\RestInterface;

/**
 * Interface LiveControlManagerInterface
 *
 * @package Evrinoma\LiveVideoBundle\Manager
 */
interface LiveControlManagerInterface extends RestInterface, EntityInterface
{
    public function controlAction($liveVideoDto);
    public function getModelActions();
    public function getAction();
    public function setAction($action);
}