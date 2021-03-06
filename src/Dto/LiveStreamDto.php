<?php

namespace Evrinoma\LiveVideoBundle\Dto;

use Evrinoma\DtoBundle\Dto\AbstractDto;
use Evrinoma\DtoBundle\Dto\DtoInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class LiveStreamsDto
 *
 * @package Evrinoma\LiveVideoBundle\Dto
 */
class LiveStreamDto extends AbstractDto
{
//region SECTION: Fields
    private $stream;
    /**
     * @var boolean
     */
    private $control = true;
    /**
     * @var
     */
    private $action;
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

//region SECTION: Private
    /**
     * @param mixed $liveStream
     *
     * @return LiveStreamDto
     */
    private function setStream($liveStream): self
    {
        $this->stream = $liveStream;

        return $this;

    }

    /**
     * @param mixed $action
     *
     * @return LiveStreamDto
     */
    private function setAction($action): self
    {
        $this->action = $action;

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
            $liveStream = $request->get('live_stream');
            $action     = $request->get('action');

            if ($liveStream) {
                $this->setStream($liveStream);
            }

            if ($action) {
                $this->setAction($action);
            }
        }

        return $this;
    }
//endregion SECTION: Dto

//region SECTION: Getters/Setters
    /**
     * @return mixed
     */
    public function getStream()
    {
        return $this->stream;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return bool
     */
    public function isControl(): bool
    {
        return $this->control;
    }
//endregion Getters/Setters

}