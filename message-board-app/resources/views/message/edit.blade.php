@extends('layouts.app')

@section('content')
<h1>メッセージ編集</h1>
@include('commons.flash')
<form action="{{ route('messages.update',$message) }}" method="post">
    @csrf 
    @method('patch')
    <p>
        <label>投稿内容</label><br>
        <textarea name="content">{{ $message->content }}</textarea>
    </p>
    <button>更新する</button>
</form>
<a href="#" onclick="deleteMessage()">削除する</a>
<form action="{{ route('messages.destroy',$message) }}" method="post" id="delete-form">
    @csrf
    @method('delete')
    <!-- <button>削除する</button> -->
    <!-- ここにボタンは用意しない -->
</form>
<script>
    function deleteMessage(){
        event.preventDefault();
        if(window.confirm("本当に削除しますか？")){
            document.getElementById('delete-form').submit();
        }
    }
</script>
@endsection