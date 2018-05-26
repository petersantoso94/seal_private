@extends('template.header-footer')
@section('main-section')
<!-- Page Content -->
<div class="container" id="main">
    <div class="row text-center" style="margin-top: 30px; margin-left: 10px;">
		
        <div class="dropdown show">
            <!--dropdown-->
            <div class="btn-group">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ranking
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">Player Rank</a>
                    <a class="dropdown-item" href="#">Guild Rank</a>
                    <a class="dropdown-item" href="#">Couple Rank</a>
                    <a class="dropdown-item" href="#">Tournament</a>
                </div>
            </div>

            <!--dropdown2-->
            <div class="btn-group">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Community
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                    <a class="dropdown-item" href="https://www.facebook.com/sealonlinecos/">Facebook</a>
                    <a class="dropdown-item" href="#">Line Group</a>
                    <a class="dropdown-item" href="#">Live Chat</a>
                    <a class="dropdown-item" href="#">Councils</a>
                </div>
            </div>

            <!--dropdown3-->
            <div class="btn-group">
                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Guides
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink3">
                    <a class="dropdown-item" href="#">Video Guides</a>
                    <a class="dropdown-item" href="https://seal-cos.wikia.com/wiki/">Seal Wikia</a>
                    <a class="dropdown-item" href="#">Others</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Jumbotron Header -->
	@if($user = Auth::user())
                <div class="alert alert-success" role="alert">
                    Your registration form has been submitted. Please send your Identity Card's Photos to GM Eastwood and wait for our administrator to review your registration form. (Max. 24 Hours). Thank you very much !! (Submitted as {{$user->name}})
                </div>
        @endif
    <header class="jumbotron my-1" style="background: rgba(204, 204, 204, 0.8);;">
        <h1 class="display-5">Seal Online: Chronicles of Shiltz is Now Open !!</h1>
        <p class="lead">Welcome to Seal Online: Chronicles of Shiltz, to celebrate our launching Seal CoS will
            organize its first event with “Heaven Egg” as
            prize. Information of this event are as follows:</p>
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
						Field : Management and Support <br />
						Language : English <br />
						Line ID : gm.eastwood <br />
						<br />
						Game Master Name : GM Ruby <br />
						Field : Technical and Maintenance <br />
						Language : English & Indonesia <br />
						Contact : Classified Information <br />
						<br />
						Game Master Name : GM Lychee <br />
						Field : Event Management <br />
						Language : English & Indonesia <br />
						Contact : Facebook Game Master Lychee <br />
						<br />
						Game Master Name : GM Cupcake <br />
						Field : Customer Relations <br />
						Language : English <br />
						Contact : Facebook & Instagram Gamemaster Sealcos <br />
						<br /
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

