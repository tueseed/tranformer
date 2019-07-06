<div class="row">
  <div class="col-sm-12 col-md-12 col-lg-12">
    <table 
      data-toggle="table" 
      data-pagination="true"
      data-pagination-v-align="both"
      data-fixed-columns="true"
      data-sticky-header="true"
      data-search="true"
      data-page-list="[5, 10, 20, 100, ALL]"
      data-url="./api/datatable/report_table.php"
      data-page-size="5">
      <thead>
        <tr> 
        <th data-field="pea_no_tr" data-sortable="true" data-formatter="textCenterFormatter"><i class="fas fa-user-tie"></i> Pea No.</th>
        <th data-field="phase" data-sortable="true"><i class="fas fa-receipt"></i> Phase</th>
        <th data-field="kva" data-sortable="true"><i class="fas fa-receipt"></i> Kva</th>
        <th data-formatter="tr_format" data-events="tr_event">รายละเอียด</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class='modal fade' tabindex='-1' role='dialog' id='cartModal'>
                <div class='modal-dialog modal-lg' role='document' >
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title font-weight-bold' id="head_modal"><i class="fas fa-bolt"></i> Pea No. <span id="pea_no"></span></h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        <div class='modal-body'>
                            <div class="form-group">
                                <label>Pea No.</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label> ความต้องการเพิ่มเติม</label>
                                <textarea class="form-control" rows="3" id="des" name = "des" disabled></textarea>
                            </div>
                            <label>วันที่นัดหมาย</label>
                            <input class="form-control text-center datepicker" 
                                style="font-size:22px;"
                                placeholder="เลือกวันนัดหมาย" 
                                type="date" disabled name="date_input" id="app_date"/>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-primary'  href="#" id="edit" onclick="edit()" value="edit">แก้ไข</button>
                            <button type='button' class='btn btn-primary'  href="#" id="del">ลบ</button>
                            <button type='button' class='btn btn-primary' data-dismiss='modal' >ปิด</button>
                        </div>
                    </div>
                </div>
            </div>
</div>