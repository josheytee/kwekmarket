<?php $__env->startPush('styles'); ?>
<style media="screen">
  h3 {
    margin: 0px;
  }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  <main class="app-content">
     <div class="app-title">
        <div>
           <h1>Logo & Icon Setting</h1>
        </div>
     </div>
     <div class="row">
        <div class="col-md-12">

          <div class="tile">
            <div class="row">
              <?php if($errors->any()): ?>
                  <div class="alert alert-danger">
                      <ul>
                          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <li><?php echo e($error); ?></li>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </ul>
                  </div>
              <?php endif; ?>
              <div class="col-md-3">
                <div class="card">
                  <div class="card-header bg-primary">
                    <h3 style="color:white"><i class="fa fa-cog"></i> Change Images</h3>
                  </div>
                  <div class="card-body">
                    <form action="<?php echo e(route('admin.logoIcon.update')); ?>" method="post" enctype="multipart/form-data">
                      <?php echo e(csrf_field()); ?>

                       <div class="row">
                         <div class="col-md-12">
                           <div class="form-group">
                              <label class="col-md-12"><strong style="text-transform: uppercase;">Header Logo</strong></label>
                              <div class="col-sm-12"><input name="logo" type="file" id="logo"></div>
                              <p class="col-md-12"><strong>[Upload 190 X 49 image for best quality]</strong></p>
                              <label class="col-md-12"><strong style="text-transform: uppercase;">Footer Logo</strong></label>
                              <div class="col-sm-12"><input name="footer_logo" type="file" id="footerLogo"></div>
                              <p class="col-md-12"><strong>[Upload 190 X 49 image for best quality]</strong></p>
                           </div>
                         </div>

                          <br>
                          <br>
                          <br>

                          <div class="col-md-12">
                            <div class="form-group">
                               <label class="col-md-12"><strong style="text-transform: uppercase;">favicon</strong></label>
                               <div class="col-sm-12"><input name="icon" type="file" id="icon"></div>
                               <p class="col-md-12"><strong>[Upload 25 X 25 image for best quality]</strong></p>

                            </div>
                          </div>

                          <br>
                          <br>
                          <br>
                          <div class="col-md-12">
                            <div class="form-group">
                               <div class="col-sm-12"> <button type="submit" class="btn btn-primary btn-block">UPLOAD</button></div>
                            </div>
                          </div>

                       </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card">
                  <div class="card-header bg-primary">
                    <h3 style="color:white"><i class="fa fa-desktop"></i> Current Icon</h3>
                  </div>
                  <div class="card-body">
                    <img style="max-width:100%;" src="<?php echo e(asset('assets/user/interfaceControl/logoIcon/icon.jpg')); ?>" alt="">
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card">
                  <div class="card-header bg-primary">
                    <h3 style="color:white"><i class="fa fa-desktop"></i> Header Logo</h3>
                  </div>
                  <div class="card-body">
                    <img style="max-width:100%;" src="<?php echo e(asset('assets/user/interfaceControl/logoIcon/logo.jpg')); ?>" alt="">
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card">
                  <div class="card-header bg-primary">
                    <h3 style="color:white"><i class="fa fa-desktop"></i> Footer Logo</h3>
                  </div>
                  <div class="card-body">
                    <img style="max-width:100%;" src="<?php echo e(asset('assets/user/interfaceControl/logoIcon/footer_logo.jpg')); ?>" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
     </div>
  </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>