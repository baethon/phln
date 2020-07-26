<?php

declare(strict_types=1);

namespace baethon\phln;

use Baethon\Phln\FixedArityFn;

const n_ary = 'baethon\\phln\\n_ary';

function n_ary (int $n, callable $fn): callable {
    return FixedArityFn::of($n, $fn);
}
