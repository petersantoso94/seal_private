@extends('template.header-footer-admin')
@section('main-section')
<div class="white-pane__bordered margbot20" style="margin-left: 20px;">
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
                    <button title="Set to available" type="button" data-internal="{{$data->id}}" data-name="{{$data->name}}" onclick="pushEdit(this)"
                            class="btn btn-pure-xs btn-xs btn-delete">
                        <span class="glyphicon glyphicon-edit"></span>
                    </button>
                    <button title="Set to available" type="button" data-internal="{{$data->id}}" data-name="{{$data->name}}" onclick="deleteData(this)"
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
<div class="white-pane__bordered margbot20" style="margin-left: 20px;">
    <div class="box">
        <div class="box-header">
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
            <h3 class="box-title">HTML editor
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
            <form method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-2">
                            <label for="exampleInputEmail1">Put Under Category</label>
                        </div>
                        <div class="col-sm-4">
                            <select data-placeholder="Choose users..." class="form-control" name="category" id="category">
                                <option></option>
                                @foreach(DB::connection('mysql2')->table('content')->selectRaw("DISTINCT horizontal_level, horizontal_name")->get() as $char)
                                @if($char->horizontal_name != '')
                                <option value="{{$char->horizontal_level}}">
                                    {{$char->horizontal_name}}
                                </option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-1" style="margin-top: 5px;">
                            <button type="button" onclick="newCategory(this)"><span class="glyphicon glyphicon-plus"></span></button>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="tipe" name="tipe" value="insert">
                <input type="hidden" id="id_update" name="id_update" value="">
                <div class="form-group" id="new-cat-container" style="display:none;">
                    <label for="exampleInputPassword1">New Category Name</label>
                    <input type="text" class="form-control" id="newcategory" name="newcategory" placeholder="leave blank if you want to use existing category">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" class="form-control" id="pagename" name="pagename" placeholder="page name..">
                </div>
                <textarea id="editor1" name="editor1" rows="10" cols="80" style="visibility: hidden; display: none;">                                            This is my textarea to be replaced with CKEditor.
                </textarea>
                <button type="submit" id="btn-submit">Submit</button>
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
                
            });
        }
    };
</script>
@endsection