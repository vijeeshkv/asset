$(function() {
    $("#modal-login").modal({'backdrop': 'static'});
    //$("#server-id").chosen();
    $("#btn-login").click(function() {
        $("#btn-login").button("loading");
        $.post("admin/auth/login/", $("#frm-user").serialize(), function(data) {
            if(data.type == "error") {
                $(".alert").removeClass('fade').alert('close');
                $("#frm-user").prepend('<div class="alert alert-error fade in"><a class="close" data-dismiss="alert" href="#">&times;</a>' + data.message + '</div>');
                $("#btn-login").button("reset");
            } else {
                $("#modal-login").modal('hide');
                $(location).attr('href',"admin/auth");
            }
        });
    });
    
    $("input").bind('keypress', function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if(code == 13) { //Enter keycode
            var empty = false;
            $('input').each( function(n,element){
                if($(this).val() == "") empty = true;
            } );
            if(!empty)
                $("#btn-login").click();
            return false;
        }
    });
});

function forgot_password() {
    $(".modal-body").hide('slow', function(){
        $(".modal-body").load("admin/auth/forgot_password", function(){
            $(".modal-header h3").text("Forgot Password");
            $(".modal-body").show('slow')
        });
    });
}