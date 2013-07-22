<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#"><?php echo $site_title; ?></a>
          <div class="nav-collapse collapse">
            <!-- <ul class="nav pull-left">
                  <li class=""><a href="admin/auth">Usuarios</a></li>
                
                  
              </ul> -->
              <ul class="nav pull-right">
               <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo "Welcome&nbsp;&nbsp;";  echo $user->last_name;?>
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    <li><a href="admin/auth/edit_profile/<?php echo $user->id; ?>" id="btn-edit-profile">Edit Profile</a></li>
                    <li><a href="javascript:void(0);" id="btn-contact-admin">Contact Administrator</a></li>
                    <li class="divider"></li> 
                    <li><a href="admin/auth/logout">Logout</a></li>
                    </ul>
                </li>
               </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
</div>
<div class="container" >
<div class="row-fluid">
