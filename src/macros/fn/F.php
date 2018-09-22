<?php
declare(strict_types=1);

namespace phln\fn;

const F = '\\phln\\fn\\F';

/**
 * A function that always returns `false`. Any passed in parameters are ignored.
 *
 * @phlnSignature * -> Boolean
 * @phlnCategory function
 * @return bool
 */
function F(): bool
{
    return false;
}

