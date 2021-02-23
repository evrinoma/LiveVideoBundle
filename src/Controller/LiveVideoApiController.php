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
use OpenApi\Annotations as OA;
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
     * @OA\Get(
     *     tags={"live_video"},
     *     @OA\Parameter(
     *         name="Evrinoma\LiveVideoBundle\Dto\LiveVideoDto[alias]",
     *         in="query",
     *         description="search there",
     *         required=true,
     *         @OA\Schema(
     *              type="array",
     *              @OA\Items(
     *                  type="string",
     *                  ref=@Model(type=Evrinoma\LiveVideoBundle\Form\Rest\GroupType::class),
     *              ),
     *          ),
     *         style="form"
     *     ),
     *     @OA\Parameter(
     *         name="Evrinoma\LiveVideoBundle\Dto\LiveVideoDto[isEmptyResult]",
     *         in="query",
     *         description="if true then return all values then group unselected",
     *         required=true,
     *         @OA\Schema(
     *              type="array",
     *              @OA\Items(
     *                  type="string",
     *                  enum={"true", "false"},
     *                  default="true"
     *              ),
     *          ),
     *         style="form"
     *     ),
     *     @OA\Parameter(
     *         name="Evrinoma\LiveVideoBundle\Dto\LiveVideoDto[serializeGroup]",
     *         in="query",
     *         description="group serialization",
     *         required=true,
     *         @OA\Schema(
     *              type="array",
     *              @OA\Items(
     *                  type="string",
     *                  enum={"restrict", "full"},
     *                  default="restrict"
     *              ),
     *          ),
     *         style="form"
     *     ),
     * )
     * @OA\Response(response=200,description="Returns Live Video Settings")
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
     * @OA\Get(tags={"live_video"})
     * @OA\Response(response=200,description="Returns class acl entity")
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function liveVideoClassAction()
    {
        return $this->json($this->liveVideoManager->setRestSuccessOk()->getRepositoryClass(), $this->liveVideoManager->getRestStatus());
    }

    /**
     * @Rest\Get("/api/live_video/control", name="api_live_video_control")
     * @OA\Get(
     *     tags={"live_video"},
     *     @OA\Parameter(
     *         name="Evrinoma\LiveVideoBundle\Dto\LiveStreamsDto[action]",
     *         in="query",
     *         description="cam action",
     *         required=true,
     *         @OA\Schema(
     *              type="array",
     *              @OA\Items(
     *                  type="string",
     *                  ref=@Model(type=Evrinoma\LiveVideoBundle\Form\Rest\ActionType::class),
     *              ),
     *          ),
     *         style="form"
     *     ),
     *     @OA\Parameter(
     *         name="Evrinoma\LiveVideoBundle\Dto\LiveStreamsDto[live_streams]",
     *         in="query",
     *         description="search there",
     *         required=true,
     *         @OA\Schema(
     *              type="array",
     *              @OA\Items(
     *                  type="string",
     *                  ref=@Model(type=Evrinoma\LiveVideoBundle\Form\Rest\CamType::class),
     *              ),
     *          ),
     *         style="form"
     *     ),
     * )
     * @OA\Response(response=200,description="Cam Live Video Contol")
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
     * @OA\Get(tags={"live_video"})
     * @OA\Response(response=200,description="Returns class acl entity")
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function liveVideoControlClassAction()
    {
        return $this->json($this->liveControlManager->setRestSuccessOk()->getRepositoryClass(), $this->liveControlManager->getRestStatus());
    }

    /**
     * @Rest\Get("/api/live_video/streaming_engine", name="api_live_video_streaming_engine")
     * @OA\Get(tags={"live_video"})
     * @OA\Response(response=200,description="Returns class acl entity")
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