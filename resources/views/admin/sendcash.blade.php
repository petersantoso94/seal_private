@extends('template.header-footer-admin')
@section('main-section')
<div class="content-wrapper">
    <div class="row">
        <div class="form-group">
            <select data-placeholder="Choose users..." class="chosen-select" name="users" id="users"  multiple="" tabindex="-1" >
                <option></option>
                @foreach(DB::connection('mysql3')->table('pc')->select('char_name','user_id')->get() as $char)
                @if($char->char_name != '')
                <option value="{{$char->user_id}}">
                    {{$char->char_name}}
                </option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="cash-nominal">Cash Nominal:</label>
            <input type="number" id='cash-nominal'>
        </div>
        <button type="submit" class="btn btn-primary" onclick="sendCash(this)">Submit</button>
    </div>
</div>

@endsection
@section('js-content')
<script>
    var postValid = '<?php echo Route('postValid') ?>';
    var postDelete = '<?php echo Route('postDelete') ?>';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    window.sendCash = function (element) {
        cash = $("#cash-nominal").val();
        user_ids = $("#users").val();
        alert(user_ids);
        if (confirm("Do you want to accept this user (" + notin + ")?") == true) {
            $.post(postValid, {sn: notin}, function (data) {

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
    $(document).ready(function () {
        $(".chosen-select").chosen();
    });
</script>
@endsection