<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;

use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Drivers\DriverManager;

$config = [
    // Your driver-specific configuration
    // "telegram" => [
    //    "token" => "TOKEN"
    // ]
];

// Load the driver(s) you want to use
DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

// Create an instance
$botman = BotManFactory::create($config);

// Give the bot something to listen for.
$botman->hears('hello', function (BotMan $bot) {
    $bot->reply('Hello yourself.');
});

// Start listening
$botman->listen();

  

class BotManController extends Controller

{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');
        $botman->hears('{message}', function($botman, $message) {
            if ($message == 'hi') {
                $this->askName($botman);
            }
            else{
                $botman->reply("write 'hi' for testing...");
            }
        });
        $botman->listen();
        return view('welcome');
    }
    /**
     * Place your BotMan logic here.
     */
    public function askName($botman)
    {
        $botman->ask('Hello! What is your Name?', function(Answer $answer) {
        $name = $answer->getText();
        $this->say('Nice to meet you '.$name);
        });
    }
    
}