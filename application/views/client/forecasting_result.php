<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BI Rate Forecasting | Forecasting Result</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>plugins/datatables/dataTables.bootstrap.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('client/home')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>BI</b>F</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>BI Rate</b>Forecasting</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><?php echo $this->session->userdata('full_name'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->
                <p>
                  <?php echo $this->session->userdata('full_name'); ?>
                  <small><?php echo $this->GLOBAL_DATA_SUBSYSTEM_VALUE; ?></small>
                  <small>Member since <?php echo $this->session->userdata('dtm_crt'); ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('auth/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="<?php echo base_url('client/pre-forecasting');?>">
            <i class="fa fa-fast-forward"></i> <span>Peramalan</span>
          </a>
        </li>

        <li class="treeview">
          <a href="<?php echo base_url('client/list-inbox'); ?>">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
          </a>
        </li>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Forecasting Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('client/home')?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url('client/pre-forecasting')?>"></i> Pra Peramalan</a></li>
        <li><a href="<?php echo base_url('client/forecasting-form')?>"></i> Form Peramalan</a></li>
        <li class="active"> Hasil Peramalan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Benchmarking table (Untuk keperluan development)</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Benchmarking type</th>
                  <th>Benchmarking value</th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>Memory usage</td>
                  <td>{memory_usage}</td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>Execution time</td>
                  <td>{elapsed_time} sec</td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>

      <!-- Percentage Change Table -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Pembentukan Percentage Change</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="listPercentageChange" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tahun</th>
                  <th>Bulan</th>
                  <th>BI rate aktual (%)</th>
                  <th>Percentage Change (%)</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  $a = 0;
                  $index = 0;
                  foreach ($data_training as $row) {
                    echo '<tr>';
                    echo '<td>'.$row->tahun.'</td>';
                    echo '<td>'.$row->bulan.'</td>';
                    echo '<td>'.($row->bi_rate*100).'</td>';
                    if($a == 0) {
                      echo '<td>-</td>';
                    } else {
                      echo '<td>'.$percentage_change[$index][0].'</td>';
                      $index++;
                    }
                    echo '</tr>';
                    $a++;
                  }
                  ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Tahun</th>
                    <th>Bulan</th>
                    <th>BI rate aktual (%)</th>
                    <th>Percentage Change (%)</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Universe of Discourse</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Dmax</th>
                  <th>Dmin</th>
                  <th>D1</th>
                  <th>D2</th>
                  <th>U[0]</th>
                  <th>U[1]</th>
                </tr>
                <tr>
                  <td><?php echo $Dmax; ?></td>
                  <td><?php echo $Dmin; ?></td>
                  <td><?php echo $D1; ?></td>
                  <td><?php echo $D2; ?></td>
                  <td><?php echo $U[0]; ?></td>
                  <td><?php echo $U[1]; ?></td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <!-- /.box -->

      <!-- Interval awal -->
      <div class="row">
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Interval awal</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="listIntervalAwal" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Interval</th>
                  <th>Nilai tengah</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  for ($b=0; $b < count($interval_awal) ; $b++) {
                    echo '<tr>';
                    echo '<td>['.$interval_awal[$b][0].', '.$interval_awal[$b][1].']</td>';
                    echo '<td>'.$interval_awal[$b][2].'</td>';
                    echo '</tr>';
                  }
                  ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Interval</th>
                    <th>Nilai tengah</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Menghitung frequency density based partitioning</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="frequencyDensityBasedPartitioning" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Interval</th>
                  <th>Nilai tengah</th>
                  <th>Frekuensi data</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  for ($c=0; $c < count($interval_awal) ; $c++) {
                    echo '<tr>';
                    echo '<td>['.$interval_awal[$c][0].', '.$interval_awal[$c][1].']</td>';
                    echo '<td>'.$interval_awal[$c][2].'</td>';
                    echo '<td>'.$interval_awal[$c][3].'</td>';
                    echo '</tr>';
                  }
                  ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Interval</th>
                    <th>Nilai tengah</th>
                    <th>Frekuensi data</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.box -->
      </div>

      <!-- n top frequency -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title"><?php echo $n_top_frequency.' Interval dengan frekuensi terbanyak';?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="listNTopFrequency" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Interval</th>
                  <th>Nilai tengah</th>
                  <th>Frekuensi</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  for ($d=0; $d < $n_top_frequency ; $d++) {
                    echo '<tr>';
                    echo '<td>['.$x_nTopFrequency[$d][0].', '.$x_nTopFrequency[$d][1].']</td>';
                    echo '<td>'.$x_nTopFrequency[$d][2].'</td>';
                    echo '<td>'.$x_nTopFrequency[$d][3].'</td>';
                    echo '</tr>';
                  }
                  ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Interval</th>
                    <th>Nilai tengah</th>
                    <th>Frekuensi</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>

      <!-- Fuzzy Intervals -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Fuzzy Intervals</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="listFuzzyIntervals" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Linguistik</th>
                  <th>Interval</th>
                  <th>Nilai tengah</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  for ($e=0; $e < count($x_final) ; $e++) {
                    echo '<tr>';
                    echo '<td>X<sub>'.$x_final[$e][3].'</sub></td>';
                    echo '<td>['.$x_final[$e][0].', '.$x_final[$e][1].']</td>';
                    echo '<td>'.$x_final[$e][2].'</td>';
                    echo '</tr>';
                  }
                  ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>Linguistik</th>
                    <th>Interval</th>
                    <th>Nilai tengah</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>

      <!-- Fuzzifikasi data historis -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Hasil fuzzifikasi dan FLR</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="listHasilFuzzifikasi" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Tahun</th>
                    <th>Bulan</th>
                    <th>BI rate aktual</th>
                    <th>Percentage Change (%)</th>
                    <th>Hasil fuzzifikasi</th>
                    <th>FLR</th>
                  </tr>
                  </thead>
                  <tbody>
                      <?php
                      $a = 0;
                      $b = 0;
                      $index = 0;
                      $index2 = 0;
                      foreach ($data_training as $row) {
                        echo '<tr>';
                        echo '<td>'.$row->tahun.'</td>';
                        echo '<td>'.$row->bulan.'</td>';
                        echo '<td>'.($row->bi_rate*100).'</td>';
                        if($a == 0) {
                          echo '<td>-</td>';
                          echo '<td>-</td>';
                          echo '<td>-</td>';
                        } elseif($a > 0 && $b <= 1) {
                          echo '<td>'.$percentage_change[$index][0].'</td>';
                          echo '<td>X<sub>'.$percentage_change[$index][1].'</sub></td>';
                          echo '<td>-</td>';
                          $index++;
                        } else {
                          echo '<td>'.$percentage_change[$index][0].'</td>';
                          echo '<td>X<sub>'.$percentage_change[$index][1].'</sub></td>';
                          echo '<td><p align="center">X<sub>'.$FLR[$index2]['prevState'].'</sub> &rarr; X<sub>'.$FLR[$index2]['nextState'].'</sub> </p></td>';
                          $index++;
                          $index2++;
                        }
                        echo '</tr>';
                        $a++;
                        $b++;
                      }
                      ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Tahun</th>
                      <th>Bulan</th>
                      <th>BI rate aktual</th>
                      <th>Percentage Change (%)</th>
                      <th>Hasil fuzzifikasi</th>
                      <th>FLR</th>
                    </tr>
                  </tfoot>
              </table>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>

      <!-- FLRG -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Fuzzy logic relationship Group</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="listFLRG" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th><p align="center">Fuzzy logic relationship Group</p></th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    for ($i=0; $i < count($FLRG); $i++) {
                      echo '<tr>';
                      echo '<td><p align="center">X<sub>'.$FLRG[$i]['prevState'].'</sub> &rarr;';
                      for ($j=0; $j < count($FLRG[$i]['nextState']); $j++) {
                        if ($j != count($FLRG[$i]['nextState'])-1) {
                          echo ' X<sub>'.$FLRG[$i]['nextState'][$j].'</sub>, ';
                        } else {
                          echo ' X<sub>'.$FLRG[$i]['nextState'][$j].'</sub>';
                        }
                      }
                      echo '</p></td>';
                      echo '</tr>';
                    }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th><p align="center">Fuzzy logic relationship Group</p></th>
                    </tr>
                  </tfoot>
              </table>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>

      <!-- Defuzzifikasi dan Hasil Peramalan -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Defuzzifikasi dan Hasil Peramalan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="listDefuzzifikasi" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Tahun</th>
                    <th>Bulan</th>
                    <th>BI rate aktual</th>
                    <th>Percentage change aktual(%)</th>
                    <th>Prediksi percentage change(%)</th>
                    <th>Hasil peramalan BI rate</th>
                    <th>Error rate</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $k = 0;
                    foreach ($data_uji as $row) {
                      echo '<tr>';
                      echo '<td>'.$row->tahun.'</td>';
                      echo '<td>'.$row->bulan.'</td>';
                      echo '<td>'.($row->bi_rate * 100).'</td>';
                      echo '<td>'.$percentage_change_data_uji[$k][0].'</td>';
                      echo '<td>'.$predicted_percentage_change[$k].'</td>';
                      echo '<td>'.($forecasted_data[$k] * 100).'</td>';
                      echo '<td>'.$error_rate[$k].'</td>';
                      echo '</tr>';
                      $data_uji_bi_rate[$k] = $row->bi_rate * 100;
                      $var_forcasted_data[$k] = round($forecasted_data[$k] * 100, 3);
                      $k++;
                    }
                    ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Tahun</th>
                      <th>Bulan</th>
                      <th>BI rate aktual</th>
                      <th>Percentage change aktual(%)</th>
                      <th>Prediksi percentage change(%)</th>
                      <th>Hasil peramalan BI rate</th>
                      <th>Error rate</th>
                    </tr>
                  </tfoot>
              </table>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>

      <!-- Line chart -->
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Line chart perbandingan data aktual dengan hasil peramalan</br>
                                    MAPE: <?php echo $MAPE; ?></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div id="line-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->
        </div>
      </div>
    <!-- /.col -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> <?php echo $this->session->userdata('prm_appversion'); ?>
    </div>
    <strong>Copyright &copy; 2017 <a href="https://www.linkedin.com/in/wiratama-paramasatya-40b387133/">Wiratama Paramasatya</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">

        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url('assets/'); ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('assets/'); ?>bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url('assets/'); ?>plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/'); ?>plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/'); ?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/'); ?>plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/'); ?>plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/'); ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('assets/'); ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/'); ?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/'); ?>dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/'); ?>dist/js/demo.js"></script>
<!-- FLOT CHARTS -->
<script src="<?php echo base_url('assets/'); ?>plugins/flot/jquery.flot.min.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?php echo base_url('assets/'); ?>plugins/flot/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?php echo base_url('assets/'); ?>plugins/flot/jquery.flot.pie.min.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="<?php echo base_url('assets/'); ?>plugins/flot/jquery.flot.categories.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#listPercentageChange").DataTable();
    $("#listIntervalAwal").DataTable( {
        "order": [[ 1, "asc" ]]
    } );
    $("#frequencyDensityBasedPartitioning").DataTable( {
        "order": [[ 1, "asc" ]]
    } );
    $("#listNTopFrequency").DataTable( {
        "order": [[ 2, "desc" ]]
    } );
    $("#listFuzzyIntervals").DataTable( {
        "order": [[ 2, "asc" ]]
    } );
    $("#listHasilFuzzifikasi").DataTable();
    $("#listFLRG").DataTable();
    $("#listDefuzzifikasi").DataTable();

  });

  $(function () {
    /*
     * LINE CHART
     * ----------
     */
    //LINE randomly generated data

    var aktual = [], peramalan = [];
    var aktual1 = <?php echo json_encode($data_uji_bi_rate); ?>;
    var peramalan1 = <?php echo json_encode($forecasted_data); ?>;
    // for (var i = 0; i < 14; i += 0.5) {
    //   sin.push([i, Math.sin(i)]);
    //   cos.push([i, Math.cos(i)]);
    // }
    var indexHelper = 1;
    for (var i = 0; i < aktual1.length; i++) {
      aktual.push([indexHelper, aktual1[i]]);
      peramalan.push([indexHelper, (peramalan1[i]*100)]);
      indexHelper++;
    }
    // aktual.push([1, 8]);
    // peramalan.push([1, 8.015]);
    // aktual.push([2, 8]);
    // peramalan.push([2, 8.015]);
    // aktual.push([3, 8]);
    // peramalan.push([3, 8.015]);
    // aktual.push([4, 8]);
    // peramalan.push([4, 8.015]);
    // aktual.push([5, 8.25]);
    // peramalan.push([5, 8.268]);
    // aktual.push([6, 8.50]);
    // peramalan.push([6, 8.526]);
    // aktual.push([7, 8.75]);
    // peramalan.push([7, 8.694]);
    // aktual.push([8, 9]);
    // peramalan.push([8, 8.950]);
    // aktual.push([9, 9.25]);
    // peramalan.push([9, 9.205]);
    // aktual.push([10, 9.5]);
    // peramalan.push([10, 9.461]);
    // aktual.push([11, 9.5]);
    // peramalan.push([11, 9.518]);
    // aktual.push([12, 9.25]);
    // peramalan.push([12, 9.265]);

    var line_data1 = {
      data: aktual,
      label: 'Aktual',
      color: "#3c8dbc"
    };
    var line_data2 = {
      data: peramalan,
      label: 'Peramalan',
      color: "#cc0000"
    };
    $.plot("#line-chart", [line_data1, line_data2], {
      grid: {
        hoverable: true,
        borderColor: "#f3f3f3",
        borderWidth: 1,
        tickColor: "#f3f3f3"
      },
      series: {
        shadowSize: 0,
        lines: {
          show: true
        },
        points: {
          show: true
        }
      },
      lines: {
        fill: false,
        color: ["#3c8dbc", "#f56954"]
      },
      yaxis: {
        show: true,
      },
      xaxis: {
        show: true
      }
    });
    //Initialize tooltip on hover
    $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
      position: "absolute",
      display: "none",
      opacity: 0.8
    }).appendTo("body");
    $("#line-chart").bind("plothover", function (event, pos, item) {

      if (item) {
        var x = item.datapoint[0].toFixed(2),
            y = item.datapoint[1].toFixed(2);

        $("#line-chart-tooltip").html(item.series.label + " of " + x + " = " + y)
            .css({top: item.pageY + 5, left: item.pageX + 5})
            .fadeIn(200);
      } else {
        $("#line-chart-tooltip").hide();
      }

    });
    /* END LINE CHART */
  });
</script>
</body>
</html>
