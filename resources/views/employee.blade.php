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
@if(Session::has('message'))
<div class="alert alert-info">{{Session::get('message')}}</div>
@endif
<div class="col-12"> 
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">ใบรายงานข้อมูลพนักงานขับรถ</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
          </div>
          <div class="col-md-2">
              <div class="form-group">
                <select class="form-control"onChange="window.location.href=this.value">
                  <option selected="selected"  >สายรถ</option>
                  @foreach ($data2 as $item)
                      <option value="{{URL::to('employee3/'.$item->lc_num)}}">{{$item->lc_num}}</option>
                  @endforeach
                </select>
              </div>    
          </div>
          <div class="col-md-2">
              <a class="btn btn-primary" href="{{route('create_emp')}}"> 
                  <i class="fa fa-plus" aria-hidden="true"></i>
                  เพิ่มข้อมูล
              </a>
          </div>
          <div class="col-md-4"></div>
        </div>
        <table id="example2" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th class="text-center">.#</th>
            <th class="text-center">รหัสพนักงาน</th> 
            <th class="text-center">ชื่อ-สกุล</th>
            
            {{-- <th class="text-center">ที่อยู่</th>
            <th class="text-center">เบอร์โทร</th>
            <th class="text-center">Token Line</th> --}}
            <th class="text-center">ตำแหน่ง</th>
            <th class="text-center">ทะเบียนรถ</th>
            {{-- <th class="text-center">วันที่</th> --}}
            <th class="text-center">ดำเดินการ</th>
          </tr>
          </thead>
          <tbody>
           <?php $i=0;?>
            @foreach($data1 as $datas)
            
              <tr>
                <td class="text-center"><?php echo $i+=1;?></td>
                <td><a href="{{URL::to('workio/'.$datas->e_id) }}">{{$datas->emp_id}}</a></td>
                <td>{{$datas->emp_fname}} {{$datas->emp_lname}}</td> 
                {{-- <td>{{$datas->cus_address}}</td> --}}
                {{-- <td  class="text-center">{{$datas->cus_phone}}</td>
                <td  class="text-center">{{$datas->cus_token_line}}</td> --}}
                <td  class="text-center">{{$datas->emp_position}}</td>
                <td  class="text-center">@if($datas->car_vehicle_reg_num == null) <p class="text-danger">ไม่มีข้อมูลรถ</p> @else {{$datas->car_vehicle_reg_num}} @endif</td>
                {{-- <td  class="text-center">{{$datas->day_off}}</td> --}}
                <td class="text-center">
                  <div class="btn-group btn-group-sm">
                    <a href="/employee2/{{$datas->emp_id}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                  {{-- <a href="/edit/{{$datas->id}}/edit" class="btn btn-warning"><i class="fas fa-edit"></i></a> --}}
                  <a href="/employee/{{$datas->emp_id}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                  <a href="/employee/{{$datas->emp_id}}/delete/" class="btn btn-danger" ><i class="fas fa-trash"></i></a>
                 
                  </div>
                </td>
              </tr>
            @endforeach
          
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
@endsection