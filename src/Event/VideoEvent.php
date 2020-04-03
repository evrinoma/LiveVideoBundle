<?php

namespace Evrinoma\LiveVideoBundle\Event;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * Class VideoEvent
 *
 * @package Evrinoma\LiveVideoBundle\Event
 */
class VideoEvent extends Event
{
//region SECTION: Fields
    /**
     * @var array
     */
    private $response = [];
//endregion Fields

//region SECTION: Constructor
    /**
     * VideoEvent constructor.
     */
    public function __construct()
    {
    }
//endregion Constructor

    //region SECTION: Public
    /**
     * @param array $additional
     */
    public function addResponse(array $additional): void
    {
        $this->response += $additional;
    }
//endregion Public

//region SECTION: Getters/Setters
    public function getResponse(): array
    {
        return $this->response;
    }

    public function setResponse($response): self
    {
        $this->response = $response;

        return $this;
    }
//endregion Getters/Setters
}