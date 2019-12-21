<!DOCTYPE html>
<html lang="en">
  <head>
  <?php echo $__env->make('admin.layout.partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </head>

  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <?php if ($__env->exists('admin.layout.partials.topnavbar')) echo $__env->make('admin.layout.partials.topnavbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Sidebar menu-->
    <?php if ($__env->exists('admin.layout.partials.sidenavbar')) echo $__env->make('admin.layout.partials.sidenavbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>

    <!-- Essential javascripts for application to work-->
    <?php if ($__env->exists('admin.layout.partials.scripts')) echo $__env->make('admin.layout.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </body>
</html>
