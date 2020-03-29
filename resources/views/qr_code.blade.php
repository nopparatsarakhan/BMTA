@extends('layouts.adminLayout')
<?php $title = "QR Code สำหรับเข้างาน";

?>
@section('header')
    <?php echo $title;?>
@endsection
@section('qrCode_link')
    active
@endsection
@section('titles')
    <?php echo $title;?>
@endsection
@section('content')
<div class="container-fluid">
    <div class="card card-info card-outline">
      <div class="card-header">
        <h3 class="card-title">QR Code</h3>
      </div> <!-- /.card-body -->
      <div class="card-body">
          <div class="text-center">
              {!! QrCode::size(300)->generate('http://boy-project.com/work_check'); !!}
          </div>
          <div class="text-center">
                <?php
                    date_default_timezone_set("Asia/Bangkok");
                   
                ?>
                {{-- {{date("d/m/Y H:i:s")}} --}}
                 <p id="time"></p>
          </div>
        {{-- <div class="text-center">
            <button class="btn btn-success">สร้าง QR Code ใหม่</button>
          </div> --}}
                
            
        </div>
      </div><!-- /.card-body -->
    </div>
</div><!-- /.container-fluid -->

@endsection
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
var timestamp = '<?=time();?>';
function updateTime(){
  $('#time').html(Date(timestamp));
  timestamp++;
}
$(function(){
  setInterval(updateTime, 1000);
});
</script>
@endsection