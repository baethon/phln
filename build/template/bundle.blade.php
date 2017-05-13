{!! '<?'.'php' !!}

@foreach($files as $item)
require __DIR__.'/{{$item['ns']}}/{{$item['name']}}';
@endforeach
