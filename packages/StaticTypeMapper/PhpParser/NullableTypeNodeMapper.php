<?php

declare(strict_types=1);

namespace Rector\StaticTypeMapper\PhpParser;

use PhpParser\Node;
use PhpParser\Node\NullableType;
use PHPStan\Type\NullType;
use PHPStan\Type\Type;
use Rector\NodeTypeResolver\PHPStan\Type\TypeFactory;
use Rector\StaticTypeMapper\Contract\PhpParser\PhpParserNodeMapperInterface;
use Rector\StaticTypeMapper\Mapper\PhpParserNodeMapper;
use Symfony\Contracts\Service\Attribute\Required;

/**
 * @implements PhpParserNodeMapperInterface<NullableType>
 */
final class NullableTypeNodeMapper implements PhpParserNodeMapperInterface
{
    private PhpParserNodeMapper $phpParserNodeMapper;

    public function __construct(
        private readonly TypeFactory $typeFactory
    ) {
    }

    #[Required]
    public function autowire(PhpParserNodeMapper $phpParserNodeMapper): void
    {
        $this->phpParserNodeMapper = $phpParserNodeMapper;
    }

    public function getNodeType(): string
    {
        return NullableType::class;
    }

    /**
     * @param NullableType $node
     */
    public function mapToPHPStan(Node $node): Type
    {
        $types = [];
        $types[] = $this->phpParserNodeMapper->mapToPHPStanType($node->type);
        $types[] = new NullType();

        return $this->typeFactory->createMixedPassedOrUnionType($types);
    }
}
