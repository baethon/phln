## is
`String -> a -> Boolean`

See if `value` is of given `type`.

Internally this function uses `\gettype()` with few support of few aliases:
* `bool` - alias for `boolean` type
* `float` - alias for `double` type
* `callable` - checks if $value is valid callback
* `function` - same as `callable`
* class FQN - will check if supplied object is instance of given class

```php
P::is('bool', true); // true
P::is(\stdClass::class, new \stdClass); // true
P::is(float, 1.1); // true
```

## typeCond
`[[String, (*... -> *)]] -> (*... -> *)`

Returns a function, `fn`, which encapsulates `if/else`, `if/else`, .

.. logic. `P::typeCond` takes a list of [`type`, `transformer`] pairs. Type is converted to `predicate` matching type of variable (in terms of `P::is()`). All of the arguments to `fn` are applied to each of the `predicates` in turn until one returns a truth-y value, at which point `fn` returns the result of applying its arguments to the corresponding `transformer`. If none of the `predicates` matches, `fn` returns null.

```php
$count = P::typeCond([
    ['string', '\\mb_strlen'],
    ['array', '\\count'],
    [P::T, P::always(0)],
]);
$count('foo'); // 3
$count(['f', 'o', 'o']); // 3
$count(new stdClass); // 0
```

