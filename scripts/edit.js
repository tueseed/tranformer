function tr_edit_detail()
{
    var pea_no = getUrlVars()["pea_no"]; 
    console.log(pea_no);
    var formData = new FormData();
    formData.append('pea_no',pea_no);
    $.ajax({
        url: './api/detail_api.php',
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
            fetch_edit_detail(obj);
        },
    complete :function(){
        $.unblockUI();
            }	
        });  
}

function fetch_edit_detail(obj)
{
    $('#pea_no').html(obj[0].pea);
    $('#kva').val(obj[0].kva);

    $('#Phase').val(obj[0].phase);
    $('#location').html(obj[0].location);

    $('#current_a_left').val(obj[0].current_a_l);
    $('#current_b_left').val(obj[0].current_b_l);
    $('#current_c_left').val(obj[0].current_c_l);

    $('#current_a_right').val(obj[0].current_a_r);
    $('#current_b_right').val(obj[0].current_b_r);
    $('#current_c_right').val(obj[0].current_c_r);

    $('#voltage_a_left').val(obj[0].voltage_an_l);
    $('#voltage_b_left').val(obj[0].voltage_bn_l);
    $('#voltage_c_left').val(obj[0].voltage_cn_l);

    $('#voltage_a_right').val(obj[0].voltage_an_r);
    $('#voltage_b_right').val(obj[0].voltage_bn_r);
    $('#voltage_c_right').val(obj[0].voltage_cn_r);


}

function send_edit()
{
    var pea_no = getUrlVars()["pea_no"]; 
    var formData = new FormData();
    formData.append('pea_no',pea_no);
    formData.append('kva',$('#kva').val());
    formData.append('Phase',$('#Phase').val());
    formData.append('location',$('#location').val());

    formData.append('current_a_left',$('#current_a_left').val());
    formData.append('current_b_left',$('#current_b_left').val());
    formData.append('current_c_left',$('#current_c_left').val());

    formData.append('current_a_right',$('#current_a_right').val());
    formData.append('current_b_right',$('#current_b_right').val());
    formData.append('current_c_right',$('#current_c_right').val());
    
    formData.append('voltage_a_left',$('#voltage_a_left').val());
    formData.append('voltage_b_left',$('#voltage_b_left').val());
    formData.append('voltage_c_left',$('#voltage_c_left').val());

    formData.append('voltage_a_right',$('#voltage_a_right').val());
    formData.append('voltage_b_right',$('#voltage_b_right').val());
    formData.append('voltage_c_right',$('#voltage_c_right').val());
    $.ajax({
        url: './api/edit_api.php',
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
            window.location.href = '?action=tr_detail&pea_no=' + pea_no;
            }	
        }); 




}
$( document).ready(function() {
    tr_edit_detail();
});