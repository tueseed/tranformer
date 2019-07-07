<div class="row">
  <div class="col-sm-12 col-md-12 col-lg-12">
        <h4 class="card-title font-weight-bold">
        <i class="fas fa-bolt"></i>  รายละเอียดหม้อแปลง
          <span class="d-none d-lg-block d-lg-none float-right badge badge-pill badge-primary">Pea No. : <span id="pea_no"></span></span>
        </h4>
        <div class="dropdown-divider"></div>
        <div class="card-text">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-4">
              <div class="form-group">
                <label for="bp" class="text-center font-weight-bold">
                  <i class="fas fa-sort-numeric-up"></i> ขนาด
                </label>
                <input type="text" class="text-center form-control readonly" id="size"  name="input_tr_detail" disabled="disabled">
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
              <div class="form-group">
                <label for="bp" class="text-center font-weight-bold">
                  <i class="fas fa-sort-numeric-up"></i> เฟส
                </label>
                <input type="text" class="text-center form-control readonly" id="phase" name="input_tr_detail" disabled="disabled">
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
              <div class="form-group">
                <label for="bp" class="text-center font-weight-bold">
                  <i class="fas fa-sort-numeric-up"></i> สถานที่
                </label>
                <input type="text" class="text-center form-control readonly" id="location"  name="input_tr_detail" disabled="disabled">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-4">
              <div class="form-group">
                <label for="bp" class="text-center font-weight-bold">
                  <i class="fas fa-sort-numeric-up"></i> ละติจูด
                </label>
                <input type="text" class="text-center form-control readonly" id="lat"  name="input_tr_detail" disabled="disabled">
              </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
              <div class="form-group">
                <label for="bp" class="text-center font-weight-bold">
                  <i class="fas fa-sort-numeric-up"></i> ลองติจูด
                </label>
                <input type="text" class="text-center form-control readonly" id="lon" name="input_tr_detail" disabled="disabled">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
              <div class="form-group">
                <button type="button" class="btn btn-primary float-right" id="btn_edit" onclick="select_mode()" value="edit">แก้ไขรายละเอียดหม้อแปลง</button>
              </div>
            </div>
          </div>

          <div class="dropdown-divider mt-3"></div>
          <h4 class="card-title font-weight-bold">
            <i class="fas fa-bolt"></i>  รายละเอียดการวัดโหลด
          </h4>
            
          <div class="row mt-2">
            <div class="col-sm-12 col-md-12 col-lg-12">
            <table 
              data-toggle="table" 
              data-pagination="true"
              data-pagination-v-align="both"
              data-fixed-columns="true"
              data-sticky-header="true"
              data-page-list="[5, 10, 20, 100, ALL]"
              data-url="./api/datatable/tr_load_log_api.php?pea_no=<?=$_GET['pea_no']?>"
              data-page-size="5"
              id="load_log_table">
              <thead>
                <tr> 
                <th data-field="date_log" data-sortable="true" data-formatter="textCenterFormatter"><i class="fas fa-user-tie"></i> วันที่วัดโหลด</th>
                <th data-formatter="tr_format" data-field="id">รายละเอียด</th>
                </tr>
              </thead>
            </table>
            </div>
            <!-- modal -รายละเอียดวัดโหลด -->
            <div class='modal fade' tabindex='-1' role='dialog' id='TrModal'>
                <div class='modal-dialog modal-lg' role='document' >
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title font-weight-bold' id="head_modal"><i class="fas fa-bolt"></i> การวัดโหลด #<span id="load_log_id"></span></h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        <div class='modal-body'>
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                  <label> วันที่วัดโหลด</label>
                                  <input class="form-control" type="text" id="date_log" name = "date_log" disabled>
                              </div>
                            </div>
                          </div>
                          <h4 class="card-title font-weight-bold">
                            <i class="fas fa-bolt"></i>  กระแส
                          </h4>
                          <div class="row">
                            <div class="col-lg-3 offset-lg-2 text-center">
                                <label>เฟส A</label>   
                            </div>
                            <div class="col-lg-3 text-center">
                                <label>เฟส B</label>   
                            </div>
                            <div class="col-lg-3 text-center">
                                <label>เฟส C</label>   
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-2 text-center my-auto">
                                    <label>วงจรที่ 1</label>   
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group">
                                  <input class="form-control" type="text" id="c1a" name = "load_log_input" disabled>
                              </div>
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group">
                                  <input class="form-control" type="text" id="c1b" name = "load_log_input" disabled>
                              </div>
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group">
                                  <input class="form-control" type="text" id="c1c" name = "load_log_input" disabled>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-2 text-center my-auto">
                                    <label>วงจรที่ 2</label>   
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group">
                                  <input class="form-control" type="text" id="c2a" name = "load_log_input" disabled>
                              </div>
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group">
                                  <input class="form-control" type="text" id="c2b" name = "load_log_input" disabled>
                              </div>
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group">
                                  <input class="form-control" type="text" id="c2c" name = "load_log_input" disabled>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-2 text-center my-auto">
                                    <label>วงจรที่ 3</label>   
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group">
                                  <input class="form-control" type="text" id="c3a" name = "load_log_input" disabled>
                              </div>
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group">
                                  <input class="form-control" type="text" id="c3b" name = "load_log_input" disabled>
                              </div>
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group">
                                  <input class="form-control" type="text" id="c3c" name = "load_log_input" disabled>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-2 text-center my-auto">
                                    <label>วงจรที่ 4</label>   
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group">
                                  <input class="form-control" type="text" id="c4a" name = "load_log_input" disabled>
                              </div>
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group">
                                  <input class="form-control" type="text" id="c4b" name = "load_log_input" disabled>
                              </div>
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group">
                                  <input class="form-control" type="text" id="c4c" name = "load_log_input" disabled>
                              </div>
                            </div>
                          </div>

                          <h4 class="card-title font-weight-bold">
                            <i class="fas fa-bolt"></i>  แรงดัน
                          </h4>
                          <div class="row">
                            <div class="col-lg-3 offset-lg-2 text-center">
                                <label>เฟส A</label>   
                            </div>
                            <div class="col-lg-3 text-center">
                                <label>เฟส B</label>   
                            </div>
                            <div class="col-lg-3 text-center">
                                <label>เฟส C</label>   
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-2 text-center my-auto">
                                    <label>วงจรที่ 1</label>   
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group">
                                  <input class="form-control" type="text" id="v1a" name = "load_log_input" disabled>
                              </div>
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group">
                                  <input class="form-control" type="text" id="v1b" name = "load_log_input" disabled>
                              </div>
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group">
                                  <input class="form-control" type="text" id="v1c" name = "load_log_input" disabled>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-2 text-center my-auto">
                                    <label>วงจรที่ 2</label>   
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group">
                                  <input class="form-control" type="text" id="v2a" name = "load_log_input" disabled>
                              </div>
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group">
                                  <input class="form-control" type="text" id="v2b" name = "load_log_input" disabled>
                              </div>
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group">
                                  <input class="form-control" type="text" id="v2c" name = "load_log_input" disabled>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-2 text-center my-auto">
                                    <label>วงจรที่ 3</label>   
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group">
                                  <input class="form-control" type="text" id="v3a" name = "load_log_input" disabled>
                              </div>
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group">
                                  <input class="form-control" type="text" id="v3b" name = "load_log_input" disabled>
                              </div>
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group">
                                  <input class="form-control" type="text" id="v3c" name = "load_log_input" disabled>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-2 text-center my-auto">
                                    <label>วงจรที่ 4</label>   
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group">
                                  <input class="form-control" type="text" id="v4a" name = "load_log_input" disabled>
                              </div>
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group">
                                  <input class="form-control" type="text" id="v4b" name = "load_log_input" disabled>
                              </div>
                            </div>
                            <div class="col-lg-3">
                              <div class="form-group">
                                  <input class="form-control" type="text" id="v4c" name = "load_log_input" disabled>
                              </div>
                            </div>
                          </div>
                          
                           
                          
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-primary'  href="#" id="btn_edit_Load_log" onclick="check_mode_edit_load_log()" value="edit">แก้ไข</button>
                            <button type='button' class='btn btn-primary'  href="#" id="del" onclick="del()">ลบ</button>
                            <button type='button' class='btn btn-primary' data-dismiss='modal' >ปิด</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- จบ MOdal รายละเอียดวัดโหลด -->
          </div>
        </div>
  </div>
</div>