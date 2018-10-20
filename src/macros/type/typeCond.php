<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use function Baethon\Phln\load_macro;

load_macro('type', 'is');

P::macro('typeCond', call_user_func(function () {
    $typeToPredicate = P::ifElse('\\is_callable', P::identity(), P::is());
    $mapRow = function ($row) use ($typeToPredicate) {
        $p = $typeToPredicate($row[0]);
        return [$p, $row[1]];
    };

    return P::pipe([
        P::map($mapRow),
        P::cond()
    ]);
}));
