<div class="modal fade" id="manage{{$item->id}}">
    <form method="post" action="{{URL::to('update_status')}}">
        {{ csrf_field() }}
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">แก้ไข</h4><br>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  {{-- *************************************************************************** --}}
                  <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <h3><label>วันที่ </label>
                      {{$item->workdate}} </h3>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <img class="profile-user-img img-fluid img-circle"
                           src="../../dist/img/avatar5.png"
                           alt="User profile picture">
                  </div>
                  <div class="col-lg-12"> </div>
                  <div class="col-lg-12 text-left">
                    <div class="form-group">
                      <label>รหัสพนักงาน:</label>
                      {{$item->emp_id}}
                    </div>
                  </div>
                  
                  <div class="col-lg-12 text-left">
                    <div class="form-group">
                      <label>ชื่อ - สกุล :</label>
                      {{$item->emp_fname}} {{$item->emp_lname}}
                    </div>
                  </div>
                  <div class="col-lg-12 text-left">
                    <div class="form-group">
                      <label>เลขรถ :</label>
                      {{$item->car_num}}
                    </div>
                  </div>
                  <div class="col-sm-12 text-left">
                    <!-- select -->
                    <div class="form-group">
                      <label>สถานะ </label>
                      <select class="form-control" name="status_day">
                        <option value="เข้างาน">เข้างาน</option>
                        <option value="สาย">สาย</option>
                        <option value="ขาด">ขาด</option>
                        <option value="ลากิจ">ลากิจ</option>
                        <option value="ลาป่าย">ลาป่าย</option>
                        <option value="ลาพักร้อน">ลาพักร้อน</option>
                      </select>
                    </div>
                  </div>
                  
                </div>
                  {{-- *************************************************************************** --}}
                </div>
                <input type="hidden" name="id" value="{{$item->w_id}}" >
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก{{$item->w_id}}</button>
                  <button type="submit" class="btn btn-success swalDefaultSuccess" name="submit2">บันทึก</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
    </form>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->