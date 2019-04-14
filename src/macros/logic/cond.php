<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('cond', function (array $pairs): \Closure {
    return function (... $args) use ($pairs) {
        $callPredicate = P::partialRight(P::apply(), [$args]);
        $pairMatchingArgs = P::compose($callPredicate, P::nth(0));
        $getTransformer = P::pipe(
            P::find($pairMatchingArgs),
            P::nth(1)
        );

        $pairsWithFallback = array_merge(
            $pairs,
            [[P::T(), P::always(null)]]
        );

        return $getTransformer($pairsWithFallback)(...$args);
    };
});
