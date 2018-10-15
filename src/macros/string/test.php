<?php
declare(strict_types=1);

use Baethon\Phln\RegExp;
use Baethon\Phln\Phln as P;

P::macro('test', function ($regexp, string $string): bool {
    return RegExp::of($regexp)->test($string);
});
