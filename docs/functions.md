# collection

## all
`(a -> Boolean) -> [a] -> Boolean`

Returns `true` if all elements of array match the predicate, `false` otherwise.



```php
$onlyTwos = P::all(P::equals(2));
$onlyTwos([1, 2, 2]); // false
```

## any
`(a -> Boolean) -> [a] -> Boolean`

Returns `true` if at least one of array elements match the predicate, `false` otherwise.



```php
$hasTwos = P::any(P::equals(2));
$hasTwos([1, 2, 3, 4]); // true
```

## append
`a -> [a] -> [a]`

Returns a new list containing the contents of the given list, followed by the given element.



```php
P::append(3, [1, 2]); // [1, 2, 3]
P::append([3], [1, 2]); // [1, 2, [3]]
```

## chunk
`Number -> [a] -> [[a]]`

Chunks an array into arrays with `size` elements.

The last chunk may contain less than `size` elements.

```php
P::chunk(2, [1, 2, 3, 4]); // [[1, 2], [3, 4]]
```

## collapse
`[[*], [*]] -> [*, *]`

Flattens array elements by one level



## concat
`[a] -> [a] -> [a]`

Returns the result of concatenating the given arrays.



```php
P::concat([1, 2], [3]); // [1, 2, 3]
```

## contains
`a -> [a] -> Boolean`

Returns `true` if the specified value is equal, `P::equals` terms,
to at least one element of the given list; `false` otherwise.



```php
P::contains(1, [1, 2, 3]); // true
```

## filter
`(a -> Boolean) -> [a] -> Boolean`

Filters elements of an array using a callback function



```php
P::filter(equals(1), [1, 2, 3]); // [1]
```

## find
`(a -> Boolean) -> [a] -> a`

Returns the first element of the list which matches the predicate,
or `null` if no element matches.



```php
$xs = [['a' => 1], ['a' => 2], ['a' => 3]];
P::find(equals(['a' => 1]), $xs); // ['a' => 1]
```

## flatMap
`(a -> b) -> [a] -> [b]`

Maps a function over list and concatenates results



```php
$duplicateElements = P::flatMap(function ($i) {
    return [$i, $i];
});

$duplicateElements([1, 2]); // [1, 1, 2, 2]
```

## head
`[a] -> a | Null`

Returns the first element of a given list



```php
P::head([1, 2, 3]); // 1
P::head([]); // null
```

## init
`[a] -> [a]`

Returns all but the last element of the given list.



```php
P::init([1, 2, 3]); // [1, 2]
P::init([1, 2]); // [1]
P::init([1]); // []
P::init([]); // []
```

## join
`String -> [a] -> String`

Returns a string made by inserting the separator between each element and concatenating all the elements into a single string.



```php
$spacer = P::join(' ');
$spacer([1, 2, 3]); // '1 2 3'
```

## last
`[a] -> a`

Returns the last element of the given list.



```php
P::last([1, 2, 3]); // 3
P::last([]); // null
```

## map
`(a -> b) -> [a] -> [b]`

Applies the callback to the elements of the given arrays



## mapIndexed
`((a, i) -> b) -> [a] -> [b]`

Applies the callback to the elements of the given arrays

Callback will receive index of iterated value as a second argument.

## none
`(a -> Boolean) -> [a] -> Boolean`

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

Returns the nth element of the given list or string.

If n is negative the element at index length - n is returned.

```php
P::nth(1, [1, 2, 3]); // 2
P::nth(-1, [1, 2, 3]); // 3
```

## pluck
`k -> [{k: v}] -> v`

Returns a new list by plucking the same named property off all objects in the list supplied.



```php
$list = [['a' => 1], ['a' => 2]];
P::pluck('a', $list); // [1, 2]
```

## prepend
`a -> [a] -> [a]`

Returns a new list with the given element at the front, followed by the contents of the list.



```php
P::prepend(3, [1, 2]); // [3, 1, 2]
P::prepend([3], [1, 2]); // [[3], 1, 2]
```

## range
`Integer a => a -> a -> [a]`

Returns a list of numbers from `from` (inclusive) to `to` (exclusive).



```php
P::range(0, 3); // [0, 1, 2]
```

## reduce
`((a, b) -> a) -> a -> [b] -> a`

Returns a single item by iterating through the list, successively calling the iterator function and passing it an accumulator value and the current value from the array, and then passing the result to the next call.

The iterator function receives two values: (`acc`, `value`).

```php
P::reduce(P::subtract, 0, [1, 2, 3, 4]);
// ((((0 - 1) - 2) - 3) - 4) => -10
```

## reject
`(a -> Boolean) -> [a] -> [a]`

The negation of `filter`.



```php
$isOdd = function ($i) {
    return $i % 2 === 1;
};
P::reject($isOdd, [1, 2, 3, 4]); // [2, 4]
```

## reverse
`[a] -> [a]`

Returns a new list with the elements in reverse order.



```php
P::reverse([1, 2, 3]); // [3, 2, 1]
```

## slice
`Integer -> Integer -> [a] -> [a]`

Extracts a slice of the array



```php
$takeTwo = P::slice(0, 2);
$takeTwo([1, 2, 3]); // [1, 2]
```

## sort
`((a, a) -> Number) -> [a] -> [a]`

Returns a copy of the list, sorted according to the comparator function, which should accept two values at a time and return a negative number if the first value is smaller, a positive number if it's larger, and zero if they are equal.



```php
$diff = function ($a, $b) {
    return $a - $b;
};

P::sort($diff, [3, 2, 1]); // [1, 2, 3]
```

## sortBy
`(a -> b) -> [a] -> [a]`

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

Returns all but the first element of the given list



```php
P::tail([1, 2, 3]); // [2, 3]
P::tail([1]); // []
P::tail([]); // []
```

## unique
`[a] -> [a]`

Returns a new list containing only one copy of each element in the original list. Strict comparision is used to determine equality.



```php
P::unique([3, 2, 1, 1, 3, 2]); // [3, 2, 1]
```

# function

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

## ap
`Apply f => f a ~> (a -> b) -> f b`

Applies function to functor.



```php
$some = Some(1);
ap($some, P::inc); // Some(2)
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
$subtractFive = P::partial(P::subtract, P::__, 5);
$subtractFive(10); // 5
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

## ƛand
`a -> b -> Boolean`

Returns `true` if both arguments are `true`-thy; `false` otherwise.

Sadly `and` keyword is reserved so this function has to be prefixed with `ƛ`

```php
\phln\login\ƛand(true, true); // true
```

## both
`(*... -> Boolean) -> (*... -> Boolean) -> (*... -> Boolean)`

A function which calls the two provided functions and returns the `&&` of the results.



```php
$gt10 = P::partial(P::gt, [P::__, 10]);
$lt20 = P::partial(P::lt, [P::__, 20]);
$f = P::both($gt10, $lt20);
$f(12); // true
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

A function wrapping calls to the two functions in an `||` operation, returning `true` if at least one of the functions will return truthy value.



```php
$lt10 = P::partial(P::lt, [P::__, 10]);
$gt20 = P::partial(P::gt, [P::__, 20]);
$f = P::either($lt10, $gt20);
$f(12); // false
$f(9); // true
$f(21); // true
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

## ƛor
`a -> b -> Boolean`

Returns `true` if one or both of its arguments are trueth-y. Returns `false` if both arguments are false-y.



```php
\phln\logic\ƛor(true, false); // true
```

# math

## add
`Number a => a -> a -> a`

Add two values



## dec
`Int a => a -> a`

Decrement its argument



## divide
`Number a => a -> a -> a`

Divide numbers. Equivalent of `a / b`



## inc
`Int a => a -> a`

Increment its argument



## mean
`Number a => [a] -> a`

Returns the mean of the given list of numbers.



```php
P::mean([2, 7, 9]) // 6
```

## median
`Number a => [a] -> a`

Returns the median of the given list of numbers.



```php
\\phln\\math\\median([7, 2, 9]) // 7
\\phln\\math\\median([7, 2, 10, 9]) // 8
```

## modulo
`Number a => a -> a -> a`

Divides the first parameter by the second and returns the remainder.



```php
\\phln\\math\\modulo(1, 2) // 1
```

## multiply
`Number a => a -> a -> a`

Multiplies two numbers



```php
$triple = P::multiply(3);
$triple(7); // 21
```

## product
`Number a => [a] -> a`

Multiplies together all the elements of a list.



```php
P::product([2, 4, 6, 8, 100, 1]); // 38400
```

## subtract
`Number a => a -> a -> a`

Subtracts its second argument from its first argument.



```php
$complementaryAngle = P::subtract(90);
$complementaryAngle(30); //=> 60
```

## sum
`[Number] -> Number`

Adds together all the elements of a list.



```php
P::sum([1, 2, 3, 4]); // 10
```

# object

## eqProps
`k -> {k: v} -> {k: v} -> Boolean`

Reports whether two objects have the same value, in `P::equals` terms, for the specified property.



```php
P::eqProps('name', ['name' => 'Jon'], ['name' => 'Jon']); // true
```

## keys
`{k: v} -> [k]`

Returns a list containing the names of array keys.



```php
P::keys(['a' => 1, 'b' => 1]); // ['a', 'b']
```

## merge
`{k: v} -> {k: v} -> {k: v}`

Create a new object with the keys of the first object merged with the keys of the second object. If a key exists in both objects, the value from the second object will be used.



```php
$toDefaults = P::partial(P::merge, [P::__, ['x' => 0]);
$toDefaults(['x' => 2, 'y' => 1]); // ['x' => 0, 'y' => 1]
```

## omit
`[String] -> {String: *} -> {String: *}`

Returns a partial copy of an object omitting the keys specified.



```php
P::omit(['a', 'c'], ['a' => 1, 'b' => 2, 'c' => 3]); // ['b' => 2]
```

## path
`String -> {k: v} -> v|Null`

Returns nested value using "dot notation".



```php
P::path('a.b', ['a' => ['b' => 'foo']]); // 'foo'
P::path('a.b.c', ['a' => ['b' => 'foo']]); // null
```

## pathOr
`String -> a -> {k: v} -> v | a`

Returns nested value using "dot notation". If key is not defined, or value is NULL default value will be returned.



```php
P::pathOr('a.b', 'foo', ['a' => ['b' => 1]]); // 1
P::pathOr('a.b', 'foo', ['a' => ['b' => 0]]); // 0
P::pathOr('a.b', 'foo', ['a' => ['b' => null]]); // 'foo'
P::pathOr('a.b', 'foo', ['a' => 1]); // 'foo'
```

## pick
`[String] -> {String: *} -> {String: *}`

Returns a partial copy of an object containing only the keys specified. If the key does not exist, the property is ignored.



```php
P::pick(['a'], ['a' => 1, 'b' => 2]); // ['a' => 1]
```

## prop
`k -> {k: v} -> v`

Returns a function that when supplied an array returns the indicated key of that key, if it exists.



## props
`[k] -> {k: v} -> [v]`

Acts as multiple `prop`: array of keys in, array of values out. Preserves order.



```php
$fullName = P::compose(P::join(' '), P::props(['firstName', 'lastName']));
$fullName(['lastName' => 'Snow', 'firstName' => 'Jon']); // 'Jon Snow'
```

## values
`{k: v} -> [v]`

Returns values of supplied object



## where
`{String: (* -> Boolean)} -> {String: *} -> Boolean`

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

Takes a spec object and a test object; returns `true` if the test satisfies the spec, false otherwise. An object satisfies the spec if, for each of the spec's properties, accessing that property of the object gives the same value (in `P::equals()` terms) as accessing that property of the spec.



```php
$verifyJon = P::whereEq(['firstName' => 'Jon', 'lastName' => 'Snow']);
$verifyJon(['firstName' => 'Jon', 'lastName' => 'Snow']); // true
```

# relation

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

# string

## concatString
`String -> String -> String`

Returns the result of concatenating the given strings.



```php
P::concatString('a', 'B'); // aB
```

## match
`RegExp -> String -> String|Null`
`RegExp -> String -> [String]`

Tests a regular expression against a String. Returns found string, or `NULL`. When regular expression has 'global' modifier function will return array of found strings.



```php
P::match('/([a-z](o))/i', 'Lorem ipsum dolor'); // 'Lo'
P::match('/([a-z](o))/ig', 'Lorem ipsum dolor'); // ['Lo', 'do', 'lo']
```

## regexp
`String -> RegExp`

Converts given string to RegExp object



```php
P::regexp('/foo/ig'); // => new \phln\RegExp('/foo/', 'ig');
```

## replace
`RegExp -> String -> String -> String`

Replace a regex match in a string with a replacement.

When regular expression has 'global' modifier all matching strings will be replaced.
Otherwise only first matching string will be replaced.

```php
P::replace('/foo/', 'bar', 'foo foo foo'); // 'bar foo foo'
P::replace('/foo/g', 'bar', 'foo foo foo'); // 'bar bar bar'
```

## split
`String -> String -> [String]`
`RegExp -> String -> [String]`

Splits a string into an array of strings based on the given regular expression or separator.

It's possible to split string

```php
P::split('/', 'a/b'); // ['a', 'b']
```

# type

## is
`String -> a -> Boolean`

See if `value` is of given `type`.

Internally this function uses `\gettype()` with few support of few aliases:
* `bool` - alias for `boolean` type
* `float` - alias for `double` type
* class FQN - will check if supplied object is instance of given class

```php
P::is('bool', true); // true
P::is(\stdClass::class, new \stdClass); // true
P::is(float, 1.1); // true
```

