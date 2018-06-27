@extends('template.header-footer')
@section('main-section')
<!-- Page Content -->
<div class="container" id="main">
    <div class="row text-center" style="margin-top: 30px;background: #6c757d">

        <div class="dropdown show" style="margin-left:auto;margin-right:auto;">
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
        </div>
    </div>
    <!-- Jumbotron Header -->
    @if($user = Auth::user())
    <div class="alert alert-success" role="alert">
        Your registration form has been submitted. Please send your Identity Card's Photos to GM Eastwood and wait for our administrator to review your registration form. (Max. 24 Hours). Thank you very much !! (Submitted as {{$user->name}})
    </div>
    @endif

    <div class="row text-center" style="margin-top: 10px;background:rgba(211,211,211,0.8); ">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-left:auto;margin-right:auto;">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" style="height:500px; width: 100%;">
                <div class="carousel-item img-container-cs active">
                    <img class="d-block w-100 img-slider" src="{{URL::asset('public/picture/Home Logo Seal CoS.png')}}" alt="First slide" >
                    <div class="carousel-caption d-none d-md-block" style="background-color:rgba(211,211,211,0.5);color:black;">     
                    </div>
                </div>
                <div class="carousel-item img-container-cs" >
                    <img class="d-block w-100 img-slider" src="{{URL::asset('public/picture/Summer Playtime2.png')}}" alt="Second slide" >
                    <div class="carousel-caption d-none d-md-block" style="background-color:rgba(211,211,211,0.5);color:black; ">
                    </div>
                </div>
                <div class="carousel-item img-container-cs" >
                    <img class="d-block w-100 img-slider" src="{{URL::asset('public/picture/Quest Reward.png')}}" alt="Third slide" >
                    <div class="carousel-caption d-none d-md-block" style="background-color:rgba(211,211,211,0.5);color:black; ">
                    </div>
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
    <header class="jumbotron my-1" style="background: rgba(204, 204, 204, 0.75);">
        <h1 class="display-5">Seal Online: Chronicles of Shiltz International Private Server !!</h1>
        <p class="lead">Welcome to Seal Online: Chronicles of Shiltz, The First Play to Win Seal Online that Receive No Donations !!
            Anti-Cheat Environment, Clean and Friendly Community, Interested ?? Join Us Now !! </p>
        <a href="{{url('event')}}" class="btn btn-primary btn-lg">Ongoing Events</a>
    </header>

    <!-- Page Features -->


    <!-- /.row -->


</div>
<!-- /.container -->
@stop

