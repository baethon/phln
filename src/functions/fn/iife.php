<?php

declare(strict_types=1);

namespace Baethon\Phln;

/**
 * Immediately Invoked Function Expression.
 */
function iife(callable $fn): void
{
    $fn();
}
