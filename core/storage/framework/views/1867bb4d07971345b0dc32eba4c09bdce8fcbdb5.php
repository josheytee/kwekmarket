<?php $__env->startSection('title', 'Password Reset Email'); ?>

<?php $__env->startSection('headertxt', 'Email Form'); ?>


<?php $__env->startSection('content'); ?>
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3 email-form">

        <div class="card">
          <div class="card-header base-bg">
            <h3 class="mb-0 text-white">Email Form</h3>
          </div>
          <div class="card-body">
            <?php if(session()->has('email_not_available')): ?>
              <div class="alert alert-danger">
                <?php echo e(session('email_not_available')); ?>

              </div>
            <?php endif; ?>
            <?php if(session()->has('message')): ?>
              <div class="alert alert-success">
                <?php echo e(session('message')); ?>

              </div>
            <?php endif; ?>

            <form id="sendResetPassMailForm" action="<?php echo e(route('vendor.sendResetPassMail')); ?>" class="" method="post">
              <?php echo e(csrf_field()); ?>

              <div class="form-element square login">
                  <div class="form-element margin-bottom-20">
                      <label>Email <span>**</span></label>
                      <input style="border: 1px solid #ddd;" name="resetEmail" type="text" class="input-field" placeholder="Enter your mail address...">
                  </div>
                  <?php if($errors->has('resetEmail')): ?>
                    <p class="text-danger"><?php echo e($errors->first('resetEmail')); ?></p>
                  <?php endif; ?>
              </div>
              <div class="btn-wrapper text-center">
                      <input type="submit" class="submit-btn" value="Send Mail">
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>