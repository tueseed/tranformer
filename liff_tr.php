
<div class="row mt-3 ">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">คำค้นหา</span>
      </div>
      <input type="text" class="form-control" id="txt_search" placeholder="ใช้ Pea No. ของหม้อแปลงเพื่อค้นหา" >
      <button type="button" class="btn btn-primary btn-block mt-3" onclick="search_tr()">ค้นหา</button>
    </div>
  </div>
</div>
<!-- <div class="dropdown-divider"></div> -->
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <h3><span class="text-primary" id="txt_result"></span></h3>
  </div>
</div>

<div class="alert alert-primary" role="alert" id="text_result_not_found_alert" style="display:none;">
    <p style="text-indent:20px;" id="text_result_not_found">
        ไม่พบ Pea.------ ในระบบ ต้องการเพิ่มข้อมูลหรือไม่
    </p>
    <p>
    <a type="button" href="#" class="btn btn-primary btn-block mt-3"  id="add_tr"><i class="fas fa-plus-square"></i>    เพิ่มข้อมูล</a>
    </p>
</div>

<div class="row" id="card-area">
  <!------CARD RENDER IN THIS PLACE ------------>
  
</div>
