@extends('template.header-footer-admin')
@section('main-section')
<div class="white-pane__bordered margbot20" style="margin-left: 20px;">
    <h4>Confirm Send Cash to User:</h4>
    <table id="example" class="display table-rwd table-inventory" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>User</th>
                <th>Cash will be added</th>
                <th>Action</th>
            <!--<th>Actions</th>-->
            </tr>
        </thead>
        <tbody>
            @foreach(DB::connection('mysql2')->table('confirmCash')->select('*')->get() as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->users}}</td>
                <td>{{$data->cash}}</td>
                <td>
                    <button title="Set to available" type="button" data-cash="{{$data->cash}}" data-users="{{$data->users}}" data-table="{{$data->table}}" data-internal="{{$data->id}}" onclick="pushValid(this)"
                            class="btn btn-pure-xs btn-xs btn-delete">
                        <span class="glyphicon glyphicon-save"></span>
                    </button>
                    <button title="Set to available" type="button" data-internal="{{$data->id}}" onclick="deleteData(this)"
                            class="btn btn-pure-xs btn-xs btn-delete">
                        <span class="glyphicon glyphicon-remove"></span>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('js-content')
<script>
    var postConfirmCash = '<?php echo Route('postConfirmCash') ?>';
    var postDeleteCash = '<?php echo Route('postDeleteCash') ?>';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    window.pushValid = function (element) {
        notin = $(element).data('internal');
        cash_ = $(element).data('cash');
        table_ = $(element).data('table');
        users_ = $(element).data('users');
        if (confirm("Do you want to send "+cash+" to "+users_+"?") == true) {
            $.post(postConfirmCash, {id: notin,cash:cash_,user:users_,table:table_}, function (data) {

            }).done(function () {
                location.reload();
            });
        }
    };
    window.deleteData = function (element) {
        notin = $(element).data('internal');
        if (confirm("Do you want to delete this transaction (" + notin + ")?") == true) {
            $.post(postDeleteCash, {sn: notin}, function (data) {

            }).done(function () {
                location.reload();
            });
        }
    };
</script>
@endsection