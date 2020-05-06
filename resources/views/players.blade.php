@if (!$players)
    <p color='red'> No such clan!</p>
@else
    <table border="1">
        <tr>
               
                <td> Nickname </td>
                <td> ID </td>
                <td> Level </td>
                <td> Frags </td>
                <td> Deaths </td>
                <td> </td>
               
        </tr>
    @foreach ($players['players'] as $player)
<tr>

<td> {{ $player['nick'] }} </td>
<td> {{ $player['id'] }} </td>
<td> {{ $player['level'] }} </td>
<td> {{ $player['frags'] }} </td>
<td> {{ $player['deaths'] }} </td>
<td> <input type="button" value="show"
onclick="showDecks({{ $player['id'] }})"> </td>

</td>
@endforeach
</table>
@endif

<script>
    function showDecks(clanID) {
    window.location.href="player/"+clanID;
    }
</script>

<p> <input type="button" value="To clan list" onclick="clanlist()"> </p>
<script>
function clanlist() {
window.location.href="/";
}
</script>