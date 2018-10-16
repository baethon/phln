<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use function Baethon\Phln\load_macro;

load_macro('collection', 'append');
load_macro('collection', 'reduce');

P::macro('collapse', P::reduce(
    function ($carry, $item) {
        return is_array($item)
            ? array_merge($carry, $item)
            : P::append($item, $carry);
    },
    []
));
