<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::curried('partition', 2, function (callable $predicate, array $collection): array {
    return P::apply(
        P::pipe([
            P::reduce(
                function ($carry, $item) use ($predicate) {
                    $key = $predicate($item)
                        ? 'left'
                        : 'right';

                    return array_merge($carry, [
                        $key => P::append($item, $carry[$key]),
                    ]);
                },
                ['left' => [], 'right' => []]
            ),
            P::ref('values')
        ]),
        [$collection]
    );
});
