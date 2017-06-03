<?php
declare(strict_types=1);

namespace phln;

use Closure;
use const phln\fn\nil;

class phln
{
    public static function all($predicate = nil, $list = nil)
    {
    }

    public static function any($predicate = nil, $list = nil)
    {
    }

    public static function append($value = nil, $list = nil)
    {
    }

    public static function chunk($size = nil, $list = nil)
    {
    }

    public static function collapse($list): array
    {
    }

    public static function concat($a = nil, $b = nil)
    {
    }

    public static function contains($value = nil, $list = nil)
    {
    }

    public static function filter($predicate = nil, $list = nil)
    {
    }

    public static function find($predicate = nil, $list = nil)
    {
    }

    public static function flatMap($mapper = nil, $list = nil)
    {
    }

    public static function head($list)
    {
    }

    public static function init($list): array
    {
    }

    public static function join($separator = nil, $list = nil)
    {
    }

    public static function last($list)
    {
    }

    public static function map($fn = nil, $list = nil)
    {
    }

    public static function mapIndexed($fn = nil, $list = nil)
    {
    }

    public static function none($predicate = nil, $list = nil)
    {
    }

    public static function nth($n = nil, $list = nil)
    {
    }

    public static function pluck($key = nil, $list = nil)
    {
    }

    public static function prepend($value = nil, $list = nil)
    {
    }

    public static function range($start = nil, $end = nil)
    {
    }

    public static function reduce($reducer = nil, $initialValue = nil, $list = nil)
    {
    }

    public static function reject($predicate = nil, $list = nil)
    {
    }

    public static function reverse($list): array
    {
    }

    public static function slice($offset = nil, $length = nil, $list = nil)
    {
    }

    public static function sort($comparator = nil, $list = nil)
    {
    }

    public static function sortBy($mapper = nil, $list = nil)
    {
    }

    public static function tail($list): array
    {
    }

    public static function unique($list): array
    {
    }

    public static function F(): bool
    {
    }

    public static function T(): bool
    {
    }

    public static function always($value): Closure
    {
    }

    public static function ap($applicative = nil, $fn = nil)
    {
    }

    public static function apply($fn = nil, $arguments = nil)
    {
    }

    public static function arity($fn): int
    {
    }

    public static function compose($fns): Closure
    {
    }

    public static function curry($fn, $args)
    {
    }

    public static function curryN($n, $fn, $args)
    {
    }

    public static function identity($value)
    {
    }

    public static function negate($predicate): Closure
    {
    }

    public static function of($value): array
    {
    }

    public static function once($fn): Closure
    {
    }

    public static function partial($fn = nil, $args = nil): Closure
    {
    }

    public static function pipe($fns): Closure
    {
    }

    public static function swap($f): Closure
    {
    }

    public static function tap($fn = nil, $value = nil)
    {
    }

    public static function allPass($predicates): callable
    {
    }

    public static function ƛand($left = nil, $right = nil)
    {
    }

    public static function both($a = nil, $b = nil)
    {
    }

    public static function cond($pairs): Closure
    {
    }

    public static function defaultTo($default = nil, $value = nil)
    {
    }

    public static function either($left = nil, $right = nil): Closure
    {
    }

    public static function ifElse($predicate = nil, $onTrue = nil, $onFalse = nil): Closure
    {
    }

    public static function isEmpty($value): bool
    {
    }

    public static function not($value): bool
    {
    }

    public static function ƛor($left = nil, $right = nil)
    {
    }

    public static function add($a = nil, $b = nil)
    {
    }

    public static function dec($number = nil)
    {
    }

    public static function divide($a = nil, $b = nil)
    {
    }

    public static function inc($number = nil)
    {
    }

    public static function mean($numbers = nil)
    {
    }

    public static function median($numbers = nil)
    {
    }

    public static function modulo($a = nil, $b = nil)
    {
    }

    public static function multiply($a = nil, $b = nil)
    {
    }

    public static function product($numbers = nil)
    {
    }

    public static function subtract($a = nil, $b = nil)
    {
    }

    public static function sum($numbers = nil)
    {
    }

    public static function eqProps($prop = nil, $a = nil, $b = nil)
    {
    }

    public static function keys($object): array
    {
    }

    public static function merge($left = nil, $right = nil)
    {
    }

    public static function omit($omitKeys = nil, $object = nil)
    {
    }

    public static function path($path = nil, $object = nil)
    {
    }

    public static function pathOr($path = nil, $default = nil, $object = nil)
    {
    }

    public static function pick($useKeys = nil, $object = nil)
    {
    }

    public static function prop($key = nil, $array = nil)
    {
    }

    public static function props($props = nil, $object = nil)
    {
    }

    public static function values($object): array
    {
    }

    public static function where($predicates = nil, $object = nil)
    {
    }

    public static function whereEq($predicates = nil, $object = nil)
    {
    }

    public static function clamp($min = nil, $max = nil, $value = nil)
    {
    }

    public static function difference($a = nil, $b = nil)
    {
    }

    public static function equals($a = nil, $b = nil)
    {
    }

    public static function gt($a = nil, $b = nil)
    {
    }

    public static function gte($a = nil, $b = nil)
    {
    }

    public static function intersection($a = nil, $b = nil)
    {
    }

    public static function lt($a = nil, $b = nil)
    {
    }

    public static function lte($a = nil, $b = nil)
    {
    }

    public static function max($left = nil, $right = nil)
    {
    }

    public static function min($left = nil, $right = nil)
    {
    }

    public static function pathEq($path = nil, $value = nil, $object = nil)
    {
    }

    public static function propEq($prop = nil, $value = nil, $object = nil)
    {
    }

    public static function concatString($a = nil, $b = nil)
    {
    }

    public static function match($regexp = nil, $test = nil)
    {
    }

    public static function matchAll($regexp = nil, $test = nil)
    {
    }

    public static function replace($regexp = nil, $replacement = nil, $text = nil)
    {
    }

    public static function replaceAll($regexp = nil, $replacement = nil, $text = nil)
    {
    }

    public static function split($delimiter = nil, $text = nil)
    {
    }

    public static function splitRegexp($regexp = nil, $text = nil)
    {
    }

    public static function is($type = nil, $value = nil)
    {
    }

}
