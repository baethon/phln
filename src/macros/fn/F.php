<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use function Baethon\Phln\load_macro;

load_macro('fn', 'always');

P::macro('F', function (): callable {
    return P::always(false);
});
