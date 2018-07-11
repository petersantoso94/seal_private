@extends('template.header-footer')

@section('main-section')
<div class="container" id="main">
    <div class="row justify-content-center" style="margin-top: 120px;">
        <div class="col-md-8">
            @if(isset($messages))
            @if($messages == 'salahLogin')
            <div class="row nopadd">
                <div class="col-xs-20 col-xs-offset-2 col-sm-12 col-sm-offset-6 col-md-8 col-md-offset-8 nopadd">
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Failed!</strong> Data entry error occurred.
                        @if(isset($errors))
                        <ul>
                            @foreach($errors->all('<li>:message</li>') as $message)
                            {{$message}}
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
            @endif
            @if($messages == 'gagalLogin')
            <div class="row nopadd">
                <div class="col-xs-20 col-xs-offset-2 col-sm-12 col-sm-offset-6 col-md-8 col-md-offset-8 nopadd">
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close no-shadow" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Oops !</strong> your username or password are mismatch, please try again.
                    </div>
                </div>
            </div>
            @endif
            @if($messages == 'belumLogin')
            <div class="col-sm-6 col-sm-offset-3">
                <div class="alert alert-danger alert-dismissible fr400" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Sorry!</strong> You must login first!
                </div>
            </div>
            @endif
            @endif
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
