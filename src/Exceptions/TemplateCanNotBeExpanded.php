<?php

/**
 * League.Uri (https://uri.thephpleague.com)
 *
 * (c) Ignace Nyamagana Butera <nyamsprod@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace League\Uri\Exceptions;

use League\Uri\Contracts\UriException;

class TemplateCanNotBeExpanded extends \RuntimeException implements UriException
{
    public static function dueToMalformedExpression(string $template): self
    {
        return new self('The submitted template "'.$template.'" contains invalid expressions.');
    }

    public static function dueToMalformedVariableSpecification(string $varSpec, string $expression): self
    {
        $message = 'The variable specification "'.$varSpec.'" included in the expression "{'.$expression.'}" is invalid.';
        if ('' === $varSpec) {
            $message = 'No variable specification was included in the expression "{'.$expression.'}".';
        }

        return new self($message);
    }

    public static function dueToUsingReservedOperator(string $expression): self
    {
        return new self('The operator used in the expression "{'.$expression.'}" is reserved.');
    }

    public static function dueToUnableToProcessValueListWithPrefix(string $variableName): self
    {
        return new self('The ":" modifier can not be applied on "'.$variableName.'" since it is a list of values.');
    }

    public static function dueToNestedListOfValue(string $variableName): self
    {
        return new self('The "'.$variableName.'" can not be a nested list.');
    }
}
