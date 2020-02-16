<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;

use function Baethon\Phln\load_macro;

load_macro('fn', 'nAry');

P::macro('unary', P::nAry(1));
