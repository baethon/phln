<?php
declare(strict_types=1);

namespace phln\fn;

const T = '\\phln\\fn\\T';

/**
 * A function that always returns `true`. Any passed in parameters are ignored.
 *
 * @phlnSignature * -> Boolean
 * @phlnCategory function
 * @return bool
 */
function T(): bool
{
    return true;
}

