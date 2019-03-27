<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('lensIndex', function (int $index) {
    return P::lens(
        P::nth($index),
        P::update($index)
    );
});
