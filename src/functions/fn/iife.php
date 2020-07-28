<?php

declare(strict_types=1);

namespace Baethon\Phln;

/**
 * Immediately Invoked Function Expression
 *
 * @param callable $fn
 * @return void
 */
function iife (callable $fn): void {
    $fn();
}
