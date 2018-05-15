<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Seal Online: Chronicles of Shiltz</title>

        <!-- Bootstrap core CSS -->

        <link href="{{ URL::asset('public/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('public/css/heroic-features.css') }}rel="stylesheet">
        <style>
            html, body {
                height: 100%;
                font-family: 'MyWebFont';
            }
            .footer-custom {
                position: relative;
                margin-top: -100px; /* negative value of footer height */
                height: 100px;
                clear:both;
                padding-top:20px;
            } 
            #wrap {
                min-height: 100%;
            }
            #main {
                overflow:auto;
                padding-bottom:100px; /* this needs to be bigger than footer height*/
            }
            @font-face {
                font-family: 'MyWebFont';
                src: '<?php echo URL::asset('public/NARNIABLL.TTF') ?>';
            }  
        </style>
    </head>

    <body background="{{URL::asset('public/picture/Web Background.png')}}" style="background-size: 100% 100%;background-attachment: fixed;">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="position: -webkit-sticky; /* Safari */position: sticky;; margin-top: 30px;">
            <div class="container">
                <a href="#" class="navbar-brand"><img src="{{URL::asset('public/picture/logo.png')}}" alt="Seal SHILTZ" style="height:120px;margin-top: -60px;position: absolute;margin-left: auto;margin-right: auto;left: 0;right: 0;"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{url('')}}">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('term')}}">Rules</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://drive.google.com/open?id=1_Iew-NVrXHGZ43p5_ci4R-L0feAP9z2W">Download</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"></a>
                            </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
						@if($user = Auth::user())
							<li class="nav-item">
                            <a class="nav-link" href="{{url('logout')}}">Logout</a>
                        </li>
							@else
                        <li class="nav-item">
                            <a class="nav-link" href="#">We Receive No Donation !</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('register')}}">Sign Up</a>
                        </li>
						@endif
                    </ul>
                </div>
                 </div>
                                                  </nav>
        <div id="wrap" style=""              >
                                    @yield('main-section')
        </div>
              <!-- Footer                                       -->


              <!-- Bootstrap core JavaScript -->
              <script src="{{ URL::asset('public/jquery/jquery.min.js') }}"></script>
              <script src="{{ URL::asset('public/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
              @yield('js-content')
              </body>

              </html>