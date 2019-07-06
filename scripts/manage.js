function tr_format(value, row, index) {
  return [
    '<a class="btn btn-sm btn-outline-primary tr-detail" href="javascript:void(0)" title="Like">',
    '<i class="fa fa-eye"></i> รายละเอียด',
    "</a>  "
  ].join("");
  }
  
  function textCenterFormatter(value, row, index) {
    return "<div class='text-center'>" + value + "</div>";
  }
  
  function suffixQuantityTextCenterFormatter(value, row) {
    return "<div class='font-weight-bold text-center'>" + value + " ครั้ง</div>";
  }
  
  function tr_modal(pea_no)
  {
    $("#pea_no").html(pea_no);
  }

  window.tr_event = {
    "click .tr-detail": function(e, value, row, index) {
      // redirect to page for show ca detail
      window.location.href = "?action=tr_detail_d&pea_no=" + row["pea_no_tr"];
    }
  };