<?php
    require('../utils/db_connector.php');

    /*$sql = "
            SELECT 
                tbl_tr_ptm.pea_no,
                tbl_tr_ptm.lat,
                tbl_tr_ptm.long
            FROM
                tbl_tr_ptm
            INNER JOIN
                tbl_load_log
            ON
                tbl_tr_ptm.pea_no = tbl_load_log.pea_no";*/
                $sql = "
                SELECT 
                    tbl_tr_ptm.pea_no AS pea_no_tr,                        
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
                    tbl_load_log.*,
                    tbl_load_log.pea_no AS pea_no_log,
                    COUNT(tbl_tr_ptm.pea_no) AS tr
            FROM
                tbl_tr_ptm
            LEFT JOIN
                tbl_load_log
            ON
                tbl_tr_ptm.pea_no = tbl_load_log.pea_no
            GROUP BY
            tbl_tr_ptm.pea_no
            ORDER BY tr";
    $query_search = mysqli_query($conn,$sql);
    $obj_result = mysqli_fetch_all($query_search,MYSQLI_ASSOC);
    echo json_encode($obj_result);