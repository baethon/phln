<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('min', function ($left, $right) {
    return \min($left, $right);
});
