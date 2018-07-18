@extends('template.header-footer')
@section('main-section')
<!-- Page Content -->
<!-- Jumbotron Header -->
<!-- Page Features -->
<div class="row" style="background: rgba(204, 204, 204, 0.8);margin-top: 20px;padding-left: 10px;padding-right: 10px">
    <form action="{{url('account')}}" method="POST" id='form_edit_account'>
        {{ csrf_field() }}
        <h3>Welcome to SEAL ONLINE: Chronicles of Shiltz</h3>
        <?php if (isset($message)) { ?>
            @if($message == 'success')
            <div class="alert alert-success alert-dismissible" role="alert" style="width: 98%; margin: 1%">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Successfully resetting your data
            </div>
            @endif
        <?php } ?>
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
            <input type="text" id='email' name='email' class='form-control' value="{{$email}}" disabled="">
            <button type="button" onclick="enableEmail(this)" id='btn-enable-email' class="btn btn-primary" >edit</button>
            <button type="button" onclick="disableEmail(this)" id='btn-dis-email' class="btn" style="display: none;">cancel</button>
        </div>
        <div class="form-group">
            <label for="users">Your PIN:</label>
            <input type='password' name='pin' class='form-control' id='pin' value='{{$pin}}' disabled="">
            <button type="button" onclick="enablePin(this)" id='btn-enable-pin' class="btn btn-primary" >edit</button>
            <button type="button" onclick="disablePin(this)" id='btn-dis-pin' class='btn' style="display: none;" >cancel</button>
            <button type="button" onclick="submitForm(this)" id='btn-submit' class='btn btn-primary' style="float:right" disabled="">Submit</button>
        </div>
    </form>
</div>
<!-- /.row -->

</div>
<!-- /.container -->
@stop
@section('js-content')
<script>
    var counter = 0;
    var enableEmail = function () {
        counter++;
        $('#btn-submit').removeAttr('disabled');
        $('#email').removeAttr('disabled');
        $('#btn-enable-email').hide();
        $('#btn-dis-email').show();
    };
    var disableEmail = function () {
        counter--;
        $('#btn-submit').attr('disabled', 'disabled');
        $('#email').attr('disabled', 'disabled');
        $('#btn-dis-email').hide();
        $('#btn-enable-email').show();
    };
    var enablePin = function () {
        counter++;
        $('#btn-submit').removeAttr('disabled');
        $('#pin').removeAttr('disabled');
        $('#btn-enable-pin').hide();
        $('#btn-dis-pin').show();
    };
    var disablePin = function () {
        counter--;
        $('#btn-submit').attr('disabled', 'disabled');
        $('#pin').attr('disabled', 'disabled');
        $('#btn-dis-pin').hide();
        $('#btn-enable-pin').show();
    };
    var submitForm = function () {
        if (counter > 0) {
            $('#email').removeAttr('disabled');
            $('#pin').removeAttr('disabled');
            if ($('#email').val() != '' && $('#pin').val() != '')
                $('#form_edit_account').submit();
            else
                alert('Please fill the value correctly!');
        }
    }
</script>
@stop

