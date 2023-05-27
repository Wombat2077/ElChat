<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'user';
    public $timestamps = false;
    use HasFactory;
    public function check_level_up($user, $messages_count){
        if($messages_count > $user->level**2){
            $user->level++;
            $user->money += $user->level*100;
            $user->roleslots++;
            $user->save();
        }
    }
}
