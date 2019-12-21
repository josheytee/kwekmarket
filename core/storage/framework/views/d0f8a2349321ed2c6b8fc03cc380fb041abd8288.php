<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="" action="<?php echo e(route('admin.subcategory.store')); ?>" method="post">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Subcategory</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <?php echo e(csrf_field()); ?>

              <input type="hidden" name="category_id" value="<?php echo e($category->id); ?>">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <strong>Subcategory Name</strong>
                      <input type="text" value="<?php echo e(old('name')); ?>" class="form-control" id="name" name="name" placeholder="Enter Subcategory Name" >
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <strong>Attributes (Optional)</strong>
                      <div class="">
                        <?php $__currentLoopData = $pas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" name="attributes[]" type="checkbox" id="pa<?php echo e($pa->id); ?>" value="<?php echo e($pa->id); ?>">
                            <label class="form-check-label" for="pa<?php echo e($pa->id); ?>"><?php echo e($pa->name); ?></label>
                          </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">ADD</button>
          </div>
      </form>
    </div>
  </div>
</div>
