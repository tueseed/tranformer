<?php
  require('../../utils/db_connector.php');
  if(!array_key_exists("pea_no", $_GET) 
      || (is_null($_GET['pea_no']) 
      || empty($_GET['pea_no']))){
    echo "ท่านเข้าดูรายละเอียดลูกค้าไม่ถูกต้อง เนื่องจากไม่มีข้อมูล CA";
    exit(0);
  }
  $pea_no = $_GET["pea_no"];
  $fetch_automatic = "
                        SELECT 
                            * 
                        FROM
                            tbl_load_log
                        WHERE
                            pea_no = '$pea_no'
                        ";

  $fetch_automatic_query = $conn->query($fetch_automatic);
  $ca_obj = $fetch_automatic_query->fetch_all(MYSQLI_ASSOC);
  echo json_encode($ca_obj, JSON_UNESCAPED_UNICODE);