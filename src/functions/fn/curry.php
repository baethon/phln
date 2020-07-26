<?php

declare(strict_types=1);

namespace baethon\phln;

use Baethon\Phln\CurriedFn;

const curry = 'baethon\\phln\\curry';

function curry(callable $fn, array $args = []) {
    return CurriedFn::of($fn)(...$args);
}
