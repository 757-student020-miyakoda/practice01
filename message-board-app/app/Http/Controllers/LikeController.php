<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //LV50 STEP5 128ページ
        $likes=auth()->user()->likeBooks()->orderBy('created_at','desc')->paginate(20);
        return view('likes.index',["likes"=>$likes]);
        //次はweb.phpにlikesを見せるルートを設定
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //LV50 STEP5
        auth()->user()->likeMessages()->attach($request->message_id);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    //public function destroy(Like $like)
    public function destroy(Request $request){
        //↑ここではlikeインスタンスではなくhiddenにはいってる変数を読み込むので変える必要がある。
        //LV50 STEP5
        auth()->user()->likeMessages()->detach($request->message_id);
        return back();

    }
}
