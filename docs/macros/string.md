## match
`RegExp -> String -> String|Null`  
`RegExp -> String -> [String]`

Added in: v1.0

Tests a regular expression against a String. Returns found string, or `NULL`. When regular expression has 'global' modifier function will return array of found strings.

If regular expression contains groups `match()` will return only matching groups (in an order defined in regular expression).

```php
P::match('/([a-z](o))/i', 'Lorem ipsum dolor'); // 'Lo'
P::match('/([a-z](o))/ig', 'Lorem ipsum dolor'); // ['Lo', 'do', 'lo']
P::match('/return (\w)/', 'return integer'); // 'integer'
```

## regexp
`String -> RegExp`

Added in: v1.0

Converts given string to RegExp object

```php
P::regexp('/foo/ig'); // => new \phln\RegExp('/foo/', 'ig');
```

## replace
`RegExp -> String -> String -> String`

Added in: v1.0

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

Added in: v1.0

Splits a string into an array of strings based on the given regular expression or separator.

It's possible to split string

```php
P::split('/', 'a/b'); // ['a', 'b']
```

## test
`RegExp -> String -> Bool`  
`String -> String -> Bool`

Added in: v1.2

Determines whether a given string matches a given regular expression.

```php
P::test('/foo/', 'foobar'); // true
```
