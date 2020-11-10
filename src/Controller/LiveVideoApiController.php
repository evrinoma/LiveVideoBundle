<?php

namespace Evrinoma\LiveVideoBundle\Controller;

use Evrinoma\DtoBundle\Factory\FactoryDto;
use Evrinoma\LiveVideoBundle\Dto\LiveVideoDto;
use Evrinoma\LiveVideoBundle\Manager\LiveControlManagerInterface;
use Evrinoma\LiveVideoBundle\Manager\LiveVideoManagerInterface;
use Evrinoma\UtilsBundle\Controller\AbstractApiController;
use FOS\RestBundle\Controller\Annotations as Rest;
use JMS\Serializer\SerializerInterface;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Class LiveVideoApiController
 *
 * @package Evrinoma\LiveVideoBundle\Controller
 */
final class LiveVideoApiController extends AbstractApiController
{
//region SECTION: Fields
    /**
     * @var LiveVideoManagerInterface
     */
    private $liveVideoManager;

    /**
     * @var LiveControlManagerInterface
     */
    private $liveControlManager;

    /**
     * @var FactoryDto
     */
    private $factoryDto;

    /**
     * @var Request
     */
    private $request;
//endregion Fields

//region SECTION: Constructor
    /**
     * ApiController constructor.
     *
     * @param SerializerInterface         $serializer
     * @param RequestStack                $requestStack
     * @param FactoryDto                  $factoryDto
     * @param LiveVideoManagerInterface   $liveVideoManager
     * @param LiveControlManagerInterface $liveControlManager
     */
    public function __construct(SerializerInterface $serializer, RequestStack $requestStack, FactoryDto $factoryDto, LiveVideoManagerInterface $liveVideoManager, LiveControlManagerInterface $liveControlManager)
    {
        parent::__construct($serializer);
        $this->request            = $requestStack->getCurrentRequest();
        $this->factoryDto         = $factoryDto;
        $this->liveVideoManager   = $liveVideoManager;
        $this->liveControlManager = $liveControlManager;
    }
//endregion Constructor

//region SECTION: Public
    /**
     * @Rest\Get("/api/live_video", name="api_live_video_group")
     * @SWG\Get(tags={"live_video"})
     * @SWG\Parameter(
     *     name="Evrinoma\LiveVideoBundle\Dto\LiveVideoDto[alias]",
     *     in="query",
     *     type="array",
     *     description="search there",
     *     items=@SWG\Items(
     *         type="string",
     *         ref=@Model(type=Evrinoma\LiveVideoBundle\Form\Rest\GroupType::class)
     *     )
     * )
     * @SWG\Parameter(
     *    name="Evrinoma\LiveVideoBundle\Dto\LiveVideoDto[isEmptyResult]",
     *    in="query",
     *    type="boolean",
     *    default= "true",
     *    description="if true then return all values then group unselected",
     *    enum={"true","false"}
     * )
     * @SWG\Parameter(
     *    name="Evrinoma\LiveVideoBundle\Dto\LiveVideoDto[serializeGroup]",
     *    in="query",
     *    type="string",
     *    default= "restrict",
     *    description="group serialization",
     *    enum={"restrict","full"}
     * )
     * @SWG\Response(response=200,description="Returns Live Video Settings")
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function liveVideoAction()
    {
        /** @var LiveVideoDto $liveVideoDto */
        $liveVideoDto = $this->factoryDto->setRequest($this->request)->createDto(LiveVideoDto::class);

        $data = $this->liveVideoManager->setRestSuccessOk()->getLiveVideo($liveVideoDto)->getData($liveVideoDto);

        $status = $this->liveVideoManager->getRestStatus();

        $this->setSerializeGroup($liveVideoDto->getSerializeGroup());

        return $this->json($data, $status);
    }

    /**
     * @Rest\Get("/api/live_video/class", name="api_live_video_class")
     * @SWG\Get(tags={"live_video"})
     * @SWG\Response(response=200,description="Returns class acl entity")
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function liveVideoClassAction()
    {
        return $this->json($this->liveVideoManager->setRestSuccessOk()->getRepositoryClass(), $this->liveVideoManager->getRestStatus());
    }

    /**
     * @Rest\Get("/api/live_video/control", name="api_live_video_control")
     * @SWG\Get(tags={"live_video"})
     * @SWG\Parameter(
     *     name="Evrinoma\LiveVideoBundle\Dto\LiveStreamsDto[action]",
     *     in="query",
     *     type="array",
     *     default=null,
     *     description="cam action",
     *     items=@SWG\Items(
     *         type="string",
     *         ref=@Model(type=Evrinoma\LiveVideoBundle\Form\Rest\ActionType::class)
     *     )
     * )
     * @SWG\Parameter(
     *     name="Evrinoma\LiveVideoBundle\Dto\LiveStreamsDto[live_streams]",
     *     in="query",
     *     type="array",
     *     description="search there",
     *     items=@SWG\Items(
     *         type="string",
     *         ref=@Model(type=Evrinoma\LiveVideoBundle\Form\Rest\CamType::class)
     *     )
     * )
     * @SWG\Response(response=200,description="Cam Live Video Contol")
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function liveVideoControlAction()
    {
        /** @var LiveVideoDto $liveVideoDto */
        $liveVideoDto = $this->factoryDto->setRequest($this->request)->createDto(LiveVideoDto::class);

        return $this->json($this->liveControlManager->setAction($liveVideoDto->getLiveStreams()->getAction())->controlAction($liveVideoDto)->getData(), $this->liveControlManager->getRestStatus());
    }

    /**
     * @Rest\Get("/api/live_video/control/class", name="api_live_video_control_class")
     * @SWG\Get(tags={"live_video"})
     * @SWG\Response(response=200,description="Returns class acl entity")
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function liveVideoControlClassAction()
    {
        return $this->json($this->liveControlManager->setRestSuccessOk()->getRepositoryClass(), $this->liveControlManager->getRestStatus());
    }

    /**
     * @Rest\Get("/api/live_video/streaming_engine", name="api_live_video_streaming_engine")
     * @SWG\Get(tags={"live_video"})
     * @SWG\Response(response=200,description="Returns class acl entity")
     * @TODO Host and Applications
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function liveVideoWowzaStreamingEngineAction()
    {
        $application = 'live';
        $host        = 'http://cam.ite-ng.ru:1935/';
        $list        = 'playlist.m3u8';

        return $this->json(['host' => $host.$application, 'list' => $list], $this->liveVideoManager->setRestSuccessOk()->getRestStatus());
    }
//endregion Public
}