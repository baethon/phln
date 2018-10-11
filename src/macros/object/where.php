<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use function Baethon\Phln\assertObject;

P::macro('where', function (array $predicates, $object): bool {
    assertObject($object);

    $keys = P::keys($predicates);

    return P::all(
        function ($key) use ($keys, $object, $predicates) {
            $value = P::prop($key, $object);
            return $predicates[$key]($value);
        },
        $keys
    );
});
