<!DOCTYPE html>
<html lang="en">
<head>
  <?php if ($__env->exists('layout.partials.head')) echo $__env->make('layout.partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</head>

<body>
  <a href="#">
    <img src="<?php echo e(asset('assets/custom/top-bar-add.gif')); ?>" alt="" style="width:100%">
  </a>
  <div id="app">
    <?php if ($__env->exists('layout.partials.gennavbar')) echo $__env->make('layout.partials.gennavbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php if(request()->path() == '/'): ?>
      <?php echo $__env->yieldContent('headerarea'); ?>
    <?php elseif(request()->is('shop_page/*')): ?>
      <!-- breadcrumb area start -->
      <section class="breadcrumb-area breadcrumb-bg extra shop-page-breadcrumb">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="shop-breadcrumb-inner"><!-- breadcrumb inner -->
                        <div class="left-shop-header">
                          <div class="logo-wrapper">
                            <img class="shop-logo" src="<?php echo e(asset('assets/user/img/shop-logo/'.$vendor->logo)); ?>" alt="">
                          </div>
                          <div class="shop-name-wrapper">
                            <h3 class="shop-name text-white"><?php echo e($vendor->shop_name); ?></h3>
                          </div>
                        </div>
                        <div class="right-shop-header">
                          <form method="get" action="<?php echo e(url('/').'/shop_page'.'/'.$vendorid.'/'.Request::route('category').'/'.Request::route('subcategory')); ?>">
                            <input type="text" name="term" value="<?php echo e($term); ?>" placeholder="Search this vendor's products">
                            <button type="submit"><i class="fa fa-search"></i></button>
                          </form>
                        </div>
                      </div><!-- //. breadcrumb inner -->
                  </div>
              </div>
          </div>
      </section>
      <!-- breadcrumb area end -->

    <?php else: ?>
      <?php if ($__env->exists('layout.partials.genheader')) echo $__env->make('layout.partials.genheader', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <div>
      <?php echo $__env->yieldContent('content'); ?>
    </div>

    <?php if($gs->home_style == 'home2'): ?>
      <?php if ($__env->exists('layout.partials.footer2')) echo $__env->make('layout.partials.footer2', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php else: ?>
      <?php if ($__env->exists('layout.partials.footer')) echo $__env->make('layout.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>

    <?php if ($__env->exists('layout.partials.preloader_bt')) echo $__env->make('layout.partials.preloader_bt', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </div>


  <?php if ($__env->exists('layout.partials.scripts')) echo $__env->make('layout.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  <?php echo $__env->yieldPushContent('scripts'); ?>
  <?php echo $__env->yieldContent('paymentscripts'); ?>
</body>
