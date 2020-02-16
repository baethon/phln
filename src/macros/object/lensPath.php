<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('lensPath', function (string $path) {
    return P::lens(
        P::path($path),
        P::assocPath($path)
    );
});
