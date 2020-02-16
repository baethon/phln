<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('invoker', function (int $arity, string $method): callable {
    $wrapper = function (...$args) use ($arity, $method) {
        $args = array_slice($args, 0, $arity + 1);
        $object = array_pop($args);

        assert(is_object($object));

        return $object->$method(...$args);
    };

    return P::curryN($arity + 1, $wrapper);
});
