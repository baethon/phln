<?php
declare(strict_types=1);

namespace Baethon\Phln;

function load_macro(string $ns, string $name)
{
    require_once(__DIR__."/macros/{$ns}/{$name}.php");
}
