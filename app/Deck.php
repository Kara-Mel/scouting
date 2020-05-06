<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    protected $fillable=['player_id','decks_cards', 'replay', 'frequency'];

}
