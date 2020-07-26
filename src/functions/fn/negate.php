<?php

declare(strict_types=1);

namespace baethon\phln;

function negate (callable $predicate): callable {
    return function (...$args) use ($predicate) {
        return !$predicate(...$args);
    };
}
