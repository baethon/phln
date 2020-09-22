<?php

declare(strict_types=1);

namespace Baethon\Phln;

const arity = 'Baethon\\Phln\\arity';

function arity (callable $fn): int
{
    return ($fn instanceof FixedArityInterface)
        ? $fn->getArity()
        : (new \ReflectionFunction($fn))->getNumberOfParameters(); /* @phpstan-ignore-line */
}
