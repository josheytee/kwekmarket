<?php $__env->startSection('content'); ?>
  <main class="app-content">
     <div class="app-title">
        <div>
           <h1><i class="fa fa-dashboard"></i> Package Setting</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
           <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
           <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
        </ul>
     </div>
     <div class="row">
        <div class="col-md-12">
           <div class="tile">
              <h3 class="tile-title float-left">Subscription Packcages</h3>
              <div class="float-right icon-btn">
                 <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
                   <i class="fa fa-plus"></i> Add Package
                 </button>
              </div>
              <p style="clear:both;margin:0px;"></p>
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
              </div>
              <div class="table-responsive">
                <?php if(count($packages) == 0): ?>
                  <h2 class="text-center">NO PACKAGES FOUND</h2>
                <?php else: ?>
                  <table class="table">
                     <thead>
                        <tr>
                           <th scope="col">SL</th>
                           <th scope="col">Title</th>
                           <th scope="col">Short Description</th>
                           <th scope="col">Price</th>
                           <th scope="col">Products</th>
                           <th scope="col">Validity (days)</th>
                           <th scope="col">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                          <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                               <td><?php echo e($key+1); ?></td>
                               <td><?php echo e($package->title); ?></td>
                               <td><?php echo e($package->s_desc); ?></td>
                               <td><?php echo e($package->price); ?></td>
                               <td><?php echo e($package->products); ?></td>
                               <td><?php echo e($package->validity); ?></td>
                               <td>
                                 <?php if($package->status == 1): ?>
                                   <button type="button" class="btn btn-success btn-sm">Active</button>
                                 <?php else: ?>
                                   <button type="button" class="btn btn-danger btn-sm">Deactive</button>
                                 <?php endif; ?>
                               </td>
                               <td>
                                 <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#editModal<?php echo e($package->id); ?>">Edit</button>
                               </td>
                            </tr>
                            <?php if ($__env->exists('admin.packages.partials.edit')) echo $__env->make('admin.packages.partials.edit', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                     </tbody>
                  </table>
                <?php endif; ?>
              </div>
           </div>
        </div>
     </div>
  </main>

  
  <?php if ($__env->exists('admin.packages.partials.add')) echo $__env->make('admin.packages.partials.add', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>