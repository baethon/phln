<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use function Baethon\Phln\assertObject;

P::macro('merge', function ($left, $right): array
{
    assertObject($left);
    assertObject($right);

    return array_merge((array) $left, (array) $right);
});
