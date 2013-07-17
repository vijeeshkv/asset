<script src="<?php echo base_url();?>js/jquery-1.8.3.min.js"></script>
<script>
    $(function() {
        var parent = $('#logo-name', window.parent.document);
        var inp = '<input type="text" name="logo" id="file_name_hid" value="<?php echo $file_name; ?>" />';
        parent.html(inp);
    });
</script>