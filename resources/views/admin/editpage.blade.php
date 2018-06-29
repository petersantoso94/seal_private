@extends('template.header-footer-admin')
@section('main-section')
<div class="white-pane__bordered margbot20" style="margin-left: 20px;">
    <div class="box">
        <div class="box-header">
            @if(isset($success))
            <span class="valid-feedback">
                <strong>{{ $success }}</strong>
            </span>
            @endif
            @if(isset($error))
            <span class="invalid-feedback">
                <strong>{{ $error }}</strong>
            </span>
            @endif
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
                                @foreach(DB::connection('mysql2')->table('content')->select('horizontal_level','horizontal_name')->get() as $char)
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
    var newCategory = function(){
        $('#new-cat-container').show();
    }
</script>
@endsection