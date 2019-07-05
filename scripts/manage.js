function tr_format(value, row, index) {
    return [
      '<a class="btn btn-sm btn-outline-primary po-detail" href="#" title="Like" data-toggle="modal" onclick="tr_modal('+"'" + value + "'" +')" data-target="#cartModal">',
      '<i class="fa fa-eye"></i> รายละเอียด..',
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