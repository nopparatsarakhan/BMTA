@extends('layouts.adminLayout')
<?php $title = "ข้อมูลรถ";?>
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
@if(Session::has('message'))
<div class="alert alert-info">{{Session::get('message')}}</div>
@endif
<div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">รายงานข้อมูลรถ</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-2">
                <div class="form-group">
                  <select class="form-control"  onChange="window.location.href=this.value">
                    <option selected="selected">สายรถ</option>
                    @foreach ($data1 as $item)
                        <option value="{{URL::to('show_car/'.$item->id)}}"><a href="index.php">{{$item->lc_num}}</a></option>
                    @endforeach
                  </select>
                </div>   
            </div>
            <div class="col-md-2">
            <a class="btn btn-primary" href="{{route('createcar')}}"> 
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    เพิ่มข้อมูล
                </a>
            </div>
            <div class="col-md-4"></div>
        </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                    <thead>                  
                        <tr>
                        <th class="text-center">.#</th>
                        <th class="text-center">เลขรถ</th>
                        <th class="text-center">ทะเบียนรถ</th>
                        <th class="text-center">สายรถ</th>
                        <th class="text-center">ดำเนินการ</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php $i=0;?>
                        @foreach($data as $datas)
                        <tr>
                        <td class="text-center"><?php echo $i+=1;?></td>
                        <td class="text-center">{{$datas->car_num}}</td>
                        <td class="text-center">{{$datas->car_vehicle_reg_num}}</td>
                        <td class="text-center">{{$datas->lc_num}}</td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm">
                                <a href="#" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                <a href="{{ URL::to('car_edit/'.$datas->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="{{ URL::to('carreport/'.$datas->id) }}" class="btn btn-danger" ><i class="fas fa-trash"></i></a>
                              </div> 
                        </td>
                        </tr>   
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
      </div>
      <!-- /.card-body -->
      
    </div>
    <!-- /.card -->
  </div>
@endsection