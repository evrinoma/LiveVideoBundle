<?php

namespace Evrinoma\LiveVideoBundle\Dto;

use Evrinoma\DtoBundle\Annotation\Dto;
use Evrinoma\DtoBundle\Dto\AbstractDto;
use Evrinoma\DtoBundle\Dto\DtoInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class LiveVideoDto
 *
 * @package Evrinoma\LiveVideoBundle\Dto
 */
class LiveVideoDto extends AbstractDto
{

//region SECTION: Fields
    private $isEmptyResult  = true;
    private $alias;
    private $serializeGroup = 'restrict';
    /**
     * @Dto(class="Evrinoma\LiveVideoBundle\Dto\LiveStreamDto")
     * @var LiveStreamDto
     */
    private $liveStreamDto;
//endregion Fields

//region SECTION: Protected
    /**
     * @return mixed
     */
    protected function getClassEntity(): ?string
    {
        return null;
    }
//endregion Protected

//region SECTION: Public
    /**
     * @return bool
     */
    public function isEmptyResult()
    {
        return $this->isEmptyResult;
    }
//endregion Public

//region SECTION: Private
    /**
     * @param mixed $serializeGroup
     *
     * @return LiveVideoDto
     */
    private function setSerializeGroup($serializeGroup)
    {
        $this->serializeGroup = $serializeGroup;

        return $this;
    }

    /**
     * @param bool $isEmptyResult
     *
     * @return LiveVideoDto
     */
    private function setIsEmptyResult($isEmptyResult)
    {
        $this->isEmptyResult = $isEmptyResult === 'true';

        return $this;
    }

    /**
     * @param mixed $alias
     *
     * @return LiveVideoDto
     */
    private function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }
//endregion Private

//region SECTION: Dto
    /**
     * @param Request $request
     *
     * @return AbstractDto
     */
    public function toDto($request): DtoInterface
    {
        $class = $request->get(DtoInterface::DTO_CLASS);

        if ($class === $this->getClass()) {
            $alias         = $request->get('alias');
            $isEmptyResult = $request->get('isEmptyResult');

            $serializeGroup = $request->get('serializeGroup');

            if ($alias) {
                $this->setAlias($alias);
            }

            if ($isEmptyResult) {
                $this->setIsEmptyResult($isEmptyResult);
            }

            if ($serializeGroup) {
                $this->setSerializeGroup($serializeGroup);
            }
        }

        return $this;
    }
//endregion SECTION: Dto

//region SECTION: Getters/Setters
    /**
     * @param LiveStreamDto $liveStreamDto
     *
     * @return DtoInterface
     */
    public function setLiveStreamDto(LiveStreamDto $liveStreamDto): DtoInterface
    {
        $this->liveStreamDto = $liveStreamDto;

        return $this;
    }

    /**
     * @return LiveStreamDto
     */
    public function getLiveStreamDto(): LiveStreamDto
    {
        return $this->liveStreamDto;
    }

    /**
     * @return mixed
     */
    public function getSerializeGroup()
    {
        return $this->serializeGroup;
    }

    /**
     * @return mixed
     */
    public function getAlias()
    {
        return $this->alias;
    }
//endregion Getters/Setters
}