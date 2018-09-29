<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::curried('none', 2, function (callable $predicate, array $list): bool {
    return P::all(P::negate($predicate), $list);
});
