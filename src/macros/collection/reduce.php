<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::curried('reduce', 3, function (callable $reducer, $initialValue, array $list) {
    return array_reduce($list, $reducer, $initialValue);
});
