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
    <div class="alert alert-error alert-dismissible" role="alert" style="width: 98%; margin: 1%">
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
                <div class="carousel-caption d-none d-md-block" style="background-color:rgba(211,211,211,0.5);color:black;">     
                </div>
            </div>
            <div class="carousel-item img-container-cs" >
                <img class="d-block w-100 img-slider" src="{{URL::asset('public/picture/Pet 6th.png')}}" alt="Second slide" >
                <div class="carousel-caption d-none d-md-block" style="background-color:rgba(211,211,211,0.5);color:black; ">
                </div>
            </div>
            <div class="carousel-item img-container-cs" >
                <img class="d-block w-100 img-slider" src="{{URL::asset('public/picture/July Update.png')}}" alt="Third slide" >
                <div class="carousel-caption d-none d-md-block" style="background-color:rgba(211,211,211,0.5);color:black; ">
                </div>
            </div>
            <div class="carousel-item img-container-cs" >
                <img class="d-block w-100 img-slider" src="{{URL::asset('public/picture/Promotional Event Instagram.png')}}" alt="Fourth slide" >
                <div class="carousel-caption d-none d-md-block" style="background-color:rgba(211,211,211,0.5);color:black; ">
                </div>
            </div>
            <div class="carousel-item img-container-cs" >
                <img class="d-block w-100 img-slider" src="{{URL::asset('public/picture/Vending Frenzy New.png')}}" alt="Fifth slide" >
                <div class="carousel-caption d-none d-md-block" style="background-color:rgba(211,211,211,0.5);color:black; ">
                </div>
            </div>
            <div class="carousel-item img-container-cs" >
                <img class="d-block w-100 img-slider" src="{{URL::asset('public/picture/Daily Event.png')}}" alt="Sixth slide" >
                <div class="carousel-caption d-none d-md-block" style="background-color:rgba(211,211,211,0.5);color:black; ">
                </div>
            </div>
            <div class="carousel-item img-container-cs" >
                <img class="d-block w-100 img-slider" src="{{URL::asset('public/picture/Quest Reward.png')}}" alt="Seventh slide" >
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
<div class="text-center" style="margin-top: 30px;background: #6c757d">

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

<!-- Page Features -->


<!-- /.row -->


</div>
<!-- /.container -->
@stop
@section('js-content')
@endsection

