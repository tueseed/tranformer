$( document).ready(function() {
    get_tr_data();
});


function get_tr_data()
{
    var pea_no = getUrlVars()["pea_no"]; 
    $('#pea_no').html(pea_no);
    var formData = new FormData();
    formData.append('pea_no',pea_no);
    formData.append('request','get_data');
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
            $('#kva').val(obj[0].kva);
 
    $('#Phase').val(obj[0].phase);
    $('#location').html(obj[0].location);
        },
    complete :function(){
        $.unblockUI();
            }	
        });  

}

function add_data()
{
    var pea_no = getUrlVars()["pea_no"]; 
    var formData = new FormData();
    formData.append('pea_no',pea_no);
    formData.append('kva',$('#kva').val());
    formData.append('Phase',$('#Phase').val());
    formData.append('location',$('#location').val());

    formData.append('c1a',$('#c1a').val());
    formData.append('c1b',$('#c1b').val());
    formData.append('c1c',$('#c1c').val());

    formData.append('c2a',$('#c2a').val());
    formData.append('c2b',$('#c2b').val());
    formData.append('c2c',$('#c2c').val());

    formData.append('c3a',$('#c3a').val());
    formData.append('c3b',$('#c3b').val());
    formData.append('c3c',$('#c3c').val());

    formData.append('c4a',$('#c4a').val());
    formData.append('c4b',$('#c4b').val());
    formData.append('c4c',$('#c4c').val());

    formData.append('v1a',$('#v1a').val());
    formData.append('v1b',$('#v1b').val());
    formData.append('v1c',$('#v1c').val());

    formData.append('v2a',$('#v2a').val());
    formData.append('v2b',$('#v2b').val());
    formData.append('v2c',$('#v2c').val());

    formData.append('v3a',$('#v3a').val());
    formData.append('v3b',$('#v3b').val());
    formData.append('v3c',$('#v3c').val());

    formData.append('v4a',$('#v4a').val());
    formData.append('v4b',$('#v4b').val());
    formData.append('v4c',$('#v4c').val());

    formData.append('tr_id',$('#tr_id').val());

   formData.append('request','add_data');



    
    $.ajax({
        url: './api/add_load_api.php',
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
                html: 'เพิ่มข้อมูลเรียบร้อย...<br/> ',
                type: 'success',
                timer: 5000
            });
            
        },
    complete :function(){
            window.location.href = '?action=tr_detail&pea_no=' + pea_no;
            }	
        }); 
}



(function ($) {
    "use strict";
    // Auto-scroll
    $('#myCarousel').carousel({
      interval: false
    });

    $('#myCarousel2').carousel({
        interval: false
      });
  
    // Control buttons
    $('.next').click(function () {
      $('.carousel').carousel('next');
      return false;
    });
    $('.prev').click(function () {
      $('.carousel').carousel('prev');
      return false;
    });
  
    // On carousel scroll
    $("#myCarousel").on("slide.bs.carousel", function (e) {
      var $e = $(e.relatedTarget);
      var idx = $e.index();
      var itemsPerSlide = 3;
      var totalItems = $(".carousel-item").length;
      if (idx >= totalItems - (itemsPerSlide - 1)) {
        var it = itemsPerSlide -
            (totalItems - idx);
        for (var i = 0; i < it; i++) {
          // append slides to end 
          if (e.direction == "left") {
            $(
              ".carousel-item").eq(i).appendTo(".carousel-inner");
          } else {
            $(".carousel-item").eq(0).appendTo(".carousel-inner");
          }
        }
      }
    });
  })
  (jQuery);