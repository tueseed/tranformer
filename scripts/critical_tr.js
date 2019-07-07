function tr_format(value, row, index) {
    return [
        '<a class="btn btn-sm btn-outline-primary" href="#" title="Like" data-toggle="modal" onclick="tr_modal('+"'" + value + "'" +')" data-target="#TrModal">',
        '<i class="fa fa-eye"></i> รายละเอียด..',
        "</a>  "
      ].join("");
    }
    
    function textCenterFormatter(value, row, index) {
      return "<div class='text-center'>" + value + "</div>";
    }

    var cri_cmd = getUrlVars()["cri_cmd"]

if(cri_cmd == "h")
{
    $("#head_cri").html("หม้อแปลงโหลดเกิน 80 %");
}
else if(cri_cmd == "m")
{
    $("#head_cri").html("หม้อแปลงโหลด 60-80 %");
}
else if(cri_cmd == "l")
{
    $("#head_cri").html("หม้อแปลงโหลดโหลดน้อยกว่า 60 %");
}
else if(cri_cmd == "u")
{
    $("#head_cri").html("หม้อแปลง % Unbalance >20");
}