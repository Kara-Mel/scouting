<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Deck;

class Decks extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $decks=DB::table('decks')->where('player_id', $id)->get();
        return view('decks', ['player_id'=>$id,'deck'=>$decks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('decks_create',['player_id'=>$id]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'decks_cards' => 'required',
        ]);
         $deck = new Deck();
         $deck -> decks_cards = $request->decks_cards;
         $deck -> player_id = $request->player_id;
         $deck -> replay = $request->replay;
         $deck -> frequency = 1;
         $deck->save(); 
         return redirect('clan/player/'.$deck->player_id); 
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $player_id=DB::table('decks')->where('id',$id)->first();
        $player_id2 = $player_id->player_id;
        $player_id3 = ($player_id->frequency)+1;
        $date = date("Y/m/d/H/i/s");
        DB::table('decks')->where('id',$id)->update(['frequency' => $player_id3, 'updated_at' => $date]);
        return redirect('clan/player/'.$player_id2); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $deck=DB::table('decks')->where('id', $id)->get();
       $deck -> decks_cards = $request->decks_cards;
       $deck -> replay = $request->replay;
       $deck->save(); 
       $player_id=DB::table('decks')->where('id',$id)->first();
       $player_id2 = $player_id->player_id;
       return redirect('clan/player/'.$player_id2); 
       
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $player_id=DB::table('decks')->where('id',$id)->first();
       $player_id2 = $player_id->player_id;
       DB::table('decks')->where('id',$id)->delete();
       return redirect('clan/player/'.$player_id2); 
    }
}
