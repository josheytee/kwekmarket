<!-- Modal -->
<div class="modal fade" id="editModal<?php echo e($cat->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="" action="<?php echo e(route('admin.category.update')); ?>" method="post">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <?php echo e(csrf_field()); ?>

              <input type="hidden" name="statusId" value="<?php echo e($cat->id); ?>">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-12 mb-10">
                     <strong>Category Name</strong>
                     <input type="text" value="<?php echo e($cat->name); ?>" class="form-control" id="name" name="name" placeholder="Enter category name" >
                  </div>
                  <div class="col-md-12 mb-10">
                    <strong>Status</strong>
                    <select class="form-control" name="status">
                      <option value="1" <?php echo e(($cat->status==1) ? 'selected' : ''); ?>>Active</option>
                      <option value="0" <?php echo e(($cat->status==0) ? 'selected' : ''); ?>>Deactive</option>
                    </select>
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">UPDATE</button>
          </div>
      </form>
    </div>
  </div>
</div>
