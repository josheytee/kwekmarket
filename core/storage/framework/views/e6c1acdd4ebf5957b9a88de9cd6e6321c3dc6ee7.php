<?php $__env->startSection('content'); ?>
  <main class="app-content">
     <div class="app-title">
        <div>
           <h3 class="page-title uppercase bold">
             <?php if(request()->path() == 'admin/flashsale/all'): ?>
                 All
             <?php elseif(request()->path() == 'admin/flashsale/pending'): ?>
                 Pending
             <?php elseif(request()->path() == 'admin/flashsale/accepted'): ?>
                 Accepted
             <?php elseif(request()->path() == 'admin/flashsale/rejected'): ?>
                 Rejected
             <?php endif; ?> Requests
           </h3>
        </div>
        <ul class="app-breadcrumb breadcrumb">
           <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
           <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
        </ul>
     </div>
     <div class="row">
        <div class="col-md-12">
            <div class="tile">

              <?php if(count($products) == 0): ?>
                <h1 class="text-center"> NO PRODUCT FOUND !</h1>
              <?php else: ?>
                <table class="table table-bordered" style="width:100%;">
                  <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Vendor</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                          <td class="padding-top-40"><a href="<?php echo e(route('user.product.details', [$product->slug, $product->id])); ?>"><?php echo e(strlen($product->title) > 40 ? substr($product->title, 0, 40) . '...' : $product->title); ?></a></td>
                          <td class="padding-top-40"><a href="<?php echo e(route('admin.vendorDetails', $product->vendor->id)); ?>"><?php echo e($product->vendor->shop_name); ?></a></td>
                          <td class="padding-top-40"><?php echo e($product->vendor->email); ?></td>
                          <td class="padding-top-40"><?php echo e($product->vendor->phone); ?></td>
                          <td class="padding-top-40"><?php echo e($product->flash_type == 1 ? 'Percentage' : 'Fixed'); ?></td>
                          <td class="padding-top-40"><?php echo e($product->flash_amount); ?> <?php echo e($product->flash_type == 1 ? '%' : "$gs->base_curr_text"); ?></td>
                          <td class="padding-top-40"><?php echo e($product->flash_date); ?></td>
                          <td class="padding-top-40"><?php echo e(\App\FlashInterval::find($product->flash_interval)->start_time ." - ". \App\FlashInterval::find($product->flash_interval)->end_time); ?></td>
                          <td class="padding-top-40">
                            <?php if($product->flash_status == 0): ?>
                              <strong class="badge badge-warning">Pending</strong>
                            <?php elseif($product->flash_status == 1): ?>
                              <strong class="badge badge-success">Accepted</strong>
                            <?php else: ?>
                              <strong class="badge badge-danger">Rejected</strong>
                            <?php endif; ?>
                          </td>
                          <td class="padding-top-40">
                            <?php if($product->flash_status == 0): ?>
                              <a href="#" onclick="changeStatus(event, -1, <?php echo e($product->id); ?>)"><i class="fa fa-times text-danger"></i></a>
                              <a href="#" onclick="changeStatus(event, 1, <?php echo e($product->id); ?>)"><i class="fa fa-check text-success"></i></a>
                            <?php elseif($product->flash_status == 1): ?>
                              <a href="#" onclick="changeStatus(event, -1, <?php echo e($product->id); ?>)"><i class="fa fa-times text-danger"></i></a>
                            <?php else: ?>
                              <a href="#" onclick="changeStatus(event, 1, <?php echo e($product->id); ?>)"><i class="fa fa-check text-success"></i></a>
                            <?php endif; ?>

                          </td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              <?php endif; ?>

               <!-- print pagination -->
               <div class="row">
                 <div class="col-md-12">
                   <div class="text-center">
                      <?php echo e($products->appends(['term' => $term])->links()); ?>

                   </div>
                 </div>
               </div>
               <!-- row -->
        </div>
     </div>
   </div>
  </main>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('js-scripts'); ?>
  <script>
    function changeStatus(e, status, id) {
      e.preventDefault();
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
        url: '<?php echo e(route('admin.flashsale.changestatus')); ?>',
        type: 'POST',
        data: {
          id: id,
          status: status
        },
        success: function(data) {
          console.log(data);
          if (data == "success") {
            window.location = '<?php echo e(url()->full()); ?>';
          }
        }
      })
    }
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>