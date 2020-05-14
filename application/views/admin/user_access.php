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
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/plugins/select2/select2.min.css"); ?>">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/plugins/datatables/dataTables.bootstrap.css"); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/dist/css/AdminLTE.css
    "); ?>">
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
            <?php echo $this->lang->line('User Permission')?>
            <small><?php echo $this->lang->line('Manage Access')?></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $this->lang->line('Admin')?></a></li>
            <li class="active"><?php echo $this->lang->line('User Access')?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
         <form role="form" action="" method="post">
            <div class="row">
                <!--<div class="col-md-5">
                    <div class="box">
                        <div class="box-header">
                            Add new Boxoffice
                        </div>
                        <div class="box-body">
                        
                           
                              <div class="box-body">
                                
                                <div class="form-group">
                                    <label for="user_type_id">User Type</label>
                                    <select class="form-control select2" name="user_type_id" id="user_type_id" style="width: 100%;">
                                      <?php foreach($user_types as $user_type){
                                        ?>
                                        <option value="<?php echo $user_type->user_type_id; ?>" ><?php echo $user_type->user_type_title; ?></option>
                                        <?php
                                      } ?>
                                    </select>
                                </div>
                                
                              </div>
            
                              <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                           
                        </div>
                    </div>
                </div> -->
                <div class="col-md-12">
                <div class="box">
                        <div class="box-header">
                          <?php echo $this->lang->line('Set User Access')?>
                        </div>
                        <div class="box-body">
                        <input type="hidden" name="user_type_id" value="<?php echo $user_type_id;?>" />
                        <?php foreach(array_keys($controllers) as $key){
                            echo "<div><label for='$key'><input type='checkbox' name='permission[".$key."][all]' id='$key' ";
                            echo get_is_access($key,"*",$user_access);
                            echo " />".$key."</label></div>";
                            foreach($controllers[$key] as $methods){
                                echo "<div class='col-md-4'><label for='$methods'><input type='checkbox' name='permission[".$key."][$methods]' id='$methods' ";
                                echo get_is_access($key,$methods,$user_access);
                                echo " />".$methods."</label></div>";
                            }
                        } 

                        function get_is_access($controller,$method,$user_access){
                           
                                foreach($user_access as $access){
                                    if($access->class == $controller && $access->method == $method){
                                        return "checked";
                                    }
                                }
                                return "";
                        }
                        
                        ?>
                        
                        </div>
                        <div class="box-footer">
                                <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('Submit')?></button>
                              </div>
                </div>
                </div>
                
            </div>
             </form>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
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
    <!-- Select2 -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/select2/select2.full.min.js"); ?>"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/datatables/jquery.dataTables.min.js"); ?>"></script>
    <script src="<?php echo base_url($this->config->item("theme_admin")."/plugins/datatables/dataTables.bootstrap.min.js"); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/dist/js/app.min.js"); ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/dist/js/demo.js"); ?>"></script>
    <script>
      $(function () {
        
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
        $("body").on("change",".tgl_checkbox",function(){
            var table = $(this).data("table");
            var status = $(this).data("status");
            var id = $(this).data("id");
            var id_field = $(this).data("idfield");
            var bin=0;
                                         if($(this).is(':checked')){
                                            bin = 1;
                                         }
            $.ajax({
              method: "POST",
              url: "<?php echo site_url("admin/change_status"); ?>",
              data: { table: table, status: status, id : id, id_field : id_field, on_off : bin }
            })
              .done(function( msg ) {
                alert(msg);
              }); 
        });
      });
    </script>
    <script>
    $(function(){
       $(".select2").select2();
       $(".select3").select2();
       $(".select4").select2();
       $("#country_id").change(function(){
        
            var country_id = $(this).val();
            $.ajax({
              method: "POST",
              url: '<?php echo site_url("admin/change_state"); ?>',
              data: { country_id: country_id }
            })
              .done(function( msg ) {
                
                    $("#state_id").html(msg);
                    $(".select3").select2();
              }); 
       }); 
       $("#state_id").change(function(){
        
            var state_id = $(this).val();
            
            $.ajax({
              method: "POST",
              url: '<?php echo site_url("admin/change_city"); ?>',
              data: { state_id: state_id }
            })
              .done(function( msg ) {
               
                    $("#city_id").html(msg);
                    $(".select4").select2();
              }); 
       });
    });
    </script>
    
  </body>
</html>
