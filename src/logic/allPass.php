<?php
declare(strict_types=1);

namespace phln\logic;

use function phln\collection\map;
use function phln\collection\reduce;
use const phln\fn\arity;
use function phln\fn\curryN;
use function phln\fn\pipe;
use const phln\relation\max;

const allPass = '\\phln\\login\\allPass';

/**
 * Takes a list of predicates and returns a predicate that returns `true` for a given list of arguments if every one of the provided predicates is satisfied by those arguments.
 *
 * The function returned is a curried function whose arity matches that of the highest-arity predicate.
 *
 * @phlnSignature [(*... -> Boolean) -> *... -> Boolean
 * @phlnCategory logic
 * @param array $predicates
 * @return callable
 * @example
 *      $ace = \phln\relation\propEq('rank', 'A');
 *      $spades = \phln\relation\propEq('suit', '♠︎');
 *      $aceOfSpades = \phln\logic\allPass([$ace, $spades]);
 *      $aceOfSpades(['rank' => 'A', 'suit' => '♠︎']); // true
 */
function allPass(array $predicates): callable
{
    $getArity = pipe(
        map(arity),
        reduce(max, 0)
    );

    return curryN($getArity($predicates), function (... $values) use ($predicates) {
        return reduce(
            function ($carry, callable $p) use ($values) {
                return (false === $carry) ? false : $p(...$values);
            },
            null,
            $predicates
        );
    });
}
