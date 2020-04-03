<?php


namespace Evrinoma\LiveVideoBundle;

use Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass;
use Evrinoma\LiveVideoBundle\DependencyInjection\EvrinomaLiveVideoBundleExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class EvrinomaLiveVideoBundle
 *
 * @package Evrinoma\LiveVideoBundle
 */
class EvrinomaLiveVideoBundle extends Bundle
{
//region SECTION: Public
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $ormCompilerClass = 'Doctrine\Bundle\DoctrineBundle\DependencyInjection\Compiler\DoctrineOrmMappingsPass';
        if (class_exists($ormCompilerClass)) {
            $container->addCompilerPass(
                DoctrineOrmMappingsPass::createAnnotationMappingDriver(
                    ['Evrinoma\LiveVideoBundle\Entity'],
                    [sprintf('%s/Entity', $this->getPath())]
                )
            );
        }
    }
//endregion Public

//region SECTION: Getters/Setters
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new EvrinomaLiveVideoBundleExtension();
        }

        return $this->extension;
    }
//endregion Getters/Setters
}