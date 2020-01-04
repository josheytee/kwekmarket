<?php $__env->startSection('content'); ?>
  <main class="app-content">
     <div class="app-title">
        <div class="row" style="width:100%">
          <div class="col-md-6">
            <h1 class="float-left">Coupon Lists</h1>
          </div>
          <div class="col-md-6">
            <a href="<?php echo e(route('admin.coupon.create')); ?>" class="btn btn-primary float-right">Add Coupon</a>
          </div>
        </div>
     </div>

     <div class="row">
        <div class="col-md-12">
           <div class="tile">
              <div class="tile-body">
                <?php if(count($coupons) == 0): ?>
                  <h4 class="text-center">NO COUPON FOUND</h4>
                <?php else: ?>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Code</th>
                        <th scope="col">Type</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Minimum Amount</th>
                        <th scope="col">Valid Till</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <th scope="row"><?php echo e($coupon->coupon_code); ?></th>
                          <td><?php echo e($coupon->coupon_type); ?></td>
                          <td><?php echo e($coupon->coupon_amount); ?></td>
                          <td><?php echo e($coupon->coupon_min_amount); ?></td>
                          <td><?php echo e($coupon->valid_till); ?></td>
                          <td>
                            <a href="<?php echo e(route('admin.coupon.edit', $coupon->id)); ?>" class="btn btn-info">Edit</a>
                            <form class="d-inline-block" action="<?php echo e(route('admin.coupon.delete', $coupon->id)); ?>" method="post">
                              <?php echo e(csrf_field()); ?>

                              <input type="hidden" name="coupon_id" value="<?php echo e($coupon->id); ?>">
                              <input class="btn btn-danger" type="submit" value="Delete">
                            </form>
                          </td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                  </table>
                <?php endif; ?>

              </div>
           </div>
        </div>
     </div>
  </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>