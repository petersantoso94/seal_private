@extends('template.header-footer-admin')
@section('main-section')
<div class="white-pane__bordered margbot20" style="margin-left: 20px;">
    <h3>Cash transfer</h3>
    <div class='col-xs-8'>
        <form>
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
        </form>
    </div>
</div>
<div class="white-pane__bordered margbot20" style="margin-left: 20px;">
    <h3>Item transfer</h3>
    <div class='col-xs-8'>
        <form>
            <div class="form-group">
                <label for="users">User's Character Name:</label>
                <select data-placeholder="Choose users..." class="chosen-select" name="users_for_item" id="users_for_item"  multiple="" tabindex="-1" >
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
                <label for="cash-nominal">Item Code:</label>
                <input type="number" id='val-it'>
            </div>
            <div class="form-group">
                <label for="cash-nominal">Item's Quantity / Refine Level:</label>
                <input type="number" id='val-io'>
            </div>
            <button type="submit" class="btn btn-primary" onclick="sendItems(this)">Submit</button>
        </form>
    </div>
</div>
<div class="white-pane__bordered margbot20" style="margin-left: 20px;">
    <h3>Item transfer (add)</h3>
    <div class='col-xs-8'>
        <form>
            <div class="form-group">
                <label for="users">User's Character Name:</label>
                <select data-placeholder="Choose users..." class="chosen-select" name="users_for_item_add" id="users_for_item_add"  multiple="" tabindex="-1" >
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
                <label for="cash-nominal">Item Type:</label>
                <input type="number" id='val-type'>
            </div>
            <div class="form-group">
                <label for="cash-nominal">Durability:</label>
                <input type="number" id='val-dr'>
            </div>
            <button type="submit" class="btn btn-primary" onclick="sendItemsAdd(this)">Submit</button>
        </form>
    </div>
</div>

@endsection
@section('js-content')
<script>
    var postCash = '<?php echo Route('postCash') ?>';
    var postItems = '<?php echo Route('postItems') ?>';
    var postItemsAdd = '<?php echo Route('postItemsAdd') ?>';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    window.sendCash = function (element) {
        cash = $("#cash-nominal").val();
        user_ids = $("#users").val();
        if (confirm("Do you want to send " + cash + " to these user(s) (" + user_ids + ")?") == true) {
            $.post(postCash, {users: user_ids, nominal: cash}, function (data) {

            }).done(function () {
                location.reload();
            });
        }
    };
    window.sendItems = function (element) {
        it_ = $("#val-it").val();
        io_ = $("#val-io").val();
        user_ids = $("#users_for_item").val();
        if (confirm("Do you want to send " + it_ + " to these user(s) (" + user_ids + ")?") == true) {
            $.post(postItems, {users: user_ids, it: it_, io: io_}, function (data) {
                if (data != '')
                    alert('User ' + data + " dont have enough slot!");
            }).done(function () {
                location.reload();
            });
        }
    };
    window.sendItemsAdd = function (element) {
        it_ = $("#val-type").val();
        io_ = $("#val-dr").val();
        user_ids = $("#users_for_item_add").val();
        if (confirm("Do you want to send " + it_ + " to these user(s) (" + user_ids + ")?") == true) {
            $.post(postItemsAdd, {users: user_ids, it: it_, io: io_}, function (data) {

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