<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('identity', function ($value) {
    return $value;
});
