@extends('template.header-footer')
@section('main-section')
<!-- Page Content -->

<!-- Jumbotron Header -->
@if($user = Auth::user())
<br><br>
<div class="alert alert-success" role="alert">
    Your registration form has been submitted. To complete the registration procedure: </br>
	1. Please add GM Conan on Facebook as friend (https://www.facebook.com/gmcos.conan) </br>
	2. Send your Identity Card's Photos to GM Conan or Line ID : @sealcos </br>
	3. Wait for our administrator to review your registration form. (Max. 24 Hours). </br></br>
	
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
<div class="hero-area">
    <!-- Hero Post Slides -->
    <div class="hero-post-slides owl-carousel">

        <!-- Single Slide -->
        <div class="single-slide bg-img bg-overlay" style="background-image: url(public/template/img/bg-img/1.jpg);">
            <!-- Blog Content -->
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 col-lg-9">
                        <div class="blog-content" data-animation="fadeInUp" data-delay="100ms">
                            <h2 data-animation="fadeInUp" data-delay="400ms">Welcome to Seal CoS</h2>
                            <p data-animation="fadeInUp" data-delay="700ms">Seal Online: Chronicles of Shiltz is a non-profit server run by volunteers with vision to bring back nostalgic feeling from playing the game and it is not made for business purpose. Our team will devote time and effort to ensure all players can enjoy the fun, fair, and competitive gameplay.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single Slide -->
        <div class="single-slide bg-img bg-overlay" style="background-image: url(public/template/img/bg-img/2.jpg);">
            <!-- Blog Content -->
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 col-lg-9">
                        <div class="blog-content" data-animation="fadeInUp" data-delay="100ms">
                            <h2 data-animation="fadeInUp" data-delay="400ms">About Us</h2>
                            <p data-animation="fadeInUp" data-delay="700ms">To bring this vision into reality, supports from players are needed to create a sustainable market and game environment for everyone. We will be strict to players, communities, or countries that can cause harm to our server. Any kind of hacking, cheats, rules violation will be punished by indefinite ban from our server. Seal Online: Chronicles of Shiltz do not have any responsibility and obligation to answer, giving proof, or executing preventive action in order to maintain its quality.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="games-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <!-- Single Games Area -->
            <div class="col-12 col-md-4">
                <div class="single-games-area text-center mb-100 wow fadeInUp" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                    <img src="{{URL::asset('public/template/img/bg-img/Exp-Drop.jpg')}}" alt="">
                    <a href="#" class="btn egames-btn mt-30">Exp and Drop Rate</a>
                </div>
            </div>

            <!-- Single Games Area -->
            <div class="col-12 col-md-4">
                <div class="single-games-area text-center mb-100 wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                    <img src="{{URL::asset('public/template/img/bg-img/Open Beta.jpg')}}" alt="">
                    <a href="https://seal-cos.com/register" class="btn egames-btn mt-30">Register</a>
                </div>
            </div>

            <!-- Single Games Area -->
            <div class="col-12 col-md-4">
                <div class="single-games-area text-center mb-100 wow fadeInUp" data-wow-delay="500ms" style="visibility: visible; animation-delay: 500ms; animation-name: fadeInUp;">
                    <img src="{{URL::asset('public/template/img/bg-img/MT Schedule.jpg')}}" alt="">
                    <a href="#" class="btn egames-btn mt-30">Maintenance Schedule</a>
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
                    <h2 class="section-title mb-70 wow fadeInUp" data-wow-delay="100ms">Player's Zone</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-tabs wow fadeInUp" data-wow-delay="300ms" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="popular-tab" data-toggle="tab" href="#popular" role="tab" aria-controls="popular" aria-selected="true">Male's Costume</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="latest-tab" data-toggle="tab" href="#latest" role="tab" aria-controls="latest" aria-selected="false">Female's Costume</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="editor-tab" data-toggle="tab" href="#editor" role="tab" aria-controls="editor" aria-selected="false">Game Review</a>
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
                        <img src="{{URL::asset('public/template/img/bg-img/500.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">#</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">#</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{URL::asset('public/template/img/bg-img/510.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">#</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">#</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{URL::asset('public/template/img/bg-img/520.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">#</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">#</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{URL::asset('public/template/img/bg-img/530.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">#</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">#</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{URL::asset('public/template/img/bg-img/540.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">#</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">#</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{URL::asset('public/template/img/bg-img/520.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">#</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">#</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{URL::asset('public/template/img/bg-img/530.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">#</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">#</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{URL::asset('public/template/img/bg-img/540.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">#</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">#</a>
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
                        <img src="{{URL::asset('public/template/img/bg-img/510.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">#</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">#</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{URL::asset('public/template/img/bg-img/510.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">#</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">#</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{URL::asset('public/template/img/bg-img/520.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">#</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">#</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{URL::asset('public/template/img/bg-img/510.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">#</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">#</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{URL::asset('public/template/img/bg-img/510.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">#</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">#</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{URL::asset('public/template/img/bg-img/510.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">#</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">#</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{URL::asset('public/template/img/bg-img/510.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">#</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">#</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{URL::asset('public/template/img/bg-img/510.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">#</a>
                            <div class="meta-data">
                                <a href="#">User: 9.1/10</a>
                                <a href="#">#</a>
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
                        <img src="{{URL::asset('public/template/img/bg-img/Review1.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">Bayu Rahmatullah</a>
                            <div class="meta-data">
                                <a href="#">User: 5.0/5.0</a>
                                <a href="#">Good</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{URL::asset('public/template/img/bg-img/Review2.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">Reka Sirat</a>
                            <div class="meta-data">
                                <a href="#">User: 3.8/5.0</a>
                                <a href="#" style="color:#FFFF00;">Moderate</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                    <div class="single-games-slide">
                        <img src="{{URL::asset('public/template/img/bg-img/Review3.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">Ricky Rusli</a>
                            <div class="meta-data">
                                <a href="#">User: 5.0/5.0</a>
                                <a href="#">Good</a>
                            </div>
                        </div>
                    </div>

                    <!-- Single Games -->
                   <div class="single-games-slide">
                        <img src="{{URL::asset('public/template/img/bg-img/Review4.jpg')}}" alt="">
                        <div class="slide-text">
                            <a href="#" class="game-title">Rexsa Lombogia</a>
                            <div class="meta-data">
                                <a href="#">User: 5.0/5.0</a>
                                <a href="#">Good</a>
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
                                        <img src="{{URL::asset('public/template/img/bg-img/Warriors.jpg')}}" alt="">
                                    </div>
                                    <div class="video-text">
                                        <p class="video-title mb-0">Class: Warriors</p>
                                        <span>Before You Play Edition</span>
                                    </div>
                                    <div class="video-rating">CoS</div>
                                </div>
                            </a>

                            <a class="nav-link" id="video2" data-toggle="pill" href="#video-2" role="tab" aria-controls="video-2" aria-selected="false">
                                <!-- Single Video Widget -->
                                <div class="single-video-widget d-flex wow fadeInUp" data-wow-delay="200ms" style="visibility: visible; animation-delay: 200ms; animation-name: fadeInUp;">
                                    <div class="video-thumbnail">
                                        <img src="{{URL::asset('public/template/img/bg-img/Knights.jpg')}}" alt="">
                                    </div>
                                    <div class="video-text">
                                        <p class="video-title mb-0">Class: Knights</p>
                                        <span>Before You Play Edition</span>
                                    </div>
                                    <div class="video-rating">CoS</div>
                                </div>
                            </a>

                            <a class="nav-link" id="video3" data-toggle="pill" href="#video-3" role="tab" aria-controls="video-3" aria-selected="false">
                                <!-- Single Video Widget -->
                                <div class="single-video-widget d-flex wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                                    <div class="video-thumbnail">
                                        <img src="{{URL::asset('public/template/img/bg-img/160.jpg')}}" alt="">
                                    </div>
                                    <div class="video-text">
                                        <p class="video-title mb-0">#</p>
                                        <span>Before You Play Edition</span>
                                    </div>
                                    <div class="video-rating">CoS</div>
                                </div>
                            </a>

                            <a class="nav-link" id="video4" data-toggle="pill" href="#video-4" role="tab" aria-controls="video-4" aria-selected="false">
                                <!-- Single Video Widget -->
                                <div class="single-video-widget d-flex wow fadeInUp" data-wow-delay="400ms" style="visibility: hidden; animation-delay: 400ms; animation-name: none;">
                                    <div class="video-thumbnail">
                                        <img src="{{URL::asset('public/template/img/bg-img/170.jpg')}}" alt="">
                                    </div>
                                    <div class="video-text">
                                        <p class="video-title mb-0">#</p>
                                        <span>Before You Play Edition</span>
                                    </div>
                                    <div class="video-rating">CoS</div>
                                </div>
                            </a>

                            <a class="nav-link" id="video5" data-toggle="pill" href="#video-5" role="tab" aria-controls="video-5" aria-selected="false">
                                <!-- Single Video Widget -->
                                <div class="single-video-widget d-flex wow fadeInUp" data-wow-delay="500ms" style="visibility: hidden; animation-delay: 500ms; animation-name: none;">
                                    <div class="video-thumbnail">
                                        <img src="{{URL::asset('public/template/img/bg-img/180.jpg')}}" alt="">
                                    </div>
                                    <div class="video-text">
                                        <p class="video-title mb-0">#</p>
                                        <span>Before You Play Edition</span>
                                    </div>
                                    <div class="video-rating">CoS</div>
                                </div>
                            </a>

                            <a class="nav-link" id="video6" data-toggle="pill" href="#video-6" role="tab" aria-controls="video-6" aria-selected="false">
                                <!-- Single Video Widget -->
                                <div class="single-video-widget d-flex wow fadeInUp" data-wow-delay="600ms" style="visibility: hidden; animation-delay: 600ms; animation-name: none;">
                                    <div class="video-thumbnail">
                                        <img src="{{URL::asset('public/template/img/bg-img/140.jpg')}}" alt="">
                                    </div>
                                    <div class="video-text">
                                        <p class="video-title mb-0">#</p>
                                        <span>Before You Play Edition</span>
                                    </div>
                                    <div class="video-rating">CoS</div>
                                </div>
                            </a>

                            <!--<a class="nav-link" id="video7" data-toggle="pill" href="#video-7" role="tab" aria-controls="video-7" aria-selected="false">
                                
                                <div class="single-video-widget d-flex wow fadeInUp" data-wow-delay="700ms" style="visibility: hidden; animation-delay: 700ms; animation-name: none;">
                                    <div class="video-thumbnail">
                                        <img src="{{URL::asset('public/template/img/bg-img/150.jpg')}}" alt="">
                                    </div>
                                    <div class="video-text">
                                        <p class="video-title mb-0">#</p>
                                        <span>#</span>
                                    </div>
                                    <div class="video-rating">8.3/10</div>
                                </div>
                            </a>

                            <a class="nav-link" id="video8" data-toggle="pill" href="#video-8" role="tab" aria-controls="video-8" aria-selected="false">
                                
                                <div class="single-video-widget d-flex wow fadeInUp" data-wow-delay="800ms" style="visibility: hidden; animation-delay: 800ms; animation-name: none;">
                                    <div class="video-thumbnail">
                                        <img src="{{URL::asset('public/template/img/bg-img/160.jpg')}}" alt="">
                                    </div>
                                    <div class="video-text">
                                        <p class="video-title mb-0">#</p>
                                        <span>#</span>
                                    </div>
                                    <div class="video-rating">8.3/10</div>
                                </div>
                            </a>-->
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-8">
                    <div class="tab-content" id="video-tabContent">
                        <div class="tab-pane fade show active" id="video-1" role="tabpanel" aria-labelledby="video1">
                            <div class="video-playground bg-img" style="background-image: url(public/template/img/bg-img/Warriors.jpg);">
                                <!-- Play Button -->
                                <div class="play-btn">
                                    <a href="https://www.youtube.com/watch?v=jqZ76g7ZKi8" class="play-button"><img src="{{URL::asset('public/template/img/core-img/play.png')}}" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="video-2" role="tabpanel" aria-labelledby="video2">
                            <div class="video-playground bg-img" style="background-image: url(public/template/img/bg-img/460.jpg);">
                                <!-- Play Button -->
                                <div class="play-btn">
                                    <a href="https://www.youtube.com/watch?v=7HKoqNJtMTQ#" class="play-button"><img src="{{URL::asset('public/template/img/core-img/play.png')}}" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="video-3" role="tabpanel" aria-labelledby="video3">
                            <div class="video-playground bg-img" style="background-image: url(public/template/img/bg-img/470.jpg);">
                                <!-- Play Button -->
                                <div class="play-btn">
                                    <a href="https://www.youtube.com/watch?v=7HKoqNJtMTQ" class="play-button"><img src="{{URL::asset('public/template/img/core-img/play.png')}}" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="video-4" role="tabpanel" aria-labelledby="video4">
                            <div class="video-playground bg-img" style="background-image: url(public/template/img/bg-img/480.jpg);">
                                <!-- Play Button -->
                                <div class="play-btn">
                                    <a href="https://www.youtube.com/watch?v=7HKoqNJtMTQ" class="play-button"><img src="{{URL::asset('public/template/img/core-img/play.png')}}" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="video-5" role="tabpanel" aria-labelledby="video5">
                            <div class="video-playground bg-img" style="background-image: url(public/template/img/bg-img/490.jpg);">
                                <!-- Play Button -->
                                <div class="play-btn">
                                    <a href="https://www.youtube.com/watch?v=7HKoqNJtMTQ" class="play-button"><img src="{{URL::asset('public/template/img/core-img/play.png')}}" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="video-6" role="tabpanel" aria-labelledby="video6">
                            <div class="video-playground bg-img" style="background-image: url(public/template/img/bg-img/450.jpg);">
                                <!-- Play Button -->
                                <div class="play-btn">
                                    <a href="https://www.youtube.com/watch?v=7HKoqNJtMTQ" class="play-button"><img src="{{URL::asset('public/template/img/core-img/play.png')}}" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="video-7" role="tabpanel" aria-labelledby="video7">
                            <div class="video-playground bg-img" style="background-image: url(public/template/img/bg-img/460.jpg);">
                                <!-- Play Button -->
                                <div class="play-btn">
                                    <a href="https://www.youtube.com/watch?v=7HKoqNJtMTQ" class="play-button"><img src="{{URL::asset('public/template/img/core-img/play.png')}}" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="video-8" role="tabpanel" aria-labelledby="video8">
                            <div class="video-playground bg-img" style="background-image: url(public/template/img/bg-img/470.jpg);">
                                <!-- Play Button -->
                                <div class="play-btn">
                                    <a href="https://www.youtube.com/watch?v=7HKoqNJtMTQ" class="play-button"><img src="{{URL::asset('public/template/img/core-img/play.png')}}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<section class="latest-articles-area section-padding-100-0 bg-img bg-pattern bg-fixed" style="background-image: url(public/template/img/bg-img/5.jpg);margin-top:20px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="mb-100">
                    <!-- Title -->
                    <h2 class="section-title mb-70 wow fadeInUp" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">News</h2>

                    <!-- *** Single Articles Area ***
                    @foreach(DB::connection('mysql2')->table('news')->where('approved','1')->orderBy('id', 'DESC')->select('*')->get() as $new)
                    <div class="single-articles-area style-2 d-flex flex-wrap mb-30 wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                        <div class="article-thumbnail">
                            <img src="{{URL::asset('public/picture/'.$new->image)}}" alt="">
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
                    @endforeach-->

                    <!-- *** Single Articles Area *** -->
                    <div class="single-articles-area style-2 d-flex flex-wrap mb-30 wow fadeInUp" data-wow-delay="500ms" style="visibility: visible; animation-delay: 500ms; animation-name: fadeInUp;">
                        <div class="article-thumbnail">
                            <img src="{{URL::asset('public/template/img/bg-img/Open Beta.jpg')}}" alt="">
                        </div>
                        <div class="article-content">
                            <a href="#" class="post-title">Server is now Live !!</a>
                            <div class="post-meta">
                                <a href="#" class="post-date">May 18, 2018</a>
                                <a href="#" class="post-comments">Server Opening</a>
                            </div>
                            <p>Welcome to Seal Online: Chronicles of Shiltz. </br> Server are officially opened today, Come and Join Us !!</p>
                        </div>
                    </div>

                    <!-- *** Single Articles Area *** -->
                    <div class="single-articles-area style-2 d-flex flex-wrap mb-30 wow fadeInUp" data-wow-delay="500ms" style="visibility: visible; animation-delay: 500ms; animation-name: fadeInUp;">
                        <div class="article-thumbnail">
                            <img src="{{URL::asset('public/template/img/bg-img/News1.jpg')}}" alt="">
                        </div>
                        <div class="article-content">
                            <a href="https://seal-cos.com/6th-Grade-Pet" class="post-title">The Ultimate Partners are Here !!</a>
                            <div class="post-meta">
                                <a href="https://seal-cos.com/6th-Grade-Pet" class="post-date">May 8, 2019</a>
                                <a href="https://seal-cos.com/6th-Grade-Pet" class="post-comments">6th Grade Pet Evolution</a>
                            </div>
                            <p>It is time for those pets to reach new level, train them and defeat all those bales. 6th grade pet evolution are now available. You are chosen to wear them, they will only chose those above level 200 to be their master. Train, Bond, and Shine !!</p>                      </div>
                    </div>

                    <!-- *** Single Articles Area *** -->
                    <div class="single-articles-area style-2 d-flex flex-wrap mb-30 wow fadeInUp" data-wow-delay="500ms" style="visibility: visible; animation-delay: 500ms; animation-name: fadeInUp;">
                        <div class="article-thumbnail">
                            <img src="{{URL::asset('public/template/img/bg-img/News2.jpg')}}" alt="">
                        </div>
                        <div class="article-content">
                            <a href="#" class="post-title">The Game is On !!</a>
                            <div class="post-meta">
                                <a href="#" class="post-date">May 8, 2019</a>
                                <a href="#" class="post-comments">Quest Reward Alteration</a>
                            </div>
                            <p>	Reward for quests are altered for grinding purpose,Get ready and hunt those bales. Quests are available in quest center. Invest in your dreams. Grind now. Shine later.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <!-- Title -->
                <h2 class="section-title mb-70 wow fadeInUp" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">This Month's Event</h2>

                <!-- Single Widget Area -->
                <div class="single-widget-area add-widget wow fadeInUp" data-wow-delay="300ms" style="visibility: visible; animation-delay: 300ms; animation-name: fadeInUp;">
                    <a href="#"><img src="{{URL::asset('public/template/img/bg-img/game1.jpg')}}" alt=""></a>
                    <!-- Side Img -->
                    <img src="{{URL::asset('public/template/img/bg-img/#.png')}}" class="side-img" alt="">
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

