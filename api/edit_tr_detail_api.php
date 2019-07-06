<?php
    require('../utils/db_connector.php');

    $pea_no = $_POST["pea_no"];
    $kva = $_POST["kva"];
    $phase = $_POST["Phase"];
    $location = $_POST["location"];
    $lat = $_POST["lat"];
    $lon = $_POST["lon"];

    $sql_edit = "
                    UPDATE 
                        tbl_tr_ptm 
                    SET 
                        kva ='$kva',phase ='$phase',location ='$location',
                        lon ='$lon',lat ='$lat'
                    WHERE 
                         pea_no = '$pea_no'";
    mysqli_query($conn,$sql_edit);
    echo $pea_no.$phase.$location.$lat.$lon;
?>  