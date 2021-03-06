## assoc
`String -> a -> {k: v} -> {k: v}`

Added in: v2.1

Makes a shallow clone of an object, setting or overriding the specified property with the given value. All non-primitive properties are copied by reference.

```php
P::assoc('b', 2, ['a' => 1]); // ['a' => 1, 'b' => 2]
```

## assocPath

`String -> a -> {k: v} -> {k: v}`

Added in: v2.1

Makes a shallow clone of an object, setting or overriding the nodes required to create the given path, and placing the specific value at the tail end of that path. Note that this makes shallow copy of each node of the given path. For missing nodes `assocPath` will create an array.

```php
P::assocPath(
    'a.b.c',
    'foo',
    ['a' => []]
); // ['a' => ['b' => ['c' => 'foo']]]
```

## eqProps
`k -> {k: v} -> {k: v} -> Boolean`

Added in: v1.0

Reports whether two objects have the same value, in `P::equals` terms, for the specified property.

```php
P::eqProps('name', ['name' => 'Jon'], ['name' => 'Jon']); // true
```

## has
`k -> {k: v} -> Boolean`

Returns whether or not an object has a property with the specified name.

```php
P::has('foo', ['foo' => 1]); // true
```

## hasMethod
`String -> Object -> Boolean`

Checks if given object has a method. Returs `true` only when method is defined and public.  
Opposite to `method_exists()` and `is_callable()` macro will not treat `__call()` as a valid method.

```php
P::hasMethod('test', new stdClass()); // false
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


## lens
`(s -> a) -> ((a, s) -> s) -> Lens s a`  
`Lens s a = Functor f => (a -> f a) -> s -> f s`

Added in: v2.1

Returns a lens for the given getter and setter functions. The getter "gets" the value of the focus; the setter "sets" the value of the focus. The setter should not mutate the data structure.

```php
$xLens = P::lens(P::prop('x'), P::assoc('x'));

P::view($xLens, ['x' => 1, 'y' => 2]); // 1
P::set($xLens, 4, ['x' => 1, 'y' => 2]); // ['x' => 4, 'y' => 2]
P::over($xLens, P::inc(), ['x' => 1, 'y' => 2]); // ['x' => 2, 'y' => 2]
```

## lensPath
`String -> Lens s a`  
`Lens s a = Functor f => (a -> f a) -> s -> f s`

Added in: v2.1

Returns a lens whose focus is the specified path.

```php
$lens = P::lensPath('foo.bar');
$input = ['foo' => ['bar' => 1]];

P::view($lens, $input); // 1
P::over($lens, P::inc(), $input); // ['foo' => ['bar' => 2]]
P::set($lens, 2, $input); // ['foo' => ['bar' => 2]]
```

## lensProp
`String -> Lens s a`  
`Lens s a = Functor f => (a -> f a) -> s -> f s`

Added in: v2.1

Returns a lens whose focus is the specified property.

```php
$lens = P::lensProp('name');
$input = ['name' => 'Jon'];

P::view($lens, $input); // 'Jon'
P::over($lens, P::always('Array'), $input); // ['name' => 'Array']
P::set($lens, 'Array', $input); // ['name' => 'Array']
```

## set
`Lens s a -> a -> s -> s`  
`Lens s a = Functor f => (a -> f a) -> s -> f s`

Added in: v2.1

Returns the result of "setting" the portion of the given data structure focused by the given lens to the given value.

```php
$xLens = P::lensProp('x');

P::set($xLens, 4, ['x' => 1, 'y' => 2]);  // ['x' => 4, 'y' => 2]
P::set($xLens, 8, ['x' => 1, 'y' => 2]);  // ['x' => 8, 'y' => 2]
```

## view
`Lens s a -> s -> a`  
`Lens s a = Functor f => (a -> f a) -> s -> f s`

Added in: v2.1

Returns a "view" of the given data structure, determined by the given lens. The lens's focus determines which portion of the data structure is visible.

```php
$xLens = P::lensProp('x');

P::view($xLens, ['x' => 1, 'y' => 2]);  // 1
P::view($xLens, ['x' => 4, 'y' => 2]);  // 4
```

## over
`Lens s a -> (a -> a) -> s -> s`  
`Lens s a = Functor f => (a -> f a) -> s -> f s`

Added in: v2.1

Returns the result of "setting" the portion of the given data structure focused by the given lens to the result of applying the given function to the focused value.

```php
$headLens = P::lensIndex(0);

P::over($headLens, P::always('FOO'), ['foo', 'bar', 'baz']); // ['FOO', 'bar', 'baz']
```
