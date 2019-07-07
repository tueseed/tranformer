var pea_no = getUrlVars()["pea_no"]

$('#pea_no').html(pea_no);

$( document).ready(function() {
    tr_detail();
      });

function tr_detail()
{
    var formData = new FormData();
    formData.append('pea_no',pea_no);
    $.ajax({
        url: './api/detail_api_2.php',
        method: 'POST',
        data: formData,
        async: true,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend : function()
        {
            //$.blockUI({message : '<h1>กำลังเข้าสู่ระบบ</h1>'});
            console.log("beforesend.....");
            $.blockUI({
                message: '<div class="spinner-grow text-primary display-4" style="width: 4rem; height: 4rem;" role="status"><span class="sr-only">Loading...</span></div>',
                overlayCSS : { 
                  backgroundColor: '#ffffff',
                  opacity: 0.8
                },
                css : {
                  opacity: 1,
                  border: 'none',
                }
              });
        },
        success: function(response)
        {
            var obj = JSON.parse(response) || {};
            //fetch_detail(obj);
            fetch_detail2(obj);
        },
    complete :function(){
        $.unblockUI();
            }	
        });  
}

function fetch_detail2(obj)
{
    $("#size").val(obj[0].kva);
    $("#phase").val(obj[0].phase);
    $("#location").val(obj[0].location);
    $("#lat").val(obj[0].lat);
    $("#lon").val(obj[0].lon);
}

function select_mode()
{
    var btn_value = $("#btn_edit").val();
    if(btn_value == "edit")
    {
        $("input[name*='tr_detail']").prop("disabled", false);
        $("#btn_edit").text("ยืนยันการแก้ไข");
        $("#btn_edit").val("confirm");
    }
    else if (btn_value == "confirm")
    {
        $("#btn_edit").text("แก้ไขรายละเอียดหม้อแปลง");
        $("#btn_edit").val("edit");
        edit_tr_detail();
    }
}

function edit_tr_detail()
{
    var formData = new FormData();
    formData.append('pea_no',pea_no);
    formData.append('kva',$('#size').val());
    formData.append('Phase',$('#phase').val());
    formData.append('location',$('#location').val());
    formData.append('lat',$('#lat').val());
    formData.append('lon',$('#lon').val());
    $.ajax({
        url: './api/edit_tr_detail_api.php',
        method: 'POST',
        data: formData,
        async: true,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend : function()
        {
            //$.blockUI({message : '<h1>กำลังเข้าสู่ระบบ</h1>'});
            console.log("beforesend....." + formData);
            $.blockUI({
                message: '<div class="spinner-grow text-primary display-4" style="width: 4rem; height: 4rem;" role="status"><span class="sr-only">Loading...</span></div>',
                overlayCSS : { 
                  backgroundColor: '#ffffff',
                  opacity: 0.8
                },
                css : {
                  opacity: 1,
                  border: 'none',
                }
              });
        },
        success: function(response)
        {
            console.log('success' + response);
            $.unblockUI();
            Swal.fire({
                title: 'สำเร็จ!',
                html: 'แก้ไขข้อมูลเรียบร้อย...<br/> ',
                type: 'success',
                timer: 5000
            });
            
        },
    complete :function(){
            window.location.reload();
            }	
        }); 
}



function tr_format(value, row, index) {
    return [
        '<a class="btn btn-sm btn-outline-primary" href="#" title="Like" data-toggle="modal" onclick="tr_modal('+"'" + value + "'" +')" data-target="#TrModal">',
        '<i class="fa fa-eye"></i> รายละเอียด..',
        "</a>  "
      ].join("");
    }
    
    function textCenterFormatter(value, row, index) {
      return "<div class='text-center'>" + value + "</div>";
    }
    

    function tr_modal(load_log_id)
    {
      $("#load_log_id").html(load_log_id);
    }

    $("#TrModal").on('shown.bs.modal', function(){
       query_load_log();
      });

    function query_load_log()
    {
        var formData = new FormData();
        formData.append('load_log_id',$("#load_log_id").html());
        $.ajax({
            url: './api/modal_load_log_api.php',
            method: 'POST',
            data: formData,
            async: true,
                cache: false,
                processData: false,
            contentType: false,
            beforeSend : function()
                    {
                        //$.blockUI({message : '<h1>กำลังเข้าสู่ระบบ</h1>'});
                        console.log("beforesend.....");
                        $('div.modal-dialog').block({
                        message: '<div class="spinner-grow text-primary display-4" style="width: 4rem; height: 4rem;" role="status"><span class="sr-only">Loading...</span></div>',
                        overlayCSS : { 
                            backgroundColor: '#ffffff',
                            opacity: 0.8
                        },
                        css : {
                            opacity: 1,
                            border: 'none',
                        }
                        });
                        //$('.blockUI.blockMsg').center();
                    },
            success: function(response) 
                    {
                        //console.log(response);
                        var obj = JSON.parse(response) || {};
                        console.log(obj);
                        fetch_load_log(obj);
                    
                    },
            complete :function(){
                    $('div.modal-dialog').unblock();
                        }					
            });
    }

    function fetch_load_log(obj)
    {
        $("#date_log").val(obj[0].date_log);

        $("#c1a").val(obj[0].c1a);
        $("#c1b").val(obj[0].c1b);
        $("#c1c").val(obj[0].c1c);

        $("#c2a").val(obj[0].c2a);
        $("#c2b").val(obj[0].c2b);
        $("#c2c").val(obj[0].c2c);

        $("#c3a").val(obj[0].c3a);
        $("#c3b").val(obj[0].c3b);
        $("#c3c").val(obj[0].c3c);

        $("#c4a").val(obj[0].c4a);
        $("#c4b").val(obj[0].c4b);
        $("#c4c").val(obj[0].c4c);

        
    }
      