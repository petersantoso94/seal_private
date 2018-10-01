@extends('template.header-footer-admin')
@section('main-section')
    <div class="white-pane__bordered margbot20" style="margin-left: 20px;">
        <h4>Confirm Edit Character:</h4>
        <table id="example" class="display table-rwd table-inventory" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>User</th>
                <th>Map</th>
                <th>Level</th>
                <th>Job</th>
                <th>Exp</th>
                <th>Money</th>
                <th>Fame</th>
                <th>Str</th>
                <th>Int</th>
                <th>Dex</th>
                <th>Cons</th>
                <th>Mental</th>
                <th>Sense</th>
                <th>Level Point</th>
                <th>Skill Point</th>
                <th>Exp Point</th>
                <th>Play Flag</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach(DB::connection('mysql2')->table('confirmCharacter')->select('*')->get() as $data)
                <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->users}}</td>
                    <td>{{$data->map}}</td>
                    <td>{{$data->level}}</td>
                    <td>{{$data->job}}</td>
                    <td>{{$data->exp}}</td>
                    <td>{{$data->money}}</td>
                    <td>{{$data->fame}}</td>
                    <td>{{$data->str}}</td>
                    <td>{{$data->intel}}</td>
                    <td>{{$data->dex}}</td>
                    <td>{{$data->cons}}</td>
                    <td>{{$data->mental}}</td>
                    <td>{{$data->sense}}</td>
                    <td>{{$data->lvluppoint}}</td>
                    <td>{{$data->skilluppoint}}</td>
                    <td>{{$data->exppoint}}</td>
                    <td>{{$data->playflag}}</td>
                    <td>
                        <button title="Set to available" type="button"
                                data-internal="{{$data->id}}"
                                data-users="{{$data->users}}"
                                data-map="{{$data->map}}"
                                data-level="{{$data->level}}"
                                data-job="{{$data->job}}"
                                data-exp="{{$data->exp}}"
                                data-money="{{$data->money}}"
                                data-fame="{{$data->fame}}"
                                data-str="{{$data->str}}"
                                data-intel="{{$data->intel}}"
                                data-dex="{{$data->dex}}"
                                data-cons="{{$data->cons}}"
                                data-mental="{{$data->mental}}"
                                data-sense="{{$data->sense}}"
                                data-lvluppoint="{{$data->lvluppoint}}"
                                data-skilluppoint="{{$data->skilluppoint}}"
                                data-exppoint="{{$data->exppoint}}"
                                data-playflag="{{$data->playflag}}"
                                onclick="pushValid(this)"
                                class="btn btn-pure-xs btn-xs btn-delete">
                            <span class="glyphicon glyphicon-ok"></span>
                        </button>
                        <button title="Set to available" type="button" data-internal="{{$data->id}}"
                                onclick="deleteData(this)"
                                class="btn btn-pure-xs btn-xs btn-delete">
                            <span class="glyphicon glyphicon-remove"></span>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <h4>Confirm Ban User:</h4>
        <table id="example" class="display table-rwd table-inventory" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Id</th>
                <th>User</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach(DB::connection('mysql2')->table('confirmBan')->select('*')->get() as $data)
                <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->users}}</td>
                    <td>
                        <button title="Set to available" type="button" data-users="{{$data->users}}" data-internal="{{$data->id}} data-table={{$data->table}}"
                                onclick="pushValidBan(this)"
                                class="btn btn-pure-xs btn-xs btn-delete">
                            <span class="glyphicon glyphicon-ok"></span>
                        </button>
                        <button title="Set to available" type="button" data-internal="{{$data->id}}"
                                onclick="deleteDataBan(this)"
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
        var postConfirmChar = '<?php echo Route('postConfirmChar') ?>';
        var postDeleteChar = '<?php echo Route('postDeleteChar') ?>';
        var postConfirmBan = '<?php echo Route('postConfirmBan') ?>';
        var postDeleteBan = '<?php echo Route('postDeleteBan') ?>';
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        window.pushValid = function (element) {
            dataid = $(element).data('internal');
            datausers = $(element).data('users');
            datamap = $(element).data('map');
            datalevel = $(element).data('level');
            datajob = $(element).data('job');
            dataexp = $(element).data('exp');
            datamoney = $(element).data('money');
            datafame = $(element).data('fame');
            datastr = $(element).data('str');
            dataintel = $(element).data('intel');
            datadex = $(element).data('dex');
            datacons = $(element).data('cons');
            datamental = $(element).data('mental');
            datasense = $(element).data('sense');
            datalvluppoint = $(element).data('lvluppoint');
            dataskilluppoint = $(element).data('skilluppoint');
            dataexppoint = $(element).data('exppoint');
            dataplayflag = $(element).data('playflag');
            if (confirm("Do you want to approve this change?") == true) {
                $.post(postConfirmChar, {
                    id: dataid,
                    users: datausers,
                    maps: datamap,
                    level: datalevel,
                    job: datajob,
                    exp: dataexp,
                    money: datamoney,
                    fame: datafame,
                    str: datastr,
                    intel: dataintel,
                    dex: datadex,
                    cons: datacons,
                    mental: datamental,
                    sense: datasense,
                    lvluppoint: datalvluppoint,
                    skilluppoint: dataskilluppoint,
                    exppoint: dataexppoint,
                    playflag: dataplayflag
                }, function (data) {

                }).done(function () {
                    location.reload();
                });
            }
        };
        window.deleteData = function (element) {
            notin = $(element).data('internal');
            if (confirm("Do you want to delete this change?") == true) {
                $.post(postDeleteChar, {sn: notin}, function (data) {

                }).done(function () {
                    location.reload();
                });
            }
        };
        window.pushValidBan = function (element) {
            notin = $(element).data('internal');
            users_ = $(element).data('users');
            table_ = $(element).data('table');
            console.log($(element));
            if (confirm("Do you want to banned this user: " + users_ + "?") == true) {
                $.post(postConfirmBan, {
                    id: notin,
                    user: users_,
                    table: table_
                }, function (data) {

                }).done(function () {
                    location.reload();
                });
            }
        };
        window.deleteDataBan = function (element) {
            notin = $(element).data('internal');
            if (confirm("Do you want to cancel this transaction (" + notin + ")?") == true) {
                $.post(postDeleteBan, {sn: notin}, function (data) {

                }).done(function () {
                    location.reload();
                });
            }
        };
    </script>
@endsection