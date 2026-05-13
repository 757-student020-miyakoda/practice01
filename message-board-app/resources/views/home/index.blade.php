@extends('layouts.app')

@section('content')
<h1>マイページ</h1>

<!-- フラッシュメッセージの表示。バリデーション。LV50のSTEP3 -->
@include('commons.flash')
<!-- コレを日本語でわかりやすく表示するにはapp\Http\Requests\StoreMessageRequest.phpにmessages()メソッドを追記。 -->
<form action="{{ route('messages.store') }}" method="POST">
    @csrf
    <!-- ここはpostでおｋ -->

    <!--
    このformの投稿するボタンを押すと app/Http/Controllers/MessageController.php のstoreメソッドに行く。
    store() メソッドで /home (つまりこのページ)へのリダイレクトが組んである
    ということは投稿一覧は引数として受け取ればおｋ
    -->

    <p><textarea name="content"></textarea></p>
    <p><button>投稿する</button></p>
</form>



<!-- ここから投稿一覧 -->
@include('message.messages')
<!-- ここまで投稿一覧 -->


<!-- <h2>ようこそ {{ auth()->user()->name }} さん！</h2> -->
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