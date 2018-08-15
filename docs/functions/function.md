## F
`* -> Boolean`

A function that always returns `false`. Any passed in parameters are ignored.



## T
`* -> Boolean`

A function that always returns `true`. Any passed in parameters are ignored.



## always
`a -> (* -> a)`

Returns a function that always returns the given value.

For non-primitives the value returned is a reference to the original value.

```php
$foo = P::always('foo');
$foo(); // 'foo'
```

## apply
`(*... -> a) -> [*] -> a`

Applies function `fn` to the argument list. This is useful for creating a fixed-arity function from a variadic function.



```php
P::apply(P::sum, [1, 2]); // 3
```

## arity
`(*... -> *) -> Number`

Takes a function and returns its arity.



```php
P::arity('var_dump'); // 1
```

## compose
`[((a, b, ..., n) -> o), (o -> p), ..., (x -> y), (y -> z)] -> (a, b, ..., n) -> z)`

Performs left-to-right function composition.

The leftmost function may have any arity; the remaining functions must be unary.

**Note**: The result of pipe is not automatically curried.

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
`Number -> (* → a) → (* → a)`

Returns a curried equivalent of the provided function, with the specified arity.

Curried function doesn't require providing arguments one at a time.
If `f` is a ternary function and `g` is `P::curryN(3, f)`, the following are equivalent.
     * g(1)(2)(3)
     * g(1)(2, 3)
     * g(1, 2)(3)
     * g(1, 2, 3)

## identity
`a -> a`

A function that does nothing but return the parameter supplied to it. Good as a default or placeholder function.



```php
P::identity(1) === 1; // 'true'
```

## negate
`(*... -> *) -> (*... -> Boolean)`

Creates a function that negates the result of the predicate.



```php
$isEven = function ($i) {
    return $i % 2 === 0;
};

P::filter(P::negate($isEven), [1, 2, 3, 4, 5, 6]); // [1, 3, 5]
```

## of
`a -> [a]`

Returns a singleton array containing the value provided.



```php
P::of(null); // [null]
P::of('a'); // ['a']
```

## once
`(a... -> b) -> (a... -> b)`

Accepts a function `fn` and returns a function that guards invocation of `fn` such that `fn` can only ever be called once, no matter how many times the returned function is invoked. The first value calculated is returned in subsequent invocations.



```php
$f = P::once('\rand');
$f(1, 100); // 4
$f(1, 100); // 4
$f(1, 100); // 4
```

## partial
`((a, b, c, ..., n) -> x) -> [a, b, c, ...] -> ((d, e, f, ..., n) -> x)`

Takes a function `f` and a list of arguments, and returns a function `g`.

When applied, `g` returns the result of applying `f` to the arguments provided initially followed by the arguments provided to `g`.

Special placeholder value `P::__` may be used to specify "gaps", allowing partial application of any combination of arguments, regardless of their positions.

```php
$subtractFive = P::partial(P::subtract, [P::__, 5]);
$subtractFive(10); // 5
```

## partialRight
`((a, b, c, d, ..., n) -> x) -> [d, ..., n] -> ((a, b, c) -> x)`

Takes a function `f` and a list of arguments, and returns a function `g`. When applied, `g` returns the result of applying `f` to the arguments provided initially followed by the arguments provided to `g`.



```php
$hello = function ($salutations, $name, $lastname) {
    return "{$salutations}, {$name} {$lastname}";
};

$f = P::partialRight($hello, ['Jon', 'Stark']);
$f('Hello'); // 'Hello, Jon Stark'
```

## pipe
`[((a, b, ..., n) -> o), (o -> p), ..., (x -> y), (y -> z)] -> (a, b, ..., n) -> z)`

Performs left-to-right function composition.

The leftmost function may have any arity; the remaining functions must be unary.

**Note**: The result of pipe is not automatically curried.

## swap
`(a -> b -> c -> ... -> z) -> (b -> a -> c -> ... -> z)`

Returns a new function much like the supplied one, except that the first two arguments' order is reversed.



```php
$serialize = function ($a, $b) {
    return "a:{$a},b:{$b}";
};
P::swap($serialize)(2, 1); // 'a:1,b:2'
```

## tap
`(a -> *) -> a -> a`

Runs the given function with the supplied object, then returns the object.



```php
$dump = P::tap('var_dump');
$dump('foo'); // var_dumps('foo'); returns 'foo'
```

## throwException
`(String, [*]) -> (*... -> Null)`

Returns callback which throws given exception.

*Note:* exceptions are considered as side-efects. Use it with caution.

```php
$break = P::throwException(\LogicException::class);
$break(); // -> throw new \LogicException()
```

## unapply
`([*...] -> a) -> (*... -> a)`

Takes a function `fn`, which takes a single array argument, and returns a function which:
* takes any number of positional arguments;
* passes these arguments to `fn` as an array and returns the result

In other words, `P::unapply` derives a variadic function from a function which takes an array. `P::unapply` is the inverse of `P::apply`.

```php
P::unapply('\\json_encode')(1, 2, 3); // [1,2,3]
```

