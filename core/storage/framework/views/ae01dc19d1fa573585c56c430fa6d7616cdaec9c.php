<?php $__env->startSection('title', 'Vendor Login'); ?>

<?php $__env->startSection('headertxt'); ?>
  Vendor Login
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <!-- login page content area start -->
  <div class="login-page-content-area">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <?php if(session()->has('missmatch')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding: 40px;font-size: 20px;">
                      <?php echo e(session('missmatch')); ?>

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
                                      <h4 class="title">Log in to <?php echo e($gs->website_title); ?></h4>
                                  </div>
                                  <div class="bottom-content">

                                    <div class="bottom-content">
                                        <?php echo $gs->vendor_login_text; ?>

                                    </div>
                                  </div>
                                  <p><strong>Don't have an account yet? <a style="color:red;font-weight:bold;" href="<?php echo e(route('vendor.showRegForm')); ?>">Click here</a> to create one</strong></p>
                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="right-contnet-area">
                                  <div class="top-content">
                                      <h4 class="title">Account Login</h4>
                                  </div>
                                  <div class="bottom-content">
                                      <form action="<?php echo e(route('vendor.authenticate')); ?>" method="post" class="login-form">
                                        <?php echo e(csrf_field()); ?>

                                          <div class="form-element">
                                              <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="input-field" placeholder="Enter Email">
                                              <?php if($errors->has('email')): ?>
                                                <p class="text-danger"><?php echo e($errors->first('email')); ?></p>
                                              <?php endif; ?>
                                          </div>
                                          <div class="form-element">
                                              <input type="password" name="password" class="input-field" placeholder="Enter Password">
                                              <?php if($errors->has('password')): ?>
                                                <p class="text-danger"><?php echo e($errors->first('password')); ?></p>
                                              <?php endif; ?>
                                          </div>
                                          <div class="btn-wrapper">
                                              <button type="submit" class="submit-btn">Login</button>
                                              <a href="<?php echo e(route('vendor.showEmailForm')); ?>" class="link">Forget password?</a>
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