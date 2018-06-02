@extends('template.header-footer')
@section('main-section')
<!-- Page Content -->
<div class="container" id="main">
    <div class="row text-center" style="margin-top: 30px; margin-left: 10px;">
		
        <div class="dropdown show">
            <!--dropdown-->
            <?php
            $horizontal = 0;
            $max_horizontal = DB::connection('mysql2')->table('content')->select('horizontal_level')->orderBy('horizontal_level', 'DESC')->first();
            if (count($max_horizontal) > 0)
                $horizontal = $max_horizontal->horizontal_level;
            ?>
            @for($i = 1; $i<=$horizontal ;$i++)
            <?php $vertical = DB::connection('mysql2')->table('content')->orderBy('vertical_level', 'ASC')->where('horizontal_level', $i)->get(); ?>
            <div class="btn-group">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink<?php echo $i; ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ranking
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink<?php echo $i; ?>">
                    @foreach($vertical as $data)
                    @if($data->link === '#')
                    <a class="dropdown-item" href="#">{{$data->name}}</a>
                    @else
                    <a class="dropdown-item" href="{{url::route('browse').'/'.$data->id}}">{{$data->name}}</a>
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
    <header class="jumbotron my-1" style="background: rgba(204, 204, 204, 0.8);;">
        <h1 class="display-5">Seal Online: Chronicles of Shiltz International Private Server !!</h1>
        <p class="lead">Welcome to Seal Online: Chronicles of Shiltz, The First Play to Win Seal Online that Receive No Donations !!
		Anti-Cheat Environment, Clean and Friendly Community, Interested ?? Join Us Now !! </p>
        <a href="{{url('event')}}" class="btn btn-primary btn-lg">Ongoing Events</a>
    </header>

    <!-- Page Features -->
    <div class="row text-center">
        <div class="col">
		<div class="card">
				<br />
				<h4 class="card-title">Registration are now Open !!</h4>
                <img class="card-img-top" src="{{URL::asset('public/picture/Open_Beta.jpg')}}" alt="" width="255" height="450">
				<br />
				<h4 class="card-title">Quest Central Cegel Rewards !!</h4>
                <img class="card-img-top" src="{{URL::asset('public/picture/Quest_Reward.png')}}" alt="" width="255" height="450">
				<br />
				<h4 class="card-title">Closed Beta Test Start !</h4>
				<img class="card-img-top" src="{{URL::asset('public/picture/CBT_Open.png')}}" alt="" width="255" height="450">
				<br />
				<h4 class="card-title">GM Recruitment is Now Closed <br /> Thank You for Joining Us !</h4>
				<img class="card-img-top" src="{{URL::asset('public/picture/hiring2.png')}}" alt="" width="255" height="255">
				<br />
				<h4 class="card-title">Our Schedule</h4>
				<img class="card-img-top" src="{{URL::asset('public/picture/logo_picture.png')}}" alt="" width="255" height="255">
				<br />
				<h4 class="card-title">GM Recruitment is Now Open <br /> Join Us Now !! </h4>
				<img class="card-img-top" src="{{URL::asset('public/picture/hiring.png')}}" alt="" width="255" height="255">
				<br />
				<h4 class="card-title">About Our Server</h4>
                <img class="card-img-top" src="{{URL::asset('public/picture/home_logo.png')}}" alt="" width="255" height="255">
				<div class="card-body">
                <br />
				<h4 class="card-title">Seal Online: Chronicles of Shiltz</h4>
                </div>
                <div class="card-footer">
                    <!-- <a href="#" class="btn btn-primary">Find Out More!</a> -->
                </div>
            </div>
		</div>
		<div class="col">
            <div class="card">
                <img class="card-img-top" src="{{URL::asset('public/picture/us.jpg')}}" alt="" width="400" height="255">
                <div class="card-body">
                    <h4 class="card-title">Introducing The Game Masters</h4>
                    <p class="card-text">
					<p style="text-center">
						Game Master Name : GM Eastwood <br />
						Gender : Male<br />
						Field : Management and Support <br />
						Language : English <br />
						Line ID : gm.eastwood <br />
						<br />
						Game Master Name : GM Ruby <br />
						Gender : Male<br />
						Field : Technical and Maintenance <br />
						Language : English & Indonesia <br />
						Contact : Classified Information <br />
						<br />
						Game Master Name : GM Lychee <br />
						Gender : Female<br />
						Field : Event Management <br />
						Language : English & Indonesia <br />
						Contact : Facebook Game Master Lychee <br />
						<br />
						Game Master Name : GM Cupcake <br />
						Gender : Female<br />
						Field : Customer Relations <br />
						Language : English <br />
						Contact : Facebook & Instagram Gamemaster Sealcos <br />
						<br />
						Game Master Name : GM Berry <br />
						Gender : Female<br />
						Field : Sub-GM <br />
						Language : English <br />
						Line ID :  sealcos.gmberry <br />
						<br />
						Game Master Name : GM Lemonade <br />
						Gender : Male<br />
						Field : Sub-GM <br />
						Language : English & Indonesia <br />
						Line ID : gm.lemonade <br />
						<br />
						Game Master Name : GM Cikeys <br />
						Gender : Female<br />
						Field : Sub-GM <br />
						Language : English & Indonesia <br />
						Line ID : gm.cikeys <br />
						<br />
						</p>
						<p style="text-center">
						<br />
						Available at 08:00 AM (GMT+8) to 10:00 PM (GMT+8)
						<br /><br />
						We will ensure fun, fair, and competitive gameplay !!<br />
						Welcome to Seal Online: Chronicles of Shiltz !! Have Fun !! <br /><br />
					</p>
					</p>
                </div>
                <div class="card-footer">
                    <!-- <a href="#" class="btn btn-primary">Find Out More!</a> -->
                </div>
            </div>
        </div>
    </div>
	
    <!-- /.row -->
	

</div>
<!-- /.container -->
@stop

