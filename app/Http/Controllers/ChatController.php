<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Messages;
use App\Models\Chats;

class ChatController extends Controller
{
    public function Chat(){
            return view("chat");
    }
    public function get_chat_messages(Chats $chat){
        $messages = new Messages();
        $messages = $messages->where('chat_id', $chat->id)->all();
        return $messages;
    }
    public function send(Request $req){
        
    }
}
