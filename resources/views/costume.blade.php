@extends('template.header-footer')
@section('main-section')
<!-- Page Content -->
<!-- Jumbotron Header -->
<!-- Page Features -->
<div class="row" style="background: rgba(204, 204, 204, 0.8);margin-top: 20px;padding-left: 10px;padding-right: 10px">
    @foreach(DB::connection('mysql2')->table('costume')->where('approved','1')->orderBy('id', 'DESC')->select('*')->get() as $img)
    <div class="col-md-4" style="background: rgba(255, 255, 255, 0.8);">
        <img class="card-img-top" src="{{URL::asset('public/picture/'.$img->image)}}" data-holder-rendered="true" style="height: 225px; width: 100%; display: block;">
        <div style="height: 30px; width: 100%; display: block;">
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

