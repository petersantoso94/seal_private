@extends('template.header-footer-admin')
@section('main-section')
<div class="white-pane__bordered margbot20" style="margin-left: 20px;">
    <div class='row'>
        <div class='col-xs-8'>
            <h3>Edit Character</h3>
            <form method='POST' action="">
                @csrf
                <div class="form-group">
                    <label for="users">User's Character Name:</label><br>
                    <select data-placeholder="Choose users..." class="chosen-select form-control" name="users" id="users">
                        <option></option>
                        @foreach(DB::connection('mysql3')->table('pc')->select('char_name','user_id')->get() as $char)
                        @if($char->char_name != '')
                        <option value="{{$char->char_name}}">
                            {{$char->char_name}}
                        </option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="row" style="width: 100%">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cash-nominal">Map:</label><br>
                            <input type="number" name='map' id='map' class='form-control' required="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cash-nominal">Level:</label><br>
                            <input type="number" name='level' id='level' class='form-control' required="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cash-nominal">Job:</label><br>
                            <input type="number" name='job' id='job' class='form-control' required="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cash-nominal">Exp:</label><br>
                            <input type="number" name='exp' id='exp' class='form-control' required="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cash-nominal">Money:</label><br>
                            <input type="number" name='money' id='money' class='form-control' required="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cash-nominal">Fame:</label><br>
                            <input type="number" name='fame' id='fame' class='form-control' required="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cash-nominal">Strength:</label><br>
                            <input type="number" name='str' id='str' class='form-control' required="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cash-nominal">Intelligence:</label><br>
                            <input type="number" name='intel' id='intel' class='form-control' required="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cash-nominal">Dexterity:</label><br>
                            <input type="number" name='dex' id='dex' class='form-control' required="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cash-nominal">Constitution:</label><br>
                            <input type="number" name='cons' id='cons' class='form-control' required="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cash-nominal">Mentality:</label><br>
                            <input type="number" name='mental' id='mental' class='form-control' required="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cash-nominal">Sense:</label><br>
                            <input type="number" name='sense' id='sense' class='form-control' required="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cash-nominal">Level Up Point:</label><br>
                            <input type="number" name='lvluppoint' id='lvluppoint' class='form-control' required="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cash-nominal">Skill Up Point:</label><br>
                            <input type="number" name='skilluppoint' id='skilluppoint' class='form-control' required="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cash-nominal">Expert Skill Up Point:</label><br>
                            <input type="number" name='exppoint' id='exppoint' class='form-control' required="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cash-nominal">Play flag:</label><br>
                            <input type="number" name='playflag' id='playflag' class='form-control' required="">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
@section('js-content')
<script>
    var getUserData = '<?php echo Route('getUserData') ?>';
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#users').on('change', function () {
        user_ids = $("#users").val();
        $.post(getUserData, {users: user_ids}, function (data) {
            if (data != '') {
                console.log(data[0].char_name);
                $('#map').val();
                $('#level').val();
                $('#job').val();
                $('#exp').val();
                $('#money').val();
                $('#fame').val();
                $('#str').val();
                $('#intel').val();
                $('#dex').val();
                $('#cons').val();
                $('#mental').val();
                $('#sense').val();
                $('#lvluppoint').val();
                $('#skilluppoint').val();
                $('#exppoint').val();
                $('#playflag').val();
            }
        }).done(function () {
        });
    });
    $(document).ready(function () {
        $(".chosen-select").chosen();
    });
</script>
@endsection