$( document).ready(function() {
    console.log("dsad");
    $('#A1').html('..');
    tr_detail();
      });

function tr_detail()
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
            fetch_detail(obj);
        },
    complete :function(){
        $.unblockUI();
            }	
        });  
}

function fetch_detail(obj)
{
    var rate_amp = (obj[0].kva * 1000)/(1.732 * 230);
    $('#pea_no').html(obj[0 ].pea);
    $('#kva_phase').html(obj[0].kva + ' - ' + obj[0].phase);
    $('#rate_amp').html( parseInt(rate_amp-1));
    $('#location').html(obj[0].location);

    ////กระแส
    $('#a_l').html(obj[0].current_a_l);
    $('#b_l').html(obj[0].current_b_l);
    $('#c_l').html(obj[0].current_c_l);

    $('#a_r').html(obj[0].current_a_r);
    $('#b_r').html(obj[0].current_b_r);
    $('#c_r').html(obj[0].current_c_r);

    $('#t_c_l').html(obj[0].sum_c_l);
    $('#t_c_r').html(obj[0].sum_c_r);

    

    $('#t_a').html(parseInt(obj[0].current_a_l) +parseInt(obj[0].current_a_r));
    $('#t_b').html(parseInt(obj[0].current_b_l) +parseInt(obj[0].current_b_r));
    $('#t_c').html(parseInt(obj[0].current_c_l) +parseInt(obj[0].current_c_r));

    var total_amp = parseInt(obj[0].sum_c_l) +parseInt(obj[0].sum_c_r);
    $('#t_all').html(total_amp);

    /////แถบ 
    var load = (total_amp/rate_amp)*100;

    var cls = '';
    if(load > 80)
    {
        cls = 'progress-bar bg-danger progress-bar-striped';
    }
    else if(50 < load < 79)
    {
        cls = 'progress-bar bg-warning progress-bar-striped';
    }
    else if(load < 50)
    {
        cls = 'progress-bar bg-success progress-bar-striped';
    }
    $('#progress_bar').html(load.toFixed(2) + ' %');
    $('#progress_bar').attr('style','width:'+load+'%;height:30px');
    $('#progress_bar').attr('class',cls);

    //แรงดัน

    $('#v_an_l').html(obj[0].voltage_an_l);
    $('#v_bn_l').html(obj[0].voltage_bn_l);
    $('#v_cn_l').html(obj[0].voltage_cn_l);

    $('#v_an_r').html(obj[0].voltage_an_r);
    $('#v_bn_r').html(obj[0].voltage_bn_r);
    $('#v_cn_r').html(obj[0].voltage_cn_r);
    
    //ปุ่ม edit
    $('#edit_btn').attr('href','?action=edit&pea_no='+ obj[0 ].pea)
}