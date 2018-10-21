<?php
declare(strict_types = 1);

namespace Baethon\Phln\Structures;

interface ApplicativeInterface extends ApplyInterface
{
    public static function of($value);
}
