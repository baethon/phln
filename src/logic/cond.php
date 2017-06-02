<?php
declare(strict_types=1);

namespace phln\logic;

use const phln\collection\head;
use const phln\fn\{
    __, apply, T
};
use function phln\collection\{
    find, nth, append
};
use function phln\fn\{
    always, compose, partial, pipe
};

const cond = '\\phln\\logic\\cond';

/**
 * Returns a function, `fn`, which encapsulates `if/else`, `if/else`, ... logic. `phln\logic\cond` takes a list of [`predicate`, `transformer`] pairs. All of the arguments to `fn` are applied to each of the `predicates` in turn until one returns a truth-y value, at which point `fn` returns the result of applying its arguments to the corresponding `transformer`. If none of the `predicates` matches, `fn` returns null.
 *
 * @phlnSignature [[(*… → Boolean),(*… → *)]] → (*… → *)
 * @phlnCategory logic
 * @param array $pairs
 * @return \Closure
 * @example
 *      $fn = \phln\logic\cond([
 *          [R.equals(0),   R.always('water freezes at 0°C')],
 *          [R.equals(100), R.always('water boils at 100°C')],
 *          [R.T,           temp => 'nothing special happens at ' + temp + '°C']
 *          ]);
 *          fn(0); //=> 'water freezes at 0°C'
 *          fn(50); //=> 'nothing special happens at 50°C'
 *          fn(100); //=> 'water boils at 100°C'
 */
function cond(array $pairs): \Closure
{
    return function (... $args) use ($pairs) {
        $callPredicate = partial(apply, [__, $args]);
        $pairMatchingArgs = compose($callPredicate, head);
        $getTransformer = pipe(
            append([T, always(null)]),
            find($pairMatchingArgs),
            nth(1)
        );

        return $getTransformer($pairs)(...$args);
    };
}
