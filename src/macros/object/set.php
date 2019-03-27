<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('set', function (callable $lens, $value, $targetData) {
    return P::over($lens, P::always($value), $targetData);
});
