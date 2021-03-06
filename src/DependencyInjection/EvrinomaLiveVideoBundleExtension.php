<?php


namespace Evrinoma\LiveVideoBundle\DependencyInjection;

use Evrinoma\LiveVideoBundle\EvrinomaLiveVideoBundle;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Alias;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * Class EvrinomaLiveVideoBundleExtension
 *
 * @package Evrinoma\LiveVideoBundle\DependencyInjection
 */
class EvrinomaLiveVideoBundleExtension extends Extension
{
//region SECTION: Public
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
        $loader->load('fixtures.yml');
        $configuration = $this->getConfiguration($configs, $container);
        $config        = $this->processConfiguration($configuration, $configs);
//        $swaggerConfig         = $config['swagger'];

        $menu = $config['menu'];

        $definition = new Definition($menu);
        $definition->addTag('evrinoma.menu');
        $alias = new Alias('evrinoma.live_video.menu');

        $container->addDefinitions(['evrinoma.live_video.menu' => $definition]);
        $container->addAliases([$menu => $alias]);
    }
//endregion Public

//region SECTION: Getters/Setters
    public function getAlias()
    {
        return EvrinomaLiveVideoBundle::LIVE_VIDEO_BUNDLE;
    }
//endregion Getters/Setters
}