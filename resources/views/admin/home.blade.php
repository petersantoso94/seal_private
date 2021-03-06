@extends('template.header-footer-admin')
@section('main-section')
<div class="white-pane__bordered margbot20" style="margin-left: 20px;">
    <table id="example" class="display table-rwd table-inventory" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Facebook Name</th>
                <th>Email</th>
                <th>Link FB</th>
                <th>Action</th>
            <!--<th>Actions</th>-->
            </tr>
        </thead>
        <tbody>
            @foreach(DB::connection('mysql2')->table('idtable1')->select('*')->whereNull('pending')->get() as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->nick_name}}</td>
                <td>{{$data->email}}</td>
                <td><a href="{{$data->fb_link}}">{{$data->fb_link}}</a></td>
                <td>
                    <button title="Set to available" type="button" data-internal="{{$data->id}}" onclick="pushValid(this)"
                            class="btn btn-pure-xs btn-xs btn-delete">
                        <span class="glyphicon glyphicon-save"></span>
                    </button>
                    <button title="Set to available" type="button" data-internal="{{$data->id}}" onclick="deleteData(this)"
                            class="btn btn-pure-xs btn-xs btn-delete">
                        <span class="glyphicon glyphicon-remove"></span>
                    </button>
                    <button title="Set to pending" type="button" data-internal="{{$data->id}}" onclick="setPending(this)"
                            class="btn btn-pure-xs btn-xs btn-delete">
                        <span class="glyphicon glyphicon-hourglass"></span>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<br><br>
<div class="white-pane__bordered margbot20" style="margin-left: 20px;">
    <table id="example" class="display table-rwd table-inventory" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Facebook Name</th>
                <th>Email</th>
                <th>Link FB</th>
                <th>Action</th>
            <!--<th>Actions</th>-->
            </tr>
        </thead>
        <tbody>
            @foreach(DB::connection('mysql2')->table('idtable1')->select('*')->where('pending','1')->get() as $data)
            <tr>
                <td>{{$data->id}}</td>
                <td>{{$data->nick_name}}</td>
                <td>{{$data->email}}</td>
                <td><a href="{{$data->fb_link}}">{{$data->fb_link}}</a></td>
                <td>
                    <button title="Set to available" type="button" data-internal="{{$data->id}}" onclick="pushValid(this)"
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
    var postValid = '<?php echo Route('postValid') ?>';
    var postPending = '<?php echo Route('postPending') ?>';
    var postDelete = '<?php echo Route('postDelete') ?>';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    window.pushValid = function (element) {
        notin = $(element).data('internal');
        if (confirm("Do you want to accept this user (" + notin + ")?") == true) {
            $.post(postValid, {sn: notin}, function (data) {

            }).done(function () {
                location.reload();
            });
        }
    };
    window.setPending = function (element) {
        notin = $(element).data('internal');
        if (confirm("Do you want to pending this user (" + notin + ")?") == true) {
            $.post(postPending, {sn: notin}, function (data) {

            }).done(function () {
                location.reload();
            });
        }
    };
    window.deleteData = function (element) {
        notin = $(element).data('internal');
        if (confirm("Do you want to delete this user (" + notin + ")?") == true) {
            $.post(postDelete, {sn: notin}, function (data) {

            }).done(function () {
                location.reload();
            });
        }
    };
</script>
@endsection