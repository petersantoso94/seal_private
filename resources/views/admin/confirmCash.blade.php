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
                        <span class="glyphicon glyphicon-ok"></span>
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
    <h4>Confirm Send Item to User:</h4>
    <table id="example" class="display table-rwd table-inventory" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Id</th>
            <th>User</th>
            <th>IT value</th>
            <th>IO value</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach(DB::connection('mysql2')->table('confirmItem')->select('*')->get() as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->users}}</td>
                <td>{{$data->it_val}}</td>
                <td>{{$data->io_val}}</td>
                <td>
                    <button title="Set to available" type="button"
                            data-itval="{{$data->it_val}}" data-ioval="{{$data->io_val}}"
                            data-slot="{{$data->slot}}" data-users="{{$data->users}}" data-internal="{{$data->id}}" onclick="pushValidItem(this)"
                            class="btn btn-pure-xs btn-xs btn-delete">
                        <span class="glyphicon glyphicon-ok"></span>
                    </button>
                    <button title="Set to available" type="button" data-internal="{{$data->id}}" onclick="deleteDataItem(this)"
                            class="btn btn-pure-xs btn-xs btn-delete">
                        <span class="glyphicon glyphicon-remove"></span>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <h4>Confirm Send Item Add to User:</h4>
    <table id="example" class="display table-rwd table-inventory" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Id</th>
            <th>User</th>
            <th>IT value</th>
            <th>IO value</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach(DB::connection('mysql2')->table('confirmItemAdd')->select('*')->get() as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->users}}</td>
                <td>{{$data->it_val}}</td>
                <td>{{$data->io_val}}</td>
                <td>
                    <button title="Set to available" type="button"
                            data-itval="{{$data->it_val}}" data-ioval="{{$data->io_val}}"
                             data-users="{{$data->users}}" data-internal="{{$data->id}}" onclick="pushValidItemAdd(this)"
                            class="btn btn-pure-xs btn-xs btn-delete">
                        <span class="glyphicon glyphicon-ok"></span>
                    </button>
                    <button title="Set to available" type="button" data-internal="{{$data->id}}" onclick="deleteDataItemAdd(this)"
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
    var postConfirmItem = '<?php echo Route('postConfirmItem') ?>';
    var postDeleteItem = '<?php echo Route('postDeleteItem') ?>';
    var postConfirmItemAdd = '<?php echo Route('postConfirmItemAdd') ?>';
    var postDeleteItemAdd = '<?php echo Route('postDeleteItemAdd') ?>';
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
        if (confirm("Do you want to send "+cash_+" to "+users_+"?") == true) {
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
    window.pushValidItem = function (element) {
        notin = $(element).data('internal');
        ioval_ = $(element).data('ioval');
        itval_ = $(element).data('itval');
        slot_ = $(element).data('slot');
        users_ = $(element).data('users');
        console.log($(element));
        if (confirm("Do you want to send Item to "+users_+"?") == true) {
            $.post(postConfirmItem, {id: notin, ioval:ioval_, itval:itval_, user:users_, slot:slot_}, function (data) {

            }).done(function () {
                location.reload();
            });
        }
    };
    window.deleteDataItem = function (element) {
        notin = $(element).data('internal');
        if (confirm("Do you want to delete this transaction (" + notin + ")?") == true) {
            $.post(postDeleteItem, {sn: notin}, function (data) {

            }).done(function () {
                location.reload();
            });
        }
    };
    window.pushValidItemAdd = function (element) {
        notin = $(element).data('internal');
        ioval_ = $(element).data('ioval');
        itval_ = $(element).data('itval');
        users_ = $(element).data('users');
        console.log($(element));
        if (confirm("Do you want to send Item to "+users_+"?") == true) {
            $.post(postConfirmItemAdd, {id: notin, ioval:ioval_, itval:itval_, user:users_}, function (data) {

            }).done(function () {
                location.reload();
            });
        }
    };
    window.deleteDataItemAdd = function (element) {
        notin = $(element).data('internal');
        if (confirm("Do you want to delete this transaction (" + notin + ")?") == true) {
            $.post(postDeleteItemAdd, {sn: notin}, function (data) {

            }).done(function () {
                location.reload();
            });
        }
    };
</script>
@endsection