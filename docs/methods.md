Below is list of `Phln` methods which are not considered as a macro.

## alias
`(String, String) -> Null`

Added in: v2.0

Creates an alias of a macro.

```php
P::alias('falsey', 'F');

P::falsey(); // false
```

## raw
`String -> (*... -> *)`

Added in: v2.0

Returns an uncurried version of a macro or a reference to one of `Phln` methods.

```php
$sum = P::raw('sum');
$arity = P::raw('arity');

$sum(1, 2); // 3
$arity($sum); // 2
```

## arity
`(*... -> *) -> Number`

Added in: v1.0

Takes a function and returns its arity.

```php
P::arity('var_dump'); // 1
```

For curried macros this method will always return `1`.

## curry
`(* → a) → (* → a)`

Added in: v1.0

Returns a curried equivalent of the provided function.

Curried function doesn't require providing arguments one at a time.
If `f` is a ternary function and `g` is `P::curry(f)`, the following are equivalent.

* `g(1)(2)(3)`
* `g(1)(2, 3)`
* `g(1, 2)(3)`
* `g(1, 2, 3)`

## curryN
`(Number, (* → a)) → (* → a)`

Added in: v1.0

Returns a curried equivalent of the provided function, with the specified arity.

Curried function doesn't require providing arguments one at a time.
If `f` is a ternary function and `g` is `P::curryN(3, f)`, the following are equivalent.

* `g(1)(2)(3)`
* `g(1)(2, 3)`
* `g(1, 2)(3)`
* `g(1, 2, 3)`

## macro
`(String, (* -> a)) -> Null`

Added in: v2.0

Adds new macro to `Phln`.

## hasMacro
`String -> Boolean`

Added in: v2.0

Checks if given macro (or it's alias) is defined.
