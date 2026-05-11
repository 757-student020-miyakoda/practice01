<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

     // STEP4オプション問題用
    // プロフィール編集画面
    public function edit()
    {
        $user = auth()->user();
        return view('home.edit', ['user' => $user]);
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
