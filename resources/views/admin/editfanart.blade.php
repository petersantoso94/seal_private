@extends('template.header-footer-admin')
@section('main-section')
@if(Session::get('role') == 0)
<div class="white-pane__bordered margbot20" style="margin-left: 20px;">
    <div class="box">
        <div class="box-body pad">
            <table id="example" class="display table-rwd table-inventory" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Action</th>
                    <!--<th>Actions</th>-->
                    </tr>
                </thead>
                <tbody>
                    @foreach(DB::connection('mysql2')->table('fanart')->select('*')->get() as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td><img class="card-img-top" src="{{URL::asset('public/picture/'.$data->image)}}" data-holder-rendered="true" style="height: 100px; width: 100px; display: block;"></td>
                        <td>
                            <button title="Delete" type="button" data-internal="{{$data->id}}" data-name="{{$data->image}}" onclick="deleteData(this)"
                                    class="btn btn-pure-xs btn-xs btn-delete">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="white-pane__bordered margbot20" style="margin-left: 20px;">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Fan Art Picture Confirmation
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
        <div class="box-body pad">
            <table id="example" class="display table-rwd table-inventory" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Action</th>
                    <!--<th>Actions</th>-->
                    </tr>
                </thead>
                <tbody>
                    @foreach(DB::connection('mysql2')->table('fanart')->where('approved','0')->select('*')->get() as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td><img class="card-img-top" src="{{URL::asset('public/picture/'.$data->image)}}" data-holder-rendered="true" style="height: 100px; width: 100px; display: block;"></td>
                        <td>
                            <button title="approve" type="button" data-internal="{{$data->id}}" data-name="{{$data->image}}" onclick="confirmFanart(this)"
                                    class="btn btn-pure-xs btn-xs btn-delete">
                                <span class="glyphicon glyphicon-ok"></span>
                            </button>
                            <button title="Delete" type="button" data-internal="{{$data->id}}" data-name="{{$data->image}}" onclick="deleteData(this)"
                                    class="btn btn-pure-xs btn-xs btn-delete">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif
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
            <form method="POST" accept-charset="UTF-8" enctype="multipart/form-data" id='form_edit_fanart'>
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-2">
                            <label for="exampleInputEmail1">Upload New Image</label>
                        </div>
                        <div class="col-sm-4">
                            <input type='file' name='image' id='img-upload'>
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
    var postDeleteFanart = '<?php echo Route('postDeleteFanart') ?>';
    var postConfirmFanart = '<?php echo Route('postConfirmFanart') ?>';
    var result = '';
    var filetype = '';
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
            filetype = filename.split(".");
            filetype = filetype[1];
        }
        if (filetype != '' && (filetype == 'png' || filetype == 'gif' || filetype == 'jpeg' || filetype == 'jpg')) {
            $('#form_edit_fanart').submit();
        }else{
            alert('Not Supported Image File!');
        }
    });
    var deleteData = function (element) {
        notin = $(element).data('internal');
        name_ = $(element).data('name');
        if (confirm("Do you want to delete this Image?") == true) {
            $.post(postDeleteFanart, {sn: notin, name: name_}, function (data) {

            }).done(function () {
                window.location.replace("<?php url('editfanart') ?>");
            });
        }
    };
    var confirmFanart = function (element) {
        notin = $(element).data('internal');
        name_ = $(element).data('name');
        if (confirm("Do you want to confirm this Image?") == true) {
            $.post(postConfirmFanart, {sn: notin, name: name_}, function (data) {

            }).done(function () {
                window.location.replace("<?php url('editfanart') ?>");
            });
        }
    };
</script>
@endsection