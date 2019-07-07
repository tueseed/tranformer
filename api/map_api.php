<?php
    require('../utils/db_connector.php');
            //     $sql = "
            //     SELECT 
            //         tbl_tr_ptm.pea_no AS pea_no_tr,                        
            //         tbl_tr_ptm.*,
            //         GREATEST(
            //                     (COALESCE(tbl_load_log.c1a,0)+COALESCE(tbl_load_log.c2a,0)+COALESCE(tbl_load_log.c3a,0)+COALESCE(tbl_load_log.c4a,0)),
            //                     (COALESCE(tbl_load_log.c1b,0)+COALESCE(tbl_load_log.c2b,0)+COALESCE(tbl_load_log.c3b,0)+COALESCE(tbl_load_log.c4b,0)),
            //                     (COALESCE(tbl_load_log.c1c,0)+COALESCE(tbl_load_log.c2c,0)+COALESCE(tbl_load_log.c3c,0)+COALESCE(tbl_load_log.c4c,0))
            //                 ) AS max_amp,
            //         (COALESCE(tbl_load_log.c1a,0)+COALESCE(tbl_load_log.c2a,0)+COALESCE(tbl_load_log.c3a,0)+COALESCE(tbl_load_log.c4a,0)) AS t_a,
            //         (COALESCE(tbl_load_log.c1b,0)+COALESCE(tbl_load_log.c2b,0)+COALESCE(tbl_load_log.c3b,0)+COALESCE(tbl_load_log.c4b,0)) AS t_b,
            //         (COALESCE(tbl_load_log.c1c,0)+COALESCE(tbl_load_log.c2c,0)+COALESCE(tbl_load_log.c3c,0)+COALESCE(tbl_load_log.c4c,0)) AS t_c,
            //         (COALESCE(tbl_load_log.c1a,0)+COALESCE(tbl_load_log.c1b,0)+COALESCE(tbl_load_log.c1c,0)) AS t_1,
            //         (COALESCE(tbl_load_log.c2a,0)+COALESCE(tbl_load_log.c2b,0)+COALESCE(tbl_load_log.c2c,0)) AS t_2,
            //         (COALESCE(tbl_load_log.c3a,0)+COALESCE(tbl_load_log.c3b,0)+COALESCE(tbl_load_log.c3c,0)) AS t_3,
            //         (COALESCE(tbl_load_log.c4a,0)+COALESCE(tbl_load_log.c4b,0)+COALESCE(tbl_load_log.c4c,0)) AS t_4,
            //         tbl_load_log.*,
            //         tbl_load_log.pea_no AS pea_no_log,
            //         COUNT(tbl_tr_ptm.pea_no) AS tr
            // FROM
            //     tbl_tr_ptm
            // LEFT JOIN
            //     tbl_load_log
            // ON
            //     tbl_tr_ptm.pea_no = tbl_load_log.pea_no
            // GROUP BY
            // tbl_tr_ptm.pea_no
            // ORDER BY tr";
            $sql = "
            SELECT 
                max_date_tbl.pea_no
                , max_data_log
                , tbl_tr_ptm.*
                , GREATEST(
                            (COALESCE(tbl_load_log.c1a,0)+COALESCE(tbl_load_log.c2a,0)+COALESCE(tbl_load_log.c3a,0)+COALESCE(tbl_load_log.c4a,0)),
                            (COALESCE(tbl_load_log.c1b,0)+COALESCE(tbl_load_log.c2b,0)+COALESCE(tbl_load_log.c3b,0)+COALESCE(tbl_load_log.c4b,0)),
                            (COALESCE(tbl_load_log.c1c,0)+COALESCE(tbl_load_log.c2c,0)+COALESCE(tbl_load_log.c3c,0)+COALESCE(tbl_load_log.c4c,0))
                        ) AS max_amp
                , (COALESCE(tbl_load_log.c1a,0)+COALESCE(tbl_load_log.c2a,0)+COALESCE(tbl_load_log.c3a,0)+COALESCE(tbl_load_log.c4a,0)) AS t_a
                , (COALESCE(tbl_load_log.c1b,0)+COALESCE(tbl_load_log.c2b,0)+COALESCE(tbl_load_log.c3b,0)+COALESCE(tbl_load_log.c4b,0)) AS t_b
                , (COALESCE(tbl_load_log.c1c,0)+COALESCE(tbl_load_log.c2c,0)+COALESCE(tbl_load_log.c3c,0)+COALESCE(tbl_load_log.c4c,0)) AS t_c
                , (COALESCE(tbl_load_log.c1a,0)+COALESCE(tbl_load_log.c1b,0)+COALESCE(tbl_load_log.c1c,0)) AS t_1
                , (COALESCE(tbl_load_log.c2a,0)+COALESCE(tbl_load_log.c2b,0)+COALESCE(tbl_load_log.c2c,0)) AS t_2
                , (COALESCE(tbl_load_log.c3a,0)+COALESCE(tbl_load_log.c3b,0)+COALESCE(tbl_load_log.c3c,0)) AS t_3
                , (COALESCE(tbl_load_log.c4a,0)+COALESCE(tbl_load_log.c4b,0)+COALESCE(tbl_load_log.c4c,0)) AS t_4
                , tbl_load_log.*
             FROM 
                (SELECT pea_no, MAX(date_log) as max_data_log FROM tbl_load_log GROUP BY pea_no) max_date_tbl
                    JOIN tbl_load_log ON max_date_tbl.max_data_log = tbl_load_log.date_log AND max_date_tbl.pea_no = tbl_load_log.pea_no
                    JOIN tbl_tr_ptm ON tbl_tr_ptm.pea_no = max_date_tbl.pea_no";
    $query_search = mysqli_query($conn,$sql);
    $obj_result = mysqli_fetch_all($query_search,MYSQLI_ASSOC);

    $sql_not_load ="
                        SELECT *,tbl_tr_ptm.pea_no AS tr_non 
                        FROM 
                        tbl_tr_ptm
                        LEFT JOIN
                        tbl_load_log
                        ON
                        tbl_tr_ptm.pea_no = tbl_load_log.pea_no
                        WHERE ISNULL(tbl_load_log.id)";
    $query_not_load = mysqli_query($conn,$sql_not_load);
    $obj_not_load = mysqli_fetch_all($query_not_load,MYSQLI_ASSOC);
    $data = array("load"=>$obj_result,"not_load"=>$obj_not_load);


    echo json_encode($data);