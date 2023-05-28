<?php
use Chatify\Models\Conversation;
use Chatify\Models\Message;

class ChatbotController
{
    public function handleIncomingMessage(Request $request)
    {
        $conversation = Conversation::where('id', $request->input('conversation_id'))->firstOrFail();
        $message = new Message([
            'user_id' => 2, // set the bot's user ID here
            'body' => $request->input('message'),
        ]);
        $conversation->messages()->save($message);

        $greetings = ['Hello!', 'Hi there!', 'Hey!', 'Greetings!', 'Good day!'];
        $response = $greetings[array_rand($greetings)];

        $botMessage = new Message([
            'user_id' => 1,
            'body' => $response,
        ]);
        $conversation->messages()->save($botMessage);

        return response()->json(['success' => true]);
    }
}
