<?php

declare(strict_types=1);

namespace baethon\phln;

use Baethon\Phln\TrampolineThunk;

const trampoline = 'baethon\\phln\\trampoline';

/**
 * Creates a stack-safe tail recurrent function.
 *
 * As long as wrapped function returns _thunk_ (function which calls the recursive function) trampoline will loop over its results.
 * Calling `$this()` inside the function will return its _thunk_.
 *
 * Wrapped function should not return instance of `Closure` as an end-result (it will trigger next loop iteration).
 *
 * @param callable $fn
 * @return callable
 */
function trampoline (callable $fn): callable {
    $wrapper = new TrampolineThunk($fn);

    return function (...$args) use ($wrapper) {
        $result = $wrapper(...$args);

        while (is_callable($result)) {
            $result = $result();
        }

        return $result;
    };
}
