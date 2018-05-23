# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](http://keepachangelog.com/en/1.0.0/)
and this project adheres to [Semantic Versioning](http://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added

- `object\objOf()` ([338519c](https://github.com/baethon/phln/commit/338519c772aead989252dadab68f94bbe2edab06))
- `object\toParis()` ([e3e93a5](https://github.com/baethon/phln/commit/e3e93a542cb49890ac9eb57ae66e0a178e092cd3))
- `collection\fromPairs()` ([e3e93a5](https://github.com/baethon/phln/commit/e3e93a542cb49890ac9eb57ae66e0a178e092cd3))
- verification of function uniqueness in `create:fn` command ([322b1f4](https://github.com/baethon/phln/commit/322b1f48b41376f628bfa416c4481115d09dfce4))

### Changed

- *BREAKING CHANGE* removed `nil`
- updated PHPUnit to `^6.5`
- added PHP 7.2 to Travis env
- support `object` type in functions from `object` namespace ([2db4d73](https://github.com/baethon/phln/commit/2db4d73aa3ed2389c14c61271463e358c93cd594))
- moved docs to Github Pages

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

[Unreleased]: https://github.com/baethon/phln/compare/1.1.0...HEAD
[1.1.0]: https://github.com/baethon/phln/compare/1.0.0...1.1.0
