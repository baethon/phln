# baethon/phln

A practical functional library for PHP developers.

Heavily inspired by [Ramda.js](http://ramdajs.com/), adapted for PHP needs.

# Installation

```bash
composer require baethon/phln
```

# Example usage

`phln` defines set of functions which can be used individualy:

```php
use const phln\fn\T;
use function phln\fn\always;
use function phln\logic\cond;
use function phln\relation\euqals;

$fooBars = cond([
    [equals(5), always('foo')],
    [T, always('bar')],
]);

$fooBars(5); // foo
```

... or through `phln\Phln` static wrapper:

```php
use phln\Phln as P;

$fooBars = P::cond([
    [P::equals(5), P::always('foo')],
    [P::T, P::always('bar)],
]);
```

Later in docs every `P::` reference will be used as a mental shortcut to `phln\Phln::`.

## Currying

By default **most** of functions defined in `phln` namespace are loosly curried. Functions are unary, however it's possible to pass to them more then one argument. Those arguments will be passed to the returned functions.

```php
$foo = P::curryN(2, function ($left, $right) {
    return $left + $right;
});

$foo(1); // returns instance of \Closure
$foo(1, 2); // 3
$foo(1)(2); // 3
```

## Partial application

Partial application is possible with combination of `P::partial()` and `P::__` const. Partial returns a function which accepts arguments which should "fill" gap of missing arguments for callable.

```php
$foos = [1, 2, 3];
$mapFoos = P::partial('\\array_map', [P::__, $foos]);
$mapFoos(function ($f) {
    return $f + 100;
}); // [100, 200, 300]
```

## Function composition

For basic function composition `phln` provides `pipe()` and `compose()` functions.

```php
$allFoos = P::pipe([
    P::filter(P::lte(5)),
    P::map(P::always('foo')),
]);

$firstFoo = P::compose([P::head, $allFoos]);

$allFoos([4, 5, 6]); // ['foo', 'foo']
$firstFoo([4, 5, 6]); // 'foo'
```

## About function references

Many of `phln` functions accept `callable` type. PHP does not allow to pass imported function as a callable reference. Instead it's required to pass a string reference (functions fully qualified name) as a "callback":

```php
use function phln\math\sum;

$collection = [1, 2, 3, 4];
array_reduce($collection, sum); // WRONG
array_reduce($collection, 'phln\\math\\sum'); // 10
```

`phln` covers this problem by exporting string constants "pointing" to corresponding functions:

```php
use const phln\math\sum; // Notice `const` keyword

$collection = [1, 2, 3, 4];
array_reduce($collection, sum); // 10
```

It's possible to import *both* function and constant:

```php
use const phln\math\sum;
use function phln\math\sum;

$collection = [1, 2, 3, 4];
array_reduce($collection, sum); // 10

sum(4, 3); // 7
```

Unfortunatelly this approach generates overhead of import statements. For this reason I suggest using `phln\Phln` static wrapper.

```php
use phln\Phln as P;

$collection = [1, 2, 3, 4];
array_reduce($collection, P::sum); // 10

P::sum(4, 3); // 7
```


## Prefixed functions

Due to internal organization and some PHP limitations `phln` exports functions and consts with special prefixes.

### 𝑓 function

Those are uncurried versions of functions used internally by `phln`. They contain the main logic of the function and proper typehinting.

### ƛ function

PHP has restricted keywords (such as `class`, `and`, `or` etc). It's unable to use them as a function name. Yet there're some cases where it made sense to use them.

Those special functions are prefixed with lambda character (eg. `ƛand()`).

It's possible that in future those names should be changed for something that does not require this silly prefix. I'm open for suggestions :)
