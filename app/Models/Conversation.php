<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id', 'name', 'created_at'
    ];

    public function users()
    {
        return $this->belongsToMany('User', 'conversations_users', 'conversation_id', 'user_id')
            ->where('user_id', '<>', Auth::user()->id);
    }

    public function messages()
    {
        return $this->hasMany('Message', 'conversation_id', 'id');
    }

    public function messagesNotifications()
    {
        return $this->hasMany('MessageNotification', 'conversation_id', 'id')
            ->where('read', 0)->where('user_id', Auth::user()->id);
    }
}
