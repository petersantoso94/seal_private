@extends('template.header-footer-admin')
@section('main-section')
<div class="white-pane__bordered margbot20" style="margin-left: 20px;">
    <div class='row'>
        <div class='col-xs-8'>
            <h3>Edit Character</h3>
            <?php if (isset($success)) { ?>
                <div class="alert alert-success alert-dismissible" role="alert" style="width: 98%; margin: 1%">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{$success}}
                </div>
            <?php } ?>
            <?php if (isset($error)) { ?>
                <div class="alert alert-error alert-dismissible" role="alert" style="width: 98%; margin: 1%">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{$error}}
                </div>
            <?php } ?>
            <form method='POST' action="" id='form-edit-char'>
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cash-nominal">Map:</label><br>
                            <input type="number" name='map' id='map' class='form-control' required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cash-nominal">Level:</label><br>
                            <input type="number" name='level' id='level' class='form-control' required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cash-nominal">Job:</label><br>
                            <input type="number" name='job' id='job' class='form-control' required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cash-nominal">Exp:</label><br>
                            <input type="number" name='exp' id='exp' class='form-control' required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cash-nominal">Money:</label><br>
                            <input type="number" name='money' id='money' class='form-control' required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cash-nominal">Fame:</label><br>
                            <input type="number" name='fame' id='fame' class='form-control' required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cash-nominal">Strength:</label><br>
                            <input type="number" name='str' id='str' class='form-control' required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cash-nominal">Intelligence:</label><br>
                            <input type="number" name='intel' id='intel' class='form-control' required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cash-nominal">Dexterity:</label><br>
                            <input type="number" name='dex' id='dex' class='form-control' required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cash-nominal">Constitution:</label><br>
                            <input type="number" name='cons' id='cons' class='form-control' required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cash-nominal">Mentality:</label><br>
                            <input type="number" name='mental' id='mental' class='form-control' required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cash-nominal">Sense:</label><br>
                            <input type="number" name='sense' id='sense' class='form-control' required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cash-nominal">Level Up Point:</label><br>
                            <input type="number" name='lvluppoint' id='lvluppoint' class='form-control' required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cash-nominal">Skill Up Point:</label><br>
                            <input type="number" name='skilluppoint' id='skilluppoint' class='form-control' required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cash-nominal">Expert Skill Up Point:</label><br>
                            <input type="number" name='exppoint' id='exppoint' class='form-control' required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cash-nominal">Play flag:</label><br>
                            <input type="number" name='playflag' id='playflag' class='form-control' required="">
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-primary" onclick="editChar()">Submit</button>
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

    var editChar = function () {
        if (confirm("Confirm Edit") == true) {
            $("#form-edit-char").submit();
        }
    };

    $('#users').on('change', function () {
        user_ids = $("#users").val();
        $.post(getUserData, {users: user_ids}, function (data) {
            if (data != '') {
                $('#map').val(data[0].map_num);
                $('#level').val(data[0].level);
                $('#job').val(data[0].job);
                $('#exp').val(data[0].exp);
                $('#money').val(data[0].money);
                $('#fame').val(data[0].fame);
                $('#str').val(data[0].strength);
                $('#intel').val(data[0].intelligence);
                $('#dex').val(data[0].dexterity);
                $('#cons').val(data[0].constitution);
                $('#mental').val(data[0].mentality);
                $('#sense').val(data[0].sense);
                $('#lvluppoint').val(data[0].levelup_point);
                $('#skilluppoint').val(data[0].skillup_point);
                $('#exppoint').val(data[0].expert_skillup_point);
                $('#playflag').val(data[0].play_flag);
            }
        }).done(function () {
        });
    });
    $(document).ready(function () {
        $(".chosen-select").chosen();
    });
</script>
@endsection