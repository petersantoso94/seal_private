@extends('template.header-footer-admin')
@section('main-section')
<div class="white-pane__bordered margbot20" style="margin-left: 20px;">
    <div class="row">
        <div class="form-group">
            <label for="users">User's Character Name:</label>
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
    var postCash = '<?php echo Route('postCash') ?>';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    window.sendCash = function (element) {
        cash = $("#cash-nominal").val();
        user_ids = $("#users").val();
        if (confirm("Do you want to send "+cash+" to these user(s) (" + user_ids + ")?") == true) {
            $.post(postCash, {users: user_ids, nominal: cash}, function (data) {

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