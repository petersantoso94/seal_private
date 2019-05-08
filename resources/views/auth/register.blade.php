@extends('template.header-footer')

@section('main-section')
<div class="container">
    <div class="row justify-content-center" style="margin-top: 120px;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h5>{{ __('Registration Procedure, Make Sure to Follow Step by Step Instructions') }}</h5></div>
                @if(Session::has('fb_id'))
                <div class="alert alert-success" role="alert">
                    Successfully using Facebook Account : {{Session::get('fb_name')}}
                </div>
                @endif
                <div class="card-body">
					<label class="form-check-label" for="term-id"><a > Step 1. Log In to Your Facebook Profile <strong>(press the button below)</strong></label></a></br></br>
                    <form method="POST" action="{{ route('register') }}">

                        @csrf
                        @if(!Session::has('fb_id'))
                        <div class="form-group row" style="margin-left: 0%">
                            <a href="{{url('login/facebook')}}"><img src='{{URL::asset('public/picture/fABGY.png')}}' width="100%"></a>
                        </div>
                        @endif
                        </br>
						<label class="form-check-label" for="term-id"><a href="{{url('https://facebook.com/gmcos.conan')}}">Step 2. Add us as friend on facebook. <strong>(Go To GM Conan)</strong></a></br></br></br>
                        <label class="form-check-label" for="term-id"><a href="{{url('https://facebook.com/profile?')}}">Step 3. Verify (Copy URL and Paste) Your Facebook Profile <strong>(Go To Facebook Profile)</strong></label></a><br /><br />
                        <div class="form-group row">

                            <label for="fblink" class="col-md-4 col-form-label text-md-right"><a>Facebook Link</a></label>

                            <div class="col-md-6">
                                <input type="text" id="fblink"  name="fblink" placeholder="  Paste Your Facebook Link" value="" required>
                            </div>
                        </div>
                        </br>
                        <label class="form-check-label" for="term-id"><a>Step 4. Fill in the form below, (<strong>DO NOT</strong> use inappropriate words or <strong>CAPITAL</strong> on Your ID)</label> <br /> <br />
                        <div class="form-group row">

                            <label for="name" class="col-md-4 col-form-label text-md-right">ID</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
						
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
						
                        <div class="form-group row">
                            <label for="rcm" class="col-md-4 col-form-label text-md-right">Referral Code</label>

                            <div class="col-md-6">
                                <input type="text" id="rcm"  name="rcm" placeholder="Where do you know this game from?" value="" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pin" class="col-md-4 col-form-label text-md-right">PIN</label>

                            <div class="col-md-6">
                                <input type="password" id="pin"  name="pin" required placeholder="Your 8 digits Pin Number">
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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div> <br /> <br />
                        <label class="form-check-label" for="term-id">Step 5. Read the Terms and Agreement, tick the box and click Register. Send us your Identitiy card's photo to facebook or line id: @sealcos for activation</label> <br/ ><br />
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="term-id" name="term" required>
                            <label class="form-check-label" for="term-id">I already read and completely agree with all the</a>  <a href="{{url('term')}}"><strong>Rules, Terms of Service, and Agreement</strong> </a><a>used by Seal Online: Chronicles of Shiltz. All kinds of violation to used rules are agreed to be punished accordingly.</a></label>
                        </div><br />

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" 
                                        @if(!Session::has('fb_id'))
                                        disabled=""
                                        @endif
                                        >
                                        {{ __('Register') }}
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
</script>
@endsection

