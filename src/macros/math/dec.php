<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('dec', function ($number) {
    return $number - 1;
});
