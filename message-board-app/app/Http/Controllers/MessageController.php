<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $request->user()->messages()->create($request->all());
        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        \Gate::authorize('update',$message); //115ページ
        //$messageには$message->id などが含まれるのでそのまま受け渡す
        return view('message.edit',['message'=>$message]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        \Gate::authorize('update',$message); //115ページ
        //edit.blade.phpからpostを受ける。
        $message->update($request->all());
        return redirect(route('home'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        $message->delete();
        return redirect(route('home'));
    }
}
