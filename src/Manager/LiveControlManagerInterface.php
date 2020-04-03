<?php


namespace Evrinoma\LiveVideoBundle\Manager;

use Evrinoma\UtilsBundle\Manager\BaseEntityInterface;
use Evrinoma\UtilsBundle\Rest\RestInterface;

/**
 * Interface LiveControlManagerInterface
 *
 * @package Evrinoma\LiveVideoBundle\Manager
 */
interface LiveControlManagerInterface extends RestInterface,  BaseEntityInterface
{
    public function controlAction($liveVideoDto);
    public function getModelActions();
    public function getAction();
    public function setAction($action);
}