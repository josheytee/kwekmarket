<?php $__env->startPush('styles'); ?>
<style media="screen">
  h3, h5 {
    margin: 0px;
  }
  .testimonial img {
    width: 100%;
  }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  <main class="app-content">
     <div class="app-title">
        <div>
           <h1>Slider Setting</h1>
        </div>
     </div>
     <div class="row">
        <div class="col-md-12">

          <div class="tile">
            <div class="row">

              <div class="col-md-12">
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <form action="<?php echo e(route('admin.slider.store')); ?>" method="post" enctype="multipart/form-data">
                  <?php echo e(csrf_field()); ?>

                   <div class="form-body">
                     <div class="form-group">
                        <label class="col-sm-12 control-label"><strong>Slider Image</strong></label>
                        <div class="col-sm-12"><input type="file" name="slider"></div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-12 control-label"><strong>Title</strong></label>
                        <div class="col-sm-12"><input type="text" name="title" class="form-control input-lg"></div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-12 control-label"><strong>Bold Text</strong></label>
                        <div class="col-sm-12"><input type="text" name="btxt" class="form-control input-lg"></div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-12 control-label"><strong>Small Text</strong></label>
                        <div class="col-sm-12"><input type="text" name="stxt" class="form-control input-lg"></div>
                     </div>
                     <div class="form-group">
                        <label class="col-sm-12 control-label"><strong>Url</strong></label>
                        <div class="col-sm-12"><input type="text" name="url" class="form-control input-lg"></div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <button type="submit" class="btn btn-primary btn-block">ADD NEW</button>
                        </div>
                     </div>
                   </div>
                </form>
              </div>

            </div>

            <br>

            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header bg-primary">
                    <h5 style="color:white;display:inline-block;">Sliders</h5>
                  </div>
                  <div class="card-body">
                      <?php if(count($sliders) == 0): ?>
                        <h3 class="text-center"> NO SLIDER FOUND</h3>
                      <?php else: ?>
                        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($loop->iteration % 3 == 1): ?>
                          <div class="row"> 
                          <?php endif; ?>
                          <div class="col-md-4">
                            <div class="card testimonial">
                              <div class="card-header bg-primary">
                                <h5 style="color:white">Slider Text</h5>
                              </div>
                              <div class="card-body text-center">
                                <img src="<?php echo e(asset('assets/user/interfaceControl/sliders/'.$slider->image)); ?>" alt="">
                                <p>
                                  <strong>Bold Text:</strong> <?php echo e($slider->bold_text); ?>

                                </p>
                                <p>
                                  <strong>Small Text:</strong> <?php echo e($slider->small_text); ?>

                                </p>
                                <p>
                                  <strong>Title:</strong> <?php echo e($slider->title); ?>

                                </p>
                                <p>
                                  <strong>URL:</strong> <?php echo e($slider->url); ?>

                                </p>
                              </div>
                              <div class="card-footer text-center">
                                <form action="<?php echo e(route('admin.slider.delete')); ?>" method="POST">
                                   <?php echo e(csrf_field()); ?>

                                   <input type="hidden" name="sliderID" value="<?php echo e($slider->id); ?>">
                                   <button style="color:white;" type="submit" class="btn btn-danger btn-block" name="button">
                                     <i class="fa fa-trash"></i>
                                     Delete
                                   </button>
                                 </form>

                              </div>
                            </div>
                          </div>
                          <?php if($loop->iteration % 3 == 0): ?>
                          </div> 
                          <br>
                          <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>

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