<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('not', function ($value): bool {
    return !$value;
});
