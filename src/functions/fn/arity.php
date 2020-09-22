<?php

declare(strict_types=1);

namespace Baethon\Phln;

const arity = 'Baethon\\Phln\\arity';

function arity (callable $fn): int
{
    if ($fn instanceof FixedArityInterface) {
        return $fn->getArity();
    }

    /**
     * @phpstan-ignore-next-line
     * @psalm-suppress InvalidArgument
     */
    return (new \ReflectionFunction($fn))->getNumberOfParameters();
}
