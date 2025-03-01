<?php

declare(strict_types=1);

use Rector\Php81\Rector\ClassConst\FinalizePublicClassConstantRector;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services->set(FinalizePublicClassConstantRector::class);
};
