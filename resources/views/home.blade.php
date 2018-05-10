@extends('template.header-footer')
@section('main-section')
<!-- Page Content -->
<div class="container" id="main">
    <div class="row text-center" style="margin-top: 30px; margin-left: 10px;">
        <div class="dropdown show">
            <!--dropdown-->
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Ranking
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Player Rank</a>
                <a class="dropdown-item" href="#">Guild Rank</a>
                <a class="dropdown-item" href="#">Couple Rank</a>
                <a class="dropdown-item" href="#">Tournament</a>
            </div>
            
            <!--dropdown2-->
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Community
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                <a class="dropdown-item" href="https://www.facebook.com/sealonlinecos/">Facebook</a>
                <a class="dropdown-item" href="#">Line Group</a>
                <a class="dropdown-item" href="#">Live Chat</a>
                <a class="dropdown-item" href="#">Councils</a>
            </div>
            
            <!--dropdown3-->
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
    <!-- Jumbotron Header -->
    <header class="jumbotron my-4">
        <h1 class="display-3">A Warm Welcome!</h1>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
        <a href="#" class="btn btn-primary btn-lg">Call to action!</a>
    </header>

    <!-- Page Features -->
    <div class="row text-center">

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                <img class="card-img-top" src="http://placehold.it/500x325" alt="">
                <div class="card-body">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">Find Out More!</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                <img class="card-img-top" src="http://placehold.it/500x325" alt="">
                <div class="card-body">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo magni sapiente, tempore debitis beatae culpa natus architecto.</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">Find Out More!</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                <img class="card-img-top" src="http://placehold.it/500x325" alt="">
                <div class="card-body">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="btn btn-primary">Find Out More!</a>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card">
                <img class="card-img-top" src="http://placehold.it/500x325" alt="">
                <div class="card-body">
                    <h4 class="card-title">Card title</h4>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo magni sapiente, tempore debitis beatae culpa natus architecto.</p>
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

