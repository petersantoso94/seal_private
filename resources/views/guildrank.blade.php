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
                <th scope="col">Guild Name</th>
                <th scope="col">Master Name</th>
                <th scope="col">Guild Win</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $all_player = DB::connection('mysql3')->table('guildinfo')->select('gw_win_w','name','mastername')->get();
            $players = [];
            foreach ($all_player as $player) {
                $gw_win = floatval($player->gw_win_w);
                $total_score = round(($player_level*0.5)+($player_fame*0.2)+($player_kill*0.3)* 10,0);
                $players[] = array(
                    'char_name' => $player->name,
                    'master' => $player->mastername,
                    'total_score' => $gw_win
                );
            }
            $arr_total  = array_column($players, 'total_score');
            array_multisort($arr_total, SORT_DESC, $players);
            $show_player = array_slice($players, 0, 3);
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

