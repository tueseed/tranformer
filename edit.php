<div class="row mt-3 ">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="text-center">
            <label class="font-weight-bold text-primary bg-light py-2 px-5 shadow-sm" style="font-size:22px;border-radius: 20px;">
                <i class="fas fa-bolt"></i>
                แก้ข้อมูลหม้อแปลง
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

        <div class="form-group">
            <label for="kva" class="font-weight-bold">KVA:</label>
            <input type="text" class="form-control" id="kva"/>
        </div>

        <div class="form-group">
            <label for="Phase" class="font-weight-bold">Phase:</label>
            <input type="number" class="form-control" id="Phase"/>
        </div>

        <div class="form-group">
            <label for="location" class="font-weight-bold">สถานที่:</label>
            <textarea  type="text" class="form-control" id="location" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="current_left" class="font-weight-bold">กระแส(ซ้าย):</label>
            <input type="number" class="form-control mt-1" id="current_a_left" placeholder="เฟส A">
            <input type="number" class="form-control mt-1" id="current_b_left" placeholder="เฟส B">
            <input type="number" class="form-control mt-1" id="current_c_left" placeholder="เฟส C">
        </div>

        <div class="form-group">
            <label for="current_right" class="font-weight-bold">กระแส(ขวา):</label>
            <input type="number" class="form-control mt-1" id="current_a_right" placeholder="เฟส A">
            <input type="number" class="form-control mt-1" id="current_b_right" placeholder="เฟส B">
            <input type="number" class="form-control mt-1" id="current_c_right" placeholder="เฟส C">
        </div>

        <div class="form-group">
            <label for="current_left" class="font-weight-bold">แรงดัน(ซ้าย):</label>
            <input type="number" class="form-control mt-1" id="voltage_a_left" placeholder="เฟส A">
            <input type="number" class="form-control mt-1" id="voltage_b_left" placeholder="เฟส B">
            <input type="number" class="form-control mt-1" id="voltage_c_left" placeholder="เฟส C">
        </div>

        <div class="form-group">
            <label for="voltage_right" class="font-weight-bold">แรงดัน(ขวา):</label>
            <input type="number" class="form-control mt-1" id="voltage_a_right" placeholder="เฟส A">
            <input type="number" class="form-control mt-1" id="voltage_b_right" placeholder="เฟส B">
            <input type="number" class="form-control mt-1" id="voltage_c_right" placeholder="เฟส C">
        </div>

        <button type="button" class="btn btn-primary btn-block mt-3" onclick="send_edit()"><i class="fas fa-save" aria-hidden="true"></i>    บันทึก</button>
    </div>
</div>
