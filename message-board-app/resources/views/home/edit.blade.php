@extends('layouts.app')

@section('content')
<h1>プロフィール編集</h1>
@include('commons.flash')
<form action="{{ route('profile.update') }}" method="post">
    @csrf 
    @method('patch')
    <p>
        <label>名前</label><br>
        <input type="text" name="name" value="{{ $user->name }}">
    </p>
    <p>
        <button>更新する</button>
    </p>
</form>
@endsection