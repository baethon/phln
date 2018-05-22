# logic

## allPass
`[(*... -> Boolean) -> *... -> Boolean`  

Takes a list of predicates and returns a predicate that returns `true` for a given list of arguments if every one of the provided predicates is satisfied by those arguments.

The function returned is a curried function whose arity matches that of the highest-arity predicate.

```php
$ace = P::propEq('rank', 'A');
$spades = P::propEq('suit', '♠︎');
$aceOfSpades = P::allPass([$ace, $spades]);
$aceOfSpades(['rank' => 'A', 'suit' => '♠︎']); // true
```

## both
`(*... -> Boolean) -> (*... -> Boolean) -> (*... -> Boolean)`  
`Boolean -> Boolean -> Boolean`  

Returns `true` when both of two provided values are truthy.

This function is polymorphic and supports two cases:
1. when both values are predicates it will return wrapper function which call to the two functions in an `&&` operation, returning `true` if both of the functions will return truthy value.
2. when both values are booleans it will return result of `&&` operation

```php
$gt10 = P::partial(P::gt, [P::__, 10]);
$lt20 = P::partial(P::lt, [P::__, 20]);
$f = P::both($gt10, $lt20);
$f(12); // true
P::both(true, false); // false
```

## cond
`[[(*… → Boolean),(*… → *)]] → (*… → *)`  

Returns a function, `fn`, which encapsulates `if/else`, `if/else`, .

.. logic. `P::cond` takes a list of [`predicate`, `transformer`] pairs. All of the arguments to `fn` are applied to each of the `predicates` in turn until one returns a truth-y value, at which point `fn` returns the result of applying its arguments to the corresponding `transformer`. If none of the `predicates` matches, `fn` returns null.

```php
$fn = P::cond([
    [P::equals(0), P::always('water freezes at 0°C')],
    [P::equals(100), P::always('water boils at 100°C')],
    [P::T, function(temp) {
        return 'nothing special happens at ' + temp + '°C';
    }]
]);

$fn(0); //=> 'water freezes at 0°C'
$fn(50); //=> 'nothing special happens at 50°C'
$fn(100); //=> 'water boils at 100°C'
```

## defaultTo
`a -> b -> b | a`  

Returns the second argument if it is not `null`; otherwise the first argument is returned.



```php
P::defaultTo(42, null); // 42
P::defaultTo(42, 'life'); // 'life'
```

## either
`(*... -> Boolean) -> (*... -> Boolean) -> (*... -> Boolean)`  
`Boolean -> Boolean -> Boolean`  

Returns `true` when one of two provided values is truthy.

This function is polymorphic and supports two cases:
1. when both values are predicates it will return wrapper function which call to the two functions in an `||` operation, returning `true` if at least one of the functions will return truthy value.
2. when both values are booleans it will return result of `||` operation

```php
$lt10 = P::partial(P::lt, [P::__, 10]);
$gt20 = P::partial(P::gt, [P::__, 20]);
$f = P::either($lt10, $gt20);
$f(12); // false
$f(9); // true
$f(21); // true
P::either(true, false); // true
```

## ifElse
`(*... -> Boolean) -> (*... -> *) -> (*... -> *) -> (*... -> *)`  

Creates a function that will process either the `onTrue` or the `onFalse` function depending upon the result of the condition predicate.



```php
$modulo15 = P::swap(P::modulo)(15);
$fizzbuzz = P::ifElse(
    P::compose(P::equals(0), $modulo15),
    P::always('fizzbuzz'),
    P::identity
);

$fizzbuzz(15); // 'fizzbuzz'
$fizzbuzz(1); // 1
```

## isEmpty
`a -> Boolean`  

Returns `true` if the given value is its type's empty value; `false` otherwise.

*Note* unlike `\empty()` this function will consider numbers, booleans and NULL as non-empty.

```php
P::isEmpty(''); // true
P::isEmpty([]); // true
P::isEmpty(new stdClass); // true
P::isEmpty(0); // false
P::isEmpty(null); // false
P::isEmpty(false); // false
P::isEmpty(true); // false
```

## not
`* -> Boolean`  

A function that returns the `!` of its argument. It will return `true` when passed false-y value, and `false` when passed a truth-y one.



```php
P::not(0); // true
P::not(true); // false
```

