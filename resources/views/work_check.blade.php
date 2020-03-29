@extends('layouts.app')

@section('content') 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card">
                {{-- <div class="card-header">{{ __('Login') }}</div> --}}

                <div class="card-body ">
                    <div class="text-center">
                        <div class="login-logo">
                            <img src="/dist/img/logo.png" alt="" class="text_center" >
                        </div> 
                    </div>

                    <form method="POST" action="{{URL::to('check_w')}}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <div class="col-sm-12 text-center">
                                <label for="radioPrimary1"> 
                                    วันที่ {{date("d")}} เดือน 
                                    <?php
                                        if(date("m")==1){
                                            echo 'มกราคม';
                                        }else if(date("m")==2) {
                                            echo 'กุมภาพันธ์';
                                        }else if(date("m")==3) {
                                            echo 'มีนาคม' ;
                                        }
                                        else if(date("m")==4) {
                                            echo 'เมษายน ';
                                        }
                                        else if(date("m")==5) {
                                            echo 'พฤษภาคม ';
                                        }
                                        else if(date("m")==6) {
                                            echo 'มิถุนายน';
                                        }else if(ate("m")==7) {
                                            echo 'กรกฎาคม';
                                        }
                                        else if(date("m")==8) {
                                            echo 'สิงหาคม';
                                        }
                                        else if(date("m")==9) {
                                            echo 'กันยายน';
                                        }
                                        else if(date("m")==10) {
                                            echo 'ตุลาคม ';
                                        }
                                        else if(date("m")==11) {
                                            echo 'พฤศจิกายน';
                                        }
                                        else if(date("m")==12) {
                                            echo 'ธันวาคม';
                                        }


                                    ?>
                                    พ.ศ. {{date("Y")+543}} เวลา <?php
                                        date_default_timezone_set("Asia/Bangkok");
                                        echo date("H:i:s");
                                        ?>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 text-center">
                                <!-- checkbox -->
                                <div class="form-group clearfix">
                                  <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary1" value="1" name="check_work" checked>
                                    <label for="radioPrimary1"> เข้างาน
                                    </label>
                                  </div>
                                  <div class="icheck-primary d-inline">
                                    <input type="radio" id="radioPrimary2" value="2" name="check_work">
                                    <label for="radioPrimary2">
                                        ออกงาน
                                        
                                    </label>
                                  </div>
                                  
                                </div>
                              </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-3">
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    {{-- echo date("Y-m-d H:i:s"); --}}
                                <label>รหัสพนักงาน</label>
                                <input type="hidden" name="date" value="{{date("Y-m-d")}}">
                                    <input type="text" class="form-control text-center" placeholder="รหัสพนักงาน" name="emp_id" required autofocus>
                                </div>
                            </div>
                            <div class="col-sm-3">
                            </div>
                            <div class="col-sm-12 text-danger text-center">
                                <label>
                                    @if ($message = Session::get('Alert'))
                                        <strong>{{$message}}</strong> 
                                    @endif 
                                </label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12  text-center">
                                <button type="submit" class="btn btn-success"  name="submit"> เสร็จสิ้น</button>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center" >
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
