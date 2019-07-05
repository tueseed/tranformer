$( document).ready(function() {
    home_data();
      });



function home_data()
{
    $.ajax({
        url: './api/home_data.php',
        method: 'POST',
        async: true,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend : function()
        {
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
            $('#high_load').html(obj.high);
            $('#med_load').html(obj.med);
            $('#low_load').html(obj.low);
            $('#unb_load').html(obj.un);
        },
    complete :function(){
        $.unblockUI();
            }	
        });
}