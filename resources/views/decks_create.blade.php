We will add a deck for <b>{{ $player_id }}</b>: 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ action('Decks@store') }}"> 
@csrf 
<input type="hidden" name="player_id" value="{{ $player_id }}"> 
<table> 
<tr> 
<td>Cards<td> 
<td>:</td> 
<td><input type="text" name="decks_cards" id="decks_cards"></td> 

</tr> 
<tr> 

<td>Replay<td> 
<td>:</td> 
<td><input type="text" name="replay" id=" replay"></td> 


</tr> 

</tr> 

<td><input type="submit" value="Add deck to DB"></td>

</table> 
</form>

