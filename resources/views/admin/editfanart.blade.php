@extends('template.header-footer-admin')
@section('main-section')
<div class="white-pane__bordered margbot20" style="margin-left: 20px;">
    <div class="box">
        <div class="box-body pad">
            <table id="example" class="display table-rwd table-inventory" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Event Name</th>
                        <th>Category</th>
                        <th>Action</th>
                    <!--<th>Actions</th>-->
                    </tr>
                </thead>
                <tbody>
                    @foreach(DB::connection('mysql2')->table('content')->select('*')->get() as $data)
                    @if($data->link === NULL)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->horizontal_name}}</td>
                        <td>
                            <button title="Delete" type="button" data-internal="{{$data->id}}" data-name="{{$data->name}}" onclick="deleteData(this)"
                                    class="btn btn-pure-xs btn-xs btn-delete">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="white-pane__bordered margbot20" style="margin-left: 20px;margin-top: 20px;">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Upload Fan Art Picture
                <small>Simple and fast</small>
            </h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
            <!-- /. tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body pad">
            <?php if (isset($success)) { ?>
                <div class="alert alert-success alert-dismissible" role="alert" style="width: 98%; margin: 1%">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{$success}}
                </div>
            <?php } ?>
            <?php if (isset($error)) { ?>
                <div class="alert alert-error alert-dismissible" role="alert" style="width: 98%; margin: 1%">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{$error}}
                </div>
            <?php } ?>
            <form method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-2">
                            <label for="exampleInputEmail1">Upload New Image</label>
                        </div>
                        <div class="col-sm-4">
                            <input type='file' name='image' id='img-upload'>
                        </div>
                        <div class="col-sm-1" style="margin-top: 5px;">
                            <button type="button" onclick="newCategory(this)"><span class="glyphicon glyphicon-plus"></span></button>
                        </div>
                    </div>
                </div>
                <button type="button" id="btn-submit" style="margin-top: 10px;">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js-content')
<script>
    var editEvent = '<?php echo Route('editEvent') ?>';
    var postDeleteEvent = '<?php echo Route('postDeleteEvent') ?>';
    var result = '';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#btn-submit").on('click', function () {
        var fullPath = document.getElementById('img-upload').value;
        if (fullPath) {
            var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
            var filename = fullPath.substring(startIndex);
            if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                filename = filename.substring(1);
            }
            filetype =  filename.split(".");
            alert(filetype[1]);
        }
    });
    window.deleteData = function (element) {
        notin = $(element).data('internal');
        name = $(element).data('name');
        if (confirm("Do you want to delete this Event (" + name + ")?") == true) {
            $.post(postDeleteEvent, {sn: notin}, function (data) {

            }).done(function () {

            });
        }
    };
</script>
@endsection