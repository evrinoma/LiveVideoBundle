<?php


namespace Evrinoma\LiveVideoBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
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
//        $configuration = $this->getConfiguration($configs, $container);
//        $config        = $this->processConfiguration($configuration, $configs);
//        $swaggerConfig         = $config['swagger'];
    }
//endregion Public

//region SECTION: Getters/Setters
    public function getAlias()
    {
        return 'livevideo';
    }
//endregion Getters/Setters
}