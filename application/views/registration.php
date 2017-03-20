<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BI Rate Forecasting | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/square/blue.css'); ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href=""><b>BI Rate</b>Forecasting</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    
    <?php echo form_open('auth/registration'); ?>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" value="<?php echo set_value('username')?>" placeholder="Username" name="username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
        <span class="text-danger"><?php echo form_error('username'); ?></span>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" value="<?php echo set_value('full_name')?>" placeholder="Full name" name="full_name" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
        <span class="text-danger"><?php echo form_error('full_name'); ?></span>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" value="<?php echo set_value('email')?>" placeholder="Email" name="email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
        <span class="text-danger"><?php echo form_error('email'); ?></span>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" value="<?php echo set_value('password')?>" placeholder="Password" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
        <span class="text-danger"><?php echo form_error('password'); ?></span>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Retype password" name="passconf" required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
        <span class="text-danger"><?php echo form_error('passconf'); ?></span>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    <?php echo form_close(); ?>
    <?php echo $this->session->flashdata('msg'); ?>

    <a href="<?php echo base_url(''); ?>" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js'); ?>"></script>
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
