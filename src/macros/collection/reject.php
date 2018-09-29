<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::curried('reject', 2, function (callable $predicate, array $list): array {
    return P::filter(P::negate($predicate), $list);
});
