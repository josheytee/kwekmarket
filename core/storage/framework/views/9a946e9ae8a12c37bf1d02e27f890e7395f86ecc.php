<!-- Modal -->
<div class="modal fade" id="addSub<?php echo e($pa->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="" action="<?php echo e(route('admin.options.store')); ?>" method="post">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Options under <strong><?php echo e($pa->name); ?></strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <?php echo e(csrf_field()); ?>

              <div class="form-group">
                <input type="hidden" name="product_attribute_id" value="<?php echo e($pa->id); ?>">
                <div class="row">
                  <div class="col-md-12 mb-10">
                     <strong>Option Name</strong>
                     <input type="text" value="" class="form-control" id="name" name="name" placeholder="Enter option name" >
                  </div>
                  <div class="col-md-12 mb-10">
                    <strong>Status</strong>
                    <select class="form-control" name="status">
                      <option value="1">Active</option>
                      <option value="0">Deactive</option>
                    </select>
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
