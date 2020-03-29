@extends('layouts.adminLayout')
<?php $title = "รายการคิว";?>
@section('header')
    <?php echo $title;?>
@endsection
@section('titles')
    <?php echo $title;?>
@endsection
@section('check_link')
  active
@endsection
@section('content')
<div class="col-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Responsive Hover Table</h3>

      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 150px;">
          <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

          <div class="input-group-append">
            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
          </div>
        </div>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
      
      <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th class="text-center">.#</th>
          <th class="text-center">รหัสพนักงาน</th>
            <th class="text-center">เวลาเข้างาน</th>
            <th class="text-center">เวลาออกงาน</th>
            @for ($i = 1; $i <= 31; $i++)
                <th class="text-center">{{$i}}</th>
            @endfor
            
             <th class="text-center">ดำเนินการ</th>
            {{-- <th class="text-center">ดำเดินการ</th> --}}
          </tr>
          </thead>
        <tbody>
          <?php $l=0;?>
          @foreach ($data1 as $item)
          <tr>
          <td class="text-center"><?php echo $l+=1;?></td>
            <td class="text-center">{{$item->emp_id}}</td>
            <td class="text-center">{{$item->check_in}}</td>
            <td class="text-center">{{$item->check_out}}</td>
            
                <td class="text-center">{{$item->d1}}</td>
                <td class="text-center">{{$item->d2}}</td>
                <td class="text-center">{{$item->d3}}</td>
                <td class="text-center">{{$item->d4}}</td>
                <td class="text-center">{{$item->d5}}</td>
                <td class="text-center">{{$item->d6}}</td>
                <td class="text-center">{{$item->d7}}</td>
                <td class="text-center">{{$item->d8}}</td>
                <td class="text-center">{{$item->d9}}</td>
                <td class="text-center">{{$item->d10}}</td>
                <td class="text-center">{{$item->d11}}</td>
                <td class="text-center">{{$item->d12}}</td>
                <td class="text-center">{{$item->d13}}</td>
                <td class="text-center">{{$item->d14}}</td>
                <td class="text-center">{{$item->d15}}</td>
                <td class="text-center">{{$item->d16}}</td>
                <td class="text-center">{{$item->d17}}</td>
                <td class="text-center">{{$item->d18}}</td>
                <td class="text-center">{{$item->d19}}</td>
                <td class="text-center">{{$item->d20}}</td>
                <td class="text-center">{{$item->d21}}</td>
                <td class="text-center">{{$item->d22}}</td>
                <td class="text-center">{{$item->d23}}</td>
                <td class="text-center">{{$item->d24}}</td>
                <td class="text-center">{{$item->d25}}</td>
                <td class="text-center">{{$item->d26}}</td>
                <td class="text-center">{{$item->d27}}</td>
                <td class="text-center">{{$item->d28}}</td>
                <td class="text-center">{{$item->d29}}</td>
                <td class="text-center">{{$item->d30}}</td>
                <td class="text-center">{{$item->d31}}</td>
             <td class="text-center">
              <div class="btn-group btn-group-sm">
                <a href="" class="btn btn-info"><i class="fas fa-eye"></i></a>
              {{-- <a href="/edit/{{$datas->id}}/edit" class="btn btn-warning"><i class="fas fa-edit"></i></a> --}}
              <a href="" class="btn btn-warning"><i class="fas fa-edit"></i></a>
              <a href="" class="btn btn-danger" ><i class="fas fa-trash"></i></a>
             
              </div>
            </td>
          </tr>
          @endforeach
          {{-- <tr>
            <td>183</td>
            <td>John Doe</td>
            <td>11-7-2014</td>
            <td><span class="tag tag-success">Approved</span></td>
            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
          </tr> --}}
          
        </tbody>
      </table>
      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
@endsection