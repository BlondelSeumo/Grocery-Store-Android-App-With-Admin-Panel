<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Admin | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/bootstrap/css/bootstrap.min.css"); ?>" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/dist/css/AdminLTE.min.css"); ?>" />
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/plugins/iCheck/square/blue.css"); ?>" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><?php echo $this->config->item('company_title');  ?></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
            <?php if(isset($success) && $success){
                            ?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                                  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                  <strong>Success!</strong> Your password changed successfully..  
                                                </div>
                                               
                            <?php
                        }else{ ?>

                                        <?php if(isset($error)) { echo $error; } echo $this->session->flashdata("message");  ?>
                                            <form id="signupform" class="form-horizontal"  enctype="multipart/form-data"  action="" method="post" role="form">
                                               <div class="form-group">
                                                    <label for="n_password" class="col-md-4 control-label">New Password</label>
                                                    <div class="col-md-8">
                                                        <input type="password" class="form-control" name="n_password"  placeholder="New Password"  required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="r_password" class="col-md-4 control-label">Re Password</label>
                                                    <div class="col-md-8">
                                                        <input type="password" class="form-control" name="r_password"  placeholder="Re Password"  required="">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <!-- Button -->                                        
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <input type="submit" name="register" value='Update Password' id="btn-signup" type="button" class="btn btn-info" />
                                                        
                                                        <!--<span style="margin-left:8px;">or</span>-->  
                                                    </div>
                                                </div>
                                            </form>
                                            <?php } ?>
         

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/jQuery/jQuery-2.1.4.min.js"); ?>"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/bootstrap/js/bootstrap.min.js"); ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/iCheck/icheck.min.js"); ?>"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
