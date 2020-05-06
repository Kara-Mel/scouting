<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Player extends Controller
{
     public function index($id)
    {
        $urlList = 'https://berserktcg.ru/api/export/clan/';
        $urlList = $urlList.$id.'.json';
        
       
        $players = json_decode(file_get_contents($urlList),true);
        return view('players',['clanid'=>$id, 'players'=>$players]);
    }
}
