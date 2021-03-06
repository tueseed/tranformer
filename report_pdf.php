<?php
    require_once __DIR__ . '/vendor/autoload.php';
    //require_once './utils/db_connector.php';
    require('./utils/db_connector.php');
    $d1 = $_GET["d1"];
    $d2 = $_GET["d2"];
    //////////////
    $sql_report = "
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
            INNER JOIN
                tbl_load_log
            ON
                tbl_tr_ptm.pea_no = tbl_load_log.pea_no
            GROUP BY
            tbl_tr_ptm.pea_no
            ORDER BY tr";
    $query_report = mysqli_query($conn,$sql_report);
    /////////////
    

    

    $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8', 
        'orientation' => 'L',
        'default_font' => 'sarabun',
        'setAutoBottomMargin' => 'pad'
    ]);
    
   
    $mpdf->SetHTMLHeader('
        <div style="text-align: right; font-weight: bold;">
        หน้าที่ {PAGENO} จากทั้งหมด {nbpg}
        </div>
    ');
    
    /*$mpdf->SetHTMLFooter('
    <table width="100%" border="0">
        <tr>
            <td width="33%">
                <img src="./assets/images/qr-code-with-logo.png" width="100" /><br/>
                ระบบอัตโนมัติสร้างเอกสารนี้เมื่อวันที่ {DATE j-m-Y}
            </td>
            <td width="33%" align="center" style="vertical-align: bottom;">หน้าที่ {PAGENO} จากทั้งหมด {nbpg} หน้า</td>
            <td width="33%" style="text-align: right;vertical-align: bottom;">คำสั่งซื้อ</td>
        </tr>
    </table>');*/
    $body_page = "
        <style>
            table.customTable {
                width: 100%;
                background-color: #FFFFFF;
                border-collapse: collapse;
                border-width: 2px;
                border-color: #D1D1D1;
                border-style: solid;
                color: #000000;
            }

            table.customTable td, table.customTable th {
                border-width: 2px;
                border-color: #D1D1D1;
                border-style: solid;
                padding: 5px;
            }

            table.customTable thead {
                background-color: #D1D1D1;
            }
        </style>
    ";
    $body_page .= '
        <div>
            <img src="./assets/images/pea-logo.png" style="width:170px;margin: 0;padding-bottom:0px;" />
            <h1 style="font-size: 24px;">รายงานการวัดโหลดหม้อแปลง การไฟฟ้าส่วนภูมิภาคอำเภอโพธาราม</h1>
            <h2 style="font-size: 20px;">ตั้งแต่วันที่ '.$d1.' ถึง '.$d2.'</h2>
        </div>
        <div>
            <table class="customTable" style="width:100%;height:100%;table-layout:fixed;overflow:hidden;text-align:center;">
                <thead>
                    <tr style="background-color: black;">
                        <th rowspan="2" style="font-weight:bold;font-size:16;color:white;">Pea No.</th>
                        <th rowspan="2" style="font-weight:bold;font-size:16;color:white;">Phase</th>
                        <th rowspan="2" style="font-weight:bold;font-size:16px;color:white;">Kva</th>
                        <th rowspan="2" style="font-weight:bold;font-size:16px;color:white;">ค่า</th>
                        <th colspan="3" style="font-weight:bold;font-size:16px;color:white;">วงจรที่1</th>
                        <th colspan="3" style="font-weight:bold;font-size:16px;color:white;">วงจรที่2</th>
                        <th colspan="3" style="font-weight:bold;font-size:16px;color:white;">วงจรที่3</th>
                        <th colspan="3" style="font-weight:bold;font-size:16px;color:white;">วงจรที่4</th>
                        <th rowspan="2" style="font-weight:bold;font-size:16px;color:white;">%Load</th>
                        <th rowspan="2" style="font-weight:bold;font-size:16px;color:white;">%Unb.</th>
                    </tr>
                    <tr style="background-color: black;">
                        <th  style="font-weight:bold;font-size:16px;color:white;">เฟส A</th>
                        <th  style="font-weight:bold;font-size:16px;color:white;">เฟส B</th>
                        <th  style="font-weight:bold;font-size:16px;color:white;">เฟส C</th>
                        <th  style="font-weight:bold;font-size:16px;color:white;">เฟส A</th>
                        <th  style="font-weight:bold;font-size:16px;color:white;">เฟส B</th>
                        <th  style="font-weight:bold;font-size:16px;color:white;">เฟส C</th>
                        <th  style="font-weight:bold;font-size:16px;color:white;">เฟส A</th>
                        <th  style="font-weight:bold;font-size:16px;color:white;">เฟส B</th>
                        <th  style="font-weight:bold;font-size:16px;color:white;">เฟส C</th>
                        <th  style="font-weight:bold;font-size:16px;color:white;">เฟส A</th>
                        <th  style="font-weight:bold;font-size:16px;color:white;">เฟส B</th>
                        <th  style="font-weight:bold;font-size:16px;color:white;">เฟส C</th>
                    </tr>
                   
                </thead>
                <tbody >
        ';

       $i = 1;
       while($obj = mysqli_fetch_array($query_report))
       {
        $body_page .= '
                        <tr>
                            <td rowspan="2">'.$i.".".$obj["pea_no_tr"].'</td>
                            <td rowspan="2">3</td>
                            <td rowspan="2">150</td>
                            <td>I</td>
                            <td>35</td>
                            <td>75</td>
                            <td>40</td>
                            <td>36</td>
                            <td>15</td>
                            <td>25</td>
                            <td>46</td>
                            <td>78</td>
                            <td>95</td>
                            <td>12</td>
                            <td>0</td>
                            <td>30</td>
                            <td rowspan="2">85</td>
                            <td rowspan="2">100</td>
                        </tr>
                        <tr>
                        <td>V</td>
                        <td>35</td>
                            <td>200</td>
                            <td>223</td>
                            <td>230</td>
                            <td>180</td>
                            <td>190</td>
                            <td>250</td>
                            <td>230</td>
                            <td>222</td>
                            <td>214</td>
                            <td>215</td>
                            <td>156</td>
                        </tr>';
                        $i++;
       }   
         $body_page .= '</tbody>
                         </table>
                         </div>  ';
    $mpdf->WriteHTML($body_page);
    $mpdf->Output();