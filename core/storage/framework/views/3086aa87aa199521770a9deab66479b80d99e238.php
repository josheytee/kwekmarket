<?php $__env->startSection('content'); ?>
  <main class="app-content">
     <div class="app-title">
        <div>
           <h1>Transaction Log</h1>
        </div>
     </div>
     <div class="row">
        <div class="col-md-12">
          <?php if(count($trs) == 0): ?>
            <div class="tile">
              <h2 class="text-center">NO TRANSACTIONS FOUND</h2>
            </div>
          <?php else: ?>
            <div class="tile">
               <div class="table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th>Serial</th>
                           <th scope="col">Shop Name</th>
                           <th scope="col">Details</th>
                           <th scope="col">Amount</th>
                           <th scope="col">Transaction ID</th>
                           <th scope="col">After Balance</th>
                        </tr>
                     </thead>
                     <tbody>
                       <?php
                         $i = 0;
                       ?>
                       <?php $__currentLoopData = $trs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <tr>
                           <td><?php echo e(++$i); ?></td>
                            <td data-label="Name"><a target="_blank" href="<?php echo e(route('admin.vendorDetails', $tr->vendor_id)); ?>"><?php echo e($tr->vendor->shop_name); ?></a></td>
                            <td data-label="Email"><?php echo $tr->details; ?></td>
                            <td data-label="Username"><?php echo e($tr->amount); ?> <?php echo e($gs->base_curr_text); ?></td>
                            <td data-label="Mobile"><?php echo e($tr->trx_id); ?> <?php echo e($gs->base_curr_text); ?></td>
                            <td data-label="Balance"><?php echo e($tr->after_balance); ?> <?php echo e($gs->base_curr_text); ?></td>
                         </tr>
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </tbody>
                  </table>
               </div>
               <div class="text-center">
                 <?php echo e($trs->links()); ?>

               </div>
            </div>
          <?php endif; ?>
        </div>
     </div>
  </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>