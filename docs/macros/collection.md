## all
`(a -> Boolean) -> [a] -> Boolean`

Added in: v1.0

Returns `true` if all elements of array match the predicate, `false` otherwise.



```php
$onlyTwos = P::all(P::equals(2));
$onlyTwos([1, 2, 2]); // false
```

## any
`(a -> Boolean) -> [a] -> Boolean`

Added in: v1.0

Returns `true` if at least one of array elements match the predicate, `false` otherwise.

```php
$hasTwos = P::any(P::equals(2));
$hasTwos([1, 2, 3, 4]); // true
```

## append
`a -> [a] -> [a]`
`String -> String -> String`

Added in: v1.0

Returns a new list containing the contents of the given list or string, followed by the given element.

```php
P::append(3, [1, 2]); // [1, 2, 3]
P::append([3], [1, 2]); // [1, 2, [3]]
P::append('foo', 'bar'); // 'barfoo'
```

## chunk
`Number -> [a] -> [[a]]`
`Number -> String -> [String]`

Added in: v1.0

Chunks an array or string into arrays with `size` elements.

The last chunk may contain less than `size` elements.

```php
P::chunk(2, [1, 2, 3, 4]); // [[1, 2], [3, 4]]
P::chunk(2, 'hello'); // ['he', 'll', 'o']
```

## collapse
`[[*], [*]] -> [*, *]`

Added in: v1.0

Flattens array elements by one level

## concat
`[a] -> [a] -> [a]`
`String -> String -> String`

Added in: v1.0

Returns the result of concatenating the given lists or strings.

Note: `P::concat` expects both arguments to be of the same type, otherwise it will throw an exception.

```php
P::concat([1, 2], [3]); // [1, 2, 3]
P::concat('foo', 'bar'); // 'foobar'
```

## contains
`a -> [a] -> Boolean`
`String -> String -> Boolean`

Added in: v1.0

Returns `true` if the specified value is equal, `P::equals` terms,
to at least one element of the given collection; `false` otherwise.

```php
P::contains(1, [1, 2, 3]); // true
P::contains('foo', 'foobar'); // true
```

## filter
`(a -> Boolean) -> [a] -> Boolean`

Added in: v1.0

Filters elements of an array using a callback function

```php
P::filter(equals(1), [1, 2, 3]); // [1]
```

## find
`(a -> Boolean) -> [a] -> a`

Added in: v1.0

Returns the first element of the list which matches the predicate,
or `null` if no element matches.

```php
$xs = [['a' => 1], ['a' => 2], ['a' => 3]];
P::find(equals(['a' => 1]), $xs); // ['a' => 1]
```

## flatMap
`(a -> b) -> [a] -> [b]`

Added in: v1.0

Maps a function over list and concatenates results

```php
$duplicateElements = P::flatMap(function ($i) {
    return [$i, $i];
});

$duplicateElements([1, 2]); // [1, 1, 2, 2]
```

## fromPairs
`[[k, v]] -> {k: v}`

Added in: v1.2

Creates a new key => value object from list of pairs.

```php
P::fromPairs([['foo', 1], ['bar', 2]]); // [ 'foo' => 1, 'bar' => 2 ]
```

## groupBy
`(a -> String) -> [a] -> { String: [a] }`

Added in: v1.2

Splits a list into sub-lists stored in an object, based on the result of calling a String-returning function on each element, and grouping the results according to values returned.

```php
P::groupBy(
    function (int $i) {
        return ($i % 2 === 0)
            ? 'even'
            : 'odd';
    },
    [1, 2, 3, 4]
); // ['odd' => [1, 3], 'even' => [2, 4]]
```

## head
`[a] -> a | Null`
`String -> String`

Added in: v1.0

Returns the first element of a given list or string

```php
P::head([1, 2, 3]); // 1
P::head([]); // null
P::head('foo'); // 'f'
P::head('f'); // ''
```

## init
`[a] -> [a]`
`String -> String`

Added in: v1.0

Returns all but the last element of the given array or string.

```php
P::init([1, 2, 3]); // [1, 2]
P::init([1, 2]); // [1]
P::init([1]); // []
P::init([]); // []

P::init('lorem'); // 'lore'
P::init('lo'); // 'l'
P::init('l'); // ''
P::init(''); // ''
```

## join
`String -> [a] -> String`

Added in: v1.0

Returns a string made by inserting the separator between each element and concatenating all the elements into a single string.

```php
$spacer = P::join(' ');
$spacer([1, 2, 3]); // '1 2 3'
```

## last
`[a] -> a` 
`String -> String`

Added in: v1.0

Returns the last element of the given list or string.

```php
P::last([1, 2, 3]); // 3
P::last([]); // null
P::last('foo'); // 'o'
P::last('f'); // 'f'
```

## length
`[a] -> Number` 
`String -> Number`

Added in: v1.0

Returns the number of elements in the array or string


```php
P::length('lorem'); // 5
```

## map
`(a -> b) -> [a] -> [b]`

Added in: v1.0

Applies the callback to the elements of the given arrays

## mapIndexed
`((a, i) -> b) -> [a] -> [b]`

Added in: v1.0

Applies the callback to the elements of the given arrays

Callback will receive index of iterated value as a second argument.

## none
`(a -> Boolean) -> [a] -> Boolean`

Added in: v1.0

Returns `true` if no elements of the list match the predicate, `false` otherwise.

```php
$isEven = function ($i) {
    return $i % 2 === 0;
};

P::none($isEven, [1, 3, 5]); // true
P::none($isEven, [1, 3, 5, 6]); // false
```

## nth
`Number -> [a] -> a | Null`

Added in: v1.0

Returns the nth element of the given list or string.

If n is negative the element at index length - n is returned.

```php
P::nth(1, [1, 2, 3]); // 2
P::nth(-1, [1, 2, 3]); // 3
```

## partition
`(a -> Bool) -> [a] -> [[a], [a]]`

Added in: v1.2

Takes a predicate and a collection and returns the pair of filterable objects of the same type of elements which do and do not satisfy, the predicate, respectively.

```php
P::partition(
    P::contains('foo'),
    ['foo bar', 'bar', 'foo']
); // [['foo bar', 'foo'], ['bar']]
```

## pluck
`k -> [{k: v}] -> v`

Added in: v1.0

Returns a new list by plucking the same named property off all objects in the list supplied.

```php
$list = [['a' => 1], ['a' => 2]];
P::pluck('a', $list); // [1, 2]
```

## prepend
`a -> [a] -> [a]` 
`String -> String -> String`

Added in: v1.0

Returns a new collection with the given element at the front, followed by the contents of the list or string.

```php
P::prepend(3, [1, 2]); // [3, 1, 2]
P::prepend([3], [1, 2]); // [[3], 1, 2]
P::prepend('foo', 'bar'); // [[3], 1, 2]
```

## range
`Integer a => a -> a -> [a]`

Added in: v1.0

Returns a list of numbers from `from` (inclusive) to `to` (exclusive).

```php
P::range(0, 3); // [0, 1, 2]
```

## reduce
`((a, b) -> a) -> a -> [b] -> a`

Added in: v1.0

Returns a single item by iterating through the list, successively calling the iterator function and passing it an accumulator value and the current value from the array, and then passing the result to the next call.

The iterator function receives two values: (`acc`, `value`).

```php
P::reduce(P::subtract, 0, [1, 2, 3, 4]);
// ((((0 - 1) - 2) - 3) - 4) => -10
```

## reject
`(a -> Boolean) -> [a] -> [a]`

Added in: v1.0

The negation of `filter`.

```php
$isOdd = function ($i) {
    return $i % 2 === 1;
};
P::reject($isOdd, [1, 2, 3, 4]); // [2, 4]
```

## reverse
`[a] -> [a]` 
`String -> String`

Added in: v1.0

Returns a new list or string with the elements in reverse order.

```php
P::reverse([1, 2, 3]); // [3, 2, 1]
P::reverse('foo'); // 'oof'
```

## slice
`Integer -> Integer -> [a] -> [a]` 
`Integer -> Integer -> String -> String`

Added in: v1.0

Extracts a slice of the array or string

```php
$takeTwo = P::slice(0, 2);
$takeTwo([1, 2, 3]); // [1, 2]
```

## sort
`((a, a) -> Number) -> [a] -> [a]`

Added in: v1.0

Returns a copy of the list, sorted according to the comparator function, which should accept two values at a time and return a negative number if the first value is smaller, a positive number if it's larger, and zero if they are equal.

```php
$diff = function ($a, $b) {
    return $a - $b;
};

P::sort($diff, [3, 2, 1]); // [1, 2, 3]
```

## sortBy
`(a -> b) -> [a] -> [a]`

Added in: v1.0

Sorts the list according to the supplied function.

```php
$alice = ['name' => 'alice'];
$bob = ['name' => 'bob'];
$clara = ['name' => 'clara'];
$people = [$bob, $clara, $alice];

P::soryBy(P::prop('name'), $people); // [$alice, $bob, $clara]
```

## tail
`[a] -> [a]` 
`String -> String`

Added in: v1.0

Returns all but the first element of the given array or string

```php
P::tail([1, 2, 3]); // [2, 3]
P::tail([1]); // []
P::tail([]); // []
P::tail('lorem'); // 'orem'
P::tail('l'); // ''
P::tail(''); // ''
```

## unique
`[a] -> [a]`

Added in: v1.0

Returns a new list containing only one copy of each element in the original list. Strict comparision is used to determine equality.

```php
P::unique([3, 2, 1, 1, 3, 2]); // [3, 2, 1]
```
