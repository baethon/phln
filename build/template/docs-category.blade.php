# {{ $category }}

@foreach ($methods as $item)
## {{ $item['name'] }}
@foreach ($item['signatures'] as $sig)
`{!! $sig !!}`
@endforeach

{!! $item['summary'] !!}

{!! $item['description'] !!}

@if ($item['example'])
```php
{!! $item['example'] !!}
```
@endif
@endforeach
