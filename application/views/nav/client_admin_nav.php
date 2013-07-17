<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php echo $brand; ?>
          <!-- <a class="brand" href="#"><?php //echo $site_title; ?></a> -->
          <div class="nav-collapse collapse">
            <ul class="nav pull-left">
                  <li class="<?php echo $nav_params['users']; ?>"><a href="admin/auth">Usuarios</a></li>
                <?php //checking client admin group id
                    if($users_group_id == 3 OR $users_group_id == 4){
                        
                    ?>
                    <li class="<?php echo $nav_params['map']; ?>"><a href="#">Mapa</a></li>
                    <li class="<?php echo $nav_params['alerts']; ?>"><a  href="admin/alerts">Alerta</a></li>
                    <li class="<?php echo $nav_params['statistics']; ?>"><a  href="admin/statistics">Estadísticas</a></li>
                    <li class="<?php echo $nav_params['incidents']; ?>"><a  href="admin/incidents/incidents_list">Incidentes</a></li>
                   
                     <?php } 
                     if($users_group_id == 3) { ?>
                       <li class="<?php echo $nav_params['workareas']; ?>"><a href="admin/work_area/workarea_list">Faenas</a></li>
                      <li class="<?php echo $nav_params['company']; ?>"><a href="admin/company/company_list">Empresas</a></li>
                   <?php } ?>
                  
              </ul>
              <ul class="nav pull-right">
               <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo "Nombre&nbsp;&nbsp;";  echo $user->last_name;?> 
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    <li><a href="admin/auth/edit_profile/<?php echo $user->id; ?>" id="btn-edit-profile">Editar perfil</a></li>
                    <li><a href="javascript:void(0);" id="btn-contact-admin">Contactar administrador</a></li>
                    <li class="divider"></li> 
                    <li><a href="admin/auth/logout">Salir</a></li>
                    </ul>
                </li>
               </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
<div class="container">
<div class="row-fluid">