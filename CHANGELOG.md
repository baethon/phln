# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Changed

- refactored docs

## [2.1.0]

### Added

- macros:
    * `lens()`
    * `lensIndex()`
    * `lensPath()`
    * `lensProp()`
    * `update()`
    * `assoc()`
    * `assocPath()`
    * `has()`
    * `over()`
    * `set()`
    * `view()`
- `Constant` monad
- `Identity` monad
- `Duck` type matcher

### Changed

- `map()` will support functors

### Fixed

- Tests: check if assertions are enabled

## [2.0.0]

### Added

- support for macros in `Phln`
- `P::nAry()` / `P::unary()` / `P::binary()`
- `Baethon\Phln\CurriedFn`
- `Baethon\Phln\FixedArityInterface` (supported by `P::arity()`)
- `P::raw()`

### Changed

- converted standalone functions to macros
- `P::T()` / `P::F()` returns a function (which returns boolean)
- `P::curry()` returns instance of `Baethon\Phln\CurriedFn`

### Removed

- **support for PHP 7.0**
- standalone functions (eg. `phln\math\sum`) and their constant references

## [1.2.0] - 2018-10-20

### Added

- `object\objOf()` ([338519c](https://github.com/baethon/phln/commit/338519c772aead989252dadab68f94bbe2edab06))
- `object\toParis()` ([e3e93a5](https://github.com/baethon/phln/commit/e3e93a542cb49890ac9eb57ae66e0a178e092cd3))
- `collection\fromPairs()` ([e3e93a5](https://github.com/baethon/phln/commit/e3e93a542cb49890ac9eb57ae66e0a178e092cd3))
- verification of function uniqueness in `create:fn` command ([322b1f4](https://github.com/baethon/phln/commit/322b1f48b41376f628bfa416c4481115d09dfce4))
- `string\test()` ([8f603af](https://github.com/baethon/phln/commit/8f603af))
- `fn\partialRight()` ([00c1006](https://github.com/baethon/phln/commit/00c1006))
- `RegExp::of()` ([75d39ea](https://github.com/baethon/phln/commit/75d39ea))
- `fn\invoker()` ([08f4710](https://github.com/baethon/phln/commit/08f4710))
- `collection\partition()` ([fbc618f](https://github.com/baethon/phln/commit/fbc618f))
- `create:fn` will create dummy docblock for created function ([7a6ed40](https://github.com/baethon/phln/commit/7a6ed40))
- `collection\groupBy()` ([cee12df](https://github.com/baethon/phln/commit/cee12df))

### Changed

- *BREAKING CHANGE* removed `nil`
- *POSSIBLE BREAKING CHANGE* `string\match()` returns matching group (if defined) ([8f1f904](https://github.com/baethon/phln/commit/8f1f904))
- updated PHPUnit to `^6.5`
- added PHP 7.2 to Travis env
- support `object` type in functions from `object` namespace ([2db4d73](https://github.com/baethon/phln/commit/2db4d73aa3ed2389c14c61271463e358c93cd594))
- moved docs to Github Pages
- `Phln` will use `__staticCall` to call one of defined methods ([34e6c02](https://github.com/baethon/phln/commit/34e6c02))

### Fixed

- `collection\length()` will support `countable` objects ([588e10f](https://github.com/baethon/phln/commit/588e10f))

### Removed

- **BREAKING CHANGE** `nil` references ([07d7d82](https://github.com/baethon/phln/commit/07d7d82d93e1654bd32c7ab0d0dc8523e0b8e5a2))

## [1.1.0] - 2017-07-10

### Changed

- `phln\type\is()` supports `callable` type check
- `phln\logic\both()` supports primitive values; when provided it will return primitive value
- `phln\logic\either()` supports primitive values; when provided it will return primitive value

### Removed

- `phln\logic\ƛand()`
- `phln\logic\ƛor()`

[Unreleased]: https://github.com/baethon/phln/compare/2.1.0...HEAD
[1.1.0]: https://github.com/baethon/phln/compare/1.0.0...1.1.0
[1.2.0]: https://github.com/baethon/phln/compare/1.1.0...1.2.0
[2.0.0]: https://github.com/baethon/phln/compare/1.2.0...2.0.0
[2.1.0]: https://github.com/baethon/phln/compare/2.0.0...2.1.0
