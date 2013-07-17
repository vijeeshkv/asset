var oTable;

$(function() {
    oTable = $("#tbl-ranges").dataTable({
        //"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span7'i><'span7'p>>",
        "sDom": "<'row'<'span6'l><'span6'f><'span6'r>>t<'row'<'span7'i><'span7'p>>",
        "sPaginationType": "bootstrap",
        "bProcessing": true,
        "bServerSide": true,
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bSort": true,
        "iDisplayLength": 10,
        "sAjaxSource": "admin/auth/table",
        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	"aaSorting": [[0, 'DESC']],
        "aoColumns": [
                    { "bVisible": true, "bSearchable": false, "bSortable": true },
                    { "bVisible": true, "bSearchable": true, "bSortable": true },
                    { "bVisible": true, "bSearchable": true, "bSortable": true },
                    { "bVisible": true, "bSearchable": true, "bSortable": true },
                    { "bVisible": true, "bSearchable": true, "bSortable": true },
                    { "bVisible": true, "bSearchable": true, "bSortable": true },
                    { "bVisible": true, "bSearchable": true, "bSortable": true },
                    { "bVisible": true, "bSearchable": true, "bSortable": true },
                    { "bVisible": true, "bSearchable": true, "bSortable": true },
                    { "bVisible": true, "bSearchable": false, "bSortable": false }
                    ],
        "aoColumnDefs": [
            { "bSortable": false, "aTargets": [ 0 ] },
            { "bVisible": false, "aTargets": [ 0 ] }
           // { "bSearchable": false, "aTargets": [ 9 ]}
        ],
       // "aoColumnDefs": [
         //   { "bSortable": false, "aTargets": [ 0,4 ] },
           // { "bVisible": true, "aTargets": [ 0 ] }
        //],
        "oLanguage": {
            "sLengthMenu": "Mostrar _MENU_ entradas",
            "sZeroRecords": "Lo sentimos - no se ha encontrado",
            "sInfo": "Mostrando _START_ a _END_ de registros _TOTAL_",
            "sInfoEmpty": "Mostrando 0 a 0 de registros 0",
            "sInfoFiltered": "(filtrado de los registros totales _MAX_)",
            "sSeachmenu": "Buscar",
            "sSearch": "Buscar:"
        }
    });
    
    /*if(users == 0){
        $("#btn-add-user").button("loading");
        $("#ajax").load("admin/auth/create_user/first", function() {
            $.getScript("js/auth/modal_user.js", function() {
                $("#btn-add-user").button("reset");
            });
        });
    }*/
    
    $("#btn-add-user").click(function() {
        $("#btn-add-user").button("loading");
        $("#ajax").load("admin/auth/create_user", function() {
            $.getScript("js/auth/modal_user.js", function() {
                $("#btn-add-user").button("reset");
            });
        });
    });
   
    
    $("#btn-edit-profile").click(function() {
        $("#ajax").load("admin/auth/edit_user/"+user_id, function() {
            $.getScript("js/auth/modal_user.js");
        });
    });
    
    $("#btn-contact-admin").click(function() {
        $("#ajax").load("admin/communication/index/", function() {
            $.getScript("js/comm/modal_communication.js");
        });
    });
    
    $("#btn-add-group").click(function() {
        $("#btn-add-group").button("loading");
        $("#ajax").load("admin/auth/create_group", function() {
            $.getScript("js/auth/modal_group.js", function() {
                $("#btn-add-group").button("reset");
            });
        });
    });
});

function editRow(id, btn)
{
    btn.button("loading");
    $("#ajax").load("admin/auth/edit_user/"+id, function() {
        $.getScript("js/auth/modal_user.js", function(){
            btn.button("reset");
        });
    });
}

function addLogo(id, btn)
{
    btn.button("loading");
    //$("#ajax").load("admin/auth/upload/"+id, function() {
    $("#ajax").load("admin/auth/upload/", function() {
        $.getScript("js/auth/modal_logo.js", function(){
            btn.button("reset");
        });
    });
}

function deleteRow(id)
{
    if(confirm('¿Está seguro que desea eliminar este Cliente?')) {
        $.post("admin/auth/delete_user/"+id, {'id': id}, function(data) {
            if(data.type == "error") {
                alert(data.message);
            } else {
                oTable.fnReloadAjax();
            }
        });
    }
}