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
                    <a class="dropdown-item" href="#">Seal Wikia</a>
                    <a class="dropdown-item" href="#">Others</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Jumbotron Header -->
    <header class="jumbotron my-4" style="background: rgba(204, 204, 204, 0.8);;">
        <h1 class="display-3">Seal Online CoS First Event !!</h1>
        <p class="lead">Seal Online: Chronicles of Shiltz will
            organize its first event with “Heaven Egg” as
            prize. Information of this event are as follows:</p>
        <a href="{{url('event')}}" class="btn btn-primary btn-lg">Read more</a>
    </header>

    <!-- Page Features -->
    <div class="row text-center">
        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                <img class="card-img-top" src="{{URL::asset('public/picture/hire.jpg')}}" alt="" width="400" height="225">
                <div class="card-body">
                    <h4 class="card-title">Now Hiring!! Join us NOW!!</h4>
                    <p class="card-text">Seal Online: Chronicles of Shiltz will be open
                        for Volunteers Game Master, will be active
                        working as Event and Customer Relation GM.</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">Find Out More!</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
@stop

