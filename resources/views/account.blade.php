@extends('template.header-footer')
@section('main-section')
<!-- Page Content -->
<!-- Jumbotron Header -->
<!-- Page Features -->
<div class="row" style="background: rgba(204, 204, 204, 0.8);margin-top: 20px;padding: 30px">
    <div id="id01" class="modal">
        <form class="modal-content animate" action="{{url('home')}}" method="POST" id='form_reset_pass'>
            @csrf
            <span onclick="document.getElementById('id01').style.display = 'none'" class="close" title="Close Modal">&times;</span>
            <div class="container">
                <label for="psw"><b>Pin</b></label>
                <input type="password" placeholder="Enter Pin" name="pin" id='pinnum' required>
                <label for="psw"><b>New Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" id='newpass' required>
                <label for="confpsw"><b>Confirm Password</b></label>
                <input type="password" placeholder="Confirm Password" name="psw2" id='conf_pass' required>
            </div>
            <div class="container" style="background-color:#f1f1f1">
                <button type="button" id='submitpin'>Submit</button>
                <button type="button" onclick="document.getElementById('id01').style.display = 'none'">Cancel</button>
            </div>
        </form>
    </div>
    <div id="id02" class="modal">
        <form class="modal-content animate" action="{{url('home')}}" method="POST" id='form_reset_pass'>
            @csrf
            <span onclick="document.getElementById('id02').style.display = 'none'" class="close" title="Close Modal">&times;</span>
            <div class="container">
                <label for="psw"><b>Old Pin</b></label>
                <input type="password" placeholder="Enter Pin" name="pin" id='pinnum' required>
                <label for="psw"><b>New Pin</b></label>
                <input type="password" placeholder="Enter Password" name="psw" id='newpass' required>
                <label for="confpsw"><b>Confirm New Pin</b></label>
                <input type="password" placeholder="Confirm Password" name="psw2" id='conf_pass' required>
            </div>
            <div class="container" style="background-color:#f1f1f1">
                <button type="button" id='submitpin'>Submit</button>
                <button type="button" onclick="document.getElementById('id02').style.display = 'none'">Cancel</button>
            </div>
        </form>
    </div>
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

    @if(Session::get('username') != null)
    <button type="button" class="btn btn-primary btn-rounded" onclick="document.getElementById('id01').style.display = 'block'" style="background-color: #343a40;border-color: #343a40;font-family: 'MyWebFont';">Reset Password</button>
    @endif
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

