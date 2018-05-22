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

