<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;
use Baethon\Phln\FixedArityFn;

P::macro('nAry', function (int $n, callable $fn): callable {
    return FixedArityFn::of($n, $fn);
});
