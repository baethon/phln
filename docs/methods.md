Below is list of `Phln` methods which are not considered as a macro. They cannot be referenced using `P::ref()` and they're not curried.

## alias
`(String, String) -> Null`

Creates an alias of a macro.

```php
P::alias('falsey', 'F');

P::falsey(); // false
```

## ref
`String -> (*... -> *)`

Returns an uncurried version of a macro.

```php
$sum = P::ref('sum');

$sum(1, 2); // 3
```

## arity
`(*... -> *) -> Number`

Takes a function and returns its arity.

```php
P::arity('var_dump'); // 1
```

For curried macros this method will always return `1`.

## curry
`(* → a) → (* → a)`

Returns a curried equivalent of the provided function.

Curried function doesn't require providing arguments one at a time.
If `f` is a ternary function and `g` is `P::curry(f)`, the following are equivalent.
     * g(1)(2)(3)
     * g(1)(2, 3)
     * g(1, 2)(3)
     * g(1, 2, 3)

## curryN
`(Number, (* → a)) → (* → a)`

Returns a curried equivalent of the provided function, with the specified arity.

Curried function doesn't require providing arguments one at a time.
If `f` is a ternary function and `g` is `P::curryN(3, f)`, the following are equivalent.
     * g(1)(2)(3)
     * g(1)(2, 3)
     * g(1, 2)(3)
     * g(1, 2, 3)

## macro
`(String, (* -> a)) -> Null`

Adds new macro to `Phln`.

## hasMacro
`String -> Boolean`

Checks if given macro (or it's alias) is defined.
