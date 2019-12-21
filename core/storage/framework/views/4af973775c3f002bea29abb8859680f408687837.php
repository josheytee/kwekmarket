<?php $__env->startSection('title', 'Vendor Dashboard'); ?>

<?php $__env->startSection('headertxt', 'Vendor Dashboard'); ?>

<?php $__env->startSection('content'); ?>
  <!-- seller dashboard content area start -->
  <div class="seller-dashboard-content-area">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card dashboard-content-wrapper card-default gray-bg">
                      <div class="card-header">
                            Vendor DASHBOARD
                      </div>
                      <div class="mini-card-wrapper">
                          <div class="row">
                              <div class="col-lg-4 col-md-6">
                                  <div class="single-mini-card-item bg-light-blue">
                                      <div class="bg-icon">
                                          <i class="fas fa-dollar-sign"></i>
                                      </div>
                                      <h4 class="title">Current Balance</h4>
                                      <div class="counterup">$<span class="count"><?php echo e(\App\Vendor::find(Auth::guard('vendor')->user()->id)->balance); ?></span></div>
                                  </div>
                              </div>
                              <div class="col-lg-4 col-md-6">
                                  <a href="<?php echo e(route('vendor.orders')); ?>" class="single-mini-card-item bg-light-orange">
                                      <div class="bg-icon">
                                          <i class="fas fa-shopping-cart"></i>
                                      </div>
                                      <h4 class="title">Total Orders</h4>
                                      <div class="counterup"><span class="count"><?php echo e(count(\App\Orderedproduct::join('orders', 'orders.id', '=', 'orderedproducts.order_id')->select('order_id', DB::raw('count(order_id) as total'))->where('vendor_id', Auth::guard('vendor')->user()->id)->whereIn('orders.approve', [0, 1])->groupBy('order_id')->get())); ?></span></div>
                                  </a>
                              </div>
                              <div class="col-lg-4 col-md-6">
                                  <a href="<?php echo e(route('vendor.product.manage')); ?>" class="single-mini-card-item bg-light-gray">
                                      <div class="bg-icon">
                                          <i class="fab fa-product-hunt"></i>
                                      </div>
                                      <h4 class="title">Products</h4>
                                      <div class="counterup"><span class="count"><?php echo e(\App\Product::where('vendor_id', Auth::guard('vendor')->user()->id)->count()); ?></span></div>
                                  </a>
                              </div>
                          </div>
                      </div>
                      <div class="panel-wrapper">
                          <div class="row">
                              <div class="col-lg-12">
                                 <div class="row">
                                     <div class="col-lg-6 col-md-6">
                                          <div class="seller-card">
                                              <div class="card-header">
                                                      Top selling products
                                              </div>
                                              <div class="card-body">
                                                <table class="table table-responsive seller-dashboard-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Title</th>
                                                            <th>Sales</th>
                                                            <th>Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                      <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><a href="<?php echo e(route('user.product.details', [$product->slug,$product->id])); ?>"><?php echo e(strlen($product->title) > 20 ? substr($product->title, 0, 20) . '...' : $product->title); ?></a></td>
                                                            <?php
                                                              $date = \Carbon\Carbon::now()->subDays(30);
                                                              $sales = \App\Orderedproduct::where('shipping_status', 2)
                                                                                     ->where('refunded', '<>', 1)
                                                                                     ->where('product_id', $product->id)
                                                                                     ->where('shipping_date', '>=' ,$date)
                                                                                     ->sum('quantity');
                                                            ?>
                                                            <td><span class="base-color"><?php echo e($sales); ?></span> </td>
                                                            <td>
                                                              <?php if(empty($product->current_price)): ?>
                                                                <span class="sprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($product->price); ?></span>
                                                              <?php else: ?>
                                                                <span class="sprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($product->current_price); ?></span> <del class="dprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($product->price); ?></del>
                                                              <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                              </div>

                                          </div>
                                     </div>
                                     <div class="col-lg-6 col-md-6">
                                          <div class="seller-card">
                                              <div class="card-header">
                                                      Top rated products
                                              </div>
                                              <div class="card-body">
                                                <table class="table table-responsive seller-dashboard-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Title</th>
                                                            <th>Rating</th>
                                                            <th>Price</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                      <?php $__currentLoopData = $topRatedPros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $topRatedPro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><a href="<?php echo e(route('user.product.details', [$topRatedPro->slug,$topRatedPro->id])); ?>"><?php echo e(strlen($topRatedPro->title) > 20 ? substr($topRatedPro->title, 0, 20) . '...' : $topRatedPro->title); ?></a></td>
                                                            <td><span class="base-color"><?php echo e(round($topRatedPro->productreviews()->avg('rating'), 2)); ?></span> </td>
                                                            <td>
                                                              <?php if(empty($topRatedPro->current_price)): ?>
                                                                <span class="sprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($topRatedPro->price); ?></span>
                                                              <?php else: ?>
                                                                <span class="sprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($topRatedPro->current_price); ?></span> <del class="dprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($topRatedPro->price); ?></del>
                                                              <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                                  </div>
                                          </div>
                                     </div>
                                 </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-lg-12">
                                  <div class="latest-order">
                                          <div class="table-panel">
                                          <div class="card-header">
                                              latest orders
                                          </div>
                                          <div class="card-body">
                                              <table class="table table-responsive seller-dashboard-table">
                                                  <thead>
                                                    <tr>
                                                        <th>Order id</th>
                                                        <th>Order Date</th>
                                                        <th>Total</th>
                                                        <th>Shipping Status</th>
                                                        <th>Order Status</th>
                                                        <th>Payment Method</th>
                                                        <th>Action</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>
                                                    <?php $__currentLoopData = $lorders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lorder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                      <tr>
                                                          <td class="padding-top-40"><?php echo e($lorder->unique_id); ?></td>
                                                          <td class="padding-top-40"><?php echo e(date('jS F, o', strtotime($lorder->created_at))); ?></td>
                                                          <td class="padding-top-40"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($lorder->total); ?></td>
                                                          <td class="padding-top-40">
                                                            <?php if($lorder->shipping_status == 0): ?>
                                                              <span class="badge badge-danger">Pending</span>
                                                            <?php elseif($lorder->shipping_status == 1): ?>
                                                              <span class="badge badge-warning">In Process</span>
                                                            <?php elseif($lorder->shipping_status == 2): ?>
                                                              <span class="badge badge-success">Shipped</span>
                                                            <?php endif; ?>
                                                          </td>
                                                          <td class="padding-top-40">
                                                            <?php if($lorder->approve == 0): ?>
                                                              <span class="badge badge-warning">Pending</span>
                                                            <?php elseif($lorder->approve == 1): ?>
                                                              <span class="badge badge-success">Accepted</span>
                                                            <?php elseif($lorder->approve == -1): ?>
                                                              <span class="badge badge-danger">Rejected</span>
                                                            <?php endif; ?>
                                                          </td>
                                                          <td class="padding-top-40">
                                                            <?php if($lorder->payment_method == 2): ?>
                                                              Advance
                                                            <?php elseif($lorder->payment_method == 1): ?>
                                                              Cash on delivery
                                                            <?php endif; ?>
                                                          </td>
                                                          <td class="padding-top-40">
                                                              <a href="<?php echo e(route('vendor.orderdetails', $lorder->id)); ?>" target="_blank"><i class="text-primary fa fa-eye"></i></a>
                                                          </td>
                                                      </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                  </tbody>
                                              </table>
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
  </div>
  <!-- seller dashboard content area end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>