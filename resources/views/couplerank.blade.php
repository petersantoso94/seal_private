@extends('template.header-footer')
@section('main-section')
<!-- Page Content -->
<!-- Jumbotron Header -->
<!-- Page Features -->
<header class="jumbotron my-4" style="background: rgba(204, 204, 204, 0.8);;">
    <h3>Couple's Leaderboard</h3>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Player 1 Name</th>
                <th scope="col">Player 2 Name</th>
                <th scope="col">Days</th>
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
            $gm_name =[];
            foreach(DB::connection('mysql3')->table('pc')->select('char_name','user_id')->whereIn('user_id',$all_gm)->get() as $char){
                $gm_name[] = $char->char_name;
            }
            $all_player = DB::connection('mysql3')->table('msgfriend')->select('char_name', 'couple_name', 'couple_daycnt')->whereNotIn('char_name', $gm_name)->whereNotIn('couple_name', $gm_name)->get();
            $players = [];
            $players2 = [];
            foreach ($all_player as $player) {
                $gw_win = floatval($player->couple_daycnt);
                $players2[] = $player->couple_name;
                if (count($players) == 0) {
                    $players[] = array(
                        'char_name' => $player->char_name,
                        'master' => $player->couple_name,
                        'total_score' => $gw_win
                    );
                } else {
                    if (!in_array($player->char_name, $players2) && count($players) > 0) {
                        $players[] = array(
                            'char_name' => $player->char_name,
                            'master' => $player->couple_name,
                            'total_score' => $gw_win
                        );
                    }
                }
            }
            $arr_total = array_column($players, 'total_score');
            array_multisort($arr_total, SORT_DESC, $players);
            $show_player = array_slice($players, 0, 20);
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

