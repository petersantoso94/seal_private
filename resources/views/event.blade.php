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

    <header class="jumbotron my-4" style="background: rgba(204, 204, 204, 0.8);;">
		<h2>Seal Online: Chronicles of Shiltz - Poster & BGM Contest !!</h2><br />
		<img src="{{URL::asset('public/picture/Open_Beta.jpg')}}" width="75%" style="margin-left: 15%;"><br /><br />
        <p>Seal Online: Chronicles of Shiltz will
            organize its Grand Opening Event with “Heaven Egg” as
            prize. Information of this event are as follows:</p>
        <p>Please read carefully:</p>
        <p>1. Make sure you have registered your ID at Open Beta Launch.</p>
        <p>2. Create your own (original) design for posters or re-arrangement of Elim's background music.</p>
        <p>3. For Posters, the theme is "Grand Launching". Both digital and hand-made are allowed as long as it is your own drawing. Insert Seal CoS Logo on your drawing.</p>
        <p>4. For Soundtrack, you have to use your own music instrument and based on Elim's background music in form of Video and converted Mp3.</p>
		<p>5. Upload your masterpiece to your own facebook profile. Do not forget to write #PosterContest, #SealNoDonations, and #SealOnlineCoS, also mention GM Eastwood and Lychee.</p>
		<p>6. All Participants will get 1805+2018 (3823) coins according to our Open Beta date. The most liked work will be rewarded with Heaven Egg.</p>
        <p>7. The event duration is from May 18, 2018 until June 1, 2018.</p>
		<p>8. For the winners, your work will be used in our server for both promotions and replacing Elim's Soundtrack. </p>
        <p style="font-size: 80%">For more information, please contact GM Eastwood (Facebook or Instagram)</p>
		<h2>Seal Online Chronicles of Shiltz - OBT Event !!</h2><br />
		<img src="{{URL::asset('public/picture/S__13393924.jpg')}}" width="75%" style="margin-left: 15%;"><br /><br />
        <p>Seal Online: Chronicles of Shiltz will
            organize its first event with “Heaven Egg” as
            prize. Information of this event are as follows:</p>
        <p>Please read carefully:</p>
        <p>1. Recommend our Seal server to your friend.</p>
        <p>2. Ask them to register for an account with
            inserting your Facebook’s link at their
            registration form’s recommendation field during OBT. Please note that all the data will be erased after CBT ends, Ask your friend to input your facebook link during OBT Re-registration.</p>
        <p>3. If 10 account of your friend that you
            recommended reach level 75 at open beta
            (OBT), notify us by contacting us from our
            Fanpage / Instagram / Line account.</p>
        <p>4. You will be rewarded with Heaven Egg.</p>
        <p>5. The event duration is from May 18, 2018 until June 1, 2018.</p>
        <p style="font-size: 80%">All the data will be erased upon OBT, If one’s not following what is listed above
            will be assumed ineligible for this reward.</p>
		<h2>Seal Online Chronicles of Shiltz - CBT Event !!</h2><br />
        <img src="{{URL::asset('public/picture/CBT_Event.jpg')}}" width="75%" style="margin-left: 15%;"><br /><br /><br />
    </header>
    <!-- Page Features -->
    <div class="row text-center">

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
@stop

