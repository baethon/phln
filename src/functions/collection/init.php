<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;

use function Baethon\Phln\load_macro;

load_macro('collection', 'slice');

P::macro('init', P::slice(0, -1));
