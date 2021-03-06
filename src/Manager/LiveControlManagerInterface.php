<?php


namespace Evrinoma\LiveVideoBundle\Manager;

use Evrinoma\DtoBundle\Dto\DtoInterface;
use Evrinoma\UtilsBundle\Manager\EntityInterface;
use Evrinoma\UtilsBundle\Rest\RestInterface;

interface LiveControlManagerInterface extends RestInterface, EntityInterface
{
//region SECTION: Public
    public function controlAction(DtoInterface $liveVideoDto);
//endregion Public

//region SECTION: Getters/Setters
    public function getModelActions();

    public function getAction();

    public function setAction($action);
//endregion Getters/Setters
}