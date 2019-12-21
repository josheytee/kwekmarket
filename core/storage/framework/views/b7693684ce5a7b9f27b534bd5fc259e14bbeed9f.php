<?php $__env->startSection('title', 'Manage Products'); ?>

<?php $__env->startSection('headertxt', 'Manage Products'); ?>

<?php $__env->startPush('styles'); ?>
<style media="screen">
li.page-item {
  display: inline-block;
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  <!-- sellers product content area start -->
  <div class="sellers-product-content-area">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="seller-product-wrapper">
                      <div class="seller-panel">
                          <div class="card-header clearfix">
                                  <h4 style="padding-top: 15px;" class="d-inline-block text-white">YOUR PRODUCTS</h4>
                                  <a href="<?php echo e(route('vendor.product.create')); ?>" class="boxed-btn float-right">Add New Product</a>
                          </div>
                          <div class="sellers-product-inner">
                              <div class="bottom-content">
                                  <table class="table table-default" id="datatableOne">
                                      <thead>
                                          <tr>
                                              <th>Product</th>
                                              <th>Price</th>
                                              <th>quantity left</th>
                                              <th>Total Earnings</th>
                                              <th>Sales</th>
                                              <th>&nbsp;</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <?php
                                            $totalearning = \App\Orderedproduct::where('shipping_status', 2)
                                                                  ->where('refunded', '<>', 1)
                                                                  ->where('product_id', $product->id)->sum('product_total');
                                          ?>
                                          <tr>
                                              <td>
                                                  <div class="single-product-item"><!-- single product item -->
                                                      <div class="thumb">
                                                        <a href="#">
                                                          <img style="width:60px;" src="<?php echo e(asset('assets/user/img/products/'.$product->previewimages()->first()->image)); ?>" alt="seller product image">
                                                        </a>
                                                      </div>
                                                      <div class="content">
                                                          <h4 class="title"><a target="_blank" href="<?php echo e(route('user.product.details', [$product->slug,$product->id])); ?>"><?php echo e(strlen($product->title) > 28 ? substr($product->title, 0, 28) . '...' : $product->title); ?></a></h4>
                                                      </div>
                                                  </div><!-- //.single product item -->
                                              </td>
                                              <td class="padding-top-40">
                                                <?php if(!empty($product->current_price)): ?>
                                                  <del><?php echo e($gs->base_curr_symbol); ?> <?php echo e($product->price); ?></del> <span class="text-secondary"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($product->current_price); ?></span>
                                                <?php else: ?>
                                                  <span><?php echo e($gs->base_curr_symbol); ?> <?php echo e($product->price); ?></span>
                                                <?php endif; ?>
                                              </td>
                                              <td class="padding-top-40">
                                                <?php if($product->quantity==0): ?>
                                                  <span class="badge badge-danger">Out of stock</span>
                                                <?php else: ?>
                                                  <?php echo e($product->quantity); ?>

                                                <?php endif; ?>
                                              </td>
                                              <td class="padding-top-40"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($totalearning); ?></td>
                                              <td class="padding-top-40"><?php echo e($product->sales); ?></td>
                                              <td class="padding-top-40">
                                                  <ul class="action">
                                                      <li><a target="_blank" href="<?php echo e(route('user.product.details', [$product->slug,$product->id])); ?>"><i class="far fa-eye"></i></a></li>
                                                      <li><a target="_blank" href="<?php echo e(route('vendor.product.edit', $product->id)); ?>"><i class="fas fa-pencil-alt"></i></a></li>
                                                      <li class="sp-close-btn"><a href="#" onclick="delproduct(event, <?php echo e($product->id); ?>)"><i class="fas fa-times"></i></a></li>
                                                  </ul>
                                              </td>
                                          </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </tbody>
                                  </table>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="text-center">
                                     <?php echo e($products->links()); ?>

                                  </div>
                                </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- sellers product content area end -->
<?php $__env->stopSection(); ?>


<?php $__env->startPush('scripts'); ?>
  <script>
    $(document).ready(function() {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    });
    function delproduct(e, pid) {
      e.preventDefault();
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to get back this product!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            url: '<?php echo e(route('vendor.product.delete')); ?>',
            type: 'POST',
            data: {
              id: pid
            },
            success: function(data) {
              console.log(data);
              if (data == "success") {
                  window.location = '<?php echo e(url()->current()); ?>';
              }
            }
          });
        }
      });
    }
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>