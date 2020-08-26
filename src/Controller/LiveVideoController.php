<?php

namespace Evrinoma\LiveVideoBundle\Controller;

use Evrinoma\LiveVideoBundle\Event\VideoEvent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class LiveVideoController
 *
 * @package Evrinoma\LiveVideoBundle\Controller
 */
final class LiveVideoController extends AbstractController
{
//region SECTION: Fields
    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;
//endregion Fields

//region SECTION: Constructor
    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }
//endregion Constructor

//region SECTION: Public
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function video($alias)
    {
        $event = new VideoEvent();
        $this->eventDispatcher->dispatch($event);

        return $this->render('@EvrinomaLiveVideo/livevideo.html.twig', $event->getResponse());
    }

//endregion Public

}