{!! '<?'.'php' !!}

use function Baethon\Phln\load_macro;

@foreach($files as $item)
load_macro('{{$item['ns']}}', '{{$item['name']}}');
@endforeach
