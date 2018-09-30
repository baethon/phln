<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('divide', function ($a, $b) {
    return $a / $b;
});
