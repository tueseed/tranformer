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
                Rate Current :
            </span> 
            <span class="pl-1" id="rate_amp">
                --------
            </span>
        </p>

        <p style="font-size:20px;">
            <span class='font-weight-bold text-success'>
                Avg Current :
            </span> 
            <span class="pl-1" id="avg_amp">
                --------
            </span>
        </p>

        <p style="font-size:20px;">
            <span class='font-weight-bold text-success'>
                %Unbalance :
            </span> 
            <span class="pl-1" id="unbalance">
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
            <span class='pl-1'><a href="" id="map"><i class="fas fa-location-arrow text-primary" aria-hidden="true"></i></a></span>
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
                <th>1</th>
                <td id="c1a">--</td>
                <td id="c1b">--</td>
                <td id="c1c">--<i class="fas fa-exclamation-triangle text-warning" aria-hidden="true"></i></td>
                <td id="t_1">--</td>
            </tr>
            <tr>
                <th>2</th>
                <td id="c2a" name="amp_param_2">--</td>
                <td id="c2b" name="amp_param_2">--</td>
                <td id="c2c" name="amp_param_2">--</td>
                <td id="t_2" name="amp_param_2">--</td>
            </tr>
            <tr>
                <th>3</th>
                <td id="c3a" name="amp_param_3">--</td>
                <td id="c3b" name="amp_param_3">--</td>
                <td id="c3c" name="amp_param_3">--</td>
                <td id="t_3" name="amp_param_3">--</td>
            </tr>
            <tr>
                <th>4</th>
                <td id="c4a" name="amp_param_4">--</td>
                <td id="c4b" name="amp_param_4">--</td>
                <td id="c4c" name="amp_param_4">--</td>
                <td id="t_4" name="amp_param_4">--</td>
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
                <td>1</td>
                <td id="v1a">--</td>
                <td id="v1b">--</td>
                <td id="v1c">--</td>
            </tr>
            <tr>
                <td>2</td>
                <td id="v2a" name="volt_param_2">--</td>
                <td id="v2b" name="volt_param_2">--</td>
                <td id="v2c" name="volt_param_2">--</td>
            </tr>
            <tr>
                <td>3</td>
                <td id="v3a" name="volt_param_3">--</td>
                <td id="v3b" name="volt_param_3">--</td>
                <td id="v3c" name="volt_param_3">--</td>
            </tr>
            <tr>
                <td>4</td>
                <td id="v4a" name="volt_param_4">--</td>
                <td id="v4b" name="volt_param_4">--</td>
                <td id="v4c" name="volt_param_4">--</td>
            </tr>
            </tbody>
        </table>
        <div class="text-center">
            <a href="#" class="btn btn-primary  mt-3" id="edit_btn"><i class="fas fa-pencil-square-o" aria-hidden="true"></i>    แก้ไข</a>
            <a href="#" class="btn btn-primary mt-3" id="add_btn"><i class="fas fa-plus-square"></i>   เพิ่มข้อมูลวัดโหลด</a>
        </div>
    </div>
</div>
