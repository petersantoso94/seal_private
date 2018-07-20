@extends('template.header-footer')
@section('main-section')
<!-- Page Content -->
<!-- Jumbotron Header -->
<!-- Page Features -->
<div class="row" style="background: rgba(204, 204, 204, 0.8);margin-top: 20px;padding: 30px">
    <div id="id01" class="modal">
        <form class="modal-content animate" action="{{url('account')}}" method="POST" id='form_reset_pass'>
            @csrf
            <input type='hidden' value='pass' name='tipe'>
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
        <form class="modal-content animate" action="{{url('account')}}" method="POST" id='form_reset_pin'>
            @csrf
            <input type='hidden' value='pin' name='tipe'>
            <span onclick="document.getElementById('id02').style.display = 'none'" class="close" title="Close Modal">&times;</span>
            <div class="container">
                <label for="psw"><b>Old Pin</b></label>
                <input type="password" placeholder="Enter Old Pin" name="pin" id='pinnum2' required>
                <label for="psw"><b>New Pin</b></label>
                <input type="password" placeholder="Enter New Pin" name="psw" id='newpass2' required>
                <label for="confpsw"><b>Confirm New Pin</b></label>
                <input type="password" placeholder="Confirm New Pin" name="psw2" id='conf_pass2' required>
            </div>
            <div class="container" style="background-color:#f1f1f1">
                <button type="button" id='submitpin2'>Submit</button>
                <button type="button" onclick="document.getElementById('id02').style.display = 'none'">Cancel</button>
            </div>
        </form>
    </div>
    <div id="id03" class="modal">
        <form class="modal-content animate" action="{{url('account')}}" method="POST" id='form_reset_email'>
            @csrf
            <input type='hidden' value='email' name='tipe'>
            <span onclick="document.getElementById('id03').style.display = 'none'" class="close" title="Close Modal">&times;</span>
            <div class="container">
                <label for="psw"><b>Pin</b></label>
                <input type="password" placeholder="Enter Pin" name="pin" id='pinnum3' required>
                <label for="psw"><b>New Email</b></label>
                <input type="email" placeholder="Enter New Email" name="psw" id='newpass3' required>
                <label for="confpsw"><b>Confirm New Email</b></label>
                <input type="email" placeholder="Confirm New Email" name="psw2" id='conf_pass3' required>
            </div>
            <div class="container" style="background-color:#f1f1f1">
                <button type="button" id='submitpin3'>Submit</button>
                <button type="button" onclick="document.getElementById('id03').style.display = 'none'">Cancel</button>
            </div>
        </form>
    </div>
    <div class="row" style="width: 100%;">
        <h3>Welcome to SEAL ONLINE: Chronicles of Shiltz</h3>
    </div>
    <?php if (isset($message)) { ?>
        @if($message == 'success')
        <div class="alert alert-success alert-dismissible" role="alert" style="width: 98%; margin: 1%">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Successfully resetting your {{$tipe}}
        </div>
        @else
        <div class="alert alert-danger alert-dismissible" role="alert" style="width: 98%; margin: 1%">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Wrong pin number
        </div>
        @endif
    <?php } ?>
    <div class="row" style="width: 100%;">
        @if(Session::get('username') != null)
        <label for="users">Hi, {{Session::get('username')}}</label><br>
        @endif
    </div>

    @if(Session::get('username') != null)
    <div class="row" style="width: 100%;">
        <button type="button" class="btn btn-primary btn-rounded btn-marg" onclick="document.getElementById('id01').style.display = 'block'" style="width:20%;background-color: #343a40;border-color: #343a40;font-family: 'MyWebFont';">Reset Password</button>
        <button type="button" class="btn btn-primary btn-rounded btn-marg" onclick="document.getElementById('id02').style.display = 'block'" style="width:20%;background-color: #343a40;border-color: #343a40;font-family: 'MyWebFont';">Reset PIN</button>
        <button type="button" class="btn btn-primary btn-rounded btn-marg" onclick="document.getElementById('id03').style.display = 'block'" style="width:20%;background-color: #343a40;border-color: #343a40;font-family: 'MyWebFont';">Reset Email</button>
    </div>
    <div class="row" style="width: 100%;">
        <div class='col'>
            <div class="row">
                <div class='col-sm-8'>Account ID:</div>
                <div class='col-sm-8'>ABC****</div>
            </div>
        </div>
        <div class='col'>
            <div class="row">
                <div class='col-sm-8'>Registration Date:</div>
                <div class='col-sm-8'>18-******</div>
            </div>
        </div>
    </div>
    @endif
</div>
<!-- /.row -->

</div>
<!-- /.container -->
@stop
@section('js-content')
<script>

    var pin = '';
    var pass = '';
    var confpass = '';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#submitpin').on('click', function () {
        pin = $('#pinnum').val();
        pass = $('#newpass').val();
        confpass = $('#conf_pass').val();
        if ((pin == null || pin == "") || (pass == null || pass == "") || (confpass == null || confpass == "")) {
            alert('Please fill all the field');
        } else {
            if (pass !== confpass) {
                alert("Passwords Don't Match");
            } else {
                $('form#form_reset_pass').submit();
            }
        }
    });
    $('#submitpin2').on('click', function () {
        pin = $('#pinnum2').val();
        pass = $('#newpass2').val();
        confpass = $('#conf_pass2').val();
        if ((pin == null || pin == "") || (pass == null || pass == "") || (confpass == null || confpass == "")) {
            alert('Please fill all the field');
        } else {
            if (pass !== confpass) {
                alert("PINs Don't Match");
            } else {
                $('form#form_reset_pin').submit();
            }
        }
    });
    $('#submitpin3').on('click', function () {
        pin = $('#pinnum3').val();
        pass = $('#newpass3').val();
        confpass = $('#conf_pass3').val();
        if ((pin == null || pin == "") || (pass == null || pass == "") || (confpass == null || confpass == "")) {
            alert('Please fill all the field');
        } else {
            if (pass !== confpass) {
                alert("Emails Don't Match");
            } else {
                $('form#form_reset_email').submit();
            }
        }
    });
</script>
@stop

