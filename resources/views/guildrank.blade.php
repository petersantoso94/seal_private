@extends('template.header-footer')
@section('main-section')
<!-- Page Content -->
<!-- Jumbotron Header -->
<!-- Page Features -->
<header class="jumbotron my-4" style="background: rgba(204, 204, 204, 0.8);;">
    <h3>Top Guild Rank</h3>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Char Name</th>
                <th scope="col">Level</th>
                <th scope="col">Kill</th>
                <th scope="col">Fame</th>
                <th scope="col">Total Points</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $all_player = DB::connection('mysql3')->table('pc')->select('char_name', 'level', 'fame', 'gw_score_t')->get();
            $players = [];
            foreach ($all_player as $player) {
                $player_level = floatval($player->level);
                $player_fame = floatval($player->fame);
                $player_kill = floatval($player->gw_score_t);
                $total_score = ($player_level*0.5)+($player_fame*0.2)+($player_kill*0.3);
                $players[] = array(
                    'char_name' => $player->char_name,
                    'level' => $player_level,
                    'fame' => $player_fame,
                    'kill' => $player_kill,
                    'total_score' => $total_score
                );
            }
            $arr_total  = array_column($players, 'total_score');
            array_multisort($arr_total, SORT_DESC, $players);
            $show_player = array_slice($players, 0, 50);
            $counter = 1;
            ?>
            @foreach($show_player as $player)
            <tr>
                <th scope="row">{{$counter}}</th>
                <td>{{$player['char_name']}}</td>
                <td>{{$player['level']}}</td>
                <td>{{$player['kill']}}</td>
                <td>{{$player['fame']}}</td>
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

