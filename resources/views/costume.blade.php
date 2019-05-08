@extends('template.header-footer')
@section('main-section')
<!-- Page Content -->
<!-- Jumbotron Header -->
<!-- Page Features -->
    <!-- ##### Breadcrumb Area Start ##### -->
    <section class="breadcrumb-area bg-img bg-overlay" style="background-image: url(public/template/img/bg-img/23.png);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <!-- Breadcrumb Text -->
                <div class="col-12">
                    <div class="breadcrumb-text">
                        <h2>Buy a Costume</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Breadcrumb Area End ##### -->

<div class="row" style="background: rgba(255, 255, 255, 0.8);margin-top: 20px;">
    @foreach(DB::connection('mysql2')->table('costume')->where('approved','1')->orderBy('id', 'DESC')->select('*')->get() as $img)
    <div class="col-md-4" >
        <img class="card-img-top" src="{{URL::asset('public/picture/'.$img->image)}}" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
        <div style="height: 30px; width: 100%; display: block;background: rgba(255, 255, 255, 0.7);text-align: center;">
            <p>{{$img->caption}}</p>
        </div>
    </div>
    @endforeach
</div>
<!-- /.row -->

</div>
<!-- /.container -->
@stop
@section('js-content')
<script>
    
</script>
@stop

