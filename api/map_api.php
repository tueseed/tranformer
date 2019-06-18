<?php
    require('../utils/db_connector.php');

    $sql = "
            SELECT 
                tbl_tr_ptm.pea_no,
                tbl_tr_ptm.lat,
                tbl_tr_ptm.long
            FROM
                tbl_tr_ptm
            INNER JOIN
                tbl_load_log
            ON
                tbl_tr_ptm.pea_no = tbl_load_log.pea_no";
    $query_search = mysqli_query($conn,$sql);
    //$obj_result = mysqli_fetch_all($query_search,MYSQLI_ASSOC);
    $data = array();
    while($obj_result = mysqli_fetch_array($query_search))
    {
        array_push($data,array(
                                'latitude'=>$obj_result['lat'],
                                'longitude'=>$obj_result['long'],
                                'info'=>array(
                                                'Icon'=>"<img src='https://developer.nostramap.com/developer/asset/image/icon/default%20_pic_hotel.png' width='180px'>",
                                                'name'=>'Sai Kaew Beach Resort',
                                                'address'=>'Phe, Mueang Rayong, Rayong, 21160',
                                                'rating'=>'4',
                                                'revenue'=>'15000000'  
                                                )
                                
                                ) 
                            );
    }
    echo json_encode($data);