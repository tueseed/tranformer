function add_tr()
{
    var formData = new FormData();
    formData.append('pea_no',$('#pea_no').val());
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
        url: './api/add_api.php',
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
                html: 'เพิ่มข้อมูลเรียบร้อย...<br/> ',
                type: 'success',
                timer: 5000
            });
            
        },
    complete :function(){
            window.location.href = '?action=tr_detail&pea_no=' + $('#pea_no').val();
            }	
        }); 
}

$( document).ready(function() {
    var pea_no = getUrlVars()["pea_no"];
    $('#pea_no').val(pea_no); 
});