@extends('template.header-footer')
@section('main-section')
<!-- Page Content -->
<!-- Jumbotron Header -->
<!-- Page Features -->
<div class="row" style="background: rgba(204, 204, 204, 0.8);margin-top: 20px;">
    <div class='col-xs-4'>
        @if(Session::get('username') != null)
        <h4>Hi, {{Session::get('username')}}</h4>
        @endif
        <h3>Welcome to SEAL ONLINE: Chronicles of Shiltz</h3>
        <?php
        $a = Session::get('username');
        $email = '';
        $pin = '';
        $letter = $a['0'];
        $table = '';
        if (preg_match("/[aA-dD0-9]/", $letter)) {
            $table = "idtable1";
        } else if (preg_match("/[eE-iI]/", $letter)) {
            $table = "idtable2";
        } else if (preg_match("/[eJ-nN]/", $letter)) {
            $table = "idtable3";
        } else if (preg_match("/[oO-sS]/", $letter)) {
            $table = "idtable4";
        } else if (preg_match("/[tT-zZ]/", $letter)) {
            $table = "idtable5";
        } else {
            $table = "idtable5";
        }
        $registered_id = DB::connection('mysql')->table($table)->select('*')->where('id', $a)->get();
        if (count($registered_id) > 0) {
            $email = $registered_id[0]->email;
            $pin = $registered_id[0]->trueId;
        }
        ?>
        <p>Your ID: {{$a}}</p>
        <p>Your Email: {{$email}}</p>
        <p>Your PIN:</p><input type='password' value='{{$pin}}' disabled="">
    </div>
</div>
<!-- /.row -->

</div>
<!-- /.container -->
@stop

