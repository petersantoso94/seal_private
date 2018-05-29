@extends('template.header-footer-admin')
@section('main-section')
<div class="white-pane__bordered margbot20">
    
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
    window.pushValid = function (element) {
        notin = $(element).data('internal');
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
</script>
@endsection