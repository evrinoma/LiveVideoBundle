<?php


namespace Evrinoma\LiveVideoBundle\DependencyInjection;

use Evrinoma\LiveVideoBundle\Menu\LiveVideoMenu;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 *
 * @package Evrinoma\LiveVideoBundle\DependencyInjection
 */
class Configuration implements ConfigurationInterface
{
//region SECTION: Getters/Setters
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('livevideo');
        $rootNode    = $treeBuilder->getRootNode();
        $rootNode
            ->children()
                ->arrayNode('swagger')
                ->children()
                    ->arrayNode('evrinoma')
                    ->children()
                        ->booleanNode('with_annotation')->defaultFalse()->end()
                        ->arrayNode('path_patterns')
                            ->scalarPrototype()
                            ->defaultValue(['^/evrinoma/api'])
                            ->end()
                        ->end()
                        ->arrayNode('host_patterns')
                            ->scalarPrototype()
                            ->defaultValue([])
                            ->end()
                        ->end()
                        ->arrayNode('name_patterns')
                            ->scalarPrototype()
                            ->defaultValue([])
                            ->end()
                        ->end()
                        ->arrayNode('documentation')
                            ->scalarPrototype()
                            ->defaultValue([])
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();
        $rootNode
            ->children()
                ->scalarNode('menu')->defaultValue(LiveVideoMenu::class)
                ->info('This option is used for plug menu as tag serivce')
            ->end();

        return $treeBuilder;
    }
//endregion Getters/Setters
}