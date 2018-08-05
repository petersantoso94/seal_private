@extends('template.header-footer')
@section('main-section')
<!-- Page Content -->
<!-- Jumbotron Header -->
<!-- Page Features -->
<header class="jumbotron my-4" style="background: rgba(204, 204, 204, 0.8);;">
    <h3>Player's Leaderboard</h3>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Char Name</th>
				<th scope="col">Job</th>
                <th scope="col">Level</th>
                <th scope="col">Kill</th>
                <th scope="col">Fame</th>
                <th scope="col">Player's Rating</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $all_gm = [];
            for ($i = 1; $i <= 20; $i++) {
                if ($i < 10)
                    $all_gm[] = 'gm0' . $i;
                else {
                    $all_gm[] = 'gm' . $i;
                }
            }
			$all_test = [];
            for ($i = 1; $i <= 20; $i++) {
                if ($i < 10)
                    $all_test[] = 'test' . $i;
                else {
                    $all_test[] = 'test' . $i;
                }
            }
            $all_player = DB::connection('mysql3')->table('pc')->select('char_name', 'job', 'level', 'fame', 'gw_score_t')->whereNotIn('user_id', $all_gm)->whereNotIn('user_id', $all_test)->get();
            $players = [];
			
            foreach ($all_player as $player) {
                $player_level = floatval($player->level);
				$player_fame = floatval($player->fame);
                $player_kill = floatval($player->gw_score_t);
                $total_score = round((($player_level * 0.5) + ($player_fame * 0.0002) + ($player_kill * 0.6)) * 10,0);
				$players[] = array(
                    'char_name' => $player->char_name,
                    'level' => $player_level,
					'job' => $player->job,
                    'fame' => $player_fame,
                    'kill' => $player_kill,
                    'total_score' => $total_score
                );
            }
            $arr_total = array_column($players, 'total_score');
            array_multisort($arr_total, SORT_DESC, $players);
            $show_player = array_slice($players, 0, 50);
            $counter = 1;
            ?>
            @foreach($show_player as $player)
			<tr>
                <th scope="row">{{$counter}}</th>
                <td>{{$player['char_name']}}</td>
				<td>{{$player['job']}}</td>
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

