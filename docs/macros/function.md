## F
`* -> (* -> Boolean)`

Added in: v1.0

Returns a function that always returns `false`.

## T
`* -> (* -> Boolean)`

Added in: v1.0

Returns a function that always returns `true`.

## always
`a -> (* -> a)`

Added in: v1.0

Returns a function that always returns the given value.

For non-primitives the value returned is a reference to the original value.

```php
$foo = P::always('foo');
$foo(); // 'foo'
```

## apply
`(*... -> a) -> [*] -> a`

Added in: v1.0

Applies function `fn` to the argument list. This is useful for creating a fixed-arity function from a variadic function.

```php
P::apply(P::sum, [1, 2]); // 3
```

## compose
`[((a, b, ..., n) -> o), (o -> p), ..., (x -> y), (y -> z)] -> (a, b, ..., n) -> z)`

Added in: v1.0

Performs left-to-right function composition.

The leftmost function may have any arity; the remaining functions must be unary.

**Note**: The result of pipe is not automatically curried.

## identity
`a -> a`

Added in: v1.0

A function that does nothing but return the parameter supplied to it. Good as a default or placeholder function.

```php
P::identity(1) === 1; // 'true'
```

## invoker
`Int -> String -> (a -> b -> c -> ... -> n -> Object -> *)`

Added in: v1.2

Turns a named method with a specified arity into a function that can be called directly supplied with arguments and a target object.

The returned function is curried and accepts `arity + 1` parameters where the final parameter is the target object.

```php
$greeter = new class ()
{
    public function hello($name, $lastname)
    {
        return "Hello, {$name} {$lastname}!";
    }
};

$helloToJon = P::invoker(2, 'hello')('Jon');
$helloToJon('Snow'); // 'Hello, Jon Snow!'
```

## negate
`(*... -> *) -> (*... -> Boolean)`

Added in: v1.0

Creates a function that negates the result of the predicate.

```php
$isEven = function ($i) {
    return $i % 2 === 0;
};

P::filter(P::negate($isEven), [1, 2, 3, 4, 5, 6]); // [1, 3, 5]
```

## of
`a -> [a]`

Added in: v1.0

Returns a singleton array containing the value provided.

```php
P::of(null); // [null]
P::of('a'); // ['a']
```

## once
`(a... -> b) -> (a... -> b)`

Added in: v1.0

Accepts a function `fn` and returns a function that guards invocation of `fn` such that `fn` can only ever be called once, no matter how many times the returned function is invoked. The first value calculated is returned in subsequent invocations.

```php
$f = P::once('\rand');
$f(1, 100); // 4
$f(1, 100); // 4
$f(1, 100); // 4
```

## partial
`((a, b, c, ..., n) -> x) -> [a, b, c, ...] -> ((d, e, f, ..., n) -> x)`

Added in: v1.0

Takes a function `f` and a list of arguments, and returns a function `g`.

When applied, `g` returns the result of applying `f` to the arguments provided initially followed by the arguments provided to `g`.

Special placeholder value `P::__` may be used to specify "gaps", allowing partial application of any combination of arguments, regardless of their positions.

```php
$subtractFive = P::partial(P::subtract, [P::__, 5]);
$subtractFive(10); // 5
```

## partialRight
`((a, b, c, d, ..., n) -> x) -> [d, ..., n] -> ((a, b, c) -> x)`

Added in: v1.2

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

Added in: v1.0

Performs left-to-right function composition.

The leftmost function may have any arity; the remaining functions must be unary.

**Note**: The result of pipe is not automatically curried.

## swap
`(a -> b -> c -> ... -> z) -> (b -> a -> c -> ... -> z)`

Added in: v1.0

Returns a new function much like the supplied one, except that the first two arguments' order is reversed.

```php
$serialize = function ($a, $b) {
    return "a:{$a},b:{$b}";
};
P::swap($serialize)(2, 1); // 'a:1,b:2'
```

## tap
`(a -> *) -> a -> a`

Added in: v1.0

Runs the given function with the supplied object, then returns the object.

```php
$dump = P::tap('var_dump');
$dump('foo'); // var_dumps('foo'); returns 'foo'
```

## throwException
`String -> [*] -> (*... -> Null)`

Added in: v1.0

Returns callback which throws given exception.

*Note:* exceptions are considered as side-efects. Use it with caution.

```php
$break = P::throwException(\LogicException::class, []);
$break(); // -> throw new \LogicException()
```

## unapply
`([*...] -> a) -> (*... -> a)`

Added in: v1.0

Takes a function `fn`, which takes a single array argument, and returns a function which:
* takes any number of positional arguments;
* passes these arguments to `fn` as an array and returns the result

In other words, `P::unapply` derives a variadic function from a function which takes an array. `P::unapply` is the inverse of `P::apply`.

```php
P::unapply('\\json_encode')(1, 2, 3); // [1,2,3]
```

## nAry
`Number -> (* -> a) -> (* -> a)`

Added in: v2.0

Wraps a function of any arity (including nullary) in a function that accepts exactly n parameters. Any extraneous parameters will not be passed to the supplied function.

```php
P::nAry(2, function (...$args) {
    return $args;
})(1, 2, 3, 4); // [1, 2]
```

## unary
`Number -> (* -> b) -> (a -> b)`

Added in: v2.0

Wraps a function of any arity (including nullary) in a function that accepts exactly 1 parameter. Any extraneous parameters will not be passed to the supplied function.

```php
P::unary(function (...$args) {
    return $args;
})(1, 2, 3, 4); // [1]
```

## binary
`Number -> (* -> c) -> ((a, b) -> c)`

Added in: v2.0

Wraps a function of any arity (including nullary) in a function that accepts exactly 2 parameters. Any extraneous parameters will not be passed to the supplied function.


```php
P::binary(function (...$args) {
    return $args;
})(1, 2, 3, 4); // [1, 2]
```
