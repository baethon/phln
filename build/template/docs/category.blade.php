@foreach ($methods as $item)
## {{ $item['name'] }}
@foreach ($item['signatures'] as $sig)
`{!! $sig !!}`
@endforeach

{!! $item['summary'] !!}
@if ($item['description'])

{!! $item['description'] !!}
@endif
@if ($item['example'])

```php
{!! $item['example'] !!}
```
@endif

@endforeach
