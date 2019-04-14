<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('partition', function (callable $predicate, array $collection): array {
    return P::apply(
        P::pipe(
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
            P::values()
        ),
        [$collection]
    );
});
