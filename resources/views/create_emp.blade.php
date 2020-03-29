@extends('layouts.adminLayout')
<?php $title = "เพิ่มข้อมูลพนักงาน";?>
@section('header')
    <?php echo $title;?>
@endsection
@section('titles')
    <?php echo $title;?>
@endsection
@section('emp_link')
  active
@endsection
@section('content')
@if(Session::has('message'))
<div class="alert alert-info">{{Session::get('message')}}</div>
@endif
<div class="col-md-12">
    <form action="{{route('employee_create')}}" method="post" >
    {{ csrf_field()}}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ข้อมูลพนักงานขับรถ</h3>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>รหัสพนักงาน</label>
                            <input type="text" class="form-control" placeholder="รหัสพนักงาน" name="emp_id" required>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>ชื่อ</label>
                            <input type="text" class="form-control" placeholder="ชื่อ-สกุล" name="emp_fname" required>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>สกุล</label>
                            <input type="text" class="form-control" placeholder="ชื่อ-สกุล" name="emp_lname" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>ที่อยู่</label>
                            <input type="text" class="form-control" placeholder="ที่อยู่" name="emp_add" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>เบอร์โทร</label>
                            <input type="text" class="form-control" placeholder="เบอร์โทร" name="emp_phone" required>
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>ตำแหน่ง</label>
                            {{-- <input type="text" class="form-control" placeholder="ตำแหน่ง" name="emp_position"> --}}
                                <select class="form-control" name="emp_position">
                                    <option selected="selected" value="พนักงานขับรถ">พนักงานขับรถ</option>
                                    <option value="กระเป๋ารถ">กระเป๋ารถ</option>
                                </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>เงินเดือน</label>
                            <input type="number" class="form-control" placeholder="เงินเดือน" name="salary" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>ทะเบียนรถ</label>
                            {{-- <input type="text" class="form-control" placeholder="ทะเบียนรถ" name="car_id"> --}}
                            <select class="form-control" name="carid" required>
                            <option selected="selected" value="">สายรถ</option>
                                @foreach ($data2 as $item)
                                    <option value="{{$item->id}}">{{'เลขรถ : '.$item->car_num.' ทะเบียนรถ : '.$item->car_vehicle_reg_num}}</option>
                                @endforeach
                              </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>เวลาเข้างาน</label>
                            <select class="form-control"  name="date_off">
                                <option selected="selected">เลือกวันหยุด</option>
                                <option value="วันจันทร์">จันทร์</option>
                                <option value="วันอังคาร">วันอังคาร</option>
                                <option value="วันพุธ">วันพุธ</option>
                                <option value="วันพฤหัสบดี">วันพฤหัสบดี</option>
                                <option value="วันศุกร์">วันศุกร์</option>
                                <option value="วันเสาร์">วันเสาร์</option>
                                <option value="วันอาทิตย์">วันอาทิตย์</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>เวลาเข้างาน</label>
                            <input type="time" class="form-control" name="check_in" required>
                        </div>
                    </div> 
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>เวลาออกงาน</label>
                            <input type="time" class="form-control" name="check_out" required>
                        </div>
                    </div>  
                </div>
            </div><!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">เสร็จสิ้น</button>
            </div><!-- /.card-footer -->
        </div>
    </form>
</div>



@endsection