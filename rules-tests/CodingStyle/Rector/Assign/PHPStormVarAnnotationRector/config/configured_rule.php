<?php

declare(strict_types=1);

use Rector\CodingStyle\Rector\Assign\PHPStormVarAnnotationRector;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services->set(PHPStormVarAnnotationRector::class);
};
