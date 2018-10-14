## Macros

All macros are located in `src/macros` directory. They're segregated by a namespace - a general "field" of their responsibility.

Each macro should be defined in a separated file. It's allowed to define macros _aliases_.
Macros are not namespaced so it's required that they don't leave any global variables declarations.

This shouldn't happen:

```php
use Baethon\Phln\Phln as P;

$fn = function () {};

P::macro('foo', function () use ($fn) {
    return $fn;
});
```

yet it's allowed to "scope" macro's definition by using self-calling closures:

```php
use Baethon\Phln\Phln as P;

call_user_func(function () {
    $fn = function () {};

    P::macro('foo', function () use ($fn) {
        return $fn;
    });
});
```

Every new macro should be added to `bundle.php` file which is responsible for loading them.

## CLI generator

It's possible to scaffold new macro by using `create:macro` command.

```bash
./bin/console.php create:macro math power
```

## Docs

Every new macro should be documented in Markdown docs located in `docs/` directory.
