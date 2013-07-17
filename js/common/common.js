var latitd = new Array();
var longid = new Array();
function getlatlong(lat,log) {
        var count = $('#hidden-locationcount').val();
        var limit = parseInt($('#hidden-locationlimit').val());
        var confmsg=confirm("¿Está seguro? que desea seleccionar esta ubicación!")
        if(confmsg == true)
        {
            count = parseInt(count) + 1;
            if(count <= limit) {

                latitd.push(lat);
                longid.push(log);
                $('#hidden-latitude').val(latitd);
                $('#hidden-longitude').val(longid);
                console.log(latitd);
                console.log(longid);
                $('#hidden-locationcount').val(count);
            }
            else {
                alert('No se le permite para seleccionar más de '+limit+' localidades');
            }
        }    
}

var oTable;

$(function() {
    oTable = $("#alertlist").dataTable({
        "sDom": "<'row'<'span6'l><'span6'f><'span6'r>>t<'row'<'span7'i><'span7'p>>",
        "bProcessing": true,
        "bServerSide": true,
        "bPaginate": true,
        "sPaginationType": "bootstrap",
        "bLengthChange": true,
        "bFilter": true,
        "bSort": true,
        "iDisplayLength": 10,
        "sAjaxSource": "admin/alerts/alertstable",
        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	"aaSorting": [[0, 'DESC']],
	"aoColumns": [
                    { "bVisible": true, "bSearchable": false, "bSortable": true },
                    { "bVisible": true, "bSearchable": true, "bSortable": true },
                    { "bVisible": true, "bSearchable": true, "bSortable": true },
                    { "bVisible": true, "bSearchable": true, "bSortable": true },
                    { "bVisible": true, "bSearchable": true, "bSortable": true },
                    { "bVisible": true, "bSearchable": true,"bSortable": true },
                    { "bVisible": true, "bSearchable": false,"bSortable": true },
                    { "bVisible": true, "bSearchable": true, "bSortable": true },
                    { "bVisible": true, "bSearchable": true, "bSortable": true },
                    { "bVisible": true, "bSearchable": false, "bSortable": false }
                    ],
        "aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 0 ] },
            { "bVisible": false, "aTargets": [ 0 ] }//,
            //{ "bSearchable": false, "aTargets": [ 0,4,5,6,9 ]}
        ],
        "oLanguage": {
            "sLengthMenu": "Mostrar _MENU_ entradas",
            "sZeroRecords": "Lo sentimos - no se ha encontrado",
            "sInfo": "Mostrando _START_ a _END_ de registros _TOTAL_",
            "sInfoEmpty": "Mostrando 0 a 0 de registros 0",
            "sInfoFiltered": "(filtrado de los registros totales _MAX_)",
            "sSeachmenu": "Buscar",
            "sSearch": "Buscar:"
        }
    }).fnSetFilteringDelay(700);
    
    
});    