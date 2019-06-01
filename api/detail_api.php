<?php
    require('../utils/db_connector.php');

    $pea_no = $_POST["pea_no"];

    $sql_search = "SELECT *,(current_a_l+current_b_l+current_c_l) AS sum_c_l,(current_a_r+current_b_r+current_c_r) AS sum_c_r  FROM tbl_tr WHERE pea =  '$pea_no'";
    $query_search = mysqli_query($conn,$sql_search);
    $obj_result = mysqli_fetch_all($query_search,MYSQLI_ASSOC);

    echo json_encode($obj_result);


?>