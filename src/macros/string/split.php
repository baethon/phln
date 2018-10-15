<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;
use Baethon\Phln\RegExp;

P::macro('split', function ($delimiter, string $text): array {
    return preg_split((string) RegExp::of($delimiter), $text);
});
