<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use function Baethon\Phln\assert_object;

P::macro('where', function (array $predicates, $object): bool {
    assert_object($object);

    $keys = P::keys($predicates);

    return P::all(
        function ($key) use ($object, $predicates) {
            $value = P::prop($key, $object);
            return $predicates[$key]($value);
        },
        $keys
    );
});
