<div class="span2">
    <div class="sidetopwidth">
    <ul class="nav nav-tabs nav-stacked" id="navlis">
     <?php //checking client admin group id
     //if($users_group_id == 3){
     if(!empty($sidebar_params['alerts']) OR !empty($sidebar_params['new_alert']) OR !empty($sidebar_params['mis_alerts']) ) {   
     ?>
     <li class="<?php echo $sidebar_params['alerts']; ?>" ><a  href="admin/alerts">Alertas</a></li>
     <li class="<?php echo $sidebar_params['new_alert']; ?>" ><a  href="admin/alerts/new_alert">Nueva Alerta</a></li>
     <li class="<?php echo $sidebar_params['mis_alerts']; ?>" ><a  href="admin/alerts/mis_alerts">Mis Alerta</a></li>
     <?php } 
      if(!empty($sidebar_params['incidents_list']) OR !empty($sidebar_params['new_incident']) ) {
     ?>
     <li class="<?php echo $sidebar_params['incidents_list'];?>" ><a href="admin/incidents/incidents_list">Incidents</a></li>
     <li class="<?php echo $sidebar_params['new_incident']; ?>" ><a href="admin/incidents/new_incident">Nueva Incidents</a></li>
     <?php 
      }  
      if(!empty($sidebar_params['workarea_list']) OR !empty($sidebar_params['new_workarea']) ) {
     ?>
     <li class="<?php echo $sidebar_params['workarea_list'];?>" ><a href="admin/work_area/workarea_list">Faenas</a></li>
     <li class="<?php echo $sidebar_params['new_workarea']; ?>" ><a href="admin/work_area/new_workarea">Nueva Faena</a></li>
    <?php
     } 
     if(!empty($sidebar_params['company_list']) OR !empty($sidebar_params['new_company']) ) {
     ?>
     <li class="<?php echo $sidebar_params['company_list'];?>" ><a href="admin/company/company_list">Empresas</a></li>
     <li class="<?php echo $sidebar_params['new_company']; ?>" ><a href="admin/company/new_company">Nueva Empresas</a></li>
     <?php } 
     if(!empty($sidebar_params['user_list']) OR !empty($sidebar_params['new_user']) ) {
     ?>
     <li class="<?php echo $sidebar_params['user_list'];?>" ><a href="admin/auth">Usuarios</a></li>
     <li class="<?php echo $sidebar_params['new_user']; ?>" >  <div class="btn-group">
             <button class="btn" id="btn-add-user"><b class="icon-user"></b> &nbsp;Nueva <?php if($is_admin){ ?>Cliente<?php }else if($users_group_id == 4){ ?>Usuario<?php } else if($users_group_id == 3) { ?>Contratista <?php } else { ?>Usuario <?php } ?>&nbsp;</button>
      </div></li>
    <!-- <li class="<?php //echo $sidebar_params['new_user']; ?>" ><a href="#">Nueva Usuarios</a></li> -->
     <?php }
     ?>
     
    </ul>
    </div>
    
</div>
    