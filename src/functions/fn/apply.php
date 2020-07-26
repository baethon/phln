<?php

declare(strict_types=1);

namespace baethon\phln;

const apply = 'baethon\\phln\\apply';

/**
 * Applies function `fn` to the argument list
 *
 * This is useful for creating a fixed-arity function from a variadic function.
 *
 * @param callable $fn
 * @param array $arguments
 * @return mixed
 */
function apply (callable $fn, array $arguments) {
    return $fn(...$arguments);
};
