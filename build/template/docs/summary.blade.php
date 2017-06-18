# Summary

### Phln

### Functions

@foreach ($functions as $category => $list)
* [{{ $category }}](functions.md#{{ $category }})
@foreach ($list as $fn)
    * [{{ $fn['name'] }}](functions.md#{{ $fn['name'] }})
@endforeach

@endforeach
