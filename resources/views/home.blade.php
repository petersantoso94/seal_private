@extends('template.header-footer')
@section('main-section')
<!-- Page Content -->

<!-- Jumbotron Header -->
@if($user = Auth::user())
<div class="alert alert-success" role="alert">
    Your registration form has been submitted. Please send your Identity Card's Photos to GM Eastwood and wait for our administrator to review your registration form. (Max. 24 Hours). Thank you very much !! (Submitted as {{$user->name}})
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
<div class="row text-center" style="margin-top: 10px;background:rgba(211,211,211,0.8); ">
    <iframe height="500" src="https://www.youtube.com/embed/ycYLA_6-FTk" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
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
        <div class="carousel-inner" style="height:500px; width: 100%;">
            <div class="carousel-item img-container-cs active">
                <img class="d-block w-100 img-slider" src="{{URL::asset('public/picture/Costume Poster.png')}}" alt="First slide" >
                <!--                <div class="carousel-caption d-none d-md-block" style="background-color:rgba(211,211,211,0.5);color:black;">     
                                </div>-->
            </div>
            <div class="carousel-item img-container-cs" >
                <img class="d-block w-100 img-slider" src="{{URL::asset('public/picture/Pet 6th(2).png')}}" alt="Second slide" >
            </div>
            <div class="carousel-item img-container-cs" >
                <img class="d-block w-100 img-slider" src="{{URL::asset('public/picture/Special Golden Chest.png')}}" alt="Third slide" >
            </div>
            <div class="carousel-item img-container-cs" >
                <img class="d-block w-100 img-slider" src="{{URL::asset('public/picture/StrongerTogether.png')}}" alt="Fourth slide" >
            </div>
            <div class="carousel-item img-container-cs" >
                <img class="d-block w-100 img-slider" src="{{URL::asset('public/picture/Quest Reward.png')}}" alt="Fifth slide" >
            </div>
            <div class="carousel-item img-container-cs" >
                <img class="d-block w-100 img-slider" src="{{URL::asset('public/picture/Home Logo Seal CoS.png')}}" alt="Sixth slide" >
            </div>
			<div class="carousel-item img-container-cs" >
                <img class="d-block w-100 img-slider" src="{{URL::asset('public/picture/Daily Events.png')}}" alt="Seventh slide" >
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
</div>
<div class="news-container" >
    @foreach(DB::connection('mysql2')->table('news')->where('approved','1')->orderBy('id', 'DESC')->select('*')->get() as $new)
    <div class="row" style="margin-top: 10px;background:rgba(211,211,211,0.8);width: 100%; ">
        <div class="row" style="width:100%;background: #6c757d; height: 10%;padding-left: 15px;padding-top: 10px;margin-bottom: 10px">  
            <h4>{{$new->title}}</h4>
        </div>
        <div class="row" style="width:100%;height: 90%;padding-bottom: 10px">
            <div class="col-4">
                <img class="card-img-" src="{{URL::asset('public/picture/'.$new->image)}}" alt="Card image cap" style="width: 100%;">
            </div>
            <div class="col-8" style="word-wrap: break-word;white-space: pre-wrap;display: inline-block;">
                {{$new->content}}
            </div>
        </div>
    </div>
    @endforeach
</div>

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

