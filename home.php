<!-- <div class="row">
  <h6 class="p-3 font-weight-bold pt-3 rounded-pill bg-primary text-white">
    <i class="fas fa-table"></i> ข้อมูลหม้อแปลง
  </h6>
</div> -->
<!-- <div class="dropdown-divider"></div> -->

<div class="row">
  
  <a class="col-sm-12 col-md-6 col-lg-4 nav-link" href="?action=critical_tr&cri_cmd=h">
    <div class="card mt-2">
      <div class="card-header">
      <img src="./images/tr_danger.png"  class="rounded-circle" alt="Cinque Terre" width="30" height="30"> &nbsp;โหลดเกิน 80 %
      </div>
      <div class="card-body">
        <div class="text-center" style="font-size:50px;">
          <span class="font-weight-bold text-danger" id="high_load">--</span>
        </div>
        <div class="float-right" style="font-size:14px;">
          <span class="font-weight-bold text-danger">เครื่อง</span>
        </div>
      </div>
    </div>
  </a>

  <a class="col-sm-12 col-md-6 col-lg-4 nav-link" href="?action=critical_tr&cri_cmd=m">
    <div class="card mt-2">
      <div class="card-header">
      <img src="./images/tr_warning.png"  class="rounded-circle" alt="Cinque Terre" width="30" height="30" >&nbsp;โหลด 60-80 %
      </div>
      <div class="card-body">
        <div class="text-center" style="font-size:50px;">
          <span class="font-weight-bold text-warning" id="med_load">--</span>
        </div>
        <div class="float-right" style="font-size:14px;">
          <span class="font-weight-bold text-warning">เครื่อง</span>
        </div>
      </div>
    </div>
  </a>

  <a class="col-sm-12 col-md-6 col-lg-4 nav-link" href="?action=critical_tr&cri_cmd=l">
    <div class="card mt-2">
      <div class="card-header">
      <img src="./images/tr_success.png"  class="rounded-circle" alt="Cinque Terre" width="30" height="30"ห>&nbsp;โหลดน้อยกว่า 60 %
      </div>
      <div class="card-body">
        <div class="text-center" style="font-size:50px;">
          <span class="font-weight-bold text-success" id="low_load">--</span>
        </div>
        <div class="float-right" style="font-size:14px;">
          <span class="font-weight-bold text-success">เครื่อง</span>
        </div>
      </div>
    </div>
  </a>

  <a class="col-sm-12 col-md-6 col-lg-4 nav-link" href="?action=critical_tr&cri_cmd=u">
    <div class="card mt-2">
      <div class="card-header">
      <img src="./images/U.png"  class="rounded-circle" alt="Cinque Terre" width="30" height="30" >&nbsp;%Unbalance >20
      </div>
      <div class="card-body">
        <div class="text-center" style="font-size:50px;">
          <span class="font-weight-bold text-primary" id="unb_load">--</span>
        </div>
        <div class="float-right" style="font-size:14px;">
          <span class="font-weight-bold text-primary">เครื่อง</span>
        </div>
      </div>
    </div>
  </a>

</div>

 

  
 
  <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  
</div>