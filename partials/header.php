<!DOCTYPE html>
<html lang="th">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ระบบบันทึกการวัดโหลดหม้อแปลง--กานไฟฟ้าส่วนภูมิภาคอำเภอโพธาราม</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/theme_1545570683953.css">
    <link rel="stylesheet" href="./assets/css/map.css">
    <link href="https://fonts.googleapis.com/css?family=Sarabun|Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.css">
    <link rel="stylesheet" href="./assets/css/bootstrap-table-sticky-header.css">
    
    <style>
      * {
        font-family: 'Sarabun', 'Roboto', sans-serif;
      }
      .font-roboto {
        font-family: 'Roboto';
      }
    </style>
  </head>

  <body>
    <header class="pb-3">
      <!-- Image and text -->
      <nav class="shadow-sm navbar navbar-light bg-white">
        <div class="container-fluid">
          <a class="navbar-brand font-weight-bold" href="#!">
            <img src="./assets/images/pea-logo.png" width="100" class="d-inline-block align-top" alt="">
            <span style="color:#4385f5;">TRANS</span><span style="color:#ea4235;">FOR</span><span style="color:#fbbd0a;">MER</span><span style="color:#4385f5;"> L</span><span style="color:#34a853;">OA</span><span style="color:#ea4235;">D</span>
          </a>
          <span class="navbar-text">
            กฟอ.โพธาราม
          </span>
        </div>
      </nav>
    </header>
    <main class="mb-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12 col-md-4 col-lg-2">
            <h5 class="header text-secondary font-weight-bold text-left">เมนูหลัก</h5>
            <div class="nav flex-column nav-pills rounded" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link <?=$action=='home'?'active':'' ?>" href="?action=home">
                <i class="fas fa-home"></i>
                หน้าแรก
              </a>
              <a class="nav-link <?=$action=='manage'?'active':'' ?>" href="?action=manage">
                <i class="fa fa-search" aria-hidden="true"></i>  
                จัดการหม้อแปลง
              </a>
              <a class="nav-link <?=$action=='map'?'active':'' ?>" href="?action=map">
              <i class="fa fa-map-marked-alt"></i>  
                แผนที่หม้อแปลง
              </a>
              <a class="nav-link <?=$action=='report'?'active':'' ?>" href="?action=report">
                <i class="fa fa-clipboard" aria-hidden="true"></i>
                รายงานวัดโหลด
              </a>
            </div>
            <hr class="clearfix"/>
            <div id="tr_symbol">
            <h5 class="header text-secondary font-weight-bold text-left">สัญลักษณ์</h5>
              <div class="mt-2">
                <img src="./images/tr_danger.png"  class="rounded-circle" alt="Cinque Terre" width="30" height="30" style="background-color: gray;">&nbsp;โหลดเกิน 80 %
              </div>
              <div class="mt-2">
                <img src="./images/tr_warning.png"  class="rounded-circle" alt="Cinque Terre" width="30" height="30" style="background-color: gray;">&nbsp;โหลด 60-80 %
              </div>
              <div class="mt-2">
                <img src="./images/tr_success.png"  class="rounded-circle" alt="Cinque Terre" width="30" height="30" style="background-color: gray;">&nbsp;โหลดน้อยกว่า 60 %
              </div>
              <div class="mt-2">
                <img src="./images/tr_non.PNG"  class="rounded-circle" alt="Cinque Terre" width="30" height="30" style="background-color: gray;">&nbsp;ไม่มีข้อมูลวัดโหลด
              </div>
              <div class="mt-2">
                <img src="./images/U.png"  class="rounded-circle" alt="Cinque Terre" width="30" height="30" style="background-color: gray;">&nbsp;%Unbalance >20
              </div>
              <hr class="clearfix"/>
              <h5 class="header text-secondary font-weight-bold text-left">ชั้นข้อมูล</h5>
              <div class="custom-control custom-checkbox ml-2">
                <input type="checkbox" class="custom-control-input" id="has_log" name="example1" checked>
                <label class="custom-control-label" for="has_log">มีข้อมูลวัดโหลด</label>
              </div>
              <div class="custom-control custom-checkbox ml-2">
                <input type="checkbox" class="custom-control-input" id="no_log" name="example1" checked>
                <label class="custom-control-label" for="no_log">ไม่มีข้อมูลวัดโหลด</label>
              </div>
            </div>
          </div>
          <div class="col-sm-12 col-md-8 col-lg-10">
          