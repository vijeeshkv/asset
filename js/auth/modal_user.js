$(function() {
    
    var checkPhone = true;
    var checkEmail = true;
    var checkPass = true;
    var checkConfirm = true;
    
    console.log(service);
    srvChange(service);
    
    $('#service').change(function(){
        srvChange($(this).val())
    })
    
    $("#modal-user").modal({'backdrop': 'static'});
    //$("#server-id").chosen();
    $("#btn-save-user").click(function() {
        if(checkPhone == true && checkEmail == true && checkPass == true && checkConfirm == true)
            {
                $("#btn-save-user").button("loading");
                var url = $("#frm-user").attr("action");
                $.post(url, $("#frm-user").serialize(), function(data) {
                    if(data.type == "error") {
                        $(".alert").removeClass('fade').alert('close');
                        $("#frm-user").prepend('<div class="alert alert-error fade in"><a class="close" data-dismiss="alert" href="#">&times;</a>' + data.message + '</div>');
                        $("#btn-save-user").button("reset");
                        
                        $('#phone-td').html('<div id="phone-alert" class="alert alert-box alert-error" style="display:none">Ej. 123456789</div>');
                        $('#email-td').html('<div id="email-alert" class="alert alert-box alert-error" style="display:none">Ej. mail@domain.com</div>');
                        $('#pass-td').html('<div id="pass-alert" class="alert alert-box alert-error" style="display:none"></div>');
                        $('#confirm-td').html('<div id="confirm-alert" class="alert alert-box alert-error" style="display:none"></div>');
                    } else {
                        oTable.fnReloadAjax();
                        $("#modal-user").modal('hide');
                    }
                });
            } else {
                $("#frm-user").prepend('<div class="alert alert-error fade in"><a class="close" data-dismiss="alert" href="#">&times;</a>Revisa los campos en rojo</div>');
            }
    });
    
    $("input, textarea, select").bind('keypress', function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if(code == 13) { //Enter keycode
            var empty = false;
            $('input').each( function(n,element){
                if(element.val() == "") empty = true;
            } );
            if(empty)
                $("#btn-save-user").click();
            return false;
        }
    });
    
    $(".close-btn").click(function(){
        $.post("admin/auth/cancel_upload", $("#frm-user").serialize());
    });
    
    
    
    $('#phone').focusout(function(){
        if(checkPhone == true){
            $('#phone-alert').hide('');
        }
    })
    $('#phone').on('keyup focusin',function(){
        $('#phone-alert').show('');
        var val = $.trim($(this).val());
        var str = val.split(" ").join("");
        //console.log(str);
        var output = '';
        
        //console.log(val.charAt(1));
        if(str.charAt(0) === '+') {
            str = str.substring(1);
        }
        if(isNaN(str)) {
            output += 'El teléfono debe contener solo números y/o comenzar con el signo +';
            $('#phone-alert').removeClass('alert-success');
            $('#phone-alert').addClass('alert-error');
            checkPhone = false;
        }
        else if(str.length < 8) {
            output = 'El teléfono debe tener mínimo 8 números';
            $('#phone-alert').removeClass('alert-success');
            $('#phone-alert').addClass('alert-error');
            checkPhone = false;
        }
        else {
            output = '<i class=icon-ok></i>';
            $('#phone-alert').removeClass('alert-error');
            $('#phone-alert').addClass('alert-success');
            checkPhone = true;
        }
        $('#phone-alert').html(output);
    })
    
    
    
    
    $('#email').focusout(function(check){
        if(checkEmail == true){
            $('#email-alert').hide('');
        }
    })
    $('#email').on('keyup focusin',function(){
        $('#email-alert').show('');
        var val = $.trim($(this).val());
        var filter = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
        var output = '';
        
        if(filter.test(val))
            {
                output = '<i class=icon-ok></i>';
                $('#email-alert').removeClass('alert-error');
                $('#email-alert').addClass('alert-success');
                checkEmail = true;
            } else {
                output += 'Email Invalido';
                
                $('#email-alert').removeClass('alert-success');
                $('#email-alert').addClass('alert-error');
                checkEmail = false;
                
            } 
        $('#email-alert').html(output);
    })
    
    var minLength = $('#min_length_pass').val();
    var maxLength = $('#max_length_pass').val();
    
    $('#pass-alert').html('La contraseña debe tener entre '+minLength+' y '+maxLength+' caracteres');

    $('#password').focusin(function(){
        $('#pass-alert').show('');
    })
    $('#password').focusout(function(){
        if(checkPass == true)
        {
            $('#pass-alert').hide('');
        }
    })
    $('#password').keyup(function(){
        var val = $(this).val();
        var output = '';
        if(val.length < minLength)
            {
                output = 'Contraseña muy corta';
                $('#pass-alert').removeClass('alert-success');
                $('#pass-alert').addClass('alert-error');
                checkPass = false;
            } 
            else if(val.length > maxLength)
            {
                output = 'Contraseña muy larga';
                $('#pass-alert').removeClass('alert-success');
                $('#pass-alert').addClass('alert-error');
                checkPass = false;
            }
            else
            {
                output = '<i class=icon-ok></i>';
                $('#pass-alert').removeClass('alert-error');
                $('#pass-alert').addClass('alert-success');
                checkPass = true;
            }
        $('#pass-alert').html(output);
    })
    
    $('#password_confirm').focusout(function(){
        if(checkConfirm == true){
            $('#confirm-alert').hide('');
        }
    })
    $('#password_confirm').on('keyup focusin',function(){
        
        var pass1 = $('#password').val();
        var pass2 = $(this).val();
        if(pass2.length > 0) {
             $('#confirm-alert').show('');
        }
        var output = '';
        
        if(pass1 != pass2){
            output = 'Las contraseñas no coinciden';
            $('#confirm-alert').removeClass('alert-success');
            $('#confirm-alert').addClass('alert-error');
            checkConfirm = false;
        } else {
            output = '<i class=icon-ok></i>';
            $('#confirm-alert').removeClass('alert-error');
            $('#confirm-alert').addClass('alert-success');
            checkConfirm = true;
        }
        $('#confirm-alert').html(output);
    })

});

function srvChange(srv)
    {
        if(is_user == true){
            var userOut;
            var passOut;

            if(srv == 'urban'){
                userOut = '<td>Urban Airship UserID</td><td>'+urban_form.user+'</td>';
                passOut = '<td>Urban Airship Password</td><td>'+urban_form.pass+'</td>';
            } else if(srv == 'parse'){
                userOut = '<td>Parse UserID</td><td>'+parse_form.user+'</td>';
                passOut = '<td>Parse Password</td><td>'+parse_form.pass+'</td>';
            }
            $('#srv-user').html(userOut);
            $('#srv-pass').html(passOut);
        }
    }