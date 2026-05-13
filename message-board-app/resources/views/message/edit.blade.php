@extends('layouts.app')

@section('content')
<h1>メッセージ編集</h1>

<form action="{{ route('message.update', $message->id) }}" method="post">
    @csrf 
    @method('patch')
        <textarea name="edit" rows="5"></textarea>
        <button>更新する</button>
    <a href="{{ route('home.index')}}">キャンセル</a>
</form>
@endsection