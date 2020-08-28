<?php

declare(strict_types=1);

namespace Baethon\Phln;

const partition = 'Baethon\\Phln\\partition';

/**
 * @param array<mixed> $collection
 * @param callable(mixed):bool $predicate
 * @return array{array<mixed>, array<mixed>}
 */
function partition (array $collection, callable $predicate): array
{
    return pipe_first($collection, [
        _(reduce, function ($carry, $item) use ($predicate) {
            $key = $predicate($item)
                ? 'left'
                : 'right';

            return array_merge($carry, [
                $key => append($carry[$key], $item),
            ]);
        }, ['left' => [], 'right' => []]),
        values
    ]);
};
