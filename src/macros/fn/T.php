<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use function Baethon\Phln\load_macro;

load_macro('fn', 'always');

P::macro('T', function (): callable {
    return P::always(true);
});

P::alias('otherwise', 'T');
