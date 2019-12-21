<?php $__env->startSection('content'); ?>
  <main class="app-content">
     <div class="app-title">
        <div>
           <h1>Subcategory Under <strong><?php echo e($category->name); ?></strong> Category</h1>
        </div>
     </div>
     <div class="row">
        <div class="col-md-12">
           <div class="tile">
              <h3 class="tile-title pull-left">Subcategories List</h3>
              <div class="pull-right icon-btn">
                 <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
                   <i class="fa fa-plus"></i> Add Subcategory
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
                <?php if(count($subcats) == 0): ?>
                  <h2 class="text-center">NO SUBCATEGORY FOUND</h2>
                <?php else: ?>
                  <table class="table">
                     <thead>
                        <tr>
                           <th scope="col">SL</th>
                           <th scope="col">Name</th>
                           <th scope="col">Status</th>
                           <th scope="col">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                          <?php $__currentLoopData = $subcats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                               <td><?php echo e($key+1); ?></td>
                               <td><?php echo e($subcat->name); ?></td>
                               <td>
                                 <?php if($subcat->status == 1): ?>
                                   <h4 style="display:inline-block;"><span class="badge badge-success">Active</span></h4>
                                 <?php elseif($subcat->status == 0): ?>
                                   <h4 style="display:inline-block;"><span class="badge badge-danger">Deactive</span></h4>
                                 <?php endif; ?>
                               </td>
                               <td>
                                 <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal<?php echo e($subcat->id); ?>"><i class="fa fa-pencil-square"></i> Edit</button>
                               </td>
                            </tr>
                            <?php if ($__env->exists('admin.subcategory.partials.edit')) echo $__env->make('admin.subcategory.partials.edit', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </tbody>
                  </table>
                <?php endif; ?>
              </div>

           </div>
        </div>
     </div>
  </main>

  <?php if ($__env->exists('admin.subcategory.partials.add')) echo $__env->make('admin.subcategory.partials.add', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>