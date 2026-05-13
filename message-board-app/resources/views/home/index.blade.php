@extends('layouts.app')

@section('content')
<h1>マイページ</h1>
<form action="{{ route('messages.store') }}" method="POST">
    @csrf
    <!-- ここはpostでおｋ -->

    <!--
    このformの投稿するボタンを押すと app/Http/Controllers/MessageController.php のstoreメソッドに行く。
    store() メソッドで /home (つまりこのページ)へのリダイレクトが組んである
    ということは投稿一覧は引数として受け取ればおｋ
    ちがう！ここにuseを書いて自分でひっぱってくればいいんだ 
    -->

    <textarea name="content"></textarea>
    <button>投稿する</button>
</form>



<!-- ここから投稿一覧 -->
<!-- // ということは投稿一覧は引数として受け取ればおｋ
// なので普通に連想配列で渡されたキー名の変数を使う。
    // ちがう！ここにuseを書いて自分でひっぱってくればいいんだ -->
@foreach($messages as $message)
{{ $message->user->name }}：{{ $message->updated_at }}<br>
{{!! nl2br(e($message->content)) !!}}
<a href="{{ route('messages.edit', $message->id)}}">編集する</a>
<hr>
@endforeach
<!-- ここまで投稿一覧 -->


<h2>ようこそ {{ auth()->user()->name }} さん！</h2>
<form action="{{ route('logout') }}" method="post">
    @csrf 
    <button>ログアウト</button>
</form>

<!-- STEP4オプション問題用 -->
<p><a href="{{ route('profile.edit') }}">プロフィール編集</a></p>

<!-- STEP5オプション問題用 -->
<form action="{{ route('users.delete') }}" method="post">
    @csrf 
    @method('delete')
    <button>退会する</button>
</form>

@endsection