@extends('template.header-footer')

@section('main-section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('forgetPass') }}" id='form_forget_pass'>
                        <?php if (isset($message)) { ?>
                            @if($message == 'success')
                            <div class="alert alert-success alert-dismissible" role="alert" style="width: 98%; margin: 1%">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Successfully resetting your password
                            </div>
                            @else
                            <div class="alert alert-danger alert-dismissible" role="alert" style="width: 98%; margin: 1%">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                Data does not match!
                            </div>
                            @endif
                        <?php } ?>
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                                <span class="invalid-feedback" id='err-email'>

                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('PIN Number') }}</label>

                            <div class="col-md-6">
                                <input id="pin" type="password" class="form-control" name="pin" value="{{ $email ?? old('pin') }}" required autofocus>

                                <span class="invalid-feedback" id='err-pin'>

                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                <span class="invalid-feedback" id='err-pass'>

                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                <span class="invalid-feedback" id='err-conf'>

                                </span>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-primary" onclick="submitForm()">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js-content')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var submitForm = function () {
        var email_err = $('.invalid-feedback[id="err-email"]');
        var pass_err = $('.invalid-feedback[id="err-pass"]');
        var conf_err = $('.invalid-feedback[id="err-conf"]');
        var email_val = $('#email').val();
        var pin_val = $('#pin').val();
        var pass_val = $('#password').val();
        var conf_val = $('#password-confirm').val();
        if (pin_val == "" || pass_val == "" || email_val == "" || conf_val == "") {
            alert('Please fill all the field');
        } else {
            if (pass_val !== conf_val) {
                alert("Passwords Don't Match");
            } else {
                $('form#form_forget_pass').submit();
            }
        }
    };
</script>
@endsection
