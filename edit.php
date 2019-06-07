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
        <!-- <div class="text-center">
        <a class="btn btn-outline-secondary mx-1 prev" href="javascript:void(0)" title="Previous">
            <i class="fas fa-lg fa-chevron-left"></i>
        </a>
        <span id="current_txt">กระแส</span>
        <a class="btn btn-outline-secondary mx-1 next" href="javascript:void(0)" title="Next">
            <i class="fas fa-lg fa-chevron-right"></i>
        </a>
        </div> -->
        <p>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="form-group">
                        <label for="current_left" class="font-weight-bold">กระแส(1):</label>
                        <input type="number" class="form-control mt-1" id="current_a_left" placeholder="เฟส A">
                        <input type="number" class="form-control mt-1" id="current_b_left" placeholder="เฟส B">
                        <input type="number" class="form-control mt-1" id="current_c_left" placeholder="เฟส C">
                    </div>  
                </div>
                <div class="carousel-item">
                    <div class="form-group">
                        <label for="current_left" class="font-weight-bold">กระแส(2):</label>
                        <input type="number" class="form-control mt-1" id="current_a_left" placeholder="เฟส A">
                        <input type="number" class="form-control mt-1" id="current_b_left" placeholder="เฟส B">
                        <input type="number" class="form-control mt-1" id="current_c_left" placeholder="เฟส C">
                    </div> 
                </div>
                <div class="carousel-item">
                    <div class="form-group">
                        <label for="current_left" class="font-weight-bold">กระแส(3):</label>
                        <input type="number" class="form-control mt-1" id="current_a_left" placeholder="เฟส A">
                        <input type="number" class="form-control mt-1" id="current_b_left" placeholder="เฟส B">
                        <input type="number" class="form-control mt-1" id="current_c_left" placeholder="เฟส C">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="form-group">
                        <label for="current_left" class="font-weight-bold">กระแส(4):</label>
                        <input type="number" class="form-control mt-1" id="current_a_left" placeholder="เฟส A">
                        <input type="number" class="form-control mt-1" id="current_b_left" placeholder="เฟส B">
                        <input type="number" class="form-control mt-1" id="current_c_left" placeholder="เฟส C">
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev"  data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next"  data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
        </p>
        <p>
        <div id="myCarousel2" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="form-group">
                        <label for="current_left" class="font-weight-bold">แรงดัน(1):</label>
                        <input type="number" class="form-control mt-1" id="current_a_left" placeholder="เฟส A">
                        <input type="number" class="form-control mt-1" id="current_b_left" placeholder="เฟส B">
                        <input type="number" class="form-control mt-1" id="current_c_left" placeholder="เฟส C">
                    </div>  
                </div>
                <div class="carousel-item">
                    <div class="form-group">
                        <label for="current_left" class="font-weight-bold">แรงดัน(2):</label>
                        <input type="number" class="form-control mt-1" id="current_a_left" placeholder="เฟส A">
                        <input type="number" class="form-control mt-1" id="current_b_left" placeholder="เฟส B">
                        <input type="number" class="form-control mt-1" id="current_c_left" placeholder="เฟส C">
                    </div> 
                </div>
                <div class="carousel-item">
                    <div class="form-group">
                        <label for="current_left" class="font-weight-bold">แรงดัน(3):</label>
                        <input type="number" class="form-control mt-1" id="current_a_left" placeholder="เฟส A">
                        <input type="number" class="form-control mt-1" id="current_b_left" placeholder="เฟส B">
                        <input type="number" class="form-control mt-1" id="current_c_left" placeholder="เฟส C">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="form-group">
                        <label for="current_left" class="font-weight-bold">แรงดัน(4):</label>
                        <input type="number" class="form-control mt-1" id="current_a_left" placeholder="เฟส A">
                        <input type="number" class="form-control mt-1" id="current_b_left" placeholder="เฟส B">
                        <input type="number" class="form-control mt-1" id="current_c_left" placeholder="เฟส C">
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev"  data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next"  data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
        </p>
        <!-- <div class="form-group">
            <label for="current_left" class="font-weight-bold">กระแส(1):</label>
            <input type="number" class="form-control mt-1" id="current_a_left" placeholder="เฟส A">
            <input type="number" class="form-control mt-1" id="current_b_left" placeholder="เฟส B">
            <input type="number" class="form-control mt-1" id="current_c_left" placeholder="เฟส C">
        </div>
           
        <div class="form-group">
            <label for="current_right" class="font-weight-bold">กระแส(2):</label>
            <input type="number" class="form-control mt-1" id="current_a_right" placeholder="เฟส A">
            <input type="number" class="form-control mt-1" id="current_b_right" placeholder="เฟส B">
            <input type="number" class="form-control mt-1" id="current_c_right" placeholder="เฟส C">
        </div> -->
        

        <!-- <div class="form-group">
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
        </div> -->

        <button type="button" class="btn btn-primary btn-block mt-3" onclick="send_edit()"><i class="fas fa-save" aria-hidden="true"></i>    บันทึก</button>
    </div>
</div>
