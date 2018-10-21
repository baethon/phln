## eqProps
`k -> {k: v} -> {k: v} -> Boolean`

Added in: v1.0

Reports whether two objects have the same value, in `P::equals` terms, for the specified property.

```php
P::eqProps('name', ['name' => 'Jon'], ['name' => 'Jon']); // true
```

## keys
`{k: v} -> [k]`

Added in: v1.0

Returns a list containing the names of array keys.

```php
P::keys(['a' => 1, 'b' => 1]); // ['a', 'b']
```

## merge
`{k: v} -> {k: v} -> {k: v}`

Added in: v1.0

Create a new object with the keys of the first object merged with the keys of the second object. If a key exists in both objects, the value from the second object will be used.

```php
$toDefaults = P::partial(P::merge, [P::__, ['x' => 0]);
$toDefaults(['x' => 2, 'y' => 1]); // ['x' => 0, 'y' => 1]
```

## objOf
`String -> a -> { String: a }`

Added in: v1.2

Creates an object containing a single key:value pair.

```php
P::objOf('foo', 'bar'); // ['foo' => 'bar']
```

## omit
`[String] -> {String: *} -> {String: *}`

Added in: v1.0

Returns a partial copy of an object omitting the keys specified.

```php
P::omit(['a', 'c'], ['a' => 1, 'b' => 2, 'c' => 3]); // ['b' => 2]
```

## path
`String -> {k: v} -> v|Null`

Added in: v1.0

Returns nested value using "dot notation".

```php
P::path('a.b', ['a' => ['b' => 'foo']]); // 'foo'
P::path('a.b.c', ['a' => ['b' => 'foo']]); // null
```

## pathOr
`String -> a -> {k: v} -> v | a`

Added in: v1.0

Returns nested value using "dot notation". If key is not defined, or value is NULL default value will be returned.

```php
P::pathOr('a.b', 'foo', ['a' => ['b' => 1]]); // 1
P::pathOr('a.b', 'foo', ['a' => ['b' => 0]]); // 0
P::pathOr('a.b', 'foo', ['a' => ['b' => null]]); // 'foo'
P::pathOr('a.b', 'foo', ['a' => 1]); // 'foo'
```

## pick
`[String] -> {String: *} -> {String: *}`

Added in: v1.0

Returns a partial copy of an object containing only the keys specified. If the key does not exist, the property is ignored.

```php
P::pick(['a'], ['a' => 1, 'b' => 2]); // ['a' => 1]
```

## prop
`k -> {k: v} -> v`

Added in: v1.0

Returns a function that when supplied an array returns the indicated key of that key, if it exists.

## props
`[k] -> {k: v} -> [v]`

Added in: v1.0

Acts as multiple `prop`: array of keys in, array of values out. Preserves order.

```php
$fullName = P::compose(P::join(' '), P::props(['firstName', 'lastName']));
$fullName(['lastName' => 'Snow', 'firstName' => 'Jon']); // 'Jon Snow'
```

## toPairs
`String k => { k: v } -> [[k, v]]`

Added in: v1.2

Converts an object into an array of key-value arrays.

Note that order of output is not guaranteed.

```php
P::toPairs(['foo' => 1, 'bar' => 2]); // [['foo', 1], ['bar', 2]]
```

## values
`{k: v} -> [v]`

Added in: v1.0

Returns values of supplied object

## where
`{String: (* -> Boolean)} -> {String: *} -> Boolean`

Added in: v1.0

Takes a spec object and a test object; returns `true` if the test satisfies the spec. Each of the spec's properties must be a predicate function. Each predicate is applied to the value of the corresponding property of the test object. where returns `true` if all the predicates return true, false otherwise.

`where` is well suited to declaratively expressing constraints for other functions such as `filter` and `find`.

```php
$verifyJon = P::where([
    'firstName' => P::equals('Jon'),
    'lastName' => P::equals('Snow'),
]);

$verifyJon(['firstName' => 'Jon', 'lastName' => 'Snow', 'house' => 'Stark']); // true
```

## whereEq
`{String: *} -> {String: *} -> Boolean`

Added in: v1.0

Takes a spec object and a test object; returns `true` if the test satisfies the spec, false otherwise. An object satisfies the spec if, for each of the spec's properties, accessing that property of the object gives the same value (in `P::equals()` terms) as accessing that property of the spec.

```php
$verifyJon = P::whereEq(['firstName' => 'Jon', 'lastName' => 'Snow']);
$verifyJon(['firstName' => 'Jon', 'lastName' => 'Snow']); // true
```
