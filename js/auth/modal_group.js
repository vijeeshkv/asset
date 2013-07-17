$(function() {
    $("#modal-group").modal({'backdrop': 'static'});
    //$("#server-id").chosen();
    $("#btn-save-group").click(function() {
        $("#btn-save-group").button("loading");
        var url = $("#frm-group").attr("action");
        $.post(url, $("#frm-group").serialize(), function(data) {
            if(data.type == "error") {
                $(".alert").removeClass('fade').alert('close');
                $("#frm-group").prepend('<div class="alert alert-error fade in"><a class="close" data-dismiss="alert" href="#">&times;</a>' + data.message + '</div>');
                $("#btn-save-group").button("reset");
            } else {
                oTable.fnReloadAjax();
                $("#modal-group").modal('hide');
            }
        });
    });
    
    $("input, textarea, select").bind('keypress', function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if(code == 13) { //Enter keycode
            $("#btn-save-group").click();
            return false;
        }
    });
});