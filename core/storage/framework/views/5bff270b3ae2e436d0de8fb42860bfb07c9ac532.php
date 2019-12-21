<?php $__env->startPush('styles'); ?>
  <style media="screen">
  h2, h3, h4 {
    margin: 0px;
  }
  .widget-small {
    margin-bottom: 0px;
    border: 1px solid #f1f1f1;
  }
  .info h4 {
    font-size: 14px !important;
  }
  </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  <main class="app-content">
     <div class="app-title">
        <div>
           <h1><i class="fa fa-money"></i> ADD / SUBSTRUCT BALANCE</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
           <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
           <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
        </ul>
     </div>
     <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-md-9">
                <div class="card">
                  <div class="card-header bg-primary">
                    <h3 style="color:white;"><i class="fa fa-money"></i> ADD / SUBSTRUCT BALANCE</h3>
                  </div>
                  <div class="card-body">
                    <form class="" action="<?php echo e(route('admin.updateVendorBalance')); ?>" method="post">
                      <?php echo e(csrf_field()); ?>

                      <input type="hidden" name="vendorID" value="<?php echo e($vendor->id); ?>">
                      <div class="row">
                        <div class="col-md-4">
                           <label><strong>OPERATION</strong></label>
                           <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                              data-width="100%" type="checkbox" data-on="ADD MONEY" data-off="SUBTRACT MONEY" <?php echo e((old('operation')=='on')?'checked':''); ?>

                              name="operation">
                        </div>
                        <div class="col-md-8">
                          <label for=""><strong>AMOUNT</strong></label>
                          <div class="input-group mb-3">
                            <input name="amount" type="text" value="<?php echo e(old('amount')); ?>" class="form-control" placeholder="Enter Amount" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                              <span class="input-group-text" id="basic-addon2"><?php echo e($gs->base_curr_text); ?></span>
                            </div>
                          </div>
                          <?php if($errors->has('amount')): ?>
                             <p class="text-danger"><?php echo e($errors->first('amount')); ?></p>
                          <?php endif; ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <label for=""><strong>MESSAGE</strong></label>
                          <textarea name="message" class="form-control" placeholder="if any" rows="2" cols="80"><?php echo e(old('message')); ?></textarea>
                        </div>
                      </div><br>
                      <div class="row">
                        <div class="col-md-12">
                          <input class="btn btn-block btn-primary" type="submit" value="SUBMIT">
                        </div>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card border-primary">
                  <div class="card-header border-primary bg-primary">
                    <h5 style="color:white;"><i class="fa fa-money"></i> CURRENT BALANCE</h5>
                  </div>
                  <div class="card-body text-center">
                    <h2>CURRENT BALANCE OF</h2>
                    <h2><strong><?php echo e($vendor->shop_name); ?></strong></h2>
                    <br>
                    <h2><strong><?php echo e($vendor->balance); ?> <?php echo e($gs->base_curr_text); ?></strong></h2>
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