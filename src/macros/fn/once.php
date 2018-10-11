<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('once', function (callable $fn): \Closure {
    return function (... $args) use ($fn) {
        static $result;

        if (false === is_object($result)) {
            $result = (object)['result' => $fn(... $args)];
        }

        return $result->result;
    };
});
