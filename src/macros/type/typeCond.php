<?php
declare(strict_types=1);

namespace phln\type;

use const phln\fn\identity;
use function phln\logic\cond;
use function phln\logic\𝑓ifElse as ifElse;

const typeCond = '\\phln\\type\\typeCond';

/**
 * Returns a function, `fn`, which encapsulates `if/else`, `if/else`, ... logic. `phln\type\typeCond` takes a list of [`type`, `transformer`] pairs. Type is converted to `predicate` matching type of variable (in terms of `phln\type\is()`). All of the arguments to `fn` are applied to each of the `predicates` in turn until one returns a truth-y value, at which point `fn` returns the result of applying its arguments to the corresponding `transformer`. If none of the `predicates` matches, `fn` returns null.
 *
 * @phlnSignature [[String, (*... -> *)]] -> (*... -> *)
 * @phlnCategory type
 * @phlnSee phln\logic\cond
 * @param array $pairs
 * @return \Closure
 * @example
 *      $count = \phln\type\typeCond([
 *          ['string', '\\mb_strlen'],
 *          ['array', '\\count'],
 *          [\phln\fn\T, \phln\fn\always(0)],
 *      ]);
 *      $count('foo'); // 3
 *      $count(['f', 'o', 'o']); // 3
 *      $count(new stdClass); // 0
 */
function typeCond(array $pairs): \Closure
{
    $typeToPredicate = ifElse('\\is_callable', identity, is);
    $mapRow = function ($row) use ($typeToPredicate) {
        $p = $typeToPredicate($row[0]);
        return [$p, $row[1]];
    };

    return cond(array_map($mapRow, $pairs));
}
