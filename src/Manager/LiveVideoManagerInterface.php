<?php


namespace Evrinoma\LiveVideoBundle\Manager;



use Evrinoma\LiveVideoBundle\Dto\LiveVideoDto;
use Evrinoma\UtilsBundle\Manager\BaseEntityInterface;
use Evrinoma\UtilsBundle\Rest\RestInterface;

/**
 * Interface LiveVideoManagerInterface
 *
 * @package Evrinoma\LiveVideoBundle\Manager
 */
interface LiveVideoManagerInterface extends RestInterface,  BaseEntityInterface
{
    public function getLiveVideo(LiveVideoDto $liveVideoDto);

    public function getGroup($liveVideoDto);

    public function getCamera($liveVideoDto);
}