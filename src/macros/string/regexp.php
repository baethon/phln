<?php

declare(strict_types=1);

use Baethon\Phln\RegExp;
use Baethon\Phln\Phln as P;

P::macro('regexp', function (string $regexp): RegExp {
    return RegExp::fromString($regexp);
});
