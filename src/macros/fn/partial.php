<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('partial', function (callable $fn, array $args): \Closure {
    $mergeArguments = function (array $args, array $innerArgs) {
        $mapped = [];

        foreach ($args as $value) {
            if (P::__ === $value) {
                $mapped[] = array_shift($innerArgs);
            } else {
                $mapped[] = $value;
            }
        }

        return array_merge($mapped, $innerArgs);
    };

    return function (...$innerArgs) use ($fn, $args, $mergeArguments) {
        return $fn(...$mergeArguments($args, $innerArgs));
    };
});
