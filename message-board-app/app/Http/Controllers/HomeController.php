<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $messages = auth()->user()->messages()->orderBy('created_at', 'desc')->paginate(10);
        return view('home.index', ['messages' => $messages]);
    }

     // STEP4オプション問題用
    // プロフィール編集画面
    public function edit()
    {

    }

    // STEP4オプション問題用
    // プロフィール更新
    public function update(Request $request)
    {
        $user = auth()->user();
        $user->name = $request->name;
        $user->save();
        return redirect(route('home'));
    }

    // STEPオプション問題用
    // 退会処理
    public function destroy()
    {
        $user = auth()->user();
        
        // ログアウト処理      
        auth()->logout();
        
        // ユーザを削除
        $user->delete();          

        // ログイン画面へリダイレクト
        return redirect(route('login'));
    }
}
