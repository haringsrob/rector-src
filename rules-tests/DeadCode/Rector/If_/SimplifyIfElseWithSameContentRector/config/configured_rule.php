<?php

declare(strict_types=1);

use Rector\DeadCode\Rector\If_\SimplifyIfElseWithSameContentRector;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services->set(SimplifyIfElseWithSameContentRector::class);
};
