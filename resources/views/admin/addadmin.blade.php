@extends('template.header-footer-admin')
@section('main-section')
<div class="white-pane__bordered margbot20" style="margin-left: 20px;">
    <table id="example" class="display table-rwd table-inventory" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Admin Name</th>
                <th>Role</th>
                <th>Action</th>
            <!--<th>Actions</th>-->
            </tr>
        </thead>
        <tbody>
            @foreach(DB::connection('mysql2')->table('admin')->select('*')->get() as $data)
            @if($data->role > 0)
            <?php
            $admin_role = 'admin';
            ?>
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->name}}</td>
                <td>{{$admin_role}}</td>
                <td>
                    <button title="Set to available" type="button" data-internal="{{$data->id}}" data-name="{{$data->name}}" onclick="pushEdit(this)"
                            class="btn btn-pure-xs btn-xs btn-delete">
                        <span class="glyphicon glyphicon-edit"></span>
                    </button>
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
<div class="white-pane__bordered margbot20" style="margin-left: 20px;margin-top: 20px;">
    <div class="box">
        <div class="box-header">
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
            <form method="POST" id='form-add-admin'>
                {{ csrf_field() }}
                
                <div class="form-group row">
                    <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

                    <div class="col-md-6">
                        <input id="username" type="text" class="form-control" name="username" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>
                <button type="button" id="btn-submit" onclick="check_pass()" style="margin-top: 10px;">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js-content')
<script>
    $(function () {
        CKEDITOR.replace('editor1');
        $('.textarea').wysihtml5();
    });
    var newCategory = function () {
        $('#new-cat-container').toggle();
    }
    var editEvent = '<?php echo Route('editEvent') ?>';
    var postDeleteEvent = '<?php echo Route('postDeleteEvent') ?>';
    var result = '';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var check_pass = function(){
        let pass = $('#password').val();
        let pass_confirm = $('#password-confirm').val();
        if(pass == pass_confirm)
            $('#form-add-admin').submit();
        else
            alert('Confirm password does not match!');
    };
    window.pushEdit = function (element) {
        notin = $(element).data('internal');
        name = $(element).data('name');
        if (confirm("Do you want to edit this Event (" + name + ")?") == true) {
            $.post(editEvent, {sn: notin}, function (data) {
                result = data;
            }).done(function () {
                $('#tipe').val('update');
                $('#id_update').val(result.id);
                $('#category').val(result.horizontal_level);
                $('#pagename').val(result.name);
                CKEDITOR.instances.editor1.setData(result.content);
//                CKEDITOR.instances['editor1'].setData();
            });
        }
    };
    window.deleteData = function (element) {
        notin = $(element).data('internal');
        name = $(element).data('name');
        if (confirm("Do you want to delete this Event (" + name + ")?") == true) {
            $.post(postDeleteEvent, {sn: notin}, function (data) {

            }).done(function () {
                window.location.replace("<?php url('editpage') ?>");
            });
        }
    };
</script>
@endsection