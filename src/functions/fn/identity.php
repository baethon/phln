<?php

declare(strict_types=1);

namespace baethon\phln;

const identity = 'baethon\\phln\\identity';

/**
 * A function that does nothing but return the parameter supplied to it. Good as a default or placeholder function.
 *
 * @param mixed $value
 * @return mixed
 */
function identity ($value) {
    return $value;
}
