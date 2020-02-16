<?php

declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('once', function (callable $fn): \Closure {
    return function (...$args) use ($fn) {
        static $result = ['cached' => false, 'value' => null];

        if (false === $result['cached']) {
            $result['value'] = $fn(... $args);
            $result['cached'] = true;
        }

        return $result['value'];
    };
});
