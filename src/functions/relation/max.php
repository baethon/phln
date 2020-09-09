<?php

declare(strict_types=1);

namespace Baethon\Phln;

const max = 'Baethon\\Phln\\max';

/**
 * @template T
 * @param T $left
 * @param T $right
 * @return T
 */
function max($left, $right) {
    return \max($left, $right);
}
