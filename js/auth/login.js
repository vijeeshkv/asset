function login()
{
    $("#ajax").hide();
    $("#ajax").load("auth/login/", function(data) {
        if(data.indexOf("logedin") >= 0){
            $(location).attr('href',"admin/auth");
        }else{
            $("#ajax").show();
            $.getScript("js/auth/modal_login.js");
        }
    });
}