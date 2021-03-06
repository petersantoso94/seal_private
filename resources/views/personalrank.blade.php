@extends('template.header-footer')
@section('main-section')
<!-- Page Content -->
<!-- Jumbotron Header -->
<!-- Page Features -->
<header class="jumbotron my-4" style="background: rgba(255, 255, 255, 0);;">
    <h3>Top Player Rank</h3>
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
			$all_bacotz = [];
            for ($i = 1; $i <= 20; $i++) {
                if ($i < 10)
                    $all_bacotz[] = 'bacotz' . $i;
                else {
                    $all_bacotz[] = 'bacotz' . $i;
                }
            }
			$all_gblk = [];
            for ($i = 1; $i <= 20; $i++) {
                if ($i < 10)
                    $all_gblk[] = 'gblk' . $i;
                else {
                    $all_gblk[] = 'gblk' . $i;
                }
            }
			$all_babayaga = [];
            for ($i = 1; $i <= 20; $i++) {
                if ($i < 10)
                    $all_babayaga[] = 'babayaga' . $i;
                else {
                    $all_babayaga[] = 'babayaga' . $i;
                }
            }
			$all_majutakgentar = [];
            for ($i = 1; $i <= 20; $i++) {
                if ($i < 10)
                    $all_majutakgentar[] = 'majutakgentar' . $i;
                else {
                    $all_majutakgentar[] = 'majutakgentar' . $i;
                }
            }
			$all_pestisida = [];
            for ($i = 1; $i <= 20; $i++) {
                if ($i < 10)
                    $all_pestisida[] = 'pestisida' . $i;
                else {
                    $all_pestisida[] = 'pestisida' . $i;
                }
            }
            $all_player = DB::connection('mysql3')->table('pc')->select('char_name', 'level', 'fame', 'gw_score_t','job', 'count_reborn', 'play_time')->whereNotIn('user_id', $all_gm)->whereNotIn('user_id', $all_bacotz)->whereNotIn('user_id', $all_majutakgentar)->whereNotIn('user_id', $all_gblk)->whereNotIn('user_id', $all_babayaga)->whereNotIn('user_id', $all_pestisida)->whereNotIn('user_id', $all_test)->get();
            $players = [];
            foreach ($all_player as $player) {
                $player_level = floatval($player->level);
                $player_fame = floatval($player->fame);
                $player_kill = floatval($player->gw_score_t);
                $total_score = round((($player_level * 0.5) + ($player_fame * 0.0002) + ($player_kill * 0.6)) * 10,0);
				$player_old_level = floatval($player->count_reborn);
				$player_play_time = floatval($player->play_time);
				$player_leveldiff = $player_level - $player_old_level;
                $players[] = array(
                    'char_name' => $player->char_name,
                    'job' => $player->job,
                    'level' => $player_level,
                    'fame' => $player_fame,
                    'kill' => $player_kill,
                    'total_score' => $total_score,
					'old_level' => $player->count_reborn,
					'play_time' => $player->play_time,
					'level_diff' => $player_leveldiff
                );
            }
            $arr_total = array_column($players, 'total_score');
            array_multisort($arr_total, SORT_DESC, $players);
            $show_player = array_slice($players, 0, 100);
            $counter = 1;
            ?>
            @foreach($show_player as $player)
			<?php 
			
            $job_name = '';
            if($player['job'] == '0')
                $job_name = 'Beginner';
            else if($player['job'] == '1')
                $job_name = 'Warrior';
            else if($player['job'] == '2')
                $job_name = 'Knight';
			else if($player['job'] == '3')
                $job_name = 'Jester';
			else if($player['job'] == '4')
                $job_name = 'Mage';
			else if($player['job'] == '5')
                $job_name = 'Priest';
			else if($player['job'] == '6')
                $job_name = 'Craftsman';
			else if($player['job'] == '8')
                $job_name = 'Vagabond';
			else if($player['job'] == '11')
                $job_name = 'Berserker';
			else if($player['job'] == '12')
                $job_name = 'Renegade';
			else if($player['job'] == '13')
                $job_name = 'Assassin';
			else if($player['job'] == '14')
                $job_name = 'Ice Wizard';
			else if($player['job'] == '15')
                $job_name = 'Templar';
			else if($player['job'] == '16')
                $job_name = 'Demolitionist';
			else if($player['job'] == '21')
                $job_name = 'Swordmaster';
			else if($player['job'] == '22')
                $job_name = 'Defender';
			else if($player['job'] == '23')
                $job_name = 'Gambler';
			else if($player['job'] == '24')
                $job_name = 'Fire Wizard';
			else if($player['job'] == '25')
                $job_name = 'Apostle';
			else if($player['job'] == '26')
                $job_name = 'Artisan';
			?>
            <tr>
                <th scope="row">{{$counter}}</th>
                <td>{{$player['char_name']}}</td>
                <td>{{$job_name}}</td>
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

