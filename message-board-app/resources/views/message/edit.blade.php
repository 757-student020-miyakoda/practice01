@extends('layouts.app')

@section('content')
<h1>メッセージ編集</h1>

<form action="{{ route('messages.update', $message->id) }}" method="post">
    @csrf 
    @method('patch')
    <p>
        <textarea name="edit" rows="5"></textarea>
</p>
<p>
        <button>更新する</button>
    <a href="{{ route('home')}}">キャンセル</a>
</p>
</form>
@endsection