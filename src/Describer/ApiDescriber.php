<?php

namespace Evrinoma\LiveVideoBundle\Describer;

use EXSyst\Component\Swagger\Swagger;
use Nelmio\ApiDocBundle\Describer\DescriberInterface;

/**
 * Class ApiDescriber
 *
 * @package Evrinoma\LiveVideoBundle\Describer
 */
class ApiDescriber implements DescriberInterface
{

//region SECTION: Public
    public function describe(Swagger $api)
    {
        $externalDoc = [
            [
                'areas' => [
                    'evrinoma'    => ['path_patterns' => ['^/evrinoma/api']]
                ],
            ],

        ];

      //  $api->merge($externalDoc, $externalDoc);
    }
//endregion Public


}