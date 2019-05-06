@extends('template.header-footer')
@section('main-section')
<!-- Page Content -->

<!-- Jumbotron Header -->
@if($user = Auth::user())
<div class="alert alert-success" role="alert">
    Your registration form has been submitted. To complete the registration procedure: </br>
	1. Please add GM Conan on Facebook as friend (https://www.facebook.com/conan.sealcos.9) </br>
	2. Send your Identity Card's Photos to GM Conan or Line ID : @sealcos (https://seal-cos.com/browse/38) </br>
	3. Wait for our administrator to review your registration form. (Max. 24 Hours). </br></br>
	
	Our Community: </br></br>
	
	Facebook : https://www.facebook.com/sealonlinecos/ </br>
	Discord : https://discord.gg/WDQqpcv </br>
	Line (Please let us know at @sealcos if you want to join Line group) </br></br>
	
	Thank you very much !! (Submitted as {{$user->name}})
</div>
<?php Auth::logout(); ?>
@endif
<?php if (isset($message)) { ?>
    @if($message == 'success')
    <div class="alert alert-success alert-dismissible" role="alert" style="width: 98%; margin: 1%">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Successfully resetting your password
    </div>
    @else
    <div class="alert alert-danger alert-dismissible" role="alert" style="width: 98%; margin: 1%">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Wrong pin number
    </div>
    @endif
<?php } ?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-left:auto;margin-right:auto;margin-top: 10px;">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
    </ol>
    <div class="carousel-inner" style="height:100%; width: 100%;">
        <div class="carousel-item img-container-cs active">
            <img class="d-block w-100 img-slider" src="{{URL::asset('picture/Ask Blacksmith Anything3.png')}}" alt="First slide" >
            <!--                <div class="carousel-caption d-none d-md-block" style="background-color:rgba(211,211,211,0.5);color:black;">     
                            </div>-->
        </div>
        <div class="carousel-item img-container-cs" >
            <img class="d-block w-100 img-slider" src="{{URL::asset('picture/Costume Poster.png')}}" alt="Second slide" >
        </div>
        <div class="carousel-item img-container-cs" >
            <img class="d-block w-100 img-slider" src="{{URL::asset('picture/Special Golden Chest Latest.png')}}" alt="Third slide" >
        </div>
        <div class="carousel-item img-container-cs" >
            <img class="d-block w-100 img-slider" src="{{URL::asset('picture/Ordinary Golden Chest Latest.png')}}" alt="Fourth slide" >
        </div>
        <div class="carousel-item img-container-cs" >
            <img class="d-block w-100 img-slider" src="{{URL::asset('picture/Blue Eye Dungeon New.png')}}" alt="Fifth slide" >
        </div>
        <div class="carousel-item img-container-cs" >
            <img class="d-block w-100 img-slider" src="{{URL::asset('picture/Quest Reward.png')}}" alt="Sixth slide" >
        </div>
        <div class="carousel-item img-container-cs" >
            <img class="d-block w-100 img-slider" src="{{URL::asset('picture/Pet 6th(2).png')}}" alt="Seventh slide" >
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="games-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <!-- Single Games Area -->
            <div class="col-12 col-md-4">
                <div class="single-games-area text-center mb-100 wow fadeInUp" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                    <img src="{{url::asset('picture/logo.png')}}" alt="">
                    <a href="#" class="btn egames-btn mt-30">View Games</a>
                </div>
            </div>

            <!-- Single Games Area -->
            <div class="col-12 col-md-4">
                <div class="single-games-area text-center mb-100 wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                    <img src="{{url::asset('picture/logo.png')}}" alt="">
                    <a href="#" class="btn egames-btn mt-30">View Games</a>
                </div>
            </div>

            <!-- Single Games Area -->
            <div class="col-12 col-md-4">
                <div class="single-games-area text-center mb-100 wow fadeInUp" data-wow-delay="500ms" style="visibility: visible; animation-delay: 500ms; animation-name: fadeInUp;">
                    <img src="{{url::asset('picture/logo.png')}}" alt="">
                    <a href="#" class="btn egames-btn mt-30">View Games</a>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="monthly-picks-area section-padding-100 bg-pattern">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="left-right-pattern"></div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Title -->
                    <h2 class="section-title mb-70 wow fadeInUp" data-wow-delay="100ms">This Month’s Pick</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-tabs wow fadeInUp" data-wow-delay="300ms" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="popular-tab" data-toggle="tab" href="#popular" role="tab" aria-controls="popular" aria-selected="true">Popular</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="latest-tab" data-toggle="tab" href="#latest" role="tab" aria-controls="latest" aria-selected="false">Latest</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="editor-tab" data-toggle="tab" href="#editor" role="tab" aria-controls="editor" aria-selected="false">Editor’s Pick</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="tab-content wow fadeInUp" data-wow-delay="500ms" id="myTabContent">
            <div class="tab-pane fade show active" id="popular" role="tabpanel" aria-labelledby="popular-tab">
                <!-- Popular Games Slideshow -->
                <div class="popular-games-slideshow owl-carousel">

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{url::asset('template/img/bg-img/50.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">Grand Theft Auto V</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">Action</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{url::asset('template/img/bg-img/51.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">Doom</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">Adventure</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{url::asset('template/img/bg-img/52.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">God of War</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">Action</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{url::asset('template/img/bg-img/53.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">Bloodborne</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">Adventure</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{url::asset('template/img/bg-img/54.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">Persona 5</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">Action</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{url::asset('template/img/bg-img/52.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">God of War</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">Action</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{url::asset('template/img/bg-img/53.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">Bloodborne</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">Adventure</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{url::asset('template/img/bg-img/54.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">Persona 5</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">Action</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="tab-pane fade" id="latest" role="tabpanel" aria-labelledby="latest-tab">
                <!-- Latest Games Slideshow -->
                <div class="latest-games-slideshow owl-carousel">

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{url::asset('template/img/bg-img/50.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">Grand Theft Auto V</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">Action</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{url::asset('template/img/bg-img/51.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">Doom</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">Adventure</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{url::asset('template/img/bg-img/52.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">God of War</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">Action</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{url::asset('template/img/bg-img/53.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">Bloodborne</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">Adventure</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{url::asset('template/img/bg-img/54.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">Persona 5</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">Action</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{url::asset('template/img/bg-img/52.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">God of War</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">Action</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{url::asset('template/img/bg-img/53.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">Bloodborne</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">Adventure</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{url::asset('template/img/bg-img/54.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">Persona 5</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">Action</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="tab-pane fade" id="editor" role="tabpanel" aria-labelledby="editor-tab">
                <!-- Editor Games Slideshow -->
                <div class="editor-games-slideshow owl-carousel">

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{url::asset('template/img/bg-img/50.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">Grand Theft Auto V</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">Action</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{url::asset('template/img/bg-img/51.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">Doom</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">Adventure</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{url::asset('template/img/bg-img/52.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">God of War</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">Action</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{url::asset('template/img/bg-img/53.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">Bloodborne</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">Adventure</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{url::asset('template/img/bg-img/54.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">Persona 5</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">Action</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{url::asset('template/img/bg-img/52.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">God of War</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">Action</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{url::asset('template/img/bg-img/53.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">Bloodborne</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">Adventure</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{url::asset('template/img/bg-img/54.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">Persona 5</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">Action</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
<div class="egames-video-area section-padding-100 bg-pattern2">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="egames-nav-btn" tabindex="1" style="overflow: hidden; outline: none;">
                        <div class="nav flex-column" id="video-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="video1" data-toggle="pill" href="#video-1" role="tab" aria-controls="video-1" aria-selected="true">
                                <!-- Single Video Widget -->
                                <div class="single-video-widget d-flex wow fadeInUp" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                                    <div class="video-thumbnail">
                                        <img src="{{url::asset('template/img/bg-img/14.jpg')}}" alt="">
                                    </div>
                                    <div class="video-text">
                                        <p class="video-title mb-0">Assemble Your Squad and Join the Battle</p>
                                        <span>Nintendo Wii, PS4, XBox 360</span>
                                    </div>
                                    <div class="video-rating">8.3/10</div>
                                </div>
                            </a>

                            <a class="nav-link" id="video2" data-toggle="pill" href="#video-2" role="tab" aria-controls="video-2" aria-selected="false">
                                <!-- Single Video Widget -->
                                <div class="single-video-widget d-flex wow fadeInUp" data-wow-delay="200ms" style="visibility: visible; animation-delay: 200ms; animation-name: fadeInUp;">
                                    <div class="video-thumbnail">
                                        <img src="{{url::asset('template/img/bg-img/15.jpg')}}" alt="">
                                    </div>
                                    <div class="video-text">
                                        <p class="video-title mb-0">Tips to improve your game</p>
                                        <span>Nintendo Wii, PS4, XBox 360</span>
                                    </div>
                                    <div class="video-rating">8.3/10</div>
                                </div>
                            </a>

                            <a class="nav-link" id="video3" data-toggle="pill" href="#video-3" role="tab" aria-controls="video-3" aria-selected="false">
                                <!-- Single Video Widget -->
                                <div class="single-video-widget d-flex wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                                    <div class="video-thumbnail">
                                        <img src="{{url::asset('template/img/bg-img/16.jpg')}}" alt="">
                                    </div>
                                    <div class="video-text">
                                        <p class="video-title mb-0">Game reviews: the best of 2018</p>
                                        <span>Nintendo Wii, PS4, XBox 360</span>
                                    </div>
                                    <div class="video-rating">8.3/10</div>
                                </div>
                            </a>

                            <a class="nav-link" id="video4" data-toggle="pill" href="#video-4" role="tab" aria-controls="video-4" aria-selected="false">
                                <!-- Single Video Widget -->
                                <div class="single-video-widget d-flex wow fadeInUp" data-wow-delay="400ms" style="visibility: hidden; animation-delay: 400ms; animation-name: none;">
                                    <div class="video-thumbnail">
                                        <img src="{{url::asset('template/img/bg-img/17.jpg')}}" alt="">
                                    </div>
                                    <div class="video-text">
                                        <p class="video-title mb-0">Assemble Your Squad and Join the Battle</p>
                                        <span>Nintendo Wii, PS4, XBox 360</span>
                                    </div>
                                    <div class="video-rating">8.3/10</div>
                                </div>
                            </a>

                            <a class="nav-link" id="video5" data-toggle="pill" href="#video-5" role="tab" aria-controls="video-5" aria-selected="false">
                                <!-- Single Video Widget -->
                                <div class="single-video-widget d-flex wow fadeInUp" data-wow-delay="500ms" style="visibility: hidden; animation-delay: 500ms; animation-name: none;">
                                    <div class="video-thumbnail">
                                        <img src="{{url::asset('template/img/bg-img/18.jpg')}}" alt="">
                                    </div>
                                    <div class="video-text">
                                        <p class="video-title mb-0">Tips to improve your game</p>
                                        <span>Nintendo Wii, PS4, XBox 360</span>
                                    </div>
                                    <div class="video-rating">8.3/10</div>
                                </div>
                            </a>

                            <a class="nav-link" id="video6" data-toggle="pill" href="#video-6" role="tab" aria-controls="video-6" aria-selected="false">
                                <!-- Single Video Widget -->
                                <div class="single-video-widget d-flex wow fadeInUp" data-wow-delay="600ms" style="visibility: hidden; animation-delay: 600ms; animation-name: none;">
                                    <div class="video-thumbnail">
                                        <img src="{{url::asset('template/img/bg-img/14.jpg')}}" alt="">
                                    </div>
                                    <div class="video-text">
                                        <p class="video-title mb-0">Game reviews: the best of 2018</p>
                                        <span>Nintendo Wii, PS4, XBox 360</span>
                                    </div>
                                    <div class="video-rating">8.3/10</div>
                                </div>
                            </a>

                            <a class="nav-link" id="video7" data-toggle="pill" href="#video-7" role="tab" aria-controls="video-7" aria-selected="false">
                                <!-- Single Video Widget -->
                                <div class="single-video-widget d-flex wow fadeInUp" data-wow-delay="700ms" style="visibility: hidden; animation-delay: 700ms; animation-name: none;">
                                    <div class="video-thumbnail">
                                        <img src="{{url::asset('template/img/bg-img/15.jpg')}}" alt="">
                                    </div>
                                    <div class="video-text">
                                        <p class="video-title mb-0">Tips to improve your game</p>
                                        <span>Nintendo Wii, PS4, XBox 360</span>
                                    </div>
                                    <div class="video-rating">8.3/10</div>
                                </div>
                            </a>

                            <a class="nav-link" id="video8" data-toggle="pill" href="#video-8" role="tab" aria-controls="video-8" aria-selected="false">
                                <!-- Single Video Widget -->
                                <div class="single-video-widget d-flex wow fadeInUp" data-wow-delay="800ms" style="visibility: hidden; animation-delay: 800ms; animation-name: none;">
                                    <div class="video-thumbnail">
                                        <img src="{{url::asset('template/img/bg-img/16.jpg')}}" alt="">
                                    </div>
                                    <div class="video-text">
                                        <p class="video-title mb-0">Game reviews: the best of 2018</p>
                                        <span>Nintendo Wii, PS4, XBox 360</span>
                                    </div>
                                    <div class="video-rating">8.3/10</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-8">
                    <div class="tab-content" id="video-tabContent">
                        <div class="tab-pane fade show active" id="video-1" role="tabpanel" aria-labelledby="video1">
                            <div class="video-playground bg-img" style="background-image: url(template/img/bg-img/45.jpg);">
                                <!-- Play Button -->
                                <div class="play-btn">
                                    <a href="https://www.youtube.com/watch?v=7HKoqNJtMTQ" class="play-button"><img src="{{url::asset('template/img/core-img/play.png')}}" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="video-2" role="tabpanel" aria-labelledby="video2">
                            <div class="video-playground bg-img" style="background-image: url(template/img/bg-img/46.jpg);">
                                <!-- Play Button -->
                                <div class="play-btn">
                                    <a href="https://www.youtube.com/watch?v=7HKoqNJtMTQ" class="play-button"><img src="{{url::asset('template/img/core-img/play.png')}}" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="video-3" role="tabpanel" aria-labelledby="video3">
                            <div class="video-playground bg-img" style="background-image: url(template/img/bg-img/47.jpg);">
                                <!-- Play Button -->
                                <div class="play-btn">
                                    <a href="https://www.youtube.com/watch?v=7HKoqNJtMTQ" class="play-button"><img src="{{url::asset('template/img/core-img/play.png')}}" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="video-4" role="tabpanel" aria-labelledby="video4">
                            <div class="video-playground bg-img" style="background-image: url(template/img/bg-img/48.jpg);">
                                <!-- Play Button -->
                                <div class="play-btn">
                                    <a href="https://www.youtube.com/watch?v=7HKoqNJtMTQ" class="play-button"><img src="{{url::asset('template/img/core-img/play.png')}}" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="video-5" role="tabpanel" aria-labelledby="video5">
                            <div class="video-playground bg-img" style="background-image: url(template/img/bg-img/49.jpg);">
                                <!-- Play Button -->
                                <div class="play-btn">
                                    <a href="https://www.youtube.com/watch?v=7HKoqNJtMTQ" class="play-button"><img src="{{url::asset('template/img/core-img/play.png')}}" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="video-6" role="tabpanel" aria-labelledby="video6">
                            <div class="video-playground bg-img" style="background-image: url(template/img/bg-img/45.jpg);">
                                <!-- Play Button -->
                                <div class="play-btn">
                                    <a href="https://www.youtube.com/watch?v=7HKoqNJtMTQ" class="play-button"><img src="{{url::asset('template/img/core-img/play.png')}}" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="video-7" role="tabpanel" aria-labelledby="video7">
                            <div class="video-playground bg-img" style="background-image: url(template/img/bg-img/46.jpg);">
                                <!-- Play Button -->
                                <div class="play-btn">
                                    <a href="https://www.youtube.com/watch?v=7HKoqNJtMTQ" class="play-button"><img src="{{url::asset('template/img/core-img/play.png')}}" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="video-8" role="tabpanel" aria-labelledby="video8">
                            <div class="video-playground bg-img" style="background-image: url(template/img/bg-img/47.jpg);">
                                <!-- Play Button -->
                                <div class="play-btn">
                                    <a href="https://www.youtube.com/watch?v=7HKoqNJtMTQ" class="play-button"><img src="{{url::asset('template/img/core-img/play.png')}}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<section class="latest-articles-area section-padding-100-0 bg-img bg-pattern bg-fixed" style="background-image: url(template/img/bg-img/5.jpg);margin-top:20px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="mb-100">
                    <!-- Title -->
                    <h2 class="section-title mb-70 wow fadeInUp" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">Latest Articles</h2>

                    <!-- *** Single Articles Area *** -->
                    @foreach(DB::connection('mysql2')->table('news')->where('approved','1')->orderBy('id', 'DESC')->select('*')->get() as $new)
                    <div class="single-articles-area style-2 d-flex flex-wrap mb-30 wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                        <div class="article-thumbnail">
                            <img src="{{URL::asset('picture/'.$new->image)}}" alt="">
                        </div>
                        <div class="article-content">
                            <a href="single-post.html" class="post-title">{{$new->title}}</a>
                            <div class="post-meta">
                                <a href="#" class="post-date">July 12, 2018</a>
                                <a href="#" class="post-comments">2 Comments</a>
                            </div>
                            <p style="word-wrap: break-word;white-space: pre-wrap;display: inline-block;">
                                {{$new->content}}
                            </p>
                        </div>
                    </div>
                    @endforeach

                    <!-- *** Single Articles Area *** -->
                    <div class="single-articles-area style-2 d-flex flex-wrap mb-30 wow fadeInUp" data-wow-delay="500ms" style="visibility: visible; animation-delay: 500ms; animation-name: fadeInUp;">
                        <div class="article-thumbnail">
                            <img src="{{url::asset('template/img/bg-img/7.jpg')}}" alt="">
                        </div>
                        <div class="article-content">
                            <a href="single-post.html" class="post-title">10 Tips to be a better gamer</a>
                            <div class="post-meta">
                                <a href="#" class="post-date">July 12, 2018</a>
                                <a href="#" class="post-comments">2 Comments</a>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris velit arcu, scelerisque dignissim massa quis, mattis facilisis erat. Aliquam erat volutpat. Sed efficitur diam.</p>
                        </div>
                    </div>

                    <!-- *** Single Articles Area *** -->
                    <div class="single-articles-area style-2 d-flex flex-wrap mb-30 wow fadeInUp" data-wow-delay="700ms" style="visibility: visible; animation-delay: 700ms; animation-name: fadeInUp;">
                        <div class="article-thumbnail">
                            <img src="{{url::asset('template/img/bg-img/8.jpg')}}" alt="">
                        </div>
                        <div class="article-content">
                            <a href="single-post.html" class="post-title">Microsoft has some new tips</a>
                            <div class="post-meta">
                                <a href="#" class="post-date">July 12, 2018</a>
                                <a href="#" class="post-comments">2 Comments</a>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris velit arcu, scelerisque dignissim massa quis, mattis facilisis erat. Aliquam erat volutpat. Sed efficitur diam.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <!-- Title -->
                <h2 class="section-title mb-70 wow fadeInUp" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">This week’s deal</h2>

                <!-- Single Widget Area -->
                <div class="single-widget-area add-widget wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                    <a href="#"><img src="{{url::asset('template/img/bg-img/add.png')}}" alt=""></a>
                    <!-- Side Img -->
                    <img src="{{url::asset('template/img/bg-img/side-img.png')}}" class="side-img" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Page Features -->


<!-- /.row -->
<!-- /.container -->
@stop
@section('js-content')
<script>
    setInterval(function () {
        $('iframe').css('width', $(".container").width() + 'px');
    }, 1000);
</script>
@stop

