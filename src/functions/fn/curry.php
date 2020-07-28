<?php

declare(strict_types=1);

namespace Baethon\Phln;

use Baethon\Phln\CurriedFn;

const curry = 'Baethon\\Phln\\curry';

function curry(callable $fn, array $args = []) {
    return CurriedFn::of($fn)(...$args);
}
