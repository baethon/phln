<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('pathOr', function (string $path, $default, array $object) {
    return P::path($path, $object) ?? $default;
});
