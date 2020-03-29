@extends('layouts.app')

@section('content') 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            <div class="card">
                {{-- <div class="card-header">{{ __('Login') }}</div> --}}

                <div class="card-body ">
                        @foreach ($t as $item)
                            
                      
                            <div class="row"> 
                                
                                <div class="col-lg-12 text-center">
                                  <img class="profile-user-img img-fluid img-circle" src="../../dist/img/avatar5.png" alt="User profile picture">
                                </div> 
                                <div class="col-lg-12 text-center">
                                    <h3 class="text-success">
                                            ลงชื่อเข้างานสำเร็จ 
                                    </h3>
                                  </div> 
                                <div class="col-lg-3 text-left"></div>
                                <div class="col-lg-6 text-left">
                                  <div class="form-group">
                                    <label>รหัสพนักงาน:</label>
                                    {{$item->emp_id}}
                                  </div>
                                </div>
                                <div class="col-lg-3 text-left"></div>
                                <div class="col-lg-3 text-left"></div>
                                <div class="col-lg-6 text-left">
                                  <div class="form-group">
                                    <label>ชื่อ - สกุล : </label>
                                        {{$item->emp_fname}} {{$item->emp_lname}}
                                  </div>
                                </div>
                                <div class="col-lg-3 text-left"></div>
                                <div class="col-lg-3 text-left"></div>
                                <div class="col-lg-6 text-left">
                                  <div class="form-group">
                                    <label>สายรถ :</label>
                                        {{$item->lc_num}}
                                  </div>
                                </div>
                                <div class="col-lg-3 text-left"></div>
                                <div class="col-lg-3 text-left"></div>
                                <div class="col-lg-6 text-left">
                                    <div class="form-group">
                                      <label>เลขรถ :</label>
                                      {{$item->car_num}}
                                    </div>
                                  </div>
                                  <div class="col-lg-3 text-left"></div>
                                  <div class="col-lg-3 text-left"></div>
                                  <div class="col-lg-6 text-left">
                                    <div class="form-group">
                                      <label>ทะเบียน :</label>
                                         {{$item->car_vehicle_reg_num}}
                                    </div>
                                  </div>
                                  <div class="col-lg-3 text-left"></div>
                            </div>
                            @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
