<?php $__env->startSection('title', 'Vendor Register'); ?>

<?php $__env->startSection('headertxt'); ?>
  Vendor Signup
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
  <!-- login page content area start -->
  <div class="login-page-content-area">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <?php if(session()->has('message')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="padding: 40px;font-size: 20px;">
                      <strong>Success!</strong> <?php echo e(session('message')); ?>

                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php endif; ?>

                  <div class="signup-page-wrapper"><!-- login page wrapper -->
                      <div class="or">
                          <span>or</span>
                      </div>
                      <div class="row">
                           <div class="col-lg-6">
                              <div class="left-content-area" style="padding: 80px;">
                                  <div class="top-content">
                                      <h4 class="title">Signup to <?php echo e($gs->website_title); ?></h4>
                                  </div>
                                  <div class="bottom-content">
                                    <?php echo $gs->vendor_register_text; ?>

                                  </div>
                                  <p>Already have account? <a style="color:red;font-weight:bold;" href="<?php echo e(route('vendor.login')); ?>">Click here</a> to login</p>
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="right-contnet-area">
                                  <div class="top-content">
                                      <h4 class="title">Signup Today</h4>
                                  </div>
                                  <div class="bottom-content">
                                      <form action="<?php echo e(route('vendor.reg')); ?>" method="post" class="login-form">
                                          <?php echo e(csrf_field()); ?>

                                          <div class="form-element">
                                              <input type="email" name="email" class="input-field" value="<?php echo e(old('email')); ?>" placeholder="Enter Email">
                                              <?php if($errors->has('email')): ?>
                                                <p class="text-danger"><?php echo e($errors->first('email')); ?></p>
                                              <?php endif; ?>
                                          </div>
                                          <div class="form-element">
                                              <input type="text" name="shop_name" class="input-field" value="<?php echo e(old('shop_name')); ?>" placeholder="Enter Online Shop Name">
                                              <?php if($errors->has('shop_name')): ?>
                                                <p class="text-danger"><?php echo e($errors->first('shop_name')); ?></p>
                                              <?php endif; ?>
                                          </div>
                                          <div class="form-element">
                                              <input type="text" name="phone" class="input-field" value="<?php echo e(old('phone')); ?>" placeholder="Enter Phone Number">
                                              <?php if($errors->has('phone')): ?>
                                                <p class="text-danger"><?php echo e($errors->first('phone')); ?></p>
                                              <?php endif; ?>
                                          </div>
                                          <div class="form-element">
                                              <input type="password" name="password" class="input-field" placeholder="Enter Password">
                                              <?php if($errors->has('password')): ?>
                                                <p class="text-danger"><?php echo e($errors->first('password')); ?></p>
                                              <?php endif; ?>
                                          </div>
                                          <div class="form-element">
                                              <input type="password" name="password_confirmation" class="input-field" placeholder="Enter Password Again">
                                          </div>
                                          <div class="btn-wrapper">
                                              <button type="submit" class="submit-btn">signup</button>
                                              <a href="<?php echo e(route('vendor.login')); ?>" class="link">Already have account?</a>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div><!-- //.login page wrapper -->
              </div>
          </div>
      </div>
  </div>
  <!-- login page content area end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>