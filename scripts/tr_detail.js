$( document).ready(function() {
    tr_detail();
      });

function tr_detail()
{
    var pea_no = getUrlVars()["pea_no"]; 
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
    var rate_amp = ((obj[0].kva * 1000)/(1.732 * 400))*3;

    if(obj[1].load == 'not')
    {
        console.log("ไม่เคยวัดโหลด");
        $('#pea_no').html(obj[0 ].pea_no);
        $('#kva_phase').html(obj[0].kva + ' KVA - ' + obj[0].phase + ' Phase');
        $('#rate_amp').html(rate_amp.toFixed(0) + ' A.');
        $('#location').html(obj[0].location);
        $('#map').attr('href','https://www.google.com/maps/place/'+obj[0].lat + ',' + obj[0].lon)
        $('#edit_btn').hide();
        $('#add_btn').attr('href','?action=add_load&pea_no='+ obj[0 ].pea_no);

    }
    else if(obj[1].load == 'yes')
    {
        console.log("เคยวัดโหลด");
        var total_amp = parseInt(obj[0].t_a) + parseInt(obj[0].t_b) + parseInt(obj[0].t_c);
        var avg_amp = total_amp/3
        var unb_per = ((obj[0].max_amp-avg_amp)*100)/avg_amp;
        $('#pea_no').html(obj[0 ].pea_no);
        $('#kva_phase').html(obj[0].kva + ' KVA - ' + obj[0].phase + ' Phase');
        $('#rate_amp').html(rate_amp.toFixed(0) + ' A.');
        $('#avg_amp').html(avg_amp.toFixed(2) + ' A.');
        $('#unbalance').html(unb_per.toFixed(2) + ' %');
        $('#location').html(obj[0].location);
        $('#map').attr('href','https://www.google.com/maps/place/'+obj[0].lat + ',' + obj[0].lon)

        var load = (total_amp/rate_amp)*100;
        var cls = '';
        if(load > 80)
        {
            cls = 'progress-bar bg-danger progress-bar-striped';
        }
        else if(load > 50 && load <80)
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
        }
        $('#c1a').html(obj[0].c1a);
        $('#c1b').html(obj[0].c1b);
        $('#c1c').html(obj[0].c1c);
        $('#t_1').html(obj[0].t_1);

        $('#c2a').html(obj[0].c2a);
        $('#c2b').html(obj[0].c2b);
        $('#c2c').html(obj[0].c2c);
        $('#t_2').html(obj[0].t_2);
        if(obj[0].t_2 == 0){$('[name=amp_param_2]').html('--')}

        $('#c3a').html(obj[0].c3a);
        $('#c3b').html(obj[0].c3b);
        $('#c3c').html(obj[0].c3c);
        $('#t_3').html(obj[0].t_3);
        if(obj[0].t_3 == 0){$('[name=amp_param_3]').html('--')}

        $('#c4a').html(obj[0].c3a);
        $('#c4b').html(obj[0].c3b);
        $('#c4c').html(obj[0].c3c);
        $('#t_4').html(obj[0].t_3);
        if(obj[0].t_4 == 0){$('[name=amp_param_4]').html('--')}

        $('#t_a').html(obj[0].t_a);
        $('#t_b').html(obj[0].t_b);
        $('#t_c').html(obj[0].t_c);
        $('#t_all').html(total_amp);

        $('#v1a').html(obj[0].v1a);
        $('#v1b').html(obj[0].v1b);
        $('#v1c').html(obj[0].v1c);


        $('#v2a').html(obj[0].v2a);
        $('#v2b').html(obj[0].v2b);
        $('#v2c').html(obj[0].v2c);
        if((obj[0].v2a == 0 || obj[0].v2a == null ) && (obj[0].v2b == 0 || obj[0].v2b == null) && (obj[0].v2c == 0 || obj[0].v2c == null) ){$('[name=volt_param_2]').html('--')}

        $('#v3a').html(obj[0].v3a);
        $('#v3b').html(obj[0].v3b);
        $('#v3c').html(obj[0].v3c);
        if((obj[0].v3a == 0 || obj[0].v3a == null ) && (obj[0].v3b == 0 || obj[0].v3b == null) && (obj[0].v3c == 0 || obj[0].v3c == null) ){$('[name=volt_param_3]').html('--')}

        $('#v4a').html(obj[0].v4a);
        $('#v4b').html(obj[0].v4b);
        $('#v4c').html(obj[0].v4c);
        if((obj[0].v4a == 0 || obj[0].v4a == null ) && (obj[0].v4b == 0 || obj[0].v4b == null) && (obj[0].v4c == 0 || obj[0].v4c == null) ){$('[name=volt_param_4]').html('--')}
        $('#edit_btn').attr('href','?action=edit&pea_no='+ obj[0 ].pea_no)
        $('#add_btn').attr('href','?action=add_load&pea_no='+ obj[0 ].pea_no)


       
}

function fetch_detail(obj)
{
    var rate_amp = ((obj[0].kva * 1000)/(1.732 * 400))*3;
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

    var avg_amp = total_amp/3;
    $('#avg_amp').html(avg_amp);
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