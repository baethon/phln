<?php

declare(strict_types=1);

namespace Baethon\Phln;

const n_ary = 'Baethon\\Phln\\n_ary';

function n_ary(int $n, callable $fn): callable
{
    return FixedArityFn::of($n, $fn);
}
