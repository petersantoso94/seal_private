@extends('template.header-footer-admin')
@section('main-section')
<div class="white-pane__bordered margbot20">
    <table id="example" class="display table-rwd table-inventory" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Facebook Name</th>
                <th>Email</th>
                <th>Action</th>
            <!--<th>Actions</th>-->
            </tr>
        </thead>
    </table>
</div>
@endsection
@section('js-content')
<script>
    var table = '';
    var registerDataTable = '<?php echo Route('registerDataTable') ?>';
    table = $('#example').dataTable({
        "draw": 10,
        "processing": true,
        "bDestroy": true,
        "serverSide": true,
        "ajax": registerDataTable
    });
</script>
@endsection