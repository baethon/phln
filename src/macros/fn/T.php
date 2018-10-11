<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('T', function (): bool {
    return true;
});

P::alias('otherwise', 'T');

