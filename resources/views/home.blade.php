@extends('template.header-footer')
@section('main-section')
<!-- Page Content -->

<!-- Jumbotron Header -->
@if($user = Auth::user())
<div class="alert alert-success" role="alert">
    Your registration form has been submitted. Please send your Identity Card's Photos to GM Eastwood and wait for our administrator to review your registration form. (Max. 24 Hours). Thank you very much !! (Submitted as {{$user->name}})
</div>
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
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-left:auto;margin-right:auto;">
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
                <img class="d-block w-100 img-slider" src="{{URL::asset('public/picture/Home Logo Seal CoS.png')}}" alt="First slide" >
                <!--                <div class="carousel-caption d-none d-md-block" style="background-color:rgba(211,211,211,0.5);color:black;">     
                                </div>-->
            </div>
            <div class="carousel-item img-container-cs" >
                <img class="d-block w-100 img-slider" src="{{URL::asset('public/picture/Pet 6th.png')}}" alt="Second slide" >
            </div>
            <div class="carousel-item img-container-cs" >
                <img class="d-block w-100 img-slider" src="{{URL::asset('public/picture/July Update.png')}}" alt="Third slide" >
            </div>
            <div class="carousel-item img-container-cs" >
                <img class="d-block w-100 img-slider" src="{{URL::asset('public/picture/FB TnS 1.png')}}" alt="Fourth slide" >
            </div>
            <div class="carousel-item img-container-cs" >
                <img class="d-block w-100 img-slider" src="{{URL::asset('public/picture/Vending Frenzy New.png')}}" alt="Fifth slide" >
            </div>
            <div class="carousel-item img-container-cs" >
                <img class="d-block w-100 img-slider" src="{{URL::asset('public/picture/Daily Event.png')}}" alt="Sixth slide" >
            </div>
            <div class="carousel-item img-container-cs" >
                <img class="d-block w-100 img-slider" src="{{URL::asset('public/picture/Quest Reward.png')}}" alt="Seventh slide" >
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
<div class="row" style="width:100%;">  
    <h4>Title</h4>
</div>
<div class="row" style="width:100%;height: 200px;">
    <div class="col-4">
        <img class="card-img-" src="https://imgsv.imaging.nikon.com/lineup/lens/zoom/normalzoom/af-s_dx_18-140mmf_35-56g_ed_vr/img/sample/img_01.jpg" alt="Card image cap" style="width: 100%;">
    </div>
    <div class="col-8">
        <p>content1</p>
        <p>content1</p>
        <p>content1</p>
        <p>content1</p>
        <p>content1</p>
    </div>
</div>

<!-- Page Features -->


<!-- /.row -->
<!-- /.container -->
@stop
@section('js-content')
@stop

