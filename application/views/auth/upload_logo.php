<html>
    <head>
        <script src="<?php echo base_url();?>js/jquery-1.8.3.min.js"></script>
        <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
        <!--jquery-->
        <!--bootstrap-->
        <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">
        <!--app-->
        <style>
            /*
            body{
                width:200px;
            }
            */
            input[type="text"]{
                height:30px;
                width:119px;
            }
        </style>
    </head>
    <body>
<?php
    $file_name = '';
    echo form_open_multipart(current_url(),'id="uploadForm"');
    echo form_upload($logo);
    if(form_error('logo')) echo form_error('logo');

?>
    <div class="input-append">
        <input type="text" id="file_report_hid" value="<?php echo $logo_file_name; ?>"/>
        <a class="btn" onClick="$('input[id=logo]').click();">Seleccionar</a>
    </div>
    
<?php
    echo form_submit('submit','Subrir','class="btn sumbit" style="display: none;"');
    echo form_close();
?>
<script type="text/javascript">
  $(function() {  
    $('input[id=logo]').change(function() {
       $('#file_report_hid').val($(this).val());
       $('.sumbit').click();
    });
    
    $('#file_report_name',window.parent.document).val($('#file_name_hid').val())
  });  
</script>
    </body>
</html>