@extends('template.header-footer')

@section('main-section')
    <div class="container" id="main">
        <div class="row justify-content-center" style="margin-top: 120px;">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin Login</div>
                    {{--{{md5('')}}--}}
                    <div class="card-body">
                        @if(isset($errors))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors }}</strong>
                                    </span>
                        @endif
                        <form method="POST" action="{{ route('loginadmin') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">Username</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control" name="email" value="" required
                                           autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
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
