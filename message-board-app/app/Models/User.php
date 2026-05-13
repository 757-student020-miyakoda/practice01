<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function messages(){ //これはユーザー対メッセージ用
        return $this->hasMany(Message::class);
    }

    //LV50 STEP5 だいたい126ページと131ぺーじあたり
    public function likeMessages(){ //これはユーザー対like用。
        return $this->belongsToMany(Message::class,'likes')->withTimestamps();
    }
    public function isLike($message_id){
        return $this->likeMessages()->where('messages.id',$message_id)->exists();
        //これは当該メッセージにこのユーザーがイイネ登録したか否かをboolで返す
        //ちなみにこのfunctionはviews/message/messages.blade.phpから呼び出される。
    }
    //つぎはLikeController.phpをいじる
}
