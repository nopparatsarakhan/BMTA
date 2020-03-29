@extends('layouts.adminLayout')
@section('header')
    ข้อมูลพนักงาน
@endsection
@section('titles')
    ข้อมูลพนักงาน
@endsection
@section('emp_link')
  active
@endsection
@section('content')

<div class="col-lg-12">
  <div class="card card-info card-outline">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-edit"></i>
            ใบรายงานข้อมูลพนักงานขับรถ
          
          </h3>
        </div>
        <div class="card-body pad table-responsive">
{{-- *************************************************************************************************** --}}

<div class="row">
      <div class="col-lg-12 text-center"> <h3> รายงานการลงเวลาเข้า-ออกงาน</h3></div>
      @foreach ($data['data0'] as $datas)
      <div class="col-lg-2"> 
        <label for="m_id">รหัสพนักงาน</label>
        <input type="text" class="form-control"   name="m_id"   placeholder="รหัสพนักงาน"   value="{{$datas->emp_id}}" disabled>
      </div>
      <div class="col-lg-3"> 
        <label for="m_id">ชื่อ - สกุล</label>
        <input type="text" class="form-control"    placeholder="รหัสพนักงาน"   value="{{$datas->emp_fname}} {{$datas->emp_lname}}" disabled>
      </div>
      <div class="col-lg-2"> 
        <label for="m_id">เวลาเข้างาน</label>
        <input type="time" class="form-control"    value="{{$datas->check_in}}"  disabled>
      </div>
      
      <div class="col-lg-2">
        <label for="m_id">เวลาออกงาน</label>
        <input type="time" class="form-control"   value="{{$datas->check_out}}"  disabled>
      </div>
      <div class="col-lg-2">
        <label for="m_id">วันหยุด</label>
        <input type="text" class="form-control"      value="{{$datas->day_off}}"  disabled>
      </div>
      <div class="col-lg-1"> 
        <label for="m_id">จัดการ</label>
        {{-- <input type="text" class="form-control"    placeholder="รหัสพนักงาน"   value="{{$datas->emp_fname}} {{$datas->emp_lname}}" disabled> --}}
        <a class="btn btn-primary" href="" data-toggle="modal" data-target="#insert_status"><i class="fas fa-edit"></i></a>
      </div>
      @include ('modals2')
      @endforeach
      <div class="col col-lg-12 text-center">
        <label for="m_id">รายการ</label>
      
        <table class='table table-bordered '>
        <thead>
          <tr class='table-danger'>
            <th>วันที่</th>
            <th>เข้างาน</th>  
            <th>ออกงาน</th>
            <th>สถานะ</th>
            <th>หมายเหตุ</th>
            <th>จัดการ</th>
          </tr>
          </thead>
          <tbody>
            
              @foreach ($data['data1'] as $item)
              <tr>
                 <td>{{$item->workdate}}</td> 
                 <td>{{$item->workin}}</td>
                 <td>{{$item->workout}}</td>
                 <td>{{$item->status_day}}</td> 
                 <td>{{$item->comment}}</td> 
                 <td><a class="btn btn-primary" href="" data-toggle="modal" data-target="#manage{{$item->id}}"><i class="fas fa-edit"></i></a>
                  <a href="{{URL::to('workio/'.$item->w_id.'/delete')}}" class="btn btn-danger"  onclick="return confirm(&quot;ต้องการลบรายการนี้?&quot;)"><i class="fas fa-trash"></i></a>
                </td>
                 
                </tr>  
                 @include ('modals1')

              @endforeach
              
            
          </tbody>
        </table>
        
    </div>
</div>

{{-- *************************************************************************************************** --}}
    </div>
  </div>
</div>


  @endsection