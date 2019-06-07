<?php
    require('../utils/db_connector.php');

    $pea_no = $_POST["pea_no"];
    $kva = $_POST["kva"];
    $phase = $_POST["Phase"];
    $location = $_POST["location"];

    $c1a = $_POST["c1a"];
    $c1b = $_POST["c1b"];
    $c1c = $_POST["c1c"];

    $c2a = $_POST["c2a"];
    $c2b = $_POST["c2b"];
    $c2c = $_POST["c2c"];

    $c3a = $_POST["c3a"];
    $c3b = $_POST["c3b"];
    $c3c = $_POST["c3c"];

    $c4a = $_POST["c4a"];
    $c4b = $_POST["c4b"];
    $c4c = $_POST["c4c"];
    
    $v1a = $_POST["v1a"];
    $v1b = $_POST["v1b"];
    $v1c = $_POST["v1c"];

    $v2a = $_POST["v2a"];
    $v2b = $_POST["v2b"];
    $v2c = $_POST["v2c"];

    $v3a = $_POST["v3a"];
    $v3b = $_POST["v3b"];
    $v3c = $_POST["v3c"];

    $v4a = $_POST["v4a"];
    $v4b = $_POST["v4b"];
    $v4c = $_POST["v4c"];

    $tr_id= $_POST["tr_id"];
    
    
   
    $sql_edit = "
                    UPDATE 
                        tbl_load_log 
                    SET 
                        c1a ='$c1a',c1b ='$c1b',c1c ='$c1c',
                        c2a ='$c2a',c2b ='$c2b',c2c ='$c2c',
                        c3a ='$c3a',c3b ='$c3b',c3c ='$c3c',
                        c4a ='$c4a',c4b ='$c4b',c4c ='$c4c',
                        v1a ='$v1a',v1b ='$v1b',v1c ='$v1c',
                        v2a ='$v2a',v2b ='$v2b',v2c ='$v2c',
                        v3a ='$v3a',v3b ='$v3b',v3c ='$v3c',
                        v4a ='$v4a',v4b ='$v4b',v4c ='$v4c'
                    WHERE 
                        id = '$tr_id'";
    mysqli_query($conn,$sql_edit);
    echo $c3a;

?>