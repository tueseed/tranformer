<div class="row mt-3 ">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="text-center">
            <label class="font-weight-bold text-primary bg-light py-2 px-5 shadow-sm" style="font-size:22px;border-radius: 20px;">
                <i class="fas fa-bolt"></i>
                ข้อมูลหม้อแปลง
            </label>
        </div>

        <p style="font-size:20px;">
            <span class='font-weight-bold text-success'>
                Pea No:
            </span> 
            <span class="pl-1" id="pea_no">
                ------
            </span>
        </p>

        <p style="font-size:20px;">
            <span class='font-weight-bold text-success'>
                KVA-Phase:
            </span> 
            <span class="pl-1" id="kva_phase">
                --------
            </span>
        </p>

        <p style="font-size:20px;">
            <span class='font-weight-bold text-success'>
                Max Amp :
            </span> 
            <span class="pl-1" id="rate_amp">
                --------
            </span>
        </p>

        <p style="font-size:20px;">
            <span class='font-weight-bold text-success'>
                สถานที่:
            </span>
            <span class='pl-1' id="location">
                ------
            </span>
            <i class="fas fa-location-arrow text-primary" aria-hidden="true"></i>
        </p>

        <div class="text-center">
            <label class="font-weight-bold text-primary bg-light py-2 px-5 shadow-sm" style="font-size:18px;border-radius: 20px;">
                <i class="fas fa-bolt"></i>
                ปริมาณโหลด
            </label>
        </div>

        <div class="progress mt-2 mb-2" style="height:30px">
            <div class="progress-bar bg-danger progress-bar-striped" style="width:0%;height:30px" id="progress_bar">---</div>
        </div>

        <div class="text-center">
            <label class="font-weight-bold text-primary bg-light py-2 px-5 shadow-sm" style="font-size:18px;border-radius: 20px;">
                <i class="fas fa-bolt"></i>
                กระแส(Amp)
            </label>
        </div>

        <table class="table">
            <thead class="bg-primary text-white">
            <tr>
                <th>วงจร</th>
                <th>A</th>
                <th>B</th>
                <th>C</th>
                <th>รวม</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th>ซ้าย</th>
                <td id="a_l">--</td>
                <td id="b_l">--</td>
                <td id="c_l">--<i class="fas fa-exclamation-triangle text-warning" aria-hidden="true"></i></td>
                <td id="t_c_l">--</td>
            </tr>
            <tr>
                <th>ขวา</th>
                <td id="a_r">--</td>
                <td id="b_r">--</td>
                <td id="c_r">--</td>
                <td id="t_c_r">--</td>
            </tr>
            <tr>
                <th>รวม</th>
                <td id="t_a">--</td>
                <td id="t_b">--</td>
                <td id="t_c">--</td>
                <td id="t_all">--</td>
            </tr>
            </tbody>
        </table>

        <div class="text-center">
            <label class="font-weight-bold text-primary bg-light py-2 px-5 shadow-sm" style="font-size:18px;border-radius: 20px;">
                <i class="fas fa-bolt"></i>
                แรงดัน(Volt)
            </label>
        </div>

        <table class="table">
            <thead class="bg-primary text-white">
            <tr>
                <th>วงจร</th>
                <th>AN</th>
                <th>BN</th>
                <th>CN</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>ซ้าย</td>
                <td id="v_an_l">--</td>
                <td id="v_bn_l">--</td>
                <td id="v_cn_l">--</td>
            </tr>
            <tr>
                <td>ขวา</td>
                <td id="v_an_r">--</td>
                <td id="v_bn_r">--</td>
                <td id="v_cn_r">--</td>
            </tr>
            </tbody>
        </table>

        <a href="#" class="btn btn-primary btn-block mt-3" id="edit_btn"><i class="fas fa-pencil-square-o" aria-hidden="true"></i>    แก้ไข</a>
    </div>
</div>
