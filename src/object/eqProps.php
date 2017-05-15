<?php
declare(strict_types=1);

namespace phln\object;

use function phln\collection\map;
use function phln\fn\apply;
use function phln\fn\curry;
use const phln\fn\nil;
use function phln\fn\pipe;
use const phln\relation\equals;

const eqProps = '\\phln\\object\\𝑓eqProps';

function eqProps($prop = nil, $a = nil, $b = nil)
{
    return curry(eqProps, $prop, $a, $b);
}

function 𝑓eqProps(string $prop, array $a, array $b): bool
{
    $f = pipe(
        map(prop($prop)),
        apply(equals)
    );

    return $f([$a, $b]);
}
