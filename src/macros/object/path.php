<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('path', function (string $path, $object) {
    $keys = P::split('.', $path);

    return P::reduce(
        function ($carry, $key) {
            if (false === is_array($carry) && false === is_object($carry)) {
                return null;
            }

            return P::prop($key, $carry);
        },
        P::prop(P::head($keys), $object),
        P::tail($keys)
    );
});
