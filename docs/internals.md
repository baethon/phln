# Phln internals

## Function file

Function should be defined in it's own file. In fact this file stores definition of two functions:

1. *main function* (the one which is exprted) - a simple wrapper for curried version of *𝑓 function*
2. *𝑓 function* - holds the main logic and typehinting of the function.

This structure is maintened only for *𝑓 function* with arity > 1.

For example, definition of `sum()` could look like this:

```php
function sum(int $a = null, int $b = null)
{
    return curryN(2, 𝑓sum, func_get_args());
}

function 𝑓sum(int $a, int $b): int
{
    return $a + $b;
}
```

Example has missing function constants. In such case there are also two defined constants:

1. *main const* - points to the wrapper
2. *𝑓 const* - points to *𝑓 function*; it's used mostly internally

```php
const sum = '\\phln\\math\\sum';
const 𝑓sum = '\\phln\\math\\𝑓sum';
```

# Adding new function - build pipeline

## Creating new function

First step is to create a new function. It can be done using `create:fn` command.

```bash
./bin/console.php create:fn namespace fnName
```

This command will generate from template function with test case.
Name of the function has to be unique in scope of all `phln` functions.

## Generating static wrapper

When function is done it should be added to `phln\Phln` class.
This class is result of `create:bundle` command so I suggest to use it to add newly created function.

```php
./bin/console.php create:bundle
```

## Generating docs

Some parts of docs are compiled from PHPDocs of functions defined in `phln\Phln` class.
To compile new version of docs (once the class is created) use `create:docs` command.

```php
./bin/console.php create:docs
```

# Testing

`phln` uses PHPUnit to run tests.

## About `Phln\Build\PhpUnit\TestCase`

`Phln\Build\PhpUnit\TestCase` allows to run test case in two different "contexts". By default it runs tests using main function. Combined with `TestBundleListener` it will be executed once again with "context" of `phln\Phln` class (test case will use appropriate method defined in `Phln`).

It exposes two methods:
1. `callFn(...$args)` - calls function from a given context and returns it's result
2. `getResolvedFn()` - returns "reference" for function from a given context

It's requires to define `getTestedFn()` method which should return "reference" to main function.

Due to some restrictions in PHPUnit `TestBundleListener` will generate, slightly odd, report:

```
...............................................................  63 / 250 ( 25%)
............................................................... 126 / 250 ( 50%)
............................................................... 189 / 250 ( 75%)
.............................................................   250 / 250 (100%).. 252 / 250 (100%)
............................................................... 315 / 250 (126%)
............................................................... 378 / 250 (151%)
............................................................... 441 / 250 (176%)
............................................
```

# Structure of PHPDoc

Every main function should have PHPDoc. Later it will be used to generate package documentation files.

It should contain summary (title), `@phlnSignature` and `@phlnCategory` tags.
Description and `@example` tag are optional, yet I suggest strongly to provide `@example`

`@phlnSignature` is [Hindley–Milner type system](https://en.wikipedia.org/wiki/Hindley%E2%80%93Milner_type_system) definition
