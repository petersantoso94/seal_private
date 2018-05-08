<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Heroic Features - Start Bootstrap Template</title>

        <!-- Bootstrap core CSS -->

        <link href="{{ URL::asset('public/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('public/css/heroic-features.css') }}rel="stylesheet">
        <style>
            html, body {
                height: 100%;
            }
            .footer-custom {
                position: relative;
                margin-top: -150px; /* negative value of footer height */
                height: 150px;
                clear:both;
                padding-top:20px;
            } 
            #wrap {
                min-height: 100%;
            }
            #main {
                overflow:auto;
                padding-bottom:150px; /* this needs to be bigger than footer height*/
            }
        </style>
    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="wrap">
        @yield('main-section')
        </div>
        <!-- Footer -->
        <footer class="py-5 bg-dark footer-custom">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
            </div>
            <!-- /.container -->
        </footer>

        <!-- Bootstrap core JavaScript -->
        <script src="{{ URL::asset('public/jquery/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('public/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        @yield('js-content')
    </body>

</html>