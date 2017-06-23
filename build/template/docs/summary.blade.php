# Summary

### Phln

* [Installation](README.md#installation)
* [Example usage](README.md#example-usage)
* [Glossary](GLOSSARY.md)
* [Function references](README.md#about-function-references)
* [Currying](README.md#currying)
* [Partial application](README.md#partial-application)
* [Function composition](README.md#function-composition)

### Documentation

@foreach ($functions as $category => $list)
* [{{ $category }}](functions.md#{{ $category }})
@foreach ($list as $fn)
    * [{{ $fn['name'] }}](functions.md#{{ strtolower($fn['name']) }})
@endforeach

@endforeach

### [Internals](internals.md)

* [Function file](internals.md#function-file)
* [Adding new function](internals.md#adding-new-function---build-pipeline)
* [Testing](internals.md#testing)
* [Structure of PHPDoc](internals.md#structure-of-phpdoc)
