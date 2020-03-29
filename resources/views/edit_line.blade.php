@extends('layouts.adminLayout')
<?php $title = "แก้ไขสายรถ";?>
@section('header')
    <?php echo $title;?>
@endsection
@section('titles')
    <?php echo $title;?>
@endsection
@section('line_link')
  active
@endsection
@section('content')
@if(Session::has('message'))
<div class="alert alert-info">{{Session::get('message')}}</div>
@endif
<div class="col-md-12">
    @foreach($data as $datas) 
    <form action="{{route('update_line')}}" method="post" >
    {{ csrf_field()}}
    <input type="hidden" name="id" value="{{$datas->id}}">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ข้อมูลพนักงานขับรถ</h3>
            </div><!-- /.card-header -->
            <div class="card-body"> 
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>เลขรถ</label>
                        <input type="text" class="form-control" placeholder="กรอกเลขรถ" name="lc_num" value="{{$datas->lc_num}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>ทะเบียนรถ</label>
                            <input type="text" class="form-control" placeholder="กรอกทะเบียนรถ" name="lc_name"  value="{{$datas->lc_name}}">
                        </div>
                    </div>
                     
                </div>
            </div><!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">เสร็จสิ้น</button>
            </div><!-- /.card-footer -->
        </div>
    </form>
    @endforeach
</div>



@endsection