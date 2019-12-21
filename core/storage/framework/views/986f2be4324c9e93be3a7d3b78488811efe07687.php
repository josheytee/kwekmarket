<?php $__env->startPush('styles'); ?>
  <style media="screen">
  h2, h3, h4 {
    margin: 0px;
  }
  .widget-small {
    margin-bottom: 0px;
    border: 1px solid #f1f1f1;
  }
  .info h4 {
    font-size: 14px !important;
  }
  </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  <main class="app-content">
     <div class="app-title">
        <div>
           <h1><i class="fa fa-dashboard"></i> Vendor Details</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
           <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
           <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
        </ul>
     </div>
     <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="row">
              <div class="col-md-3">
                <div class="card border-primary">
                  <div class="card-header border-primary bg-primary">
                    <h3 style="color:white;"><i class="fa fa-user"></i> PROFILE</h3>
                  </div>
                  <div class="card-body">
                    <div class="card border-primary">
                      <img style="width:100%;" src="<?php echo e(asset('assets/user/img/shop_logo/'.$vendor->logo)); ?>" alt="">
                    </div>
                    <br>
                    <div class="text-center">
                      <h3><?php echo e($vendor->shop_name); ?></h3><br>
                      <h4><?php echo e($vendor->email); ?></h4><br>
                      <h3>Balance: <?php echo e($vendor->balance); ?> <?php echo e($gs->base_curr_text); ?></h3><br>
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-md-9">
                <div class="card">
                  <div class="card-header bg-primary">
                    <h3 style="color:white;"><i class="fa fa-desktop"></i> DETAILS</h3>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="widget-small info coloured-icon"><i class="icon fab fa-product-hunt fa-3x" aria-hidden="true"></i>
                          <a class="info" href="<?php echo e(route('admin.trxLog', $vendor->id)); ?>">
                            <h4>Transactions</h4>
                            <p><b><?php echo e(\App\Transaction::where('vendor_id', $vendor->id)->count()); ?></b></p>
                          </a>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="widget-small info coloured-icon"><i class="fa fa-shopping-cart icon fa-3x"></i>
                          <div class="info" href="#">
                            <h4>Orders</h4>
                            <p><b><?php echo e(count(\App\Orderedproduct::join('orders', 'orders.id', '=', 'orderedproducts.order_id')->select('order_id', DB::raw('count(order_id) as total'))->where('vendor_id', $vendor->id)->whereIn('orders.approve', [0, 1])->groupBy('order_id')->get())); ?></b></p>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="widget-small danger coloured-icon"><i class="icon fas fa-money-bill-alt fa-3x"></i>
                          <div class="info" href="#">
                            <h4>Sales</h4>
                            <p><b><?php echo e(\App\Product::groupBy('vendor_id')->where('deleted', 0)->sum('sales')); ?></b></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <br>

                <div class="card">
                  <div class="card-header bg-primary">
                    <h3 style="color:white;"><i class="fa fa-cog"></i> OPERATIONS</h3>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <a href="<?php echo e(route('admin.vendor.addSubtractBalance', $vendor->id)); ?>" style="color:white;" class="btn btn-info btn-block"><i class="fa fa-money"></i> ADD / SUBTRACT BALANCE</a>
                      </div>
                      <div class="col-md-6">
                        <a href="<?php echo e(route('admin.emailToVendor', $vendor->id)); ?>" style="color:white;" class="btn btn-danger btn-block"><i class="fa fa-envelope"></i> SEND MAIL</a>
                      </div>
                    </div>
                  </div>
                </div>

                <br>

                <div class="card">
                  <div class="card-header bg-primary">
                    <h3 style="color:white;"><i class="fa fa-cog"></i> UPDATE PROFILE</h3>
                  </div>
                  <div class="card-body">
                    <form class="" action="<?php echo e(route('admin.updateVendorDetails')); ?>" method="post">
                      <?php echo e(csrf_field()); ?>

                      <input type="hidden" name="vendorID" value="<?php echo e($vendor->id); ?>">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for=""><strong>Shop Name</strong></label>
                            <input class="form-control" type="text" name="shop_name" value="<?php echo e($vendor->shop_name); ?>">
                            <?php if($errors->has('shop_name')): ?>
                             <p class="text-danger" style="margin:0px;"><?php echo e($errors->first('shop_name')); ?></p>
                           <?php endif; ?>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for=""><strong>Email</strong></label>
                            <input class="form-control" type="text" name="email" value="<?php echo e($vendor->email); ?>">
                            <?php if($errors->has('email')): ?>
                             <p class="text-danger" style="margin:0px;"><?php echo e($errors->first('email')); ?></p>
                           <?php endif; ?>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for=""><strong>Phone</strong></label>
                            <input class="form-control" type="text" name="phone" value="<?php echo e($vendor->phone); ?>">
                            <?php if($errors->has('phone')): ?>
                             <p class="text-danger" style="margin:0px;"><?php echo e($errors->first('phone')); ?></p>
                           <?php endif; ?>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                           <label><strong>Status</strong></label>
                           <input data-toggle="toggle" data-onstyle="success" data-offstyle="danger"
                              data-width="100%" type="checkbox" data-on="ACTIVE" data-off="BLOCKED"
                              name="status" <?php echo e($vendor->status=='active'?'checked':''); ?>>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-12">
                          <button type="submit" class="btn btn-info btn-block" name="button">UPDATE</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
     </div>
  </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>