@if (count($deck)==0)

<p color='red'> Player with ID {{ $player_id }} does not have any decks, but hey, you can add after the battle!</p>
 
@else
<p color='red'> Decks for player with ID {{ $player_id }}</p>
<table border="1">
    
<tr>
<td> Cards </td>
<td> Replay </td>
<td> Frequency </td>
<td> Update </td>
<td> +1 </td>
<td> Delete entry </td>
</tr>    
    
    
    
 @foreach ($deck as $decks)
<tr>
<td> {{ $decks->decks_cards }} </td>
<td> {{ $decks->replay }} </td>
<td> {{ $decks->frequency }} </td>
<td> {{ $decks->updated_at }} </td>
<td><form method="PUT" action="{{ action('Decks@show', $decks->id) }}">@csrf @method('PUT')<input type="submit" value="+1"></form></td>
<td> <form method="POST" action="{{ action('Decks@destroy', $decks->id) }}">@csrf @method('DELETE')<input type="submit" value="delete"></form> </td> 
</tr>
@endforeach  
    
</table>

<input type="hidden" name="add1" value="{{ 1 }}"> 






@endif
<p> <input type="button" value="New Deck" onclick="newDeck( {{ $player_id }})"> </p>
<script>
function newDeck(playerID) {
window.location.href=playerID+"/create";
}
</script>

<p> <input type="button" value="To clan list" onclick="clanlist()"> </p>
<script>
function clanlist() {
window.location.href="/";
}
</script>
