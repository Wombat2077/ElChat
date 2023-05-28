<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\MessageSent;
use Chatify\Facades\ChatifyMessenger;

class NewMessageReceived implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(MessageSent $event)
    {
        $recipient = $event->recipient; // Get the recipient of the new message
        $message = $event->message;
        $promt = $message->body;
        $new_message = ChatifyMessenger::newMessage([
            'body' => 'Hello, this is a test message',
            'type' => 'text',
            'sender_id' => 2,
            'receiver_id' => auth()->id(), // Replace with the ID of the recipient user
        ]);
        ChatifyMessenger::send($new_message);
    }
}
