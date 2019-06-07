<?php
    require('../utils/db_connector.php');

    $pea_no = $_POST["pea_no"];

    $sql_search = "SELECT * FROM tbl_tr_ptm WHERE pea_no LIKE '%$pea_no%'";
    $query_search = mysqli_query($conn,$sql_search);
    $obj_result = mysqli_fetch_all($query_search,MYSQLI_ASSOC);

    echo json_encode($obj_result);


?>