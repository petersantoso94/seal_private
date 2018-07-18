@extends('template.header-footer')
@section('main-section')
<!-- Page Content -->
    <!-- Jumbotron Header -->
    <!-- Page Features -->
    <div class="row text-center" style="background: rgba(204, 204, 204, 0.8);;">
        @if(Session::get('username') != null)
        <p>Hi, {{Session::get('username')}}</p>
        @endif
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
@stop

