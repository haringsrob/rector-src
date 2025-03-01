<?php

namespace Rector\Tests\EarlyReturn\Rector\If_\ChangeNestedIfsToEarlyReturnRector\Fixture;

use Rector\NodeTypeResolver\Node\AttributeKey;

class AnotherBooleanAnd
{
    private function isPreviousExpressionVisuallySimilar(Expression $previousExpression, Node $previousNode): bool
    {
        $prePreviousExpression = $previousExpression->getAttribute(AttributeKey::PREVIOUS_STATEMENT);
        if ($prePreviousExpression instanceof Expression && $prePreviousExpression->expr instanceof AssignOp) {
            if ($this->nodeComparator->areNodesEqual($prePreviousExpression->expr->var, $previousNode->var)) {
                return true;
            }
        }

        return false;
    }
}

?>
-----
<?php

namespace Rector\Tests\EarlyReturn\Rector\If_\ChangeNestedIfsToEarlyReturnRector\Fixture;

use Rector\NodeTypeResolver\Node\AttributeKey;

class AnotherBooleanAnd
{
    private function isPreviousExpressionVisuallySimilar(Expression $previousExpression, Node $previousNode): bool
    {
        $prePreviousExpression = $previousExpression->getAttribute(AttributeKey::PREVIOUS_STATEMENT);
        if (!$prePreviousExpression instanceof Expression) {
            return false;
        }
        if (!$prePreviousExpression->expr instanceof AssignOp) {
            return false;
        }
        if ($this->nodeComparator->areNodesEqual($prePreviousExpression->expr->var, $previousNode->var)) {
            return true;
        }

        return false;
    }
}

?>
