<?php $__env->startPush('nicedit-scripts'); ?>
  <script src="<?php echo e(asset('assets/nic-edit/nicEdit.js')); ?>" type="text/javascript"></script>
  <script type="text/javascript">
    bkLib.onDomLoaded(function() {
      new nicEditor({iconsPath : '<?php echo e(asset('assets/nic-edit/nicEditorIcons.gif')); ?>', fullPanel : true}).panelInstance('user');
    });
  </script>
  <script type="text/javascript">
    bkLib.onDomLoaded(function() {
      new nicEditor({iconsPath : '<?php echo e(asset('assets/nic-edit/nicEditorIcons.gif')); ?>', fullPanel : true}).panelInstance('vendor');
    });
  </script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  <main class="app-content">
     <div class="app-title">
        <div>
           <h1>Login Page Text</h1>
        </div>
     </div>
     <div class="row">
        <div class="col-md-12">
           <div class="tile">
              <div class="tile-body">
                 <form role="form" method="POST" action="<?php echo e(route('admin.logintext.update')); ?>" enctype="multipart/form-data">
                    <div class="form-body">
                       <?php echo e(csrf_field()); ?>

                       <div class="form-group">
                          <label><strong>User Login Text</strong></label>
                          <textarea class="form-control" name="user_login_text" id="user" rows="10"><?php echo e($gs->user_login_text); ?></textarea>
                          <?php if($errors->has('user_login_text')): ?>
                            <span style="color:red;"><?php echo e($errors->first('user_login_text')); ?></span>
                          <?php endif; ?>
                       </div>
                       <div class="form-group">
                          <label><strong>Vendor Login Text</strong></label>
                          <textarea class="form-control" name="vendor_login_text" id="vendor" rows="10"><?php echo e($gs->vendor_login_text); ?></textarea>
                          <?php if($errors->has('vendor_login_text')): ?>
                            <span style="color:red;"><?php echo e($errors->first('vendor_login_text')); ?></span>
                          <?php endif; ?>
                       </div>
                    </div>
                    <div class="form-actions">
                       <button type="submit" class="btn btn-primary btn-block btn-lg">Update</button>
                    </div>
                 </form>
              </div>
           </div>
        </div>
     </div>
  </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>