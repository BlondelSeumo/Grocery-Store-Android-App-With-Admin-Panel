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
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url($this->config->item("theme_admin")."/dist/css/AdminLTE.min.css
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
            <?php echo $this->lang->line('dashboard')?>
            <small><?php echo $this->lang->line("Control panel");?></small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $this->lang->line("Home");?></a></li>
            <li class="active"><?php echo $this->lang->line('dashboard')?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
           
          <h3><?php echo $this->lang->line('Today Orders :')?></h3>
          <table class="table data_table" >
                <thead>
                <tr>
                    <th><?php echo $this->lang->line('Order ID')?></th>
                    <th><?php echo $this->lang->line('Order Date')?></th>
                    <th><?php echo $this->lang->line('Customer Name')?></th>
                    <th><?php echo $this->lang->line('Socity')?></th>
                    <th><?php echo $this->lang->line('Customer Phone')?></th>
                    <th><?php echo $this->lang->line('Date')?></th>
                    <th><?php echo $this->lang->line('Time')?></th>
                    <th><?php echo $this->lang->line('Order Amount')?></th>
                    <th><?php echo $this->lang->line('Status')?></th>
                    <th><?php echo $this->lang->line('Action')?></th>
                </tr>
                </thead>
          <tbody>
          <?php
          foreach($today_orders as $order)
          {
            ?>
            
                <tr>
                    <td><?php echo $order->sale_id; ?></td>
                    <td><?php echo date("d-m-Y",strtotime($order->created_at)); ?></td>
                    <td><?php echo $order->user_fullname; ?></td>
                    <td><?php echo $order->socity_name; ?></td>
                    <td><?php echo $order->user_phone; ?></td>
                    <td><?php echo date("d-m-Y",strtotime($order->on_date)); ?></td>
                    <td><?php echo date("H:i A", strtotime($order->delivery_time_from))." - ".date("H:i A", strtotime($order->delivery_time_to)); ?></td>
                    <td><?php echo $order->total_amount; ?></td>
                    <td><?php if($order->status == 0){
                        echo "<span class='label label-default'>Pending</span>";
                    }else if($order->status == 1){
                        echo "<span class='label label-success'>Confirm</span>";
                    }else if($order->status == 2){
                        echo "<span class='label label-info'>Delivered</span>";
                    }else if($order->status == 3){
                        echo "<span class='label label-danger'>cancel</span>";
                    }  ?></td>
                    <td><a href="<?php echo site_url("admin/orderdetails/".$order->sale_id); ?>" class="btn btn-sm btn-default">Details</a></td>
                </tr>
            <?php
          }
          ?>
          </tbody>  
          </table>  
                    <h3><?php echo $this->lang->line('Next Day Orders :')?></h3>
          <table class="table data_table">
            <thead>
                <tr>
                    <th><?php echo $this->lang->line('Order ID')?></th>
                    <th><?php echo $this->lang->line('Order Date')?></th>
                    <th><?php echo $this->lang->line('Customer Name')?></th>
                    <th><?php echo $this->lang->line('Socity')?></th>
                    <th><?php echo $this->lang->line('Customer Phone')?></th>
                    <th><?php echo $this->lang->line('Date')?></th>
                    <th><?php echo $this->lang->line('Time')?></th>
                    <th><?php echo $this->lang->line('Order Amount')?></th>
                    <th><?php echo $this->lang->line('Status')?></th>
                    <th><?php echo $this->lang->line('Action')?></th>
                </tr>
            </thead>
            <tbody>
          <?php
          foreach($nextday_orders as $order)
          {
            ?>
                <tr>
                    <td><?php echo $order->sale_id; ?></td>
                    <td><?php echo date("d-m-Y",strtotime($order->created_at)); ?></td>
                    <td><?php echo $order->user_fullname; ?></td>
                    <td><?php echo $order->socity_name; ?></td>
                    <td><?php echo $order->user_phone; ?></td>
                    <td><?php echo date("d-m-Y",strtotime($order->on_date)); ?></td>
                    <td><?php echo date("H:i A", strtotime($order->delivery_time_from))." - ".date("H:i A", strtotime($order->delivery_time_to)); ?></td>
                    <td><?php echo $order->total_amount; ?></td>
                    <td><?php if($order->status == 0){
                        echo "<span class='label label-default'>Pending</span>";
                    }else if($order->status == 1){
                        echo "<span class='label label-success'>Confirm</span>";
                    }else if($order->status == 2){
                        echo "<span class='label label-info'>Delivered</span>";
                    }else if($order->status == 3){
                        echo "<span class='label label-danger'>cancel</span>";
                    }  ?></td>
                    <td><a href="<?php echo site_url("admin/orderdetails/".$order->sale_id); ?>" class="btn btn-sm btn-default"><?php echo $this->lang->line('Details')?></a></td>
                </tr>
            <?php
          }
          ?>
            </tbody>
          </table>  

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
    <script src="//code.jquery.com/jquery-1.12.3.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.1/js/buttons.flash.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>
    <script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js"></script>
    <script>
    $(document).ready(function() {
    $('.data_table').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
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
    
    <!-- AdminLTE App -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/dist/js/app.min.js"); ?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/dist/js/pages/dashboard.js"); ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url($this->config->item("theme_admin")."/dist/js/demo.js"); ?>"></script>
    
  </body>
</html>
