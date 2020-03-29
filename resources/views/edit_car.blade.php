@extends('layouts.adminLayout')
<?php $title = "แก้ไขรถ";?>
@section('header')
    <?php echo $title;?>
@endsection
@section('titles')
    <?php echo $title;?>
@endsection
@section('car_link')
  active
@endsection
@section('content')
@if ($message = Session::get('Alert'))
<div class="col-sm-12">
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>{{$message}}</strong> 
</div>
</div>
@endif
<div class="col-md-12">
    <form action="{{route('update_car')}}" method="post" >
    {{ csrf_field()}}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">เพิ่มรถ</h3>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    @foreach($data as $datas)
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>เลขรถ</label>
                            <input type="hidden" class="form-control" name="id" value="{{$datas->id}}">
                        <input type="text" class="form-control" placeholder="กรอกเลขรถ" name="car_num" value="{{$datas->car_num}}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label>ทะเบียนรถ</label>
                        <input type="text" class="form-control" placeholder="กรอกทะเบียนรถ" name="car_vehicle_reg_num" value="{{$datas->car_vehicle_reg_num}}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <!-- select -->
                        <div class="form-group"> 
                          <label>สายรถ</label>
                          <select class="form-control" name="lc_id">
                              @foreach($data1 as $item)
                                <option value='{{$item->id}}' {{isset($datas->line_id) ? $datas->line_id==$item->id ? 'selected' :'' :''}}>{{$item->lc_num}}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                    @endforeach
                </div>
            </div><!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">เสร็จสิ้น</button>
            </div><!-- /.card-footer -->
        </div>
    </form>
</div>



@endsection