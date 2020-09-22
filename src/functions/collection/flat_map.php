<?php

declare(strict_types=1);

namespace Baethon\Phln;

const flat_map = 'Baethon\\Phln\\flat_map';

/**
 * @param array<mixed>          $list
 * @param callable(mixed):mixed $mapper
 *
 * @return array<mixed>
 */
function flat_map(array $list, callable $mapper): array
{
    return pipe_first($list, [
        _(map, $mapper),
        collapse,
    ]);
};
