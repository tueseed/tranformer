<?php
     require('../utils/db_connector.php');
     $que = $_GET["query"];
     $sql = "SELECT * FROM tbl_tr_ptm WHERE pea_no LIKE '%$que%'" ;
     $query_pea = mysqli_query($conn,$sql);
    $data1= array();
    while($obj = mysqli_fetch_array($query_pea))
    {
        // $latlon = $obj["lat"].",".$obj["long"];
        $latlon = array(
                        "lat"=>$obj["lat"],
                        "lon"=>$obj["lon"]
                    );
        array_push(
                    $data1,
                    array(
                            "value"=>$obj["pea_no"],
                            "data"=>$latlon
                        )
                    );
    }
     $data=array("suggestions"=>$data1);
     
     // $data = array("suggestions"=>array("Volvo", "BMW", "Toyota"));
     echo json_encode($data);
    // echo '{"suggestions": ["United Arab Emirates", "United Kingdom", "United States"]}';
?>