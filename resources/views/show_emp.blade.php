@extends('layouts.adminLayout')
<?php $title = "ข้อมูลพนักงาน";?>
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
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">ข้อมูลพนักงานขับรถ</h3> 
        </div><!-- /.card-header -->
            @foreach($data as $datas) 
            
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>รหัสพนักงาน</label>
                                <input type="text" class="form-control" placeholder="รหัสพนักงาน" name="emp_id" disabled value="{{$datas->emp_id}}">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>ชื่อ</label>
                                <input type="text" class="form-control" placeholder="ชื่อ-สกุล" name="emp_fname" disabled value="{{$datas->emp_fname}}">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>สกุล</label>
                                <input type="text" class="form-control" placeholder="ชื่อ-สกุล" name="emp_lname" disabled value="{{$datas->emp_lname}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>ที่อยู่</label>
                                <input type="text" class="form-control" placeholder="ที่อยู่" name="emp_add" disabled value="{{$datas->emp_address}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>เบอร์โทร</label>
                                <input type="text" class="form-control" placeholder="เบอร์โทร" name="emp_phone" disabled value="{{$datas->emp_phone}}">
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>ตำแหน่ง</label>
                                {{-- <input type="text" class="form-control" placeholder="ตำแหน่ง" name="emp_position"> --}}
                                    <select class="form-control" name="emp_position" disabled>
                                        <option value="พนักงานขับรถ" {{isset($datas->emp_position)? $datas->emp_position=='พนักงานขับรถ' ? 'selected' :'' :''  }}>พนักงานขับรถ</option>
                                        <option value="กระเป๋ารถ" {{isset($datas->emp_position)? $datas->emp_position=='กระเป๋ารถ' ? 'selected' :'' :''  }}>กระเป๋ารถ</option>
                                    </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>เงินเดือน</label>
                                <input type="number" class="form-control" placeholder="เงินเดือน" name="salary" disabled value="{{$datas->salary}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>ทะเบียนรถ</label>
                                {{-- <input type="text" class="form-control" placeholder="ทะเบียนรถ" name="car_id"> --}}
                                <select class="form-control" name="carid" disabled>
                                {{-- <option selected="selected" value="">สายรถ</option> --}}
                                    @foreach ($data2 as $item)
                                        <option value="{{$item->id}}" {{isset($datas->car_id) ? $datas->car_id==$item->id ? 'selected' :'' :''  }}>{{'เลขรถ : '.$item->car_num.' ทะเบียนรถ : '.$item->car_vehicle_reg_num}}</option>
                                    @endforeach
                                  </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>เวลาเข้างาน</label>
                                <select class="form-control"  name="date_off" disabled>
                                    {{-- <option selected="selected">เลือกวันหยุด</option> --}}
                                    <option value="วันจันทร์"{{isset($datas->day_off) ? $datas->day_off=='วันจันทร์' ? 'selected' :'' :''  }}>จันทร์</option>
                                    <option value="วันอังคาร"{{isset($datas->day_off) ? $datas->day_off=='วันอังคาร' ? 'selected' :'' :''  }}>วันอังคาร</option>
                                    <option value="วันพุธ"{{isset($datas->day_off) ? $datas->day_off=='วันพุธ' ? 'selected' :'' :''  }}>วันพุธ</option>
                                    <option value="วันพฤหัสบดี"{{isset($datas->day_off) ? $datas->day_off=='วันพฤหัสบดี' ? 'selected' :'' :''  }}>วันพฤหัสบดี</option>
                                    <option value="วันศุกร์"{{isset($datas->day_off) ? $datas->day_off=='วันศุกร์' ? 'selected' :'' :''  }}>วันศุกร์</option>
                                    <option value="วันเสาร์"{{isset($datas->day_off) ? $datas->day_off=='วันเสาร์' ? 'selected' :'' :''  }}>วันเสาร์</option>
                                    <option value="วันอาทิตย์"{{isset($datas->day_off) ? $datas->day_off=='วันอาทิตย์' ? 'selected' :'' :''  }}>วันอาทิตย์</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>เวลาเข้างาน</label>
                                <input type="time" class="form-control" name="check_in" disabled value="{{$datas->check_in}}">
                            </div>
                        </div>   
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>เวลาออกงาน</label>
                                <input type="time" class="form-control" name="check_out" disabled value="{{$datas->check_out}}">
                            </div>
                        </div>  
                    </div>
                </div><!-- /.card-body -->
             
            <div class="card-footer">
               <a href="{{route('employee')}}"> <button type="submit" class="btn btn-success float-right" name="submit">ย้อนกลับ</button></a>
            </div>
         @endforeach
    </div>
</div>



@endsection