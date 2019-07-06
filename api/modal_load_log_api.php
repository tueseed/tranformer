<?php
    require('../utils/db_connector.php');
    $load_log_id = $_POST["load_log_id"];
    $sql = "SELECT * FROM tbl_load_log WHERE id = '$load_log_id'";
    $query_search = mysqli_query($conn,$sql);
    $obj_result = mysqli_fetch_all($query_search,MYSQLI_ASSOC);
    echo json_encode($obj_result);
?>