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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.1/css/buttons.dataTables.min.css" />
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
    <style>
     @media print{
        .non-print{
            display: none;
        }
     }
     .table { 
        margin-bottom: 2px; 
        border-width: 0px; 
        }
     
     
     </style> 
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
                         <th colspan="3"><h3> <?php echo $this->lang->line("Order Details :");?></h3></th>
                        
                    </h1>
                    
                </section>

                <!-- Main content -->
                <section class="content">
                <div style="margin-top: 10px;">
         <input type="button" value="Print" onclick="window.print()" class="con_txt2 non-print" />
        </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php  if(isset($error)){ echo $error; }
                                    echo $this->session->flashdata('message'); ?>
                            <!-- general form elements -->
                            <table class="table table-bordered data_table">
                                <tbody>
                                    
                                <tr>
                                    <td colspan="3">
                                        <table class="table">
                                            <tr>
                                                <td valign="top">
                                                                                            <strong> <?php echo $this->lang->line("Order Id : ");?><?php echo $order->sale_id; ?></strong>
                                                                        <br />
                                                                        <strong>  <?php echo $this->lang->line("Order Date :");?> <?php echo date("d-m-Y h:i A",strtotime($order->created_at)); ?></strong>
                                                                        <br />

                                                </td>
                                                <td>
                                                    <strong> <?php echo $this->lang->line("Delivery Details :");?></strong><br />
                                                    <strong>  <?php echo $this->lang->line("Contact :");?> <?php echo $order->user_fullname ; ?> <br/> Phone : <?php echo $order->user_phone; ?></strong><br />
                                        <strong>  <?php echo $this->lang->line("Address :");?></strong>
                                        <address>
                                            <?php echo $order->socity_name; ?><br />
                                            <?php echo $order->house_no; ?>
                                        </address><br />
                                         <?php echo $this->lang->line("Delivery Date :"); ?> <?php echo date("d-m-Y", strtotime($order->on_date)); ?>
                                         <br />   
                                         <?php echo $this->lang->line("Delivery Time :");?> <?php echo $order->delivery_time_from." to ".$order->delivery_time_to; ?></p>
                                                
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <th> <?php echo $this->lang->line("Product Name");?></th>
                                    <th> <?php echo $this->lang->line("Qty");?></th>
                                    <th> <?php echo $this->lang->line("Total Price");?> <?php echo $this->config->item("currency");?></th>
                                </tr>
                                <?php
                                $total_price = 0;
                                foreach($order_items as $items){
                                    ?>
                                    <tr>
                                        <td><?php echo $items->product_name; ?><br />
                                        <?php echo $items->unit_value." ".$items->unit. " (".$this->config->item("currency")." $items->price ) "; ?>
                                        </td>
                                        <td>
                                            <?php echo $items->qty ; ?>
                                        </td>
                                        <td>
                                            <?php echo $items->qty * $items->price;
                                            $total_price = $total_price + ($items->qty * $items->price);
                                             ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                <tr>
                                    <td colspan="2"><strong class="pull-right"> <?php echo $this->lang->line("Total :");?></strong></td>
                                    <td >
                                        <strong class=""><?php echo $total_price; ?>  <?php echo $this->config->item("currency");?></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><strong class="pull-right">Delivery Charges :</strong></td>
                                    <td >
                                        <strong class=""><?php echo $order->delivery_charge; ?> <?php echo $this->config->item("currency");?></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><strong class="pull-right">Net Total Amount :</strong></td>
                                    <td >
                                        <strong class=""><?php echo $net = $total_price + $order->delivery_charge; ?><?php echo $this->config->item("currency");?> </strong>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Main row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
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
    <script src="//code.jquery.com/jquery-1.12.3.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>
    <script>
    $(document).ready(function() {
    $('.data_table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
             'print'
        ]
    } );
} );
    </script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/bootstrap/js/bootstrap.min.js"); ?>"></script>
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
  </body>
</html>
