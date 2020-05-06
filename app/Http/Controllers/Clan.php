<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Clan extends Controller
{
      public function index()
    {
        $clans = json_decode(file_get_contents('http://bv.mrdbx.ru/services/api_proxy.php?content=clans&callback.json'),true);
        return view('clans',['clans'=>$clans]);
    }


}
