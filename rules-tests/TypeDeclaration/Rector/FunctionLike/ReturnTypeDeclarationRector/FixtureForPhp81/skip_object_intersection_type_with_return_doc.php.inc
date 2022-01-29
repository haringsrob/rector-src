<?php

namespace Rector\Tests\TypeDeclaration\Rector\FunctionLike\ReturnTypeDeclarationRector\FixtureForPhp81;

use Exception;

final class SkipObjectIntersectionTypeWithReturnDoc
{
    /**
     * @template T
     * @psalm-param class-string<T> $className
     * @return string
     */
    protected function getObject(string $className): object {
    	$object = new $className();

        if (!$object instanceof $className) {
            throw new Exception();
        }

        return $object;
    }
}