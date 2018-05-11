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
                    <a class="dropdown-item" href="http://sealonline.wikia.com/wiki/Main_Page">Seal Wikia</a>
                    <a class="dropdown-item" href="#">Others</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Jumbotron Header -->
	@if($user = Auth::user())
                <div class="alert alert-success" role="alert">
                    Successfully login, thank you {{$user->name}}
                </div>
        @endif
    <header class="jumbotron my-1" style="background: rgba(204, 204, 204, 0.8);;">
        <h1 class="display-5">Seal Online: Chronicles of Shiltz is Now Open !!</h1>
        <p class="lead">Welcome to Seal Online: Chronicles of Shiltz, to celebrate our launching Seal CoS will
            organize its first event with “Heaven Egg” as
            prize. Information of this event are as follows:</p>
        <a href="{{url('event')}}" class="btn btn-primary btn-lg">Read more</a>
    </header>

    <!-- Page Features -->
    <div class="row text-center">
        <div class="col">
		<div class="card">
                <img class="card-img-top" src="{{URL::asset('public/picture/hiring.png')}}" alt="" width="200" height="255">
                <div class="card-body">
                    <h4 class="card-title">Now Hiring!! Join us NOW!!</h4>
                    <p class="card-text">
					<p style="text-align:justify"> Seal Online: Chronicles of Shiltz will be open
                        for Volunteers Game Master, will be active
                        working as Event and Customer Relation GM. 
						<br />
						<br />
						We will open GM Recruitment at:
						<br />
						Friday, May 11 - Friday, May 17 2018
						<br />
						
						<br />
						Send your application to our email at: <br />
						gamemaster.sealcos@gmail.com <br /><br />
						Requirements: <br />
						</p>
						<p style="text-align:left">
						1. English Proficiency Proof. <br />
						2. CV or Application Resume. <br />
						3. FB/Skype Ready for Interview. <br />
						4. Flexible Work-hours. <br />
						5. Work Experience in Related Field.
					</p>
					</p>
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
						Contact : Fanpage & Instagram <br />
						<br />
						Game Master Name : GM Ruby <br />
						Field : Technical and Maintenance <br />
						Language : English & Indonesia <br />
						Contact : Classified Information <br />
						<br />
						</p>
						<p style="text-center">
						We will soon release Line ID and Facebook Account
						<br />
						Available at 08:00 AM (GMT+8) to 10:00 PM (GMT+8)
						<br /><br />
						We will ensure fun, fair, and competitive gameplay !!<br />
						Welcome to Seal Online: Chronicles of Shiltz !! Have Fun !! <br />
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

