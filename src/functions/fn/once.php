<?php

declare(strict_types=1);

namespace baethon\phln;

const once = 'baethon\\phln\\once';

/**
 * Accepts a function `fn` and returns a function that guards invocation of `fn` such that `fn` can only ever be called once, no matter how many times the returned function is invoked. The first value calculated is returned in subsequent invocations.
 *
 * @param callable $fn
 * @return callable
 */
function once (callable $fn): callable {
    return function (...$args) use ($fn) {
        static $result = ['cached' => false, 'value' => null];

        if (false === $result['cached']) {
            $result['value'] = $fn(... $args);
            $result['cached'] = true;
        }

        return $result['value'];
    };
}
