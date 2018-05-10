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
        <img src="{{URL::asset('public/picture/S__13393924.jpg')}}" width="30%" style="margin-left: 35%;">
        <h2>Seal Online CoS First Event !!</h2>
        <p>Seal Online: Chronicles of Shiltz will
            organize its first event with “Heaven Egg” as
            prize. Information of this event are as follows:</p>
        <p>Please read carefully:</p>
        <p>1. Recommend our Seal server to your friend.</p>
        <p>2. Ask them to register for an account with
            inserting your Facebook’s name at their
            registration form’s recommendation field.</p>
        <p>3. If 30 account of your friend that you
            recommended reach level 75 at open beta
            (OBT), notify us by contacting us from our
            Fanpage / Instagram / Line account.</p>
        <p>4. You will be rewarded with Heaven Egg.</p>
        <p>5. The event will be over at June 1, 2018.</p>
        <p style="font-size: 80%">If one’s not following what is listed above
            will be assumed ineligible for this reward.</p>
    </header>
    <!-- Page Features -->
    <div class="row text-center">

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
@stop

