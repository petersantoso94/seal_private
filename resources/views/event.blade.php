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

    <header class="jumbotron my-4" style="background: rgba(204, 204, 204, 0.8);;">
        @if(isset($eventdata))
        <?php echo $eventdata->content ?>
        @if($eventdata != NULL)
        <?php
        $pict = $eventdata->image_link;
        $picts = explode(';;;', $pict);
        ?>
        <div class="row">
        @foreach($picts as $pict)
        <div class="col-md-4">
            <div class="thumbnail">
                <a href="/w3images/lights.jpg">
                    <img src="{{URL::asset('public/picture/'.$pict)}}" alt="Lights" style="width:100%">
                    <div class="caption">
                        <p>Lorem ipsum...</p>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
        </div>
        @endif
        @endif
        <h2>Seal Online: Chronicles of Shiltz - Daily Events !!</h2><br />
        <img src="{{URL::asset('public/picture/Daily_Events.png')}}" width="100%" style="margin-left: 0%;"><br /><br />
        <h2>Seal Online: Chronicles of Shiltz - Playtime Event !!</h2><br />
        <img src="{{URL::asset('public/picture/Summer Playtime.png')}}" width="75%" style="margin-left: 15%;"><br /><br />
        <p>Summer is coming !!School’s Off !! It’s time for Seal Online: Chronicles of Shiltz. 

            All this month, your playtime will earn you awesome prizes!
            That's right, a month long playtime event!<br /><br />

            Event duration: <br /><br />

            June 5 - July 5, 2018<br /><br />

            Requirements and Rewards:<br /><br />
            1. 120 hours --> Refinement Manual G13<br />
            2. 180 hours --> Angel Link.G<br />
            3. 240 hours --> Yellow Ribbon.G<br />
            4. 300 hours --> 1 Abysmal Egg<br />
            <br />
            Rules and Restrictions:<br />
            - Players must have a character of AT LEAST level 50 at the end of the event (Level 1-50 Playtime will be counted) to be eligible for rewards.<br />
            - Rewards are NOT cumulative.<br />
            - Playtime is tracked by account ID, on highest character playtime. (If more than 1 character is played, only the highest playtime in that ID will be used)<br />
            - Reward will be sent to the Bank, make sure you have slot before Weekly Maintenance.<br />
            <br />
            Notes:<br />
            - This will be a long event, so keep track of your playtime as best as you can to ensure the correct rewards.<br />
            - The event will be tracked starting at 12 PM GMT+8 on June 5, 2018 until 12 PM GMT+8 on July 5, 2018.<br /></p>

		        <h2>Instagram Promotional Event Started !!</h2><br />
        <img src="{{URL::asset('public/picture/instagram.png')}}" width="75%" style="margin-left: 15%;"><br /><br />
        <p>Duration : June 16 - July 17, 2018</p></br></br>

			- Create your own unique code (example: ig.gm.sealcos)</br>
			- Follow Instagram gamemaster.sealcos</br>
			- Upload your character's photo at your Instagram account</br>
			(at least have 300 followers and active, not a new account, not a commercial / business / fake account)</br>
			- Tell us your story about playing this seal (don't forget to tag gamemaster.sealcos and use #sealcosigpromotion)</br>
			- Don't forget to ask your friends to join by mentioning your unique code at your instagram post and ask them to use it in their registration form </br>
			- You have to use Instagram account that use the same name with the registered identity card </br>
			- You cannot delete your post until the reward is distributed.</br></br>

			Reward :</br>
			1. Cegel (5.000.000) and IM Coins (5000) For all participants.</br>
			2. Abysmal Egg (If 5 or more players joined using your code)..<br /></p>
        <p style="font-size: 80%">For more information, please contact GM Eastwood (Line ID: gm.eastwood)</p>

    </header>
    <!-- Page Features -->
    <div class="row text-center">

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
@stop

