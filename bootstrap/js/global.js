// Data Table
$(function(){
    $(".dt_table").dataTable({
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false,
        //"pagingType": "full_numbers",
        "language": {
            "emptyTable":     "Tidak ada data",
            "info":           "_START_ - _END_ Dari _TOTAL_ Data",
            "infoEmpty":      "Showing 0 to 0 of 0 entries",
            "infoFiltered":   "(filtered from _MAX_ total entries)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Show _MENU_ entries",
            "loadingRecords": "Loading...",
            "processing":     "Processing...",
            "search":         "Pencarian: ",
            "zeroRecords":    "No matching records found",
            "paginate": {
                "first":      "Awal",
                "last":       "Terakhir",
                "next":       "Selanjutnya",
                "previous":   "Sebelumnya"
            },
            "aria": {
                "sortAscending":  ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }
        }
    });
});
// Tooltip
/*$(function(){
   $('.t_tip').tooltip(); 
});*/
$(function(){
   $('.dp').datepicker({
        format:'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
   });
});