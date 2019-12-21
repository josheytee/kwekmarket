<?php $__env->startSection('content'); ?>
  <main class="app-content">
     <div class="app-title">
        <div>
           <h1><i class="fa fa-dashboard"></i> All Vendors Management</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
           <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
           <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
        </ul>
     </div>
     <div class="row">
        <div class="col-md-12">
          <?php if(count($vendors) == 0): ?>
          <div class="tile">
            <h3 class="tile-title float-left">Vendors List</h3>
            <div class="float-right icon-btn">
               <form method="GET" class="form-inline" action="<?php echo e(route('admin.allVendorsSearchResult')); ?>">
                  <input type="text" name="term" class="form-control" placeholder="Search by shop name" value="<?php echo e(request()->input('term')); ?>">
                  <button class="btn btn-outline btn-circle  green" type="submit"><i
                     class="fa fa-search"></i></button>
               </form>
            </div>
            <p style="clear:both;margin:0px;"></p>
            <h2 class="text-center">NO VENDOR FOUND</h2>
          </div>
          <?php else: ?>
          <div class="tile">
             <h3 class="tile-title float-left">Vendors List</h3>
             <div class="float-right icon-btn">
                <form method="GET" class="form-inline" action="<?php echo e(route('admin.allVendorsSearchResult')); ?>">
                   <input type="text" name="term" class="form-control" placeholder="Search by shop name" value="<?php echo e(request()->input('term')); ?>">
                   <button class="btn btn-outline btn-circle  green" type="submit"><i
                      class="fa fa-search"></i></button>
                </form>
             </div>
             <div class="table-responsive">
                <table class="table">
                   <thead>
                      <tr>
                         <th scope="col">Email</th>
                         <th scope="col">Shop Name</th>
                         <th scope="col">Mobile</th>
                         <th scope="col">Balance</th>
                         <th scope="col">Details</th>
                      </tr>
                   </thead>
                   <tbody>
                     <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>
                        <td data-label="Email"><?php echo e($vendor->email); ?></td>
                        <td data-label="Username"><a target="_blank" href="<?php echo e(route('admin.vendorDetails', $vendor->id)); ?>"><?php echo e($vendor->shop_name); ?></a></td>
                        <td data-label="Mobile"><?php echo e($vendor->phone); ?></td>
                        <td data-label="Balance"><?php echo e(round($vendor->balance, $gs->dec_pt)); ?> <?php echo e($gs->base_curr_text); ?></td>
                        <td  data-label="Details">
                           <a href="<?php echo e(route('admin.vendorDetails', $vendor->id)); ?>"
                              class="btn btn-outline-primary ">
                           <i class="fa fa-eye"></i> View </a>
                        </td>
                     </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   </tbody>
                </table>
             </div>
             <div class="text-center">
               <?php echo e($vendors->appends(['term' => $term])->links()); ?>

             </div>
          </div>
          <?php endif; ?>
        </div>
     </div>
  </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>