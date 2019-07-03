$( document).ready(function() {
    //  $('#report_table').attr('data-url','./api/datatable/report_table.php');
    
      });

function query_for_report()
{
    var $table = $('#report_table');
     $table.bootstrapTable('refreshOptions', {
        url: './api/datatable/report_table.php'
      })
}

function export_pdf()
{
  var d1 = $('#d1').val();
  var d2 = $('#d2').val();  
  window.open('report_pdf.php?d1='+d1+'&d2='+d2,'_blank');
    // window.location.href="report_pdf.php"
}