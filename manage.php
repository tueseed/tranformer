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
</div>