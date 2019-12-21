<?php $__env->startSection('content'); ?>
  <main class="app-content">
     <div class="app-title">
        <div>
           <h1>Category Management</h1>
        </div>
     </div>
     <div class="row">
        <div class="col-md-12">
           <div class="tile">
              <h3 class="tile-title float-left">Categories List</h3>
              <div class="float-right icon-btn">
                <a href="https://fontawesome.com/v4.7.0/icons/" target="_blank" class="btn btn-info">
                  <i class="fa fa-info"></i> Font Awesome Codes
                </a>
                 <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
                   <i class="fa fa-plus"></i> Add Category
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
                <?php if(count($cats) == 0): ?>
                  <h2 class="text-center">NO CATEGORY FOUND</h2>
                <?php else: ?>
                  <table class="table">
                     <thead>
                        <tr>
                           <th scope="col">SL</th>
                           <th scope="col">Name</th>
                           <th scope="col">Status</th>
                           <th>Subcategories</th>
                           <th scope="col">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                          <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                               <td><?php echo e($key+1); ?></td>
                               <td><?php echo e($cat->name); ?></td>
                               <td>
                                 <?php if($cat->status == 1): ?>
                                   <h4 style="display:inline-block;"><span class="badge badge-success">Active</span></h4>
                                 <?php elseif($cat->status == 0): ?>
                                   <h4 style="display:inline-block;"><span class="badge badge-danger">Deactive</span></h4>
                                 <?php endif; ?>
                               </td>
                               <td>
                                 <a href="<?php echo e(route('admin.subcategory.index', $cat->id)); ?>" class="btn btn-info"><i class="fa fa-eye"></i> View</a>
                               </td>
                               <td>
                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal<?php echo e($cat->id); ?>">Edit</button>
                               </td>
                            </tr>
                            <?php if ($__env->exists('admin.category.partials.edit')) echo $__env->make('admin.category.partials.edit', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </tbody>
                  </table>
                <?php endif; ?>
              </div>

              <div class="text-center">
                <?php echo e($cats->links()); ?>

              </div>
           </div>
        </div>
     </div>
  </main>

  
  <?php if ($__env->exists('admin.category.partials.add')) echo $__env->make('admin.category.partials.add', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>