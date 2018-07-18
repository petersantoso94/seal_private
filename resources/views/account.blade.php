@extends('template.header-footer')
@section('main-section')
<!-- Page Content -->
<!-- Jumbotron Header -->
<!-- Page Features -->
<div class="row" style="background: rgba(204, 204, 204, 0.8);margin-top: 20px;padding-left: 10px;padding-right: 10px">
    <form>
        <h3>Welcome to SEAL ONLINE: Chronicles of Shiltz</h3>
        <div class="form-group">
            @if(Session::get('username') != null)
            <label for="users">Hi, {{Session::get('username')}}</label><br>
            @endif
        </div>
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
        <p>Your Email: {{$email}}</p>
        <p>Your PIN:</p><input type='password' value='{{$pin}}' disabled="">
    </form>
</div>
<!-- /.row -->

</div>
<!-- /.container -->
@stop

