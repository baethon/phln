<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use function Baethon\Phln\assert_object;

P::macro('merge', function ($left, $right): array {
    assert_object($left);
    assert_object($right);

    return array_merge((array) $left, (array) $right);
});
