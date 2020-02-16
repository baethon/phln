<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('lensProp', function (string $prop) {
    return P::lens(
        P::prop($prop),
        P::assoc($prop)
    );
});
