<?php

declare(strict_types=1);

namespace Baethon\Phln;

const nth = 'Baethon\\Phln\\nth';

/**
 * @param array<mixed> $list
 * @param int $n
 * @return mixed
 */
function nth (array $list, int $n)
{
    $index = $n < 0 ? count($list) + $n : $n;
    return isset($list[$index]) ? $list[$index] : null;
};
