<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/bootstrap/css/bootstrap.min.css"); ?>" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/plugins/morris/morris.css"); ?>" >
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/plugins/jvectormap/jquery-jvectormap-1.2.2.css"); ?>" >
    <!-- Theme style -->
    <?php echo link_tag($this->config->item("theme_admin")."/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"); ?>
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/dist/css/AdminLTE.min.css"); ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/dist/css/skins/_all-skins.min.css"); ?>">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <?php  $this->load->view("admin/common/common_header"); ?>
      <!-- Left side column. contains the logo and sidebar -->
      <?php  $this->load->view("admin/common/common_sidebar"); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo $this->lang->line(" App Page");?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>  <?php echo $this->lang->line(" Home");?></a></li>
            <li class="active"> <?php echo $this->lang->line(" App Page");?></li>
          </ol>
        </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-6">
                            <?php  if(isset($error)){ echo $error; }
                                    echo $this->session->flashdata('success_req'); ?>
                            <!-- general form elements -->
                            <div class="box box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title"> <?php echo $this->lang->line("Edit Page :");?> <strong><?php echo $onepage->pg_title; ?></strong></h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label class=""> <?php echo $this->lang->line("Page Title :");?> <span class="text-danger">*</span></label>
                                           <input type="text" name="page_title" class="form-control" placeholder="Page Title" value="<?php echo $onepage->pg_title; ?>"/>
                                            <input type="hidden" name="page_id" class="form-control" placeholder="Page id" value="<?php echo $onepage->id; ?>"/>
                                        </div>
                                      
                                        <div class="form-group">
                                        <label class=""> <?php echo $this->lang->line("Page Description.");?> <span class="text-danger">*</span></label>
                                            <textarea id="editor1" name="page_descri" rows="10" cols="80" placeholder="Place some text here">
                                           <?php echo $onepage->pg_descri; ?> </textarea>
                                            
                                        </div>
                                          
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <input type="submit" class="btn btn-primary" name="savepageapp" value="Save Page" />
                                       
                                    </div>
                                </form>
                            </div><!-- /.box -->
                        </div>

                    </div>
                    <!-- Main row -->
                </section><!-- /.content -->
           
        </div><!-- ./wrapper -->

        <?php  $this->load->view("admin/common/common_footer"); ?>  

      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/jQuery/jQuery-2.1.4.min.js"); ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/bootstrap/js/bootstrap.min.js"); ?>"></script>
    
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/morris/morris.min.js"); ?>"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/sparkline/jquery.sparkline.min.js"); ?>"></script>
    <!-- jvectormap -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"); ?>"></script>
    <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"); ?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/knob/jquery.knob.js"); ?>"></script>
    
    <!-- AdminLTE App -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/dist/js/app.min.js"); ?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/dist/js/demo.js"); ?>"></script>
   
           <script src="<?php echo base_url($this->config->item("theme_admin")); ?>/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
     
        <script type="text/javascript">
            $(function() {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor1');
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();
            });
        </script>
  </body>
</html>

