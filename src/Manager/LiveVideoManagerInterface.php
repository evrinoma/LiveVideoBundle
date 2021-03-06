<?php


namespace Evrinoma\LiveVideoBundle\Manager;

use Evrinoma\DtoBundle\Dto\DtoInterface;
use Evrinoma\UtilsBundle\Manager\EntityInterface;
use Evrinoma\UtilsBundle\Rest\RestInterface;

/**
 * Interface LiveVideoManagerInterface
 *
 * @package Evrinoma\LiveVideoBundle\Manager
 */
interface LiveVideoManagerInterface extends RestInterface,  EntityInterface
{
    public function getLiveVideo(DtoInterface $liveVideoDto);

    public function getGroup(DtoInterface $liveVideoDto);

    public function getCamera(DtoInterface $liveVideoDto);
}