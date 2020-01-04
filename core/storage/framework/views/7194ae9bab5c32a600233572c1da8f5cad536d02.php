<!-- Modal -->
<div class="modal fade" id="editModal<?php echo e($package->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form class="" action="<?php echo e(route('admin.package.update')); ?>" method="post">
          <input type="hidden" name="packageID" value="<?php echo e($package->id); ?>">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Package</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <?php echo e(csrf_field()); ?>

              <div class="form-group">
                <div class="row">
                  <div class="col-md-12">
                     <strong>Package Title</strong>
                     <input type="text" value="<?php echo e($package->title); ?>" class="form-control" id="name" name="title" placeholder="Enter package title" >
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-12">
                     <strong>Short Description</strong>
                     <textarea class="form-control" name="s_desc" rows="3" cols="80" placeholder="Enter short description"><?php echo e($package->s_desc); ?></textarea>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-12">
                     <strong>Price</strong>
                     <input type="text" value="<?php echo e($package->price); ?>" class="form-control" id="name" name="price" placeholder="Enter price" >
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-12">
                     <strong>Products</strong>
                     <input type="number" value="<?php echo e($package->products); ?>" class="form-control" id="name" name="products" placeholder="Enter number of products" >
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-12">
                     <strong>Validity (in Days)</strong>
                     <input type="number" value="<?php echo e($package->validity); ?>" class="form-control" id="name" name="validity" placeholder="Enter number of valid days" >
                  </div>
                </div>
              </div>
              <div class="form-group">
                 <strong>Status</strong>
                 <select class="form-control" name="status">
                 <option value="1" <?php echo e($package->status == 1 ? 'selected' : ''); ?>>Active</option>
                 <option value="0" <?php echo e($package->status == 0 ? 'selected' : ''); ?>>Deactive</option>
                 </select>
              </div>

          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">UPDATE</button>
          </div>
      </form>
    </div>
  </div>
</div>
