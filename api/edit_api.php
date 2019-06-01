<?php
    require('../utils/db_connector.php');

    $pea_no = $_POST["pea_no"];
    $kva = $_POST["kva"];
    $phase = $_POST["Phase"];
    $location = $_POST["location"];
    $current_a_left = $_POST["current_a_left"];
    $current_b_left = $_POST["current_b_left"];
    $current_c_left = $_POST["current_c_left"];
    
    $current_a_right = $_POST["current_a_right"];
    $current_b_right = $_POST["current_b_right"];
    $current_c_right = $_POST["current_c_right"];

    $voltage_a_left = $_POST["voltage_a_left"];
    $voltage_b_left = $_POST["voltage_b_left"];
    $voltage_c_left = $_POST["voltage_c_left"];

    $voltage_a_right = $_POST["voltage_a_right"];
    $voltage_b_right = $_POST["voltage_b_right"];
    $voltage_c_right = $_POST["voltage_c_right"];

    $sql_edit = "
                    UPDATE tbl_tr 
                    SET 
                    kva='$kva',
                    phase ='$phase',
                    location = '$location',
                    current_a_l ='$current_a_left',
                    current_b_l ='$current_b_left',
                    current_c_l ='$current_c_left',
                    current_a_r = '$current_a_right',
                    current_b_r = '$current_b_right',
                    current_c_r = '$current_c_right',
                    voltage_an_l = '$voltage_a_left',
                    voltage_bn_l = '$voltage_b_left',
                    voltage_cn_l = '$voltage_c_left',
                    voltage_an_r = '$voltage_a_right',
                    voltage_bn_r = '$voltage_b_right',
                    voltage_cn_r = '$voltage_c_right'
                    WHERE pea = '$pea_no'";
    mysqli_query($conn,$sql_edit);
    echo "Edited";

?>