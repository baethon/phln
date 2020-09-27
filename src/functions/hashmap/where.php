<?php

declare(strict_types=1);

namespace Baethon\Phln;

const where = 'Baethon\\Phln\\where';

/**
 * @param object|array<string, mixed>               $object
 * @param array<string, callable(mixed):bool|mixed> $predicates
 */
function where($object, array $predicates): bool
{
    $keys = keys($predicates);
    $hashmap = hashmap($object);

    return all(
        $keys,
        function ($key) use ($hashmap, $predicates) {
            return is_callable($p = $predicates[$key])
                ? $p(prop($hashmap, $key))
                : prop($hashmap, $key) === $p;
        }
    );
}
