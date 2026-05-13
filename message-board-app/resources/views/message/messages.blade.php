@foreach($messages as $message)
{{ $message->user->name }}：{{ $message->updated_at }}<br>
{!! nl2br(e($message->content)) !!}
@if($message->user_id===auth()->id())
<a href="{{ route('messages.edit',$message) }}">編集する</a>
@endif
<hr>
@endforeach
