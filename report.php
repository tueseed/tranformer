<div class="row form-inline">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="text-center">
            <input type="date" class="form-control mr-3" id="d1" placeholder="ตั้งแต่วันที่">
            <span class="font-weight-bold text-success">ถึง</span>
            <input type="date" class="form-control ml-3" id="d2" placeholder="ตั้งแต่วันที่">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="text-center">
        <button type="button" class="btn btn-primary mt-3" onclick="query_for_report()"><i class="fa fa-search" aria-hidden="true"></i> ค้นหา</button>
        </div>
    </div>
</div>

<div class="row mt-1">
  <div class="col-sm-12 col-md-12 col-lg-12">
    <table 
      id="report_table"
      data-toggle="table" 
      data-pagination="true"
      data-pagination-v-align="both"
      data-fixed-columns="true"
      data-sticky-header="true"
      data-search="false"
      data-page-list="[5, 10, 20, 100, ALL]"
      data-page-size="5"
      data-url="">
      <thead>
        <tr>
          
          <th data-field="date_log" data-sortable="true"><i class="fas fa-calendar" aria-hidden="true"></i> วันที่วัดโหลด</th>
          <th data-field="pea_no_tr" data-sortable="true"><i class="fas fa-user-tie"></i> Pea No.</th>
          <th data-field="phase" data-sortable="true"><i class="fas fa-receipt"></i> Phase</th>
          <th data-field="kva" data-sortable="true"><i class="fas fa-receipt"></i> Kva</th>
          <!-- <th data-formatter="operateFormatter" data-events="operateEvents" >Kva</th> -->
        </tr>
      </thead>
    </table>
  </div>
</div>

<div class="row mt-1">
    <button type="button" class="btn btn-primary mt-3" onclick="export_pdf()"><i class="fas fa-file-pdf" aria-hidden="true"></i>  Export</button>
</div>