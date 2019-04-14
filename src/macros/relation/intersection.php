<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use function Baethon\Phln\load_macro;

load_macro('fn', 'binary');

P::macro('intersection', P::compose(P::values(), P::binary('\\array_intersect')));
