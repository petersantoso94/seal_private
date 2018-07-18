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
        <div class="form-group">
            <label for="users">Your Email:</label>
            <input type="text" id='email' class='form-control' value="{{$email}}" disabled="">
            <button type="button" onclick="enableEmail(this)" id='btn-enable-email' class="btn btn-primary">edit</button>
            <button type="button" onclick="disableEmail(this)" id='btn-dis-email' class="btn" style="display: none">cancel</button>
        </div>
        <div class="form-group">
            <label for="users">Your PIN:</label>
            <input type='password' class='form-control' id='pin' value='{{$pin}}' disabled="">
            <button type="button" onclick="enablePin(this)" id='btn-enable-pin' class="btn btn-primary">edit</button>
            <button type="button" onclick="disablePin(this)" id='btn-dis-pin' class='btn' style="display: none">cancel</button>
        </div>
    </form>
</div>
<!-- /.row -->

</div>
<!-- /.container -->
@stop
@section('js-content')
<script>
    var enableEmail = function () {
        $(this).hide();
        $('#email').removeAttr('disabled');
        $('#btn-dis-email').show();
    };
    var disableEmail = function () {
        $(this).hide();
        $('#email').attr('disabled', 'disabled');
        $('#btn-enable-email').show();
    };
    var enablePin = function () {
        $(this).hide();
        $('#pin').removeAttr('disabled');
        $('#btn-dis-pin').show();
    };
    var disablePin = function () {
        $(this).hide();
        $('#pin').attr('disabled', 'disabled');
        $('#btn-enable-pin').show();
    };
</script>
@stop

