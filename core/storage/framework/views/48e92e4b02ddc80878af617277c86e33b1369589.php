<?php $__env->startPush('styles'); ?>
  <style media="screen">
  .package-container {
    padding: 50px 0px;
  }
  .package-container h2 {
    margin-bottom: 20px;
    font-size: 40px;
  }
  .package-desc {
    min-height: 220px;
  }
  h5.card-title {
    margin: 0px;
    text-align: center;
  }
  </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('title', 'Subscription Packages'); ?>

<?php $__env->startSection('headertxt', 'Subscription Packages'); ?>

<?php $__env->startSection('content'); ?>
  <div class="">
    <div class="container package-container">
      <div class="row">
        <div class="col-md-12">
          <?php
            $vendor = Auth::guard('vendor')->user();
          ?>

          <div id="successAlert" class="alert alert-success alert-dismissible fade show d-none">
            <p><strong class="text-success">Your package is valid till <?php echo e(date('jS M, Y', strtotime($vendor->expired_date))); ?> and can upload <?php echo e($vendor->products); ?> products.</strong></p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div id="dangerAlert" class="alert alert-danger alert-dismissible fade show d-none">
            <p><strong class="text-danger">You need to buy a package to upload products.</strong></p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>


          <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($loop->iteration % 4 == 1): ?>
            <div class="row"> 
            <?php endif; ?>
            <div class="col-md-3">
              <div class="card" style="">
                <div class="card-header base-bg">
                  <h5 class="card-title text-white"><?php echo e($package->title); ?></h5>
                </div>
                <div class="card-body package-desc">
                  <p class="card-text">
                    <?php echo e($package->s_desc); ?>

                  </p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><strong>Price: </strong><?php echo e($package->price); ?> <?php echo e($gs->base_curr_text); ?></li>
                  <li class="list-group-item"><strong>Products:</strong> <?php echo e($package->products); ?></li>
                  <li class="list-group-item"><strong>Validaty:</strong> <?php echo e($package->validity); ?> days</li>
                </ul>
                <div class="card-body">
                  <div class="text-center">
                    <button type="button" class="btn btn-block base-bg white-txt" onclick="buy(<?php echo e($package->id); ?>);">Buy</button>
                  </div>
                </div>
              </div>
            </div>
            <?php if($loop->iteration % 4 == 0): ?>
            </div> 
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>

  $(window).load(function(){
    $.get(
      '<?php echo e(route('package.validitycheck')); ?>',
      function(data) {
        // console.log(data);

        if (data.products == 0) {
          $("#dangerAlert").addClass('d-block');
          $("#successAlert").addClass('d-none');
        } else if (data.products > 0) {
          $("#successAlert").addClass('d-block');
          $("#dangerAlert").addClass('d-none');
        }
      }
    );
  });

  function buy(id) {
    swal({
      title: "Confirmation",
      text: "Are you sure, you want to buy this package?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willBuy) => {
      if (willBuy) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var fd = new FormData();
        fd.append('packid', id);
        $.ajax({
          url: '<?php echo e(route('package.buy')); ?>',
          type: 'POST',
          data: fd,
          contentType: false,
          processData: false,
          success: function(data) {
            console.log(data);
            if (data == "success") {
              window.location = '<?php echo e(url()->current()); ?>';
            }
            if (data == "b_short") {
              swal("You dont have enough balance to buy this package!", {
                icon: "error",
              });
            }
          }
        })
      }
    });
  }
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>