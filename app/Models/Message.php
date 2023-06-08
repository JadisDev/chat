<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['body', 'created_at', 'user_id', 'conversation_id'];

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function conversation()
    {
        return $this->belongsTo('Conversation', 'conversation_id');
    }

    public function messages_notifications()
    {
        return $this->hasMany('MessageNotification', 'message_id', 'id');
    }
}
