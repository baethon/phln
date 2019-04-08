## Macros

All macros are located in `src/macros` directory. They're segregated by a namespace - a general "field" of their responsibility.

Each macro should be defined in a separated file. It's allowed to define macros _aliases_.

```php
use Baethon\Phln\Phln as P;

P::macro('foo', function () {
    return 'foo';
});

P::alias('bar', 'foo');
```

Every new macro should be added to `bundle.php` file which is responsible for loading them.

## CLI generator

It's possible to scaffold new macro by using `create:macro` command.

```bash
./bin/console.php create:macro math power
```

## Docs

Every new macro should be documented in Markdown docs located in `docs/` directory.
