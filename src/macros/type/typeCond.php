<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('typeCond', function (array $pairs): \Closure {
    $typeToPredicate = P::ifElse('\\is_callable', P::identity(), P::is());

    $mapRow = function ($row) use ($typeToPredicate) {
        $p = $typeToPredicate($row[0]);
        return [$p, $row[1]];
    };

    return P::cond(array_map($mapRow, $pairs));
});
