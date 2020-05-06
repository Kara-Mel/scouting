@if (!$clans)
    <p color='red'> Something wrong with BV server!</p>
@else
    <table class="table" border="1">
        <tr>
               
                <td> Clan Name </td>
                <td> Clan score </td>
                <td> </td>
               
        </tr>
    @foreach ($clans as $clan)
<tr>

<td> {{ $clan['title'] }} </td>
<td> {{ $clan['points'] }} </td>
<td> <input type="button" value="show"
onclick="showPlayers({{ $clan['id'] }})"> </td>

</td>
@endforeach
</table>
@endif

<script>
    function showPlayers(clanID) {
    window.location.href="clan/"+clanID;
    }
</script>