<?php $__env->startSection('content'); ?>
  <main class="app-content">
     <div class="app-title">
        <div>
           <h1>Option Management</h1>
        </div>
     </div>
     <div class="row">
        <div class="col-md-12">
           <div class="tile">
              <h3 class="tile-title pull-left">All Options of <strong><?php echo e($pa->name); ?></strong></h3>
              <div class="pull-right icon-btn">
                <a class="btn btn-warning" href="<?php echo e(route('admin.productattr.index')); ?>">
                  <i class="fa fa-list"></i> All Product Attributes
                </a>
                <a class="btn btn-info" data-toggle="modal" data-target="#addSub<?php echo e($pa->id); ?>">
                  <i class="fa fa-plus"></i> Add Option
                </a>
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
                <?php if(count($options) == 0): ?>
                  <h2 class="text-center">NO DATA FOUND</h2>
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
                          <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                               <td><?php echo e($key+1); ?></td>
                               <td><?php echo e($option->name); ?></td>
                               <td>
                                 <?php if($option->status == 1): ?>
                                   <h4 style="display:inline-block;"><span class="badge badge-success">Active</span></h4>
                                 <?php elseif($option->status == 0): ?>
                                   <h4 style="display:inline-block;"><span class="badge badge-danger">Deactive</span></h4>
                                 <?php endif; ?>
                               </td>
                               <td>
                                 <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal<?php echo e($option->id); ?>">Edit</button>
                               </td>
                            </tr>
                            <?php if ($__env->exists('admin.options.partials.edit')) echo $__env->make('admin.options.partials.edit', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </tbody>
                  </table>
                <?php endif; ?>
              </div>

              <div class="text-center">
                <?php echo e($options->links()); ?>

              </div>
           </div>
        </div>
     </div>
  </main>

  <?php if ($__env->exists('admin.options.partials.add')) echo $__env->make('admin.options.partials.add', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>