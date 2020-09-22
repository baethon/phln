<?php

declare(strict_types=1);

namespace Baethon\Phln;

const invoker = 'Baethon\\Phln\\invoker';

/**
 * Turns a named method with a specified arity into a function that can be called directly supplied with arguments and a target object.
 *
 * The returned function is curried and accepts `arity + 1` parameters where the final parameter is the target object.
 */
function invoker(int $arity, string $method): callable
{
    $wrapper = function (...$args) use ($arity, $method) {
        $args = array_slice($args, 0, $arity + 1);
        $object = array_pop($args);

        assert(is_object($object));

        return $object->$method(...$args);
    };

    return curry_n($arity + 1, $wrapper);
}
