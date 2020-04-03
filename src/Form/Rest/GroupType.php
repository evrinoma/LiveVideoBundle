<?php

namespace Evrinoma\LiveVideoBundle\Form\Rest;


use Evrinoma\DtoBundle\Factory\FactoryDto;
use Evrinoma\LiveVideoBundle\Dto\LiveVideoDto;
use Evrinoma\LiveVideoBundle\Entity\Group;
use Evrinoma\LiveVideoBundle\Manager\LiveVideoManagerInterface;

use Evrinoma\UtilsBundle\Form\Rest\RestChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class GroupType
 *
 * @package Evrinoma\LiveVideoBundle\Form\Rest
 */
class GroupType extends AbstractType
{
//region SECTION: Fields
    /**
     * LiveVideoManager
     */
    private $liveVideoManager;

    /**
     * @var FactoryDto
     */
    private $factoryDto;
//endregion Fields
//endregion Fields

//region SECTION: Constructor
    /**
     * ServerType constructor.
     *
     * @param LiveVideoManagerInterface $liveVideoManager
     * @param FactoryDto                $factoryDto
     */
    public function __construct(LiveVideoManagerInterface $liveVideoManager, FactoryDto $factoryDto)
    {
        $this->liveVideoManager = $liveVideoManager;
        $this->factoryDto       = $factoryDto;
    }

//endregion Constructor

//region SECTION: Public
    public function configureOptions(OptionsResolver $resolver)
    {
        $callback = function (Options $options) {
            $groups = [];
            $liveVideoDto = $this->factoryDto->cloneDto(LiveVideoDto::class);
            foreach ($this->liveVideoManager->getGroup($liveVideoDto)->getData() as $data) {
                /** @var $data Group */
                $groups[] = $data->getAlias();
            }

            return $groups;
        };
        $resolver->setDefault(RestChoiceType::REST_COMPONENT_NAME, 'groups');
        $resolver->setDefault(RestChoiceType::REST_DESCRIPTION, 'groupList');
        $resolver->setDefault(RestChoiceType::REST_CHOICES, $callback);
    }
//endregion Public
//endregion Public

//region SECTION: Getters/Setters
    public function getParent()
    {
        return RestChoiceType::class;
    }
//endregion Getters/Setters
}