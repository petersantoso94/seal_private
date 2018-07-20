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
    <div class="row" style="width: 100%;">
        <h3>Welcome to SEAL ONLINE: Chronicles of Shiltz</h3>
    </div>
    <?php if (isset($message)) { ?>
        @if($message == 'success')
        <div class="alert alert-success alert-dismissible" role="alert" style="width: 98%; margin: 1%">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Successfully resetting your data
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
        <button type="button" class="btn btn-primary btn-rounded btn-marg" onclick="document.getElementById('id01').style.display = 'block'" style="background-color: #343a40;border-color: #343a40;font-family: 'MyWebFont';">Reset Password</button>
        <button type="button" class="btn btn-primary btn-rounded btn-marg" onclick="document.getElementById('id02').style.display = 'block'" style="background-color: #343a40;border-color: #343a40;font-family: 'MyWebFont';">Reset PIN</button>
        <button type="button" class="btn btn-primary btn-rounded btn-marg" onclick="document.getElementById('id03').style.display = 'block'" style="background-color: #343a40;border-color: #343a40;font-family: 'MyWebFont';">Reset Email</button>

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
</script>
@stop

