<?php

declare(strict_types=1);

namespace Baethon\Phln;

const negate = 'Baethon\\Phln\\negate';

function negate (callable $predicate): callable {
    return function (...$args) use ($predicate) {
        return !$predicate(...$args);
    };
}
