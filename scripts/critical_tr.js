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

$("#TrModal").on('shown.bs.modal', function(){
    plt_graph();
   });

function tr_modal(pea_no)
   {
     $("#pea_no").html(pea_no);
   }


function plt_graph()
{
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                            labels: ['2556','2557','2558', '2559', '2560', '2561'],
                                            datasets: [
                                                        {
                                                            label: 'เฟส A',
                                                            data: [
                                                                Math.floor((Math.random() * 20) + 1),
                                                                Math.floor((Math.random() * 20) + 1),
                                                                Math.floor((Math.random() * 40) + 1),
                                                                Math.floor((Math.random() * 40) + 1),
                                                                Math.floor((Math.random() * 80) + 1),
                                                                Math.floor((Math.random() * 160) + 1)
                                                              ],
                                                            backgroundColor: "brown",
                                                            borderColor: "brown",
                                                            fill: false,
                                                            borderWidth: 0
                                                        },
                                                        {
                                                            label: 'เฟส B',
                                                            data: [
                                                                Math.floor((Math.random() * 20) + 1),
                                                                Math.floor((Math.random() * 20) + 1),
                                                                Math.floor((Math.random() * 40) + 1),
                                                                Math.floor((Math.random() * 40) + 1),
                                                                Math.floor((Math.random() * 80) + 1),
                                                                Math.floor((Math.random() * 160) + 1)
                                                              ],
                                                            backgroundColor: "black",
                                                            borderColor: "black",
                                                            fill: false,
                                                            borderWidth: 0
                                                        },
                                                        {
                                                            label: 'เฟส C',
                                                            data: [
                                                                Math.floor((Math.random() * 20) + 1),
                                                                Math.floor((Math.random() * 20) + 1),
                                                                Math.floor((Math.random() * 40) + 1),
                                                                Math.floor((Math.random() * 40) + 1),
                                                                Math.floor((Math.random() * 80) + 1),
                                                                Math.floor((Math.random() * 160) + 1)
                                                              ],
                                                            backgroundColor: "gray",
                                                            borderColor: "gray",
                                                            fill: false,
                                                            borderWidth: 3
                                                        }

                                                    ]
                                            }
                                    });
}