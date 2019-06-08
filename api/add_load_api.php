<?php
    require('../utils/db_connector.php');

    $request =$_POST["request"];

    if($request == 'get_data')
    {
        $pea_no = $_POST["pea_no"];
        $sql_search = "SELECT * FROM tbl_tr_ptm WHERE pea_no = '$pea_no'";
        $query_search = mysqli_query($conn,$sql_search);
        $obj_result = mysqli_fetch_all($query_search,MYSQLI_ASSOC);
        echo json_encode($obj_result);
    }
    else if($request == 'add_data')
    {
        $pea_no = $_POST["pea_no"];

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
        
        $date_log = date("Y-m-d");

        $sql = "
                INSERT INTO 
                    tbl_load_log(
                                    pea_no,c1a,c1b,c1c,
                                    c2a,c2b,c2c,
                                    c3a,c3b,c3c,
                                    c4a,c4b,c4c,
                                    v1a,v1b,v1c,
                                    v2a,v2b,v2c,
                                    v3a,v3b,v3c,
                                    v4a,v4b,v4c,date_log
                    )
                    VALUES(
                                '$pea_no','$c1a','$c1b','$c1c',
                                '$c2a','$c2b','$c2c',
                                '$c3a','$c3b','$c3c',
                                '$c4a','$c4b','$c4c',
                                '$v1a','$v1b','$v1c',
                                '$v2a','$v2b','$v2c',
                                '$v3a','$v3b','$v3c',
                                '$v4a','$v4b','$v4c','$date_log'
                    )
                    ";
        mysqli_query($conn,$sql);
        echo "Inserted";              
    }



?>