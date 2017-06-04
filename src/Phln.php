<?php
declare(strict_types=1);

namespace phln;

use Closure;
use const phln\fn\nil;

class Phln
{
    const all = \phln\collection\all;
    const any = \phln\collection\any;
    const append = \phln\collection\append;
    const chunk = \phln\collection\chunk;
    const collapse = \phln\collection\collapse;
    const concat = \phln\collection\concat;
    const contains = \phln\collection\contains;
    const filter = \phln\collection\filter;
    const find = \phln\collection\find;
    const flatMap = \phln\collection\flatMap;
    const head = \phln\collection\head;
    const init = \phln\collection\init;
    const join = \phln\collection\join;
    const last = \phln\collection\last;
    const map = \phln\collection\map;
    const mapIndexed = \phln\collection\mapIndexed;
    const none = \phln\collection\none;
    const nth = \phln\collection\nth;
    const pluck = \phln\collection\pluck;
    const prepend = \phln\collection\prepend;
    const range = \phln\collection\range;
    const reduce = \phln\collection\reduce;
    const reject = \phln\collection\reject;
    const reverse = \phln\collection\reverse;
    const slice = \phln\collection\slice;
    const sort = \phln\collection\sort;
    const sortBy = \phln\collection\sortBy;
    const tail = \phln\collection\tail;
    const unique = \phln\collection\unique;
    const F = \phln\fn\F;
    const T = \phln\fn\T;
    const always = \phln\fn\always;
    const ap = \phln\fn\ap;
    const apply = \phln\fn\apply;
    const arity = \phln\fn\arity;
    const curry = \phln\fn\curry;
    const nil = \phln\fn\nil;
    const curryN = \phln\fn\curryN;
    const identity = \phln\fn\identity;
    const negate = \phln\fn\negate;
    const of = \phln\fn\of;
    const once = \phln\fn\once;
    const __ = \phln\fn\__;
    const partial = \phln\fn\partial;
    const swap = \phln\fn\swap;
    const tap = \phln\fn\tap;
    const allPass = \phln\logic\allPass;
    const ƛand = \phln\logic\ƛand;
    const both = \phln\logic\both;
    const cond = \phln\logic\cond;
    const defaultTo = \phln\logic\defaultTo;
    const either = \phln\logic\either;
    const ifElse = \phln\logic\ifElse;
    const isEmpty = \phln\logic\isEmpty;
    const not = \phln\logic\not;
    const ƛor = \phln\logic\ƛor;
    const add = \phln\math\add;
    const dec = \phln\math\dec;
    const divide = \phln\math\divide;
    const inc = \phln\math\inc;
    const mean = \phln\math\mean;
    const median = \phln\math\median;
    const modulo = \phln\math\modulo;
    const multiply = \phln\math\multiply;
    const product = \phln\math\product;
    const subtract = \phln\math\subtract;
    const sum = \phln\math\sum;
    const eqProps = \phln\object\eqProps;
    const keys = \phln\object\keys;
    const merge = \phln\object\merge;
    const omit = \phln\object\omit;
    const path = \phln\object\path;
    const pathOr = \phln\object\pathOr;
    const pick = \phln\object\pick;
    const prop = \phln\object\prop;
    const props = \phln\object\props;
    const values = \phln\object\values;
    const where = \phln\object\where;
    const whereEq = \phln\object\whereEq;
    const clamp = \phln\relation\clamp;
    const difference = \phln\relation\difference;
    const equals = \phln\relation\equals;
    const gt = \phln\relation\gt;
    const gte = \phln\relation\gte;
    const intersection = \phln\relation\intersection;
    const lt = \phln\relation\lt;
    const lte = \phln\relation\lte;
    const max = \phln\relation\max;
    const min = \phln\relation\min;
    const pathEq = \phln\relation\pathEq;
    const propEq = \phln\relation\propEq;
    const concatString = \phln\string\concatString;
    const match = \phln\string\match;
    const matchAll = \phln\string\matchAll;
    const replace = \phln\string\replace;
    const replaceAll = \phln\string\replaceAll;
    const split = \phln\string\split;
    const splitRegexp = \phln\string\splitRegexp;
    const is = \phln\type\is;

    /**
     * Returns `true` if all elements of array match the predicate, `false` otherwise.
     *
     * @phlnSignature (a -> Boolean) -> [a] -> Boolean
     * @phlnCategory collection
     * @param string $predicate
     * @param string $list
     * @return \Closure|bool
     * @example
     *      $onlyTwos = P::all(P::equals(2));
     *      $onlyTwos([1, 2, 2]); // false
     */
    public static function all($predicate = nil, $list = nil)
    {
        return \phln\collection\all($predicate, $list);
    }

    /**
     * Returns `true` if at least one of array elements match the predicate, `false` otherwise.
     *
     * @phlnSignature (a -> Boolean) -> [a] -> Boolean
     * @phlnCategory collection
     * @param string $predicate
     * @param string $list
     * @return \Closure|bool
     * @example
     *      $hasTwos = P::any(P::equals(2));
     *      $hasTwos([1, 2, 3, 4]); // true
     */
    public static function any($predicate = nil, $list = nil)
    {
        return \phln\collection\any($predicate, $list);
    }

    /**
     * Returns a new list containing the contents of the given list, followed by the given element.
     *
     * @phlnSignature a -> [a] -> [a]
     * @phlnCategory collection
     * @param string $value
     * @param string $list
     * @return \Closure|mixed
     * @example
     *      P::append(3, [1, 2]); // [1, 2, 3]
     *      P::append([3], [1, 2]); // [1, 2, [3]]
     */
    public static function append($value = nil, $list = nil)
    {
        return \phln\collection\append($value, $list);
    }

    /**
     * Chunks an array into arrays with `size` elements.
     * The last chunk may contain less than `size` elements.
     *
     * @phlnSignature Number -> [a] -> [[a]]
     * @phlnCategory collection
     * @param string $size
     * @param string $list
     * @return \Closure|mixed
     * @example
     *      P::chunk(2, [1, 2, 3, 4]); // [[1, 2], [3, 4]]
     */
    public static function chunk($size = nil, $list = nil)
    {
        return \phln\collection\chunk($size, $list);
    }

    /**
     * Flattens array elements by one level
     *
     * @phlnSignature [[*], [*]] -> [*, *]
     * @phlnCategory collection
     * @param array $list
     * @return array
     */
    public static function collapse($list): array
    {
        return \phln\collection\collapse($list);
    }

    /**
     * Returns the result of concatenating the given arrays.
     *
     * @phlnSignature [a] -> [a] -> [a]
     * @phlnCategory collection
     * @param string $a
     * @param string $b
     * @return \Closure|mixed
     * @throws \InvalidArgumentException
     * @example
     *      P::concat([1, 2], [3]); // [1, 2, 3]
     */
    public static function concat($a = nil, $b = nil)
    {
        return \phln\collection\concat($a, $b);
    }

    /**
     * Returns `true` if the specified value is equal, `P::equals` terms,
     * to at least one element of the given list; `false` otherwise.
     *
     * @phlnSignature a -> [a] -> Boolean
     * @phlnCategory collection
     * @param string $value
     * @param string $list
     * @return \Closure|mixed
     * @example
     *      P::contains(1, [1, 2, 3]); // true
     */
    public static function contains($value = nil, $list = nil)
    {
        return \phln\collection\contains($value, $list);
    }

    /**
     * Filters elements of an array using a callback function
     *
     * @phlnSignature (a -> Boolean) -> [a] -> Boolean
     * @phlnCategory collection
     * @param string $predicate
     * @param string $list
     * @return \Closure|mixed
     * @example
     *      P::filter(equals(1), [1, 2, 3]); // [1]
     */
    public static function filter($predicate = nil, $list = nil)
    {
        return \phln\collection\filter($predicate, $list);
    }

    /**
     * Returns the first element of the list which matches the predicate,
     * or `null` if no element matches.
     *
     * @phlnSignature (a -> Boolean) -> [a] -> a
     * @phlnCategory collection
     * @param string $predicate
     * @param string $list
     * @return \Closure|mixed
     * @example
     *      $xs = [['a' => 1], ['a' => 2], ['a' => 3]];
     *      P::find(equals(['a' => 1]), $xs); // ['a' => 1]
     */
    public static function find($predicate = nil, $list = nil)
    {
        return \phln\collection\find($predicate, $list);
    }

    /**
     * Maps a function over list and concatenates results
     *
     * @phlnSignature (a -> b) -> [a] -> [b]
     * @phlnCategory collection
     * @param string $mapper
     * @param string $list
     * @return \Closure|mixed
     * @example
     *      $duplicateElements = P::flatMap(function ($i) {
     *          return [$i, $i];
     *      });
     *
     *      $duplicateElements([1, 2]); // [1, 1, 2, 2]
     */
    public static function flatMap($mapper = nil, $list = nil)
    {
        return \phln\collection\flatMap($mapper, $list);
    }

    /**
     * Returns the first element of a given list
     *
     * @phlnSignature [a] -> a | Null
     * @phlnCategory collection
     * @param array $list
     * @return mixed|null
     * @example
     *      P::head([1, 2, 3]); // 1
     *      P::head([]); // null
     */
    public static function head($list)
    {
        return \phln\collection\head($list);
    }

    /**
     * Returns all but the last element of the given list.
     *
     * @phlnSignature [a] -> [a]
     * @phlnCategory collection
     * @param array $list
     * @return array
     * @example
     *      P::init([1, 2, 3]); // [1, 2]
     *      P::init([1, 2]); // [1]
     *      P::init([1]); // []
     *      P::init([]); // []
     */
    public static function init($list): array
    {
        return \phln\collection\init($list);
    }

    /**
     * Returns a string made by inserting the separator between each element and concatenating all the elements into a single string.
     *
     * @phlnSignature String -> [a] -> String
     * @phlnCategory collection
     * @param string $separator
     * @param string $list
     * @return \Closure|mixed
     * @example
     *      $spacer = P::join(' ');
     *      $spacer([1, 2, 3]); // '1 2 3'
     */
    public static function join($separator = nil, $list = nil)
    {
        return \phln\collection\join($separator, $list);
    }

    /**
     * Returns the last element of the given list.
     *
     * @phlnSignature [a] -> a
     * @phlnCategory collection
     * @param array $list
     * @return mixed|null
     * @example
     *      P::last([1, 2, 3]); // 3
     *      P::last([]); // null
     */
    public static function last($list)
    {
        return \phln\collection\last($list);
    }

    /**
     * Applies the callback to the elements of the given arrays
     *
     * @phlnSignature (a -> b) -> [a] -> [b]
     * @phlnCategory collection
     * @param string|callable $fn
     * @param string|array $list
     * @return \Closure|array
     */
    public static function map($fn = nil, $list = nil)
    {
        return \phln\collection\map($fn, $list);
    }

    /**
     * Applies the callback to the elements of the given arrays
     *
     * Callback will receive index of iterated value as a second argument.
     *
     * @phlnSignature ((a, i) -> b) -> [a] -> [b]
     * @phlnCategory collection
     * @param string|callable $fn
     * @param string|array $list
     * @return \Closure|array
     */
    public static function mapIndexed($fn = nil, $list = nil)
    {
        return \phln\collection\mapIndexed($fn, $list);
    }

    /**
     * Returns `true` if no elements of the list match the predicate, `false` otherwise.
     *
     * @phlnSignature (a -> Boolean) -> [a] -> Boolean
     * @phlnCategory collection
     * @param string $predicate
     * @param string $list
     * @return \Closure|mixed
     * @example
     *      $isEven = function ($i) {
     *          return $i % 2 === 0;
     *      };
     *
     *      P::none($isEven, [1, 3, 5]); // true
     *      P::none($isEven, [1, 3, 5, 6]); // false
     */
    public static function none($predicate = nil, $list = nil)
    {
        return \phln\collection\none($predicate, $list);
    }

    /**
     * Returns the nth element of the given list or string.
     * If n is negative the element at index length - n is returned.
     *
     * @phlnSignature Number -> [a] -> a | Null
     * @phlnCategory collection
     * @param string $n
     * @param string $list
     * @return \Closure|mixed
     * @example
     *      P::nth(1, [1, 2, 3]); // 2
     *      P::nth(-1, [1, 2, 3]); // 3
     */
    public static function nth($n = nil, $list = nil)
    {
        return \phln\collection\nth($n, $list);
    }

    /**
     * Returns a new list by plucking the same named property off all objects in the list supplied.
     *
     * @phlnSignature k -> [{k: v}] -> v
     * @phlnCategory collection
     * @param string $key
     * @param string|array $list
     * @return \Closure|array
     * @example
     *      $list = [['a' => 1], ['a' => 2]];
     *      P::pluck('a', $list); // [1, 2]
     */
    public static function pluck($key = nil, $list = nil)
    {
        return \phln\collection\pluck($key, $list);
    }

    /**
     * Returns a new list with the given element at the front, followed by the contents of the list.
     *
     * @phlnSignature a -> [a] -> [a]
     * @phlnCategory collection
     * @param string $value
     * @param string|array $list
     * @return \Closure|array
     * @example
     *      P::prepend(3, [1, 2]); // [3, 1, 2]
     *      P::prepend([3], [1, 2]); // [[3], 1, 2]
     */
    public static function prepend($value = nil, $list = nil)
    {
        return \phln\collection\prepend($value, $list);
    }

    /**
     * Returns a list of numbers from `from` (inclusive) to `to` (exclusive).
     *
     * @phlnSignature Integer a => a -> a -> [a]
     * @phlnCategory collection
     * @param string|int $start
     * @param string|int $end
     * @return \Closure|array
     * @example
     *      P::range(0, 3); // [0, 1, 2]
     */
    public static function range($start = nil, $end = nil)
    {
        return \phln\collection\range($start, $end);
    }

    /**
     * Returns a single item by iterating through the list, successively calling the iterator function and passing it an accumulator value and the current value from the array, and then passing the result to the next call.
     *
     * The iterator function receives two values: (`acc`, `value`).
     *
     * @phlnSignature ((a, b) -> a) -> a -> [b] -> a
     * @phlnCategory collection
     * @param string|callable $reducer
     * @param mixed $initialValue
     * @param string|array $list
     * @return \Closure|mixed
     * @example
     *      P::reduce(P::subtract, 0, [1, 2, 3, 4]);
     *      // ((((0 - 1) - 2) - 3) - 4) => -10
     */
    public static function reduce($reducer = nil, $initialValue = nil, $list = nil)
    {
        return \phln\collection\reduce($reducer, $initialValue, $list);
    }

    /**
     * The negation of `filter`.
     *
     * @phlnSignature (a -> Boolean) -> [a] -> [a]
     * @phlnCategory collection
     * @param string|callable $predicate
     * @param string|array $list
     * @return \Closure|array
     * @example
     *      $isOdd = function ($i) {
     *          return $i % 2 === 1;
     *      };
     *      P::reject($isOdd, [1, 2, 3, 4]); // [2, 4]
     */
    public static function reject($predicate = nil, $list = nil)
    {
        return \phln\collection\reject($predicate, $list);
    }

    /**
     * Returns a new list with the elements in reverse order.
     *
     * @phlnSignature [a] -> [a]
     * @phlnCategory collection
     * @param array $list
     * @return array
     * @see \array_reverse()
     * @example
     *      P::reverse([1, 2, 3]); // [3, 2, 1]
     */
    public static function reverse($list): array
    {
        return \phln\collection\reverse($list);
    }

    /**
     * Extracts a slice of the array
     *
     * @phlnSignature Integer -> Integer -> [a] -> [a]
     * @phlnCategory collection
     * @param string $offset
     * @param string $length
     * @param string $list
     * @return \Closure|mixed
     * @see \array_slice
     * @example
     *      $takeTwo = P::slice(0, 2);
     *      $takeTwo([1, 2, 3]); // [1, 2]
     */
    public static function slice($offset = nil, $length = nil, $list = nil)
    {
        return \phln\collection\slice($offset, $length, $list);
    }

    /**
     * Returns a copy of the list, sorted according to the comparator function, which should accept two values at a time and return a negative number if the first value is smaller, a positive number if it's larger, and zero if they are equal.
     *
     * @phlnSignature ((a, a) -> Number) -> [a] -> [a]
     * @phlnCategory collection
     * @param string|callable $comparator
     * @param string|array $list
     * @return \Closure|array
     * @see \usort()
     * @example
     *      $diff = function ($a, $b) {
     *          return $a - $b;
     *      };
     *
     *      P::sort($diff, [3, 2, 1]); // [1, 2, 3]
     */
    public static function sort($comparator = nil, $list = nil)
    {
        return \phln\collection\sort($comparator, $list);
    }

    /**
     * Sorts the list according to the supplied function.
     *
     * @phlnSignature (a -> b) -> [a] -> [a]
     * @phlnCategory collection
     * @param string|callable $mapper
     * @param string|array $list
     * @return \Closure|array
     * @see \array_multisort()
     * @example
     *      $alice = ['name' => 'alice'];
     *      $bob = ['name' => 'bob'];
     *      $clara = ['name' => 'clara'];
     *      $people = [$bob, $clara, $alice];
     *
     *      P::soryBy(P::prop('name'), $people); // [$alice, $bob, $clara]
     */
    public static function sortBy($mapper = nil, $list = nil)
    {
        return \phln\collection\sortBy($mapper, $list);
    }

    /**
     * Returns all but the first element of the given list
     *
     * @phlnSignature [a] -> [a]
     * @phlnCategory collection
     * @param array $list
     * @return array
     * @example
     *      P::tail([1, 2, 3]); // [2, 3]
     *      P::tail([1]); // []
     *      P::tail([]); // []
     */
    public static function tail($list): array
    {
        return \phln\collection\tail($list);
    }

    /**
     * Returns a new list containing only one copy of each element in the original list. Strict comparision is used to determine equality.
     *
     * @phlnSignature [a] -> [a]
     * @phlnCategory collection
     * @param array $list
     * @return array
     * @example
     *      P::unique([3, 2, 1, 1, 3, 2]); // [3, 2, 1]
     */
    public static function unique($list): array
    {
        return \phln\collection\unique($list);
    }

    /**
     * A function that always returns `false`. Any passed in parameters are ignored.
     *
     * @phlnSignature * -> Boolean
     * @phlnCategory function
     * @return bool
     */
    public static function F(): bool
    {
        return \phln\fn\F();
    }

    /**
     * A function that always returns `true`. Any passed in parameters are ignored.
     *
     * @phlnSignature * -> Boolean
     * @phlnCategory function
     * @return bool
     */
    public static function T(): bool
    {
        return \phln\fn\T();
    }

    /**
     * Returns a function that always returns the given value.
     * For non-primitives the value returned is a reference to the original value.
     *
     * @phlnSignature a -> (* -> a)
     * @phlnCategory function
     * @param $value
     * @return \Closure
     * @example
     *      $foo = P::always('foo');
     *      $foo(); // 'foo'
     */
    public static function always($value): Closure
    {
        return \phln\fn\always($value);
    }

    /**
     * Applies function to functor.
     *
     * @phlnSignature Apply f => f a ~> (a -> b) -> f b
     * @phlnCategory function
     * @param string $applicative
     * @param string $fn
     * @return \Closure|mixed
     * @example
     *      $some = Some(1);
     *      ap($some, P::inc); // Some(2)
     */
    public static function ap($applicative = nil, $fn = nil)
    {
        return \phln\fn\ap($applicative, $fn);
    }

    /**
     * Applies function `fn` to the argument list. This is useful for creating a fixed-arity function from a variadic function.
     *
     * @phlnSignature (*... -> a) -> [*] -> a
     * @phlnCategory function
     * @param string|callable $fn
     * @param string|array $arguments
     * @return \Closure|mixed
     * @example
     *      P::apply(P::sum, [1, 2]); // 3
     */
    public static function apply($fn = nil, $arguments = nil)
    {
        return \phln\fn\apply($fn, $arguments);
    }

    /**
     * Takes a function and returns its arity.
     *
     * @phlnSignature (*... -> *) -> Number
     * @phlnCategory function
     * @param callable $fn
     * @return int
     * @example
     *      P::arity('var_dump'); // 1
     */
    public static function arity($fn): int
    {
        return \phln\fn\arity($fn);
    }

    /**
     * Performs left-to-right function composition.
     * The leftmost function may have any arity; the remaining functions must be unary.
     *
     * **Note**: The result of pipe is not automatically curried.
     *
     * @phlnSignature (((a, b, ..., n) -> o), (o -> p), ..., (x -> y), (y -> z)) -> (a, b, ..., n) -> z)
     * @phlnCategory function
     * @param \callable[] ...$fns
     * @return \Closure
     * @throws \UnderflowException
     */
    public static function compose($fns): Closure
    {
        return \phln\fn\compose($fns);
    }

    /**
     * Returns a curried equivalent of the provided function.
     *
     * Curried function doesn't require providing arguments one at a time.
     * If `f` is a ternary function and `g` is `P::curry(f)`, the following are equivalent.
     *      * g(1)(2)(3)
     *      * g(1)(2, 3)
     *      * g(1, 2)(3)
     *      * g(1, 2, 3)
     *
     * @phlnSignature (* → a) → (* → a)
     * @phlnCategory function
     * @param callable $fn
     * @param array ...$args
     * @return \Closure|mixed
     */
    public static function curry($fn, $args)
    {
        return \phln\fn\curry($fn, $args);
    }

    /**
     * Returns a curried equivalent of the provided function, with the specified arity.
     *
     * Curried function doesn't require providing arguments one at a time.
     * If `f` is a ternary function and `g` is `P::curryN(3, f)`, the following are equivalent.
     *      * g(1)(2)(3)
     *      * g(1)(2, 3)
     *      * g(1, 2)(3)
     *      * g(1, 2, 3)
     *
     * @phlnSignature Number -> (* → a) → (* → a)
     * @phlnCategory function
     * @param callable $fn
     * @param array ...$args
     * @return \Closure|mixed
     */
    public static function curryN($n, $fn, $args)
    {
        return \phln\fn\curryN($n, $fn, $args);
    }

    /**
     * A function that does nothing but return the parameter supplied to it. Good as a default or placeholder function.
     *
     * @phlnSignature a -> a
     * @phlnCategory function
     * @param $value
     * @return mixed
     * @example
     *      P::identity(1) === 1; // 'true'
     */
    public static function identity($value)
    {
        return \phln\fn\identity($value);
    }

    /**
     * Creates a function that negates the result of the predicate.
     *
     * @phlnSignature (*... -> *) -> (*... -> Boolean)
     * @phlnCategory function
     * @param callable $predicate
     * @return \Closure
     * @example
     *      $isEven = function ($i) {
     *          return $i % 2 === 0;
     *      };
     *
     *      P::filter(P::negate($isEven), [1, 2, 3, 4, 5, 6]); // [1, 3, 5]
     */
    public static function negate($predicate): Closure
    {
        return \phln\fn\negate($predicate);
    }

    /**
     * Returns a singleton array containing the value provided.
     *
     * @phlnSignature a -> [a]
     * @phlnCategory function
     * @param mixed $value
     * @return array
     * @example
     *      P::of(null); // [null]
     *      P::of('a'); // ['a']
     */
    public static function of($value): array
    {
        return \phln\fn\of($value);
    }

    /**
     * Accepts a function `fn` and returns a function that guards invocation of `fn` such that `fn` can only ever be called once, no matter how many times the returned function is invoked. The first value calculated is returned in subsequent invocations.
     *
     * @param callable $fn
     * @return \Closure
     * @example
     *      $f = P::once('\rand');
     *      $f(1, 100); // 4
     *      $f(1, 100); // 4
     *      $f(1, 100); // 4
     */
    public static function once($fn): Closure
    {
        return \phln\fn\once($fn);
    }

    /**
     * Takes a function `f` and a list of arguments, and returns a function `g`.
     * When applied, `g` returns the result of applying `f` to the arguments provided initially followed by the arguments provided to `g`.
     *
     * Special placeholder value `P::__` may be used to specify "gaps", allowing partial application of any combination of arguments, regardless of their positions.
     *
     * @phlnSignature ((a, b, c, ..., n) -> x) -> [a, b, c, ...] -> ((d, e, f, ..., n) -> x)
     * @param string|callable $fn
     * @param string|array ...$args
     * @return \Closure
     * @example
     *      $subtractFive = P::partial(P::subtract, P::__, 5);
     *      $subtractFive(10); // 5
     */
    public static function partial($fn = nil, $args = nil): Closure
    {
        return \phln\fn\partial($fn, $args);
    }

    /**
     * Performs left-to-right function composition.
     * The leftmost function may have any arity; the remaining functions must be unary.
     *
     * **Note**: The result of pipe is not automatically curried.
     *
     * @phlnSignature (((a, b, ..., n) -> o), (o -> p), ..., (x -> y), (y -> z)) -> (a, b, ..., n) -> z)
     * @phlnCategory function
     * @param \callable[] ...$fns
     * @return \Closure
     * @throws \UnderflowException
     */
    public static function pipe($fns): Closure
    {
        return \phln\fn\pipe($fns);
    }

    /**
     * Returns a new function much like the supplied one, except that the first two arguments' order is reversed.
     *
     * @phlnSignature (a -> b -> c -> ... -> z) -> (b -> a -> c -> ... -> z)
     * @phlnCategory function
     * @param callable $f
     * @return \Closure
     * @example
     *      $serialize = function ($a, $b) {
     *          return "a:{$a},b:{$b}";
     *      };
     *      P::swap($serialize)(2, 1); // 'a:1,b:2'
     */
    public static function swap($f): Closure
    {
        return \phln\fn\swap($f);
    }

    /**
     * Runs the given function with the supplied object, then returns the object.
     *
     * @phlnSignature (a -> *) -> a -> a
     * @phlnCategory function
     * @param string|callable $fn
     * @param mixed $value
     * @return \Closure|mixed
     * @example
     *      $dump = P::tap('var_dump');
     *      $dump('foo'); // var_dumps('foo'); returns 'foo'
     */
    public static function tap($fn = nil, $value = nil)
    {
        return \phln\fn\tap($fn, $value);
    }

    /**
     * Takes a list of predicates and returns a predicate that returns `true` for a given list of arguments if every one of the provided predicates is satisfied by those arguments.
     *
     * The function returned is a curried function whose arity matches that of the highest-arity predicate.
     *
     * @phlnSignature [(*... -> Boolean) -> *... -> Boolean
     * @phlnCategory logic
     * @param array $predicates
     * @return callable
     * @example
     *      $ace = P::propEq('rank', 'A');
     *      $spades = P::propEq('suit', '♠︎');
     *      $aceOfSpades = P::allPass([$ace, $spades]);
     *      $aceOfSpades(['rank' => 'A', 'suit' => '♠︎']); // true
     */
    public static function allPass($predicates): callable
    {
        return \phln\logic\allPass($predicates);
    }

    /**
     * Returns `true` if both arguments are `true`-thy; `false` otherwise.
     *
     * Sadly `and` keyword is reserved so this function has to be prefixed with `ƛ`
     *
     * @phlnSignature a -> b -> Boolean
     * @phlnCategory logic
     * @param mixed $left
     * @param mixed $right
     * @return \Closure|bool
     * @example
     *      \phln\login\ƛand(true, true); // true
     */
    public static function ƛand($left = nil, $right = nil)
    {
        return \phln\logic\ƛand($left, $right);
    }

    /**
     * A function which calls the two provided functions and returns the `&&` of the results.
     *
     * @phlnSignature (*... -> Boolean) -> (*... -> Boolean) -> (*... -> Boolean)
     * @phlnCategory logic
     * @param string|callable $a
     * @param string|callable $b
     * @return \Closure
     * @example
     *      $gt10 = P::partial(P::gt, [P::__, 10]);
     *      $lt20 = P::partial(P::lt, [P::__, 20]);
     *      $f = P::both($gt10, $lt20);
     *      $f(12); // true
     */
    public static function both($a = nil, $b = nil)
    {
        return \phln\logic\both($a, $b);
    }

    /**
     * Returns a function, `fn`, which encapsulates `if/else`, `if/else`, ... logic. `P::cond` takes a list of [`predicate`, `transformer`] pairs. All of the arguments to `fn` are applied to each of the `predicates` in turn until one returns a truth-y value, at which point `fn` returns the result of applying its arguments to the corresponding `transformer`. If none of the `predicates` matches, `fn` returns null.
     *
     * @phlnSignature [[(*… → Boolean),(*… → *)]] → (*… → *)
     * @phlnCategory logic
     * @param array $pairs
     * @return \Closure
     * @example
     *      $fn = P::cond([
     *          [P::equals(0), P::always('water freezes at 0°C')],
     *          [P::equals(100), P::always('water boils at 100°C')],
     *          [P::T, function(temp) {
     *              return 'nothing special happens at ' + temp + '°C';
     *          }]
     *      ]);
     *
     *      $fn(0); //=> 'water freezes at 0°C'
     *      $fn(50); //=> 'nothing special happens at 50°C'
     *      $fn(100); //=> 'water boils at 100°C'
     */
    public static function cond($pairs): Closure
    {
        return \phln\logic\cond($pairs);
    }

    /**
     * Returns the second argument if it is not `null`; otherwise the first argument is returned.
     *
     * @phlnSignature a -> b -> b | a
     * @phlnCategory logic
     * @param mixed $default
     * @param mixed $value
     * @return \Closure|mixed
     * @example
     *      P::defaultTo(42, null); // 42
     *      P::defaultTo(42, 'life'); // 'life'
     */
    public static function defaultTo($default = nil, $value = nil)
    {
        return \phln\logic\defaultTo($default, $value);
    }

    /**
     * A function wrapping calls to the two functions in an `||` operation, returning `true` if at least one of the functions will return truthy value.
     *
     * @phlnSignature (*... -> Boolean) -> (*... -> Boolean) -> (*... -> Boolean)
     * @param string|callable $left
     * @param string|callable $right
     * @return \Closure
     * @example
     *      $lt10 = P::partial(P::lt, [P::__, 10]);
     *      $gt20 = P::partial(P::gt, [P::__, 20]);
     *      $f = P::either($lt10, $gt20);
     *      $f(12); // false
     *      $f(9); // true
     *      $f(21); // true
     */
    public static function either($left = nil, $right = nil): Closure
    {
        return \phln\logic\either($left, $right);
    }

    /**
     * Creates a function that will process either the `onTrue` or the `onFalse` function depending upon the result of the condition predicate.
     *
     * @phlnSignature (*... -> Boolean) -> (*... -> *) -> (*... -> *) -> (*... -> *)
     * @phlnCategory logic
     * @param string|callable $predicate
     * @param string|callable $onTrue
     * @param string|callable $onFalse
     * @return \Closure
     * @example
     *      $modulo15 = P::swap(P::modulo)(15);
     *      $fizzbuzz = P::ifElse(
     *          P::compose(P::equals(0), $modulo15),
     *          P::always('fizzbuzz'),
     *          P::identity
     *      );
     *
     *      $fizzbuzz(15); // 'fizzbuzz'
     *      $fizzbuzz(1); // 1
     */
    public static function ifElse($predicate = nil, $onTrue = nil, $onFalse = nil): Closure
    {
        return \phln\logic\ifElse($predicate, $onTrue, $onFalse);
    }

    /**
     * Returns `true` if the given value is its type's empty value; `false` otherwise.
     *
     * *Note* unlike `\empty()` this function will consider numbers, booleans and NULL as non-empty.
     *
     * @phlnSignature a -> Boolean
     * @phlnCategory logic
     * @param $value
     * @return bool
     * @example
     *      P::isEmpty(''); // true
     *      P::isEmpty([]); // true
     *      P::isEmpty(new stdClass); // true
     *      P::isEmpty(0); // false
     *      P::isEmpty(null); // false
     *      P::isEmpty(false); // false
     *      P::isEmpty(true); // false
     */
    public static function isEmpty($value): bool
    {
        return \phln\logic\isEmpty($value);
    }

    /**
     * A function that returns the `!` of its argument. It will return `true` when passed false-y value, and `false` when passed a truth-y one.
     *
     * @phlnSignature * -> Boolean
     * @phlnCategory logic
     * @param $value
     * @return bool
     * @example
     *      P::not(0); // true
     *      P::not(true); // false
     */
    public static function not($value): bool
    {
        return \phln\logic\not($value);
    }

    /**
     * Returns `true` if one or both of its arguments are trueth-y. Returns `false` if both arguments are false-y.
     *
     * @phlnSignature a -> b -> Boolean
     * @phlnCategory logic
     * @param string $left
     * @param string $right
     * @return \Closure|mixed
     * @example
     *      \phln\logic\ƛor(true, false); // true
     */
    public static function ƛor($left = nil, $right = nil)
    {
        return \phln\logic\ƛor($left, $right);
    }

    /**
     * Add two values
     *
     * @phlnSignature Number a => a -> a -> a
     * @phlnCategory math
     * @param mixed $a
     * @param mixed $b
     * @return \Closure|mixed
     */
    public static function add($a = nil, $b = nil)
    {
        return \phln\math\add($a, $b);
    }

    /**
     * Decrement its argument
     *
     * @phlnSignature Int a => a -> a
     * @phlnCategory math
     * @param string|integer $number
     * @return \Closure|integer
     */
    public static function dec($number = nil)
    {
        return \phln\math\dec($number);
    }

    /**
     * Divide numbers. Equivalent of `a / b`
     *
     * @phlnSignature Number a => a -> a -> a
     * @phlnCategory math
     * @param mixed $a
     * @param mixed $b
     * @return \Closure|mixed
     */
    public static function divide($a = nil, $b = nil)
    {
        return \phln\math\divide($a, $b);
    }

    /**
     * Increment its argument
     *
     * @phlnSignature Int a => a -> a
     * @phlnCategory math
     * @param string|integer $number
     * @return \Closure|integer
     */
    public static function inc($number = nil)
    {
        return \phln\math\inc($number);
    }

    /**
     * Returns the mean of the given list of numbers.
     *
     * @phlnSignature Number a => [a] -> a
     * @phlnCategory math
     * @param string|array $numbers
     * @example
     *      P::mean([2, 7, 9]) // 6
     * @return \Closure|mixed
     */
    public static function mean($numbers = nil)
    {
        return \phln\math\mean($numbers);
    }

    /**
     * Returns the median of the given list of numbers.
     *
     * @phlnSignature Number a => [a] -> a
     * @phlnCategory math
     * @param string|array $numbers
     * @return \Closure|mixed
     * @example
     *      \\phln\\math\\median([7, 2, 9]) // 7
     *      \\phln\\math\\median([7, 2, 10, 9]) // 8
     */
    public static function median($numbers = nil)
    {
        return \phln\math\median($numbers);
    }

    /**
     * Divides the first parameter by the second and returns the remainder.
     *
     * @phlnSignature Number a => a -> a -> a
     * @phlnCategory math
     * @param string $a
     * @param string $b
     * @return \Closure|mixed
     * @example
     *      \\phln\\math\\modulo(1, 2) // 1
     */
    public static function modulo($a = nil, $b = nil)
    {
        return \phln\math\modulo($a, $b);
    }

    /**
     * Multiplies two numbers
     *
     * @phlnSignature Number a => a -> a -> a
     * @phlnCategory math
     * @param string $a
     * @param string $b
     * @return \Closure|mixed
     * @example
     *      $triple = P::multiply(3);
     *      $triple(7); // 21
     */
    public static function multiply($a = nil, $b = nil)
    {
        return \phln\math\multiply($a, $b);
    }

    /**
     * Multiplies together all the elements of a list.
     *
     * @phlnSignature Number a => [a] -> a
     * @phlnCategory math
     * @param string $numbers
     * @return \Closure|mixed
     * @example
     *      P::product([2, 4, 6, 8, 100, 1]); // 38400
     */
    public static function product($numbers = nil)
    {
        return \phln\math\product($numbers);
    }

    /**
     * Subtracts its second argument from its first argument.
     *
     * @phlnSignature Number a => a -> a -> a
     * @phlnCategory math
     * @param string $a
     * @param string $b
     * @return \Closure|mixed
     * @example
     *      $complementaryAngle = P::subtract(90);
     *      $complementaryAngle(30); //=> 60
     */
    public static function subtract($a = nil, $b = nil)
    {
        return \phln\math\subtract($a, $b);
    }

    /**
     * Adds together all the elements of a list.
     *
     * @phlnSignature [Number] -> Number
     * @phlnCategory math
     * @param string $numbers
     * @return \Closure|mixed
     * @example
     *      P::sum([1, 2, 3, 4]); // 10
     */
    public static function sum($numbers = nil)
    {
        return \phln\math\sum($numbers);
    }

    /**
     * Reports whether two objects have the same value, in `P::equals` terms, for the specified property.
     *
     * @phlnSignature k -> {k: v} -> {k: v} -> Boolean
     * @phlnCategory object
     * @param string $prop
     * @param string $a
     * @param string $b
     * @return \Closure|mixed
     * @example
     *      P::eqProps('name', ['name' => 'Jon'], ['name' => 'Jon']); // true
     */
    public static function eqProps($prop = nil, $a = nil, $b = nil)
    {
        return \phln\object\eqProps($prop, $a, $b);
    }

    /**
     * Returns a list containing the names of array keys.
     *
     * @phlnSignature {k: v} -> [k]
     * @phlnCategory object
     * @param array $object
     * @return array
     * @see \array_keys()
     * @example
     *      P::keys(['a' => 1, 'b' => 1]); // ['a', 'b']
     */
    public static function keys($object): array
    {
        return \phln\object\keys($object);
    }

    /**
     * Create a new object with the keys of the first object merged with the keys of the second object. If a key exists in both objects, the value from the second object will be used.
     *
     * @phlnSignature {k: v} -> {k: v} -> {k: v}
     * @phlnCategory object
     * @param string|array $left
     * @param string|array $right
     * @return \Closure|array
     * @example
     *      $toDefaults = P::partial(P::merge, [P::__, ['x' => 0]);
     *      $toDefaults(['x' => 2, 'y' => 1]); // ['x' => 0, 'y' => 1]
     */
    public static function merge($left = nil, $right = nil)
    {
        return \phln\object\merge($left, $right);
    }

    /**
     * Returns a partial copy of an object omitting the keys specified.
     *
     * @phlnSignature [String] -> {String: *} -> {String: *}
     * @phlnCategory object
     * @param string $omitKeys
     * @param string $object
     * @return \Closure|mixed
     * @example
     *      P::omit(['a', 'c'], ['a' => 1, 'b' => 2, 'c' => 3]); // ['b' => 2]
     */
    public static function omit($omitKeys = nil, $object = nil)
    {
        return \phln\object\omit($omitKeys, $object);
    }

    /**
     * Returns nested value using "dot notation".
     *
     * @phlnSignature String -> {k: v} -> v|Null
     * @phlnCategory object
     * @param string $path
     * @param string|array $object
     * @return \Closure|mixed
     * @example
     *      P::path('a.b', ['a' => ['b' => 'foo']]); // 'foo'
     *      P::path('a.b.c', ['a' => ['b' => 'foo']]); // null
     */
    public static function path($path = nil, $object = nil)
    {
        return \phln\object\path($path, $object);
    }

    /**
     * Returns nested value using "dot notation". If key is not defined, or value is NULL default value will be returned.
     *
     * @phlnSignature String -> a -> {k: v} -> v | a
     * @phlnCategory object
     * @param string $path
     * @param string $default
     * @param string|array $object
     * @return \Closure|mixed
     * @example
     *      P::pathOr('a.b', 'foo', ['a' => ['b' => 1]]); // 1
     *      P::pathOr('a.b', 'foo', ['a' => ['b' => 0]]); // 0
     *      P::pathOr('a.b', 'foo', ['a' => ['b' => null]]); // 'foo'
     *      P::pathOr('a.b', 'foo', ['a' => 1]); // 'foo'
     */
    public static function pathOr($path = nil, $default = nil, $object = nil)
    {
        return \phln\object\pathOr($path, $default, $object);
    }

    /**
     * Returns a partial copy of an object containing only the keys specified. If the key does not exist, the property is ignored.
     *
     * @phlnSignature [String] -> {String: *} -> {String: *}
     * @phlnCategory object
     * @param string|array $useKeys
     * @param string|array $object
     * @return \Closure|array
     * @example
     *      P::pick(['a'], ['a' => 1, 'b' => 2]); // ['a' => 1]
     */
    public static function pick($useKeys = nil, $object = nil)
    {
        return \phln\object\pick($useKeys, $object);
    }

    /**
     * Returns a function that when supplied an array returns the indicated key of that key, if it exists.
     *
     * @phlnSignature k -> {k: v} -> v
     * @phlnCategory object
     * @param string $key
     * @param string|array $array
     * @return \Closure|mixed
     */
    public static function prop($key = nil, $array = nil)
    {
        return \phln\object\prop($key, $array);
    }

    /**
     * Acts as multiple `prop`: array of keys in, array of values out. Preserves order.
     *
     * @phlnSignature [k] -> {k: v} -> [v]
     * @phlnCategory object
     * @param string|array $props
     * @param string|array $object
     * @return \Closure|array
     * @example
     *      $fullName = P::compose(P::join(' '), P::props(['firstName', 'lastName']));
     *      $fullName(['lastName' => 'Snow', 'firstName' => 'Jon']); // 'Jon Snow'
     */
    public static function props($props = nil, $object = nil)
    {
        return \phln\object\props($props, $object);
    }

    /**
     * Returns values of supplied object
     *
     * @phlnSignature {k: v} -> [v]
     * @phlnCategory object
     * @param array $object
     * @return array
     */
    public static function values($object): array
    {
        return \phln\object\values($object);
    }

    /**
     * Takes a spec object and a test object; returns `true` if the test satisfies the spec. Each of the spec's properties must be a predicate function. Each predicate is applied to the value of the corresponding property of the test object. where returns `true` if all the predicates return true, false otherwise.
     *
     * `where` is well suited to declaratively expressing constraints for other functions such as `filter` and `find`.
     *
     * @phlnSignature {String: (* -> Boolean)} -> {String: *} -> Boolean
     * @phlnCategory object
     * @param string|array $predicates
     * @param string|array $object
     * @return \Closure|bool
     * @example
     *      $verifyJon = P::where([
     *          'firstName' => P::equals('Jon'),
     *          'lastName' => P::equals('Snow'),
     *      ]);
     *
     *      $verifyJon(['firstName' => 'Jon', 'lastName' => 'Snow', 'house' => 'Stark']); // true
     */
    public static function where($predicates = nil, $object = nil)
    {
        return \phln\object\where($predicates, $object);
    }

    /**
     * Takes a spec object and a test object; returns `true` if the test satisfies the spec, false otherwise. An object satisfies the spec if, for each of the spec's properties, accessing that property of the object gives the same value (in `P::equals()` terms) as accessing that property of the spec.
     *
     * @phlnSignature {String: *} -> {String: *} -> Boolean
     * @phlnCategory object
     * @param string $predicates
     * @param string $object
     * @return \Closure|bool
     * @example
     *      $verifyJon = P::whereEq(['firstName' => 'Jon', 'lastName' => 'Snow']);
     *      $verifyJon(['firstName' => 'Jon', 'lastName' => 'Snow']); // true
     */
    public static function whereEq($predicates = nil, $object = nil)
    {
        return \phln\object\whereEq($predicates, $object);
    }

    /**
     * Restricts a number to be within a range.
     *
     * @phlnSignature Number a => a -> a -> a -> a
     * @phlnCategory relation
     * @param mixed $min
     * @param mixed $max
     * @param mixed $value
     * @return \Closure|mixed
     * @example
     *      P::clamp(-1, 1, -100); // -1
     *      P::clamp(-1, 1, 100); // 1
     *      P::clamp(-1, 1, 0); // 0
     */
    public static function clamp($min = nil, $max = nil, $value = nil)
    {
        return \phln\relation\clamp($min, $max, $value);
    }

    /**
     * Finds the set (i.e. no duplicates) of all elements in the first list not contained in the second list.
     *
     * @phlnSignature [*] -> [*] -> [*]
     * @phlnCategory relation
     * @param string|array $a
     * @param string|array $b
     * @return \Closure|array
     * @example
     *      P::difference([1, 2, 3, 4], [3, 4, 5, 6]); // [1, 2]
     */
    public static function difference($a = nil, $b = nil)
    {
        return \phln\relation\difference($a, $b);
    }

    /**
     * Returns `true` if its arguments are equivalent, `false` otherwise.
     *
     * @phlnSignature a -> b -> Boolean
     * @phlnCategory relation
     * @param mixed $a
     * @param mixed $b
     * @return \Closure|bool
     * @example
     *      P::equals(1, 1); // true
     *      P::equals(1, '1'); // false
     *      P::equals(1, 2); // false
     */
    public static function equals($a = nil, $b = nil)
    {
        return \phln\relation\equals($a, $b);
    }

    /**
     * Returns `true` if the first argument is greater than the second; `false` otherwise.
     *
     * @phlnSignature Ord a => a -> a -> Boolean
     * @phlnCategory relation
     * @param mixed $a
     * @param mixed $b
     * @return \Closure|bool
     * @example
     *      P::gt(2, 1); // true
     */
    public static function gt($a = nil, $b = nil)
    {
        return \phln\relation\gt($a, $b);
    }

    /**
     * Returns `true` if the first argument is greater than or equal to the second; `false` otherwise.
     *
     * @phlnSignature Ord a => a -> a -> Boolean
     * @phlnCategory relation
     * @param string $a
     * @param string $b
     * @return \Closure|mixed
     * @example
     *      P::gte(2, 1); // true
     *      P::gte(2, 2); // true
     *      P::gte(2, 3); // false
     */
    public static function gte($a = nil, $b = nil)
    {
        return \phln\relation\gte($a, $b);
    }

    /**
     * Combines two lists into a set composed of those elements common to both lists.
     *
     * @phlnSignature [*] -> [*] -> [*]
     * @phlnCategory relation
     * @param string $a
     * @param string $b
     * @return \Closure|mixed
     * @example
     *      P::intersection([1, 2, 3, 4], [6, 4, 5]); // [4]
     */
    public static function intersection($a = nil, $b = nil)
    {
        return \phln\relation\intersection($a, $b);
    }

    /**
     * Returns `true` if the first argument is less than the second; `false` otherwise.
     *
     * @phlnSignature Ord a => a -> a -> Boolean
     * @phlnCategory relation
     * @param mixed $a
     * @param mixed $b
     * @return \Closure|bool
     * @example
     *      P::lt(1, 2); // true
     *      P::lt(3, 2); // false
     *      P::lt(2, 2); // false
     */
    public static function lt($a = nil, $b = nil)
    {
        return \phln\relation\lt($a, $b);
    }

    /**
     * Returns `true` if the first argument is less than or equal to the second; `false` otherwise.
     *
     * @phlnSignature Ord a => a -> a -> Boolean
     * @phlnCategory relation
     * @param string $a
     * @param string $b
     * @return \Closure|mixed
     * @example
     *      P::lte(1, 2); // true
     */
    public static function lte($a = nil, $b = nil)
    {
        return \phln\relation\lte($a, $b);
    }

    /**
     * Returns the larger of its two arguments.
     *
     * @phlnSignature a -> a -> a
     * @phlnCategory relation
     * @param string $left
     * @param string $right
     * @return \Closure|mixed
     */
    public static function max($left = nil, $right = nil)
    {
        return \phln\relation\max($left, $right);
    }

    /**
     * Returns the smaller of its two arguments.
     *
     * @phlnSignature a -> a -> a
     * @phlnCategory relation
     * @param string $left
     * @param string $right
     * @return \Closure|mixed
     * @example
     *      P::min(1, -1); // -1
     */
    public static function min($left = nil, $right = nil)
    {
        return \phln\relation\min($left, $right);
    }

    /**
     * Determines whether a nested path on an object has a specific value, in `equals()` terms.
     *
     * @phlnSignature String -> a -> {a} -> Boolean
     * @phlnCategory relation
     * @param string $path
     * @param mixed $value
     * @param string|array $object
     * @return \Closure|bool
     * @example
     *      P::pathEq('foo.bar', 1, ['foo' => ['bar' => 1]]); // true
     */
    public static function pathEq($path = nil, $value = nil, $object = nil)
    {
        return \phln\relation\pathEq($path, $value, $object);
    }

    /**
     * Returns `true` if the specified object property is equal, in `equals()` terms, to the given value; `false` otherwise.
     *
     * @phlnSignature k -> a -> {k: a} -> Boolean
     * @phlnCategory relation
     * @param string $prop
     * @param string $value
     * @param string $object
     * @return \Closure|mixed
     * @example
     *      P::propEq('name', 'Jon', ['name' => 'Jon']); // true
     */
    public static function propEq($prop = nil, $value = nil, $object = nil)
    {
        return \phln\relation\propEq($prop, $value, $object);
    }

    /**
     * Returns the result of concatenating the given strings.
     *
     * @phlnSignature String -> String -> String
     * @phlnCategory string
     * @param string $a
     * @param string $b
     * @return \Closure|string
     * @example
     *      P::concatString('a', 'B'); // aB
     */
    public static function concatString($a = nil, $b = nil)
    {
        return \phln\string\concatString($a, $b);
    }

    /**
     * Tests a regular expression against a String.
     *
     * Unlike `matchAll()` this function will return first matching string or `null` when there is no match.
     *
     * @phlnSignature RegExp -> String -> String|Null
     * @phlnCategory string
     * @param string $regexp
     * @param string $test
     * @return \Closure|string
     * @example
     *      P::matchFirst('/([a-z](o))/i', 'Lorem ipsum dolor'); // 'Lo'
     */
    public static function match($regexp = nil, $test = nil)
    {
        return \phln\string\match($regexp, $test);
    }

    /**
     * Tests a regular expression against a String. Note that this function will return an empty array when there are no matches.
     *
     * All matching strings will be returned.
     *
     * @phlnSignature RegExp -> String -> [String]
     * @param string $regexp
     * @param string $test
     * @return \Closure|array
     * @example
     *      P::match('/([a-z](o))/i', 'Lorem ipsum dolor'); // ['Lo', 'do', 'lo']
     */
    public static function matchAll($regexp = nil, $test = nil)
    {
        return \phln\string\matchAll($regexp, $test);
    }

    /**
     * Replace a regex match in a string with a replacement.
     *
     * Note: this function replaces only first matching string.
     * To replace all matches `replaceAll()` should be used.
     *
     * @phlnSignature RegExp -> String -> String -> String
     * @phlnCategory string
     * @param string $regexp
     * @param string $replacement
     * @param string $text
     * @return \Closure|string
     * @example
     *      P::replace('/foo/', 'bar', 'foo foo foo'); // 'bar foo foo'
     */
    public static function replace($regexp = nil, $replacement = nil, $text = nil)
    {
        return \phln\string\replace($regexp, $replacement, $text);
    }

    /**
     * Replace regex match in a string with a replacement.
     *
     * Note: this will replace all matches.
     *
     * @param string $regexp
     * @param string $replacement
     * @param string $text
     * @return \Closure|string
     * @example
     *      P::replaceAll('/foo/', 'bar', 'foo foo foo'); // 'bar bar bar'
     */
    public static function replaceAll($regexp = nil, $replacement = nil, $text = nil)
    {
        return \phln\string\replaceAll($regexp, $replacement, $text);
    }

    /**
     * Splits a string into an array of strings based on the given separator.
     *
     * @phlnSignature String -> String -> [String]
     * @phlnCategory string
     * @param string $delimiter
     * @param string $text
     * @return \Closure|array
     * @example
     *      P::split('/', 'a/b'); // ['a', 'b']
     */
    public static function split($delimiter = nil, $text = nil)
    {
        return \phln\string\split($delimiter, $text);
    }

    /**
     * Splits a string into an array of strings based on the given regular expression.
     *
     * @phlnSignature RegExp -> String -> [String]
     * @param string $regexp
     * @param string $text
     * @return \Closure|array
     */
    public static function splitRegexp($regexp = nil, $text = nil)
    {
        return \phln\string\splitRegexp($regexp, $text);
    }

    /**
     * See if `value` is of given `type`.
     *
     * Internally this function uses `\gettype()` with few support of few aliases:
     * * `bool` - alias for `boolean` type
     * * `float` - alias for `double` type
     * * class FQN - will check if supplied object is instance of given class
     *
     * @phlnSignature String -> a -> Boolean
     * @phlnCategory type
     * @param string $type
     * @param mixed $value
     * @return \Closure|bool
     * @example
     *      P::is('bool', true); // true
     *      P::is(\stdClass::class, new \stdClass); // true
     *      P::is(float, 1.1); // true
     */
    public static function is($type = nil, $value = nil)
    {
        return \phln\type\is($type, $value);
    }

}
