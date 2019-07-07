<div class="row">
    <h5 class="header text-secondary font-weight-bold text-left" id="head_cri"></h5>
  <div class="col-sm-12 col-md-12 col-lg-12">
    <table 
      data-toggle="table" 
      data-pagination="true"
      data-pagination-v-align="both"
      data-fixed-columns="true"
      data-sticky-header="true"
      data-search="true"
      data-page-list="[5, 10, 20, 100, ALL]"
      data-url="./api/datatable/critical_table.php?cri_cmd=<?=$_GET['cri_cmd']?>"
      data-page-size="5">
      <thead>
        <tr> 
        <th data-field="pea_no" data-sortable="true" data-formatter="textCenterFormatter"><i class="fas fa-bolt"></i> Pea No.</th>
        <th data-field="phase" data-sortable="true"><i class="fas fa-bolt"></i> Phase</th>
        <th data-field="kva" data-sortable="true"><i class="fas fa-bolt"></i> Kva</th>
        <th data-formatter="tr_format" data-field="pea_no" >สถิติ</th>
        </tr>
      </thead>
    </table>
  </div>
  <!-- modal -รายละเอียดวัดโหลด -->
  <div class='modal fade' tabindex='-1' role='dialog' id='TrModal'>
                <div class='modal-dialog modal-lg' role='document' >
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title font-weight-bold' id="head_modal"><i class="fas fa-bolt"></i> สถิติการวัดโหลด Pea NO. <span id="pea_no"></span></h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        <div class='modal-body'>
                          <div class="row">
                            <canvas id="myChart" style="height:40vh; width:70vw"></canvas>
                          </div> 
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- จบ MOdal รายละเอียดวัดโหลด -->
</div>