@foreach($messages as $message)
{{ $message->user->name }}：{{ $message->updated_at }}<br>
{!! nl2br(e($message->content)) !!}
@if($message->user_id===auth()->id())
    <!-- 自分のメッセージには編集ボタンを表示 -->
    <a href="{{ route('messages.edit',$message) }}">編集する</a>
@endif
@auth
    <!-- イイネボタンはログインユーザーにのみ表示される -->
    <!-- イイネボタンの動作は130ページ -->
    @if(auth()->user()->isLike($message->id))
        <!-- コイツはModels/User.php のisLikeメソッド。 -->
        <!-- ストレートに(Messageインスタンスそのものではなく)messageのidを投げて、Messageモデルの自分のlikesと比較して登録済みか否かを判定する -->
        <form action="{{ route('likes.destroy',-1) }}" method="POST">
            @csrf
            @method('delete')
            <input type="hidden" name="message_id" value="{{ $message->id }}">
            <button>お気に入り解除</button>
        </form>
    @else
        <form action="{{ route('likes.store') }}" method="POST">
            @csrf
            <input type="hidden" name="message_id" value="{{ $message->id }}">
            <button>お気に入り登録</button>
        </form>
    @endif
@else
    <!-- 非ログインユーザーには何もしない。 -->
@endauth
<hr>
@endforeach
