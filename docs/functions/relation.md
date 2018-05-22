## clamp
`Number a => a -> a -> a -> a`

Restricts a number to be within a range.



```php
P::clamp(-1, 1, -100); // -1
P::clamp(-1, 1, 100); // 1
P::clamp(-1, 1, 0); // 0
```

## difference
`[*] -> [*] -> [*]`

Finds the set (i.e. no duplicates) of all elements in the first list not contained in the second list.



```php
P::difference([1, 2, 3, 4], [3, 4, 5, 6]); // [1, 2]
```

## equals
`a -> b -> Boolean`

Returns `true` if its arguments are equivalent, `false` otherwise.



```php
P::equals(1, 1); // true
P::equals(1, '1'); // false
P::equals(1, 2); // false
```

## gt
`Ord a => a -> a -> Boolean`

Returns `true` if the first argument is greater than the second; `false` otherwise.



```php
P::gt(2, 1); // true
```

## gte
`Ord a => a -> a -> Boolean`

Returns `true` if the first argument is greater than or equal to the second; `false` otherwise.



```php
P::gte(2, 1); // true
P::gte(2, 2); // true
P::gte(2, 3); // false
```

## intersection
`[*] -> [*] -> [*]`

Combines two lists into a set composed of those elements common to both lists.



```php
P::intersection([1, 2, 3, 4], [6, 4, 5]); // [4]
```

## lt
`Ord a => a -> a -> Boolean`

Returns `true` if the first argument is less than the second; `false` otherwise.



```php
P::lt(1, 2); // true
P::lt(3, 2); // false
P::lt(2, 2); // false
```

## lte
`Ord a => a -> a -> Boolean`

Returns `true` if the first argument is less than or equal to the second; `false` otherwise.



```php
P::lte(1, 2); // true
```

## max
`a -> a -> a`

Returns the larger of its two arguments.



## min
`a -> a -> a`

Returns the smaller of its two arguments.



```php
P::min(1, -1); // -1
```

## pathEq
`String -> a -> {a} -> Boolean`

Determines whether a nested path on an object has a specific value, in `equals()` terms.



```php
P::pathEq('foo.bar', 1, ['foo' => ['bar' => 1]]); // true
```

## propEq
`k -> a -> {k: a} -> Boolean`

Returns `true` if the specified object property is equal, in `equals()` terms, to the given value; `false` otherwise.



```php
P::propEq('name', 'Jon', ['name' => 'Jon']); // true
```

