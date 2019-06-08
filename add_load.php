<div class="row mt-3 ">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="text-center">
            <label class="font-weight-bold text-primary bg-light py-2 px-5 shadow-sm" style="font-size:22px;border-radius: 20px;">
                <i class="fas fa-bolt"></i>
                เพิ่มข้อมูลการวัดโหลด
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
        <input type="hidden" id="tr_id">
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
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">เฟส A</span>
                            </div>
                            <input type="number" class="form-control" id="c1a" placeholder="เฟส A">
                        </div>
                        <div class="input-group mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">เฟส B</span>
                            </div>
                            <input type="number" class="form-control" id="c1b" placeholder="เฟส B">
                        </div>
                        <div class="input-group mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">เฟส C</span>
                            </div>
                            <input type="number" class="form-control" id="c1c" placeholder="เฟส C">
                        </div>
                        
        
                    </div>  
                </div>
                <div class="carousel-item">
                    <div class="form-group">
                        <label for="current_left" class="font-weight-bold">กระแส(2):</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">เฟส A</span>
                            </div>
                            <input type="number" class="form-control" id="c2a" name="amp_param_2" placeholder="เฟส A">
                        </div>
                        <div class="input-group mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">เฟส B</span>
                            </div>
                            <input type="number" class="form-control" id="c2b" name="amp_param_2" placeholder="เฟส B">
                        </div>
                        <div class="input-group mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">เฟส C</span>
                            </div>
                            <input type="number" class="form-control" id="c2c" name="amp_param_2" placeholder="เฟส C">
                        </div>
                    </div> 
                </div>
                <div class="carousel-item">
                    <div class="form-group">
                        <label for="current_left" class="font-weight-bold">กระแส(3):</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">เฟส A</span>
                            </div>
                            <input type="number" class="form-control" id="c3a" name="amp_param_3" placeholder="เฟส A">
                        </div>
                        <div class="input-group mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">เฟส B</span>
                            </div>
                            <input type="number" class="form-control" id="c3b" name="amp_param_3" placeholder="เฟส B">
                        </div>
                        <div class="input-group mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">เฟส C</span>
                            </div>
                            <input type="number" class="form-control" id="c3c" name="amp_param_3" placeholder="เฟส C">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="form-group">
                        <label for="current_left" class="font-weight-bold">กระแส(4):</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">เฟส A</span>
                            </div>
                            <input type="number" class="form-control" id="c4a" name="amp_param_4" placeholder="เฟส A">
                        </div>
                        <div class="input-group mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">เฟส B</span>
                            </div>
                            <input type="number" class="form-control" id="c4b" name="amp_param_4" placeholder="เฟส B">
                        </div>
                        <div class="input-group mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">เฟส C</span>
                            </div>
                            <input type="number" class="form-control" id="c4c" name="amp_param_4" placeholder="เฟส C">
                        </div>
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
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">เฟส A</span>
                            </div>
                            <input type="number" class="form-control" id="v1a" placeholder="เฟส A">
                        </div>
                        <div class="input-group mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">เฟส B</span>
                            </div>
                            <input type="number" class="form-control" id="v1b" placeholder="เฟส B">
                        </div>
                        <div class="input-group mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">เฟส C</span>
                            </div>
                            <input type="number" class="form-control" id="v1c" placeholder="เฟส C">
                        </div>
                    </div>  
                </div>
                <div class="carousel-item">
                    <div class="form-group">
                        <label for="current_left" class="font-weight-bold">แรงดัน(2):</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">เฟส A</span>
                            </div>
                            <input type="number" class="form-control" id="v2a" name="volt_param_2" placeholder="เฟส A">
                        </div>
                        <div class="input-group mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">เฟส B</span>
                            </div>
                            <input type="number" class="form-control" id="v2b" name="volt_param_2" placeholder="เฟส B">
                        </div>
                        <div class="input-group mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">เฟส C</span>
                            </div>
                            <input type="number" class="form-control" id="v2c" name="volt_param_2" placeholder="เฟส C">
                        </div>
                    </div> 
                </div>
                <div class="carousel-item">
                    <div class="form-group">
                        <label for="current_left" class="font-weight-bold">แรงดัน(3):</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">เฟส A</span>
                            </div>
                            <input type="number" class="form-control" id="v3a" name="volt_param_3" placeholder="เฟส A">
                        </div>
                        <div class="input-group mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">เฟส B</span>
                            </div>
                            <input type="number" class="form-control" id="v3b" name="volt_param_3" placeholder="เฟส B">
                        </div>
                        <div class="input-group mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">เฟส C</span>
                            </div>
                            <input type="number" class="form-control" id="v3c" name="volt_param_3" placeholder="เฟส C">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="form-group">
                        <label for="current_left" class="font-weight-bold">แรงดัน(4):</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">เฟส A</span>
                            </div>
                            <input type="number" class="form-control" id="v4a" name="volt_param_4" placeholder="เฟส A">
                        </div>
                        <div class="input-group mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">เฟส B</span>
                            </div>
                            <input type="number" class="form-control" id="v4b" name="volt_param_4" placeholder="เฟส B">
                        </div>
                        <div class="input-group mt-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">เฟส C</span>
                            </div>
                            <input type="number" class="form-control" id="v4c"  name="volt_param_4" placeholder="เฟส C">
                        </div>
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

        <button type="button" class="btn btn-primary btn-block mt-3" onclick="add_data()"><i class="fas fa-save" aria-hidden="true"></i>    บันทึก</button>
    </div>
</div>
