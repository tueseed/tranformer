function search_tr()
{
    
    var formData = new FormData();
    formData.append('pea_no',$('#txt_search').val());
    $.ajax({
        url: './api/search_api.php',
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
            fetch_tr(obj);
        },
    complete :function(){
        $.unblockUI();
            }	
        });
    
}

function fetch_tr(obj)
{
    var i = 0;
    var html_card = "";
    while(obj[i])
    {
        console.log(obj[i].pea);
        html_card = html_card + '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-3"><a class="card nav-link" href="?action=tr_detail&pea_no='+obj[i].pea+'"><div class="card-body"><div class="row"><div class="col-auto"><p>Pea: '+obj[i].pea+'</p></div><div class="col"><span class="text-primary"><i class="fas fa-info-circle fa-2x float-right"></i><span></div></div></div> </a></div>';
        i++;
    }
    $('#card-area').html(html_card);
    $('#txt_result').html('ผลการค้นหา ' + obj.length + ' รายการ');
    $('#txt_result').show();
    console.log(obj.length);

}



$( document).ready(function() {
    $('#txt_result').hide();
  });