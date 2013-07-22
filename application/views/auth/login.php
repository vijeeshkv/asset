<div class="modal hide fade" id="modal-login" style="overflow: visible;">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
   <h3><?php echo lang('login_heading');?></h3>
  </div>
  <div class="modal-body" style="max-height: 410px;">
    <p><?php echo lang('login_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php //echo form_open("auth/login");?>
  <?php echo form_open("auth/login", array('id' => 'frm-user'));?>
  <p>
    <?php echo lang('login_identity_label', 'identity');?>
    <?php echo form_input($identity);?>
  </p>

  <p>
    <?php echo lang('login_password_label', 'password');?>
    <?php echo form_input($password);?>
  </p>
   <p>
    <label for="remember">Remember Me: <?php echo form_checkbox('remember', '1', TRUE, 'id="remember"');?> </label>
  </p>
  <!-- <p>
    <?php //echo lang('login_remember_label', 'remember');?>
    <?php //echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p> -->


 <!-- <p><?php //echo form_submit('submit', lang('login_submit_btn'));?></p> -->

<?php echo form_close();?>
<!-- <p><a href="javascript:void(0);" onclick="forgot_password();"><?php //echo lang('login_forgot_password');?></a></p> -->
 <p><a href="admin/auth/forgot_password"><?php echo lang('login_forgot_password');?></a></p>
</div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal">Clear</button>
    <button class="btn btn-primary" id="btn-login">Login</button>
  </div>
</div>