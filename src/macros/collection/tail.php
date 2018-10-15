<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('tail', function ($collection) {
    return P::slice(1, P::length($collection), $collection);
});
