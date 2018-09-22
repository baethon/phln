<?php
declare(strict_types=1);

namespace Baethon\Phln;

/**
 * @method  static \Closure|bool all(callable $predicate = NULL, array $list = [])
 * @method  static \Closure|bool any(callable $predicate = NULL, array $list = [])
 * @method  static \Closure|string|array append($value = NULL, $collection = NULL)
 * @method  static \Closure|array chunk(int $size = 0, $collection = NULL)
 * @method  static array collapse(array $list)
 * @method  static \Closure|string|array concat($a = NULL, $b = NULL)
 * @method  static \Closure|bool contains($value = NULL, $collection = NULL)
 * @method  static \Closure|mixed filter(callable $predicate = NULL, array $list = [])
 * @method  static \Closure|mixed find(callable $predicate = NULL, array $list = [])
 * @method  static \Closure|mixed flatMap(callable $mapper = NULL, array $list = [])
 * @method  static array fromPairs(array $pairs)
 * @method  static \Closure|array groupBy(callable $fn = NULL, array $collection = NULL)
 * @method  static mixed|null head($collection)
 * @method  static array|string init($collection)
 * @method  static \Closure|mixed join(string $separator = '', array $list = [])
 * @method  static mixed|null last($list)
 * @method  static int length($collection)
 * @method  static \Closure|array map(callable $fn = NULL, array $list = [])
 * @method  static \Closure|array mapIndexed(callable $fn = NULL, array $list = [])
 * @method  static \Closure|mixed none(callable $predicate = NULL, array $list = [])
 * @method  static \Closure|mixed nth(int $n = 0, array $list = [])
 * @method  static \Closure|array partition(callable $predicate = NULL, array $collection = NULL)
 * @method  static \Closure|array pluck($key = '', array $list = [])
 * @method  static \Closure|array prepend($value = NULL, $collection = NULL)
 * @method  static \Closure|array range(int $start = 0, int $end = 0)
 * @method  static \Closure|mixed reduce(callable $reducer = NULL, $initialValue = NULL, array $list = [])
 * @method  static \Closure|array reject(callable $predicate = NULL, array $list = [])
 * @method  static array|string reverse($collection)
 * @method  static \Closure|array|string slice(int $offset = 0, int $length = 0, $collection = NULL)
 * @method  static \Closure|array sort(callable $comparator = NULL, array $list = [])
 * @method  static \Closure|array sortBy(callable $mapper = NULL, array $list = [])
 * @method  static array tail($collection)
 * @method  static array unique(array $list)
 * @method  static bool F()
 * @method  static bool T()
 * @method  static \Closure always($value)
 * @method  static \Closure|mixed apply(callable $fn = NULL, array $arguments = [])
 * @method  static int arity(callable $fn)
 * @method  static \Closure compose(array $fns)
 * @method  static \Closure|mixed curry(callable $fn, array $args = [])
 * @method  static \Closure|mixed curryN(int $n, callable $fn, array $args = [])
 * @method  static mixed identity($value)
 * @method  static \Closure invoker(int $arity = NULL, string $method)
 * @method  static \Closure negate(callable $predicate)
 * @method  static array of($value)
 * @method  static \Closure once(callable $fn)
 * @method  static \Closure partial(callable $fn = NULL, array $args = [])
 * @method  static \Closure partialRight(callable $fn = NULL, array $args = NULL)
 * @method  static \Closure pipe(array $fns)
 * @method  static \Closure swap(callable $f)
 * @method  static \Closure|mixed tap(callable $fn = NULL, $value = NULL)
 * @method  static \Closure throwException(string $exception = 'Exception', array $args = [])
 * @method  static \Closure|mixed unapply(callable $fn = NULL, ...$args)
 * @method  static callable allPass(array $predicates)
 * @method  static \Closure|bool both($left = NULL, $right = NULL)
 * @method  static \Closure cond(array $pairs)
 * @method  static \Closure|mixed defaultTo($default = NULL, $value = NULL)
 * @method  static \Closure|bool either($left = NULL, $right = NULL)
 * @method  static \Closure ifElse(callable $predicate = NULL, callable $onTrue = NULL, callable $onFalse = NULL)
 * @method  static bool isEmpty($value)
 * @method  static bool not($value)
 * @method  static \Closure|mixed add($a = NULL, $b = NULL)
 * @method  static mixed dec($number)
 * @method  static \Closure|mixed divide($a = NULL, $b = NULL)
 * @method  static mixed inc($number)
 * @method  static \Closure|mixed mean(array $numbers)
 * @method  static mixed median(array $numbers)
 * @method  static \Closure|mixed modulo($a = NULL, $b = NULL)
 * @method  static \Closure|mixed multiply($a = NULL, $b = NULL)
 * @method  static mixed product(array $numbers)
 * @method  static \Closure|mixed subtract($a = NULL, $b = NULL)
 * @method  static mixed sum(array $numbers)
 * @method  static \Closure|mixed eqProps(string $prop = '', $a = [], $b = [])
 * @method  static array keys($object)
 * @method  static \Closure|array merge($left = [], $right = [])
 * @method  static \Closure|object objOf(string $key = NULL, $value = NULL)
 * @method  static \Closure|array omit(array $omitKeys = [], $object = [])
 * @method  static \Closure|mixed path(string $path = '', $object = [])
 * @method  static \Closure|mixed pathOr(string $path = '', $default = NULL, array $object = [])
 * @method  static \Closure|array pick(array $useKeys = [], $object = [])
 * @method  static \Closure|mixed prop($key = '', $object = [])
 * @method  static \Closure|array props(array $props = [], $object = [])
 * @method  static array toPairs($object)
 * @method  static array values($object)
 * @method  static \Closure|bool where(array $predicates = [], $object = [])
 * @method  static \Closure|bool whereEq(array $predicates = [], $object = [])
 * @method  static \Closure|mixed clamp($min = NULL, $max = NULL, $value = NULL)
 * @method  static \Closure|array difference(array $left = NULL, array $right = NULL)
 * @method  static \Closure|bool equals($a = NULL, $b = NULL)
 * @method  static \Closure|bool gt($a = NULL, $b = NULL)
 * @method  static \Closure|mixed gte($a = NULL, $b = NULL)
 * @method  static \Closure|mixed intersection(array $left = [], array $right = [])
 * @method  static \Closure|bool lt($left = NULL, $right = NULL)
 * @method  static \Closure|mixed lte($left = NULL, $right = NULL)
 * @method  static \Closure|mixed max($left = NULL, $right = NULL)
 * @method  static \Closure|mixed min($left = NULL, $right = NULL)
 * @method  static \Closure|bool pathEq(string $path = '', $value = NULL, array $object = [])
 * @method  static \Closure|mixed propEq(string $prop = '', $value = NULL, $object = NULL)
 * @method  static \Closure|array|string match($regexp = NULL, string $test = '')
 * @method  static \phln\RegExp regexp(string $regexp)
 * @method  static \Closure|string replace($regexp = NULL, string $replacement = '', string $text = '')
 * @method  static \Closure|array split($delimiter = NULL, string $text = '')
 * @method  static \Closure|bool test($regexp = NULL, string $string = NULL)
 * @method  static \Closure|bool is(string $type = '', $value = NULL)
 * @method  static \Closure typeCond(array $pairs)
 */
final class Phln
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
    const fromPairs = \phln\collection\fromPairs;
    const groupBy = \phln\collection\groupBy;
    const head = \phln\collection\head;
    const init = \phln\collection\init;
    const join = \phln\collection\join;
    const last = \phln\collection\last;
    const length = \phln\collection\length;
    const map = \phln\collection\map;
    const mapIndexed = \phln\collection\mapIndexed;
    const none = \phln\collection\none;
    const nth = \phln\collection\nth;
    const partition = \phln\collection\partition;
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
    const otherwise = \phln\fn\otherwise;
    const always = \phln\fn\always;
    const apply = \phln\fn\apply;
    const arity = \phln\fn\arity;
    const compose = \phln\fn\compose;
    const curry = \phln\fn\curry;
    const curryN = \phln\fn\curryN;
    const identity = \phln\fn\identity;
    const invoker = \phln\fn\invoker;
    const negate = \phln\fn\negate;
    const of = \phln\fn\of;
    const once = \phln\fn\once;
    const __ = \phln\fn\__;
    const partial = \phln\fn\partial;
    const partialRight = \phln\fn\partialRight;
    const pipe = \phln\fn\pipe;
    const swap = \phln\fn\swap;
    const tap = \phln\fn\tap;
    const throwException = \phln\fn\throwException;
    const unapply = \phln\fn\unapply;
    const allPass = \phln\logic\allPass;
    const both = \phln\logic\both;
    const cond = \phln\logic\cond;
    const defaultTo = \phln\logic\defaultTo;
    const either = \phln\logic\either;
    const ifElse = \phln\logic\ifElse;
    const isEmpty = \phln\logic\isEmpty;
    const not = \phln\logic\not;
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
    const objOf = \phln\object\objOf;
    const omit = \phln\object\omit;
    const path = \phln\object\path;
    const pathOr = \phln\object\pathOr;
    const pick = \phln\object\pick;
    const prop = \phln\object\prop;
    const props = \phln\object\props;
    const toPairs = \phln\object\toPairs;
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
    const match = \phln\string\match;
    const regexp = \phln\string\regexp;
    const replace = \phln\string\replace;
    const split = \phln\string\split;
    const test = \phln\string\test;
    const is = \phln\type\is;
    const typeCond = \phln\type\typeCond;

    public static function __callStatic($name, $args)
    {
        $constName = sprintf('%s::%s', __CLASS__, $name);

        if (false === defined($constName)) {
            throw new \BadMethodCallException("Call to unknown method {$name}()");
        }

        $fn = constant($constName);

        return $fn(...$args);
    }
}
