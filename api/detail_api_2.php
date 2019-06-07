<?php
    require('../utils/db_connector.php');

    $pea_no = $_POST["pea_no"];
    $sql_search = "
                    SELECT 
                        tbl_tr_ptm.*,
                        GREATEST(
                                    (COALESCE(tbl_load_log.c1a,0)+COALESCE(tbl_load_log.c2a,0)+COALESCE(tbl_load_log.c3a,0)+COALESCE(tbl_load_log.c4a,0)),
                                    (COALESCE(tbl_load_log.c1b,0)+COALESCE(tbl_load_log.c2b,0)+COALESCE(tbl_load_log.c3b,0)+COALESCE(tbl_load_log.c4b,0)),
                                    (COALESCE(tbl_load_log.c1c,0)+COALESCE(tbl_load_log.c2c,0)+COALESCE(tbl_load_log.c3c,0)+COALESCE(tbl_load_log.c4c,0))
                                ) AS max_amp,
                        (COALESCE(tbl_load_log.c1a,0)+COALESCE(tbl_load_log.c2a,0)+COALESCE(tbl_load_log.c3a,0)+COALESCE(tbl_load_log.c4a,0)) AS t_a,
                        (COALESCE(tbl_load_log.c1b,0)+COALESCE(tbl_load_log.c2b,0)+COALESCE(tbl_load_log.c3b,0)+COALESCE(tbl_load_log.c4b,0)) AS t_b,
                        (COALESCE(tbl_load_log.c1c,0)+COALESCE(tbl_load_log.c2c,0)+COALESCE(tbl_load_log.c3c,0)+COALESCE(tbl_load_log.c4c,0)) AS t_c,
                        (COALESCE(tbl_load_log.c1a,0)+COALESCE(tbl_load_log.c1b,0)+COALESCE(tbl_load_log.c1c,0)) AS t_1,
                        (COALESCE(tbl_load_log.c2a,0)+COALESCE(tbl_load_log.c2b,0)+COALESCE(tbl_load_log.c2c,0)) AS t_2,
                        (COALESCE(tbl_load_log.c3a,0)+COALESCE(tbl_load_log.c3b,0)+COALESCE(tbl_load_log.c3c,0)) AS t_3,
                        (COALESCE(tbl_load_log.c4a,0)+COALESCE(tbl_load_log.c4b,0)+COALESCE(tbl_load_log.c4c,0)) AS t_4,
                        tbl_load_log.*
                    FROM 
                        tbl_tr_ptm 
                    INNER JOIN 
                        tbl_load_log 
                    ON 
                        tbl_tr_ptm.pea_no = tbl_load_log.pea_no
                    WHERE 
                        tbl_tr_ptm.pea_no = '$pea_no'
                    AND 
						tbl_load_log.date_log = (SELECT max(date_log) AS max_date FROM tbl_load_log WHERE pea_no='$pea_no')
                  ";
    $query_search = mysqli_query($conn,$sql_search);
    $obj_result = mysqli_fetch_all($query_search,MYSQLI_ASSOC);

    if(!$obj_result)
    {
        $sql_search = "SELECT * FROM tbl_tr_ptm WHERE pea_no = '$pea_no'";
        $query_search = mysqli_query($conn,$sql_search);
        $obj_result = mysqli_fetch_all($query_search,MYSQLI_ASSOC);
        array_push($obj_result,array("load"=>"not"));
        
    }
    else if($obj_result[0]["pea_no"])
    {
        array_push($obj_result,array("load"=>"yes"));
    }
    
    echo json_encode($obj_result);
    //echo $obj_result[0]["pea_no"]
   


?>