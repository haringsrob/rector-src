<?php

declare(strict_types=1);

use Rector\Renaming\Rector\Name\RenameClassRector;

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();
    $services->set(RenameClassRector::class)
        ->configure([
            'ThisClassDoesNotExistAnymore' => 'NewClassThatDoesNotExistEither',
            'App\NotHereClass\AndNamespace' => 'NewClassThatDoesNotExistEither',
        ]);
};
