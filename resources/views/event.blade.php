@extends('template.header-footer')
@section('main-section')
<!-- Page Content -->
    <!-- Jumbotron Header -->

    <header class="jumbotron my-4" style="background: rgba(204, 204, 204, 0.8);;">
        @if(isset($eventdata))
        <?php echo html_entity_decode($eventdata->content); ?>
        @endif

    </header>
    <!-- Page Features -->
    <div class="row text-center">

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
@stop

