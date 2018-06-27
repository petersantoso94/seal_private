@extends('template.header-footer-admin')
@section('main-section')
<div class="white-pane__bordered margbot20" style="margin-left: 20px;">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Bootstrap WYSIHTML5
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
</script>
@endsection