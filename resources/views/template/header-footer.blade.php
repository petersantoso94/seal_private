<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" type="image/x-icon" href="{{URL::asset('public/picture/seal-cos.ico')}}">

        <title>Seal Online: Chronicles of Shiltz</title>

        <!-- Bootstrap core CSS -->

        <link href="{{ URL::asset('public/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('public/css/heroic-features.css') }}" rel="stylesheet">
        <style>
            /* Full-width input fields */
            input[type=text], input[type=password] {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                box-sizing: border-box;
            }

            button:hover {
                opacity: 0.8;
            }

            /* Extra styles for the cancel button */
            .cancelbtn {
                width: auto;
                padding: 10px 18px;
                background-color: #f44336;
            }

            /* Center the image and position the close button */
            .imgcontainer {
                text-align: center;
                margin: 24px 0 12px 0;
                position: relative;
            }

            img.avatar {
                width: 40%;
                border-radius: 50%;
            }

            .container {
                padding: 16px;
            }

            span.psw {
                float: right;
                padding-top: 16px;
            }

            /* The Modal (background) */
            .modal {
                display: none; /* Hidden by default */
                position: fixed; /* Stay in place */
                z-index: 1; /* Sit on top */
                left: 0;
                top: 0;
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                overflow: auto; /* Enable scroll if needed */
                background-color: rgb(0,0,0); /* Fallback color */
                background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
                padding-top: 60px;
            }

            /* Modal Content/Box */
            .modal-content {
                background-color: #fefefe;
                margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
                border: 1px solid #888;
                width: 50%; /* Could be more or less, depending on screen size */
            }

            /* The Close Button (x) */
            .close {
                position: absolute;
                right: 25px;
                top: 0;
                color: #000;
                font-size: 35px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: red;
                cursor: pointer;
            }

            /* Add Zoom Animation */
            .animate {
                -webkit-animation: animatezoom 0.6s;
                animation: animatezoom 0.6s
            }

            @-webkit-keyframes animatezoom {
                from {-webkit-transform: scale(0)} 
                to {-webkit-transform: scale(1)}
            }

            @keyframes animatezoom {
                from {transform: scale(0)} 
                to {transform: scale(1)}
            }

            /* Change styles for span and cancel button on extra small screens */
            @media screen and (max-width: 300px) {
                span.psw {
                    display: block;
                    float: none;
                }
                .cancelbtn {
                    width: 100%;
                }
            }
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
                src: url('../../../public/NARNIABLL.ttf');
            }  
            .img-container-cs{
                height:500px;
            }
            .img-slider{
                width:100%;
                height:100%;
            }
            /*            .slideshow > div {
                            position: absolute;
                            max-width: 100%;
                            width: 100%;
                            height: 240px;
                            max-height: 100%;
                        }
            
                        .slideshow > div > img {
                            height: 100%;
                            width: 100%;
                        }*/
        </style>
    </head>

    <body background="{{URL::asset('public/picture/Web Background.png')}}" style="background-size: 100% 100%;background-attachment: fixed;">
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
                            <a class="nav-link" href="https://drive.google.com/uc?export=download&confirm=agd_&id=1s0PrbusWLzWMcU62Zdoal3RObAEPxeHP">Download</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        @if(Session::get('username') != null)
                        <div class="nav-item">
                            <a class="nav-link" href="#" onclick="document.getElementById('id01').style.display = 'block'">Reset Game Login Password</a>
                        </div>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('logoutmanual')}}">Logout</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="#">We Receive No Donation !</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('register')}}">Sign Up</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div id="wrap" style="">
            <div class="container" id="main">
                <div class="text-center" style="margin-top: 30px;background: #6c757d">

                    <div class="dropdown" style="margin-left:auto;margin-right:auto;">
                        @if(Session::get('username') == null)
                        <!--dropdown-->
                        <?php
                        $horizontal = 0;
                        $max_horizontal = DB::connection('mysql2')->table('content')->select('horizontal_level')->orderBy('horizontal_level', 'DESC')->first();
                        if ($max_horizontal)
                            $horizontal = $max_horizontal->horizontal_level;
                        ?>
                        @for($i = 1; $i<=$horizontal ;$i++)
                        <?php $vertical = DB::connection('mysql2')->table('content')->orderBy('vertical_level', 'ASC')->where('horizontal_level', $i)->get(); ?>
                        <div class="btn-group">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink<?php echo $i; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{$vertical[0]->horizontal_name}}
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink<?php echo $i; ?>">
                                @foreach($vertical as $data)
                                @if($data->link === '#')
                                <a class="dropdown-item" href="#">{{$data->name}}</a>
                                @elseif($data->content === '' || $data->content === NULL)
                                <a class="dropdown-item" href="{{$data->link}}">{{$data->name}}</a>
                                @else
                                <a class="dropdown-item" href="{{(url('browse').'/'.$data->id)}}">{{$data->name}}</a>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        @endfor
                        @else
                        <div class="btn-group <?php if(isset($page))if($page == 'account')echo 'show'; ?>">
                            <a class="btn btn-secondary" href="{{url('account')}}" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Account
                            </a>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-secondary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Editable Space
                            </a>
                        </div>
                        <div class="btn-group">
                            <a class="btn btn-secondary" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Fan Art
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
                @yield('main-section')
            </div>
        </div>


        <!-- Bootstrap core JavaSc                    ript -->
        <script src="{{ URL::asset('public/jquery/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('public/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        @yield('js-content')
        <script>
                                var checkPIN = "{{url('checkPIN')}}";
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
    </body>
</html>