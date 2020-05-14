<header class="main-header">
        <!-- Logo -->
        <a href="<?php echo site_url(_get_user_redirect($this)); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>G</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b> <?php echo $this->lang->line("site_title");?></b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only"> <?php echo $this->lang->line("Toggle navigation");?></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs"><?php echo ($this->session->userdata('language') == "arabic") ? "ar" : "en";  ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li>
                    <a href="?lang=english">English</a>
                  </li>
                  <li>
                    <a href="?lang=arabic">Arabic</a>
                  </li>
                </ul>
              </li>
              
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url("img/user2-160x160.jpg"); ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo _get_current_user_name($this); ?></span>
                </a>
                
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url("img/user2-160x160.jpg"); ?>" class="img-circle" alt="User Image">
                    <p>
                       
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#"> </a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#"> </a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#"> </a>
                    </div>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">  
                         <a href="<?php echo site_url("users/edit_user/"._get_current_user_id($this)); ?>" ><i class="btn btn-default btn-flat"> Edit Profile </i></a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo site_url("admin/signout") ?>" class="btn btn-default btn-flat"> <?php echo $this->lang->line("Sign out");?></a>
                    </div>
                  </li>
                </ul>
              </li> 
            </ul>
          </div>
        </nav>
      </header>