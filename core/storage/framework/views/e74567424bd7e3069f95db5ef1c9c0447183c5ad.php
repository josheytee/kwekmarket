
  <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">

  <title><?php echo e($gs->website_title); ?> - Admin</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <!-- favicon -->
  <link rel="shortcut icon" href="<?php echo e(asset('assets/user/interfaceControl/logoIcon/icon.jpg')); ?>" type="image/x-icon">
  <!-- Toastr  -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/user/css/toastr.min.css')); ?>">
  <!-- jQUery UI -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/user/css/jquery-ui.css')); ?>">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/admin/css/main.css')); ?>">
  <!-- Font-icon css-->
  
  <!-- Font-icon 5 css-->
  <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/fontawesome-5.css')); ?>">

  
  <link rel="stylesheet" href="<?php echo e(asset('assets/admin/css/bootstrap-toggle.min.css')); ?>">
  
  <link rel="stylesheet" href="<?php echo e(asset('assets/user/css/jquery.datetimepicker.min.css')); ?>">
  <script src="<?php echo e(asset('assets/admin/js/jquery-3.2.1.min.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/user/js/vue.js')); ?>"></script>
  
  <link href="<?php echo e(asset('assets/plugins/bootstrap-fileinput.css')); ?>" rel="stylesheet" type="text/css" />
  <?php echo $__env->yieldPushContent('styles'); ?>
  
  <?php echo $__env->yieldPushContent('nicedit-scripts'); ?>
