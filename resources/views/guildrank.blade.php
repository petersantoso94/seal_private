@extends('template.header-footer')
@section('main-section')
<!-- Page Content -->
<!-- Jumbotron Header -->
<!-- Page Features -->
<header class="jumbotron my-4" style="background: rgba(204, 204, 204, 0.8);;">
    <h3>Guild's Leaderboard</h3>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Guild Name</th>
                <th scope="col">Master Name</th>
                <th scope="col">Guild Rating</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $all_player = DB::connection('mysql3')->table('guildinfo')->select('gw_round_w', 'gw_win_w', 'gw_lose_w','name','mastername')->get();
            $players = [];
            foreach ($all_player as $player) {
				$gw_round = floatval($player->gw_round_w);
                $gw_win = floatval($player->gw_win_w);
				$gw_lose = floatval($player->gw_lose_w);
                $players[] = array(
                    'char_name' => $player->name,
                    'master' => $player->mastername,
                    'total_score' => (($gw_win * 25) + ($gw_lose * 5)) * 10
                );
            }
            $arr_total  = array_column($players, 'total_score');
            array_multisort($arr_total, SORT_DESC, $players);
            $show_player = array_slice($players, 0, 5);
            $counter = 1;
            ?>
            @foreach($show_player as $player)
            <tr>
                <th scope="row">{{$counter}}</th>
                <td>{{$player['char_name']}}</td>
                <td>{{$player['master']}}</td>
                <td>{{$player['total_score']}}</td>
            </tr>
            <?php $counter++; ?>
            @endforeach
        </tbody>
    </table>
</header>
<!-- /.row -->

</div>
<!-- /.container -->
@stop
@section('js-content')
<script>
</script>
@stop

