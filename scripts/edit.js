function tr_edit_detail()
{
    var pea_no = getUrlVars()["pea_no"]; 
    console.log(pea_no);
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
            fetch_edit_detail(obj);
        },
    complete :function(){
        $.unblockUI();
            }	
        });  
}

function fetch_edit_detail(obj)
{
    $('#pea_no').html(obj[0].pea_no);
    $('#kva').val(obj[0].kva);

    $('#Phase').val(obj[0].phase);
    $('#location').html(obj[0].location);

    $('#c1a').val(obj[0].c1a);
    $('#c1b').val(obj[0].c1b);
    $('#c1c').val(obj[0].c1c);

    $('#c2a').val(obj[0].c2a);
    $('#c2b').val(obj[0].c2b);
    $('#c2c').val(obj[0].c2c);
    if((obj[0].c2a == 0 || obj[0].c2a == null ) && (obj[0].c2b == 0 || obj[0].c2b == null) && (obj[0].c2c == 0 || obj[0].c2c == null) ){$('[name=amp_param_2]').val('--')}
    
    $('#c3a').val(obj[0].c3a);
    $('#c3b').val(obj[0].c3b);
    $('#c3c').val(obj[0].c3c);
    if((obj[0].c3a == 0 || obj[0].c3a == null ) && (obj[0].c3b == 0 || obj[0].c3b == null) && (obj[0].c3c == 0 || obj[0].c3c == null) ){$('[name=amp_param_3]').val('--')}

    $('#c4a').val(obj[0].c4a);
    $('#c4b').val(obj[0].c4b);
    $('#c4c').val(obj[0].c4c);
    if((obj[0].c4a == 0 || obj[0].c4a == null ) && (obj[0].c4b == 0 || obj[0].c4b == null) && (obj[0].c4c == 0 || obj[0].c4c == null) ){$('[name=amp_param_4]').val('--')}

    $('#v1a').val(obj[0].v1a);
    $('#v1b').val(obj[0].v1b);
    $('#v1c').val(obj[0].v1c);

    $('#v2a').val(obj[0].v2a);
    $('#v2b').val(obj[0].v2b);
    $('#v2c').val(obj[0].v2c);
    if((obj[0].v2a == 0 || obj[0].v2a == null ) && (obj[0].v2b == 0 || obj[0].v2b == null) && (obj[0].v2c == 0 || obj[0].v2c == null) ){$('[name=volt_param_2]').val('--')} 

    $('#v3a').val(obj[0].v3a);
    $('#v3b').val(obj[0].v3b);
    $('#v3c').val(obj[0].v3c);
    if((obj[0].v3a == 0 || obj[0].v3a == null ) && (obj[0].v3b == 0 || obj[0].v3b == null) && (obj[0].v3c == 0 || obj[0].v3c == null) ){$('[name=volt_param_3]').val('--')} 

    $('#v4a').val(obj[0].v4a);
    $('#v4b').val(obj[0].v4b);
    $('#v4c').val(obj[0].v4c);
    if((obj[0].v4a == 0 || obj[0].v4a == null ) && (obj[0].v4b == 0 || obj[0].v4b == null) && (obj[0].v4c == 0 || obj[0].v4c == null) ){$('[name=volt_param_4]').val('--')}

    $('#tr_id').val(obj[0].id);
}

function send_edit()
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
            window.location.href = '?action=tr_detail&pea_no=' + pea_no;
            }	
        }); 




}
$( document).ready(function() {
    tr_edit_detail();
});

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