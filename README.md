[![Build Status](https://travis-ci.org/baethon/phln.svg?branch=master)](https://travis-ci.org/baethon/phln) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/baethon/phln/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/baethon/phln/?branch=master)

---

# baethon/phln

Set of small utility functions.

Heavily inspired by [Ramda.js](http://ramdajs.com/), adapted for PHP needs.

## Installation

```bash
composer require baethon/phln
```

## Example usage

```php
use Baethon\Phln\Phln as P;

$aboveMinPoints = P::compose([P::lte(50), P::prop('score')]);
$onlyPhp = P::pathEq('language.name', 'PHP');

$topScores = collect($users)
    ->filter(P::both($aboveMinPoints, $onlyPhp));
```

_Note_: in the docs `P` will be used as an alias to `Baethon\Phln\Phln`.

### Currying

`Phln` methods are loosely curried. A `N-ary` method will return a function until all arguments are provided.

```php
$foo = P::curryN(2, function ($left, $right) {
    return $left + $right;
});

$foo(1); // returns instance of \Closure
$foo(1, 2); // 3
$foo(1)(2); // 3
```

### Partial application

Partial application is possible with combination of `P::partial()` and `P::__` const. Partial returns a function which accepts arguments which should "fill" gap of missing arguments for callable.

```php
$foos = [1, 2, 3];
$mapFoos = P::partial('\\array_map', [P::__, $foos]);
$mapFoos(function ($f) {
    return $f + 100;
}); // [100, 200, 300]
```

### Function composition

For function composition `phln` provides `pipe()` and `compose()` functions.

```php
$allFoos = P::pipe([
    P::filter(P::lte(5)),
    P::map(P::always('foo')),
]);

$firstFoo = P::compose([P::head(), $allFoos]);

$allFoos([4, 5, 6]); // ['foo', 'foo']
$firstFoo([4, 5, 6]); // 'foo'
```

### Using methods as references

Some of `phln` methods accept `callable` as an argument.

To pass another macro as a _reference_ call it without any arguments.

```php
$collection = [1, 2, 3, 4];
P::reduce(P::sum(), $collection); // 10
```

Also, you can use `P::raw()` method wich returns uncurried macro, or pointer to `Phln` method.

### Extending

`Baethon\Phln\Phln` is _macroable_. This means that it can be extened using `macro()` method:

```php
P::macro('foo', function () {
    return 'foo';
});

P::foo(); // 'foo'
```

### Note about objects

The library takes terminology from Ramda. In most cases, it's perfectly fine, until one gets to the concept of _object_.

Ramda treats _objects_ as dictionaries. In JavaScript, there's only one type which can act as a dictionary. It's ... `object`.

In PHP things get complicated. It's possible to use arrays and objects as dictionaries. This way `Phln` has to treat both of those types as an _object_.

For compatibility reason, all functions which return _object_ will return `array`.

## Testing

```bash
./vendor/bin/phpunit
```
