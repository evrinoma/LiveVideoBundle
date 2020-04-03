<?php

namespace Evrinoma\LiveVideoBundle\Form\Rest;

use Evrinoma\LiveVideoBundle\Manager\LiveControlManagerInterface;

use Evrinoma\UtilsBundle\Form\Rest\RestChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ActionType
 *
 * @package Evrinoma\LiveVideoBundle\Form\Rest
 */
class ActionType extends AbstractType
{
//region SECTION: Fields
    /**
     * @var LiveControlManagerInterface
     */
    private $liveControlManager;
//endregion Fields
//endregion Fields

//region SECTION: Constructor
    /**
     * ServerType constructor.
     */
    public function __construct(LiveControlManagerInterface $liveControlManager)
    {
        $this->liveControlManager = $liveControlManager;
    }

//endregion Constructor
//region SECTION: Public
    public function configureOptions(OptionsResolver $resolver)
    {
        $callback = function (Options $options) {
            return $this->liveControlManager->getModelActions();
        };
        $resolver->setDefault(RestChoiceType::REST_COMPONENT_NAME, 'action');
        $resolver->setDefault(RestChoiceType::REST_DESCRIPTION, 'actionList');
        $resolver->setDefault(RestChoiceType::REST_CHOICES, $callback);
    }
//endregion Public

//region SECTION: Getters/Setters
    public function getParent()
    {
        return RestChoiceType::class;
    }
//endregion Getters/Setters
}