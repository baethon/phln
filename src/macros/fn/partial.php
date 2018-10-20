<?php
declare(strict_types=1);

use Baethon\Phln\Phln as P;

P::macro('partial', call_user_func(function () {
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

    return function (callable $fn, array $args) use ($mergeArguments): callable {
        return function (...$innerArgs) use ($fn, $args, $mergeArguments) {
            return $fn(...$mergeArguments($args, $innerArgs));
        };
    };
}));
