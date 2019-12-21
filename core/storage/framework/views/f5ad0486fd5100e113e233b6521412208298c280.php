<?php $__env->startPush('styles'); ?>
  <style media="screen">
    .action-icon {
      font-size: 20px;
    }
  </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  <main class="app-content">
     <div class="app-title">
        <div>
           <h3 class="page-title uppercase bold">
             <?php if(request()->path() == 'admin/vendors/all'): ?>
             All
             <?php elseif(request()->path() == 'admin/vendors/pending'): ?>
             Pending
             <?php elseif(request()->path() == 'admin/vendors/accepted'): ?>
             Accepted
             <?php elseif(request()->path() == 'admin/vendors/rejected'): ?>
             Rejected
             <?php endif; ?>
             Requests
           </h3>
        </div>
        <ul class="app-breadcrumb breadcrumb">
           <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
           <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
        </ul>
     </div>
     <div class="row">
        <div class="col-md-12">
            <div class="tile">
              <div class="row mb-4">
                <div class="col-md-3 offset-md-9">
                  <form method="get"
                  action="
                  <?php if(request()->path() == 'admin/vendors/all'): ?>
                  <?php echo e(route('admin.vendors.all')); ?>

                  <?php elseif(request()->path() == 'admin/vendors/pending'): ?>
                  <?php echo e(route('admin.vendors.pending')); ?>

                  <?php elseif(request()->path() == 'admin/vendors/accepted'): ?>
                  <?php echo e(route('admin.vendors.accepted')); ?>

                  <?php elseif(request()->path() == 'admin/vendors/rejected'): ?>
                  <?php echo e(route('admin.vendors.rejected')); ?>

                  <?php endif; ?>
                  "
                  >
                    <input class="form-control" type="text" name="term" value="<?php echo e($term); ?>" placeholder="Search by shop name">
                  </form>
                </div>
              </div>
              <?php if(count($vendors) == 0): ?>
                <h1 class="text-center"> NO DATA FOUND !</h1>
              <?php else: ?>
                <table class="table table-bordered" style="width:100%;">
                  <thead>
                    <tr>
                        <th>Shop Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Request Date</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                          <td class="padding-top-40"><?php echo e($vendor->shop_name); ?></td>
                          <td><?php echo e($vendor->email); ?></td>
                          <td><?php echo e($vendor->phone); ?></td>
                          <td class="padding-top-40"><?php echo e(date('jS F, o', strtotime($vendor->created_at))); ?></td>
                          <td>
                            <?php if($vendor->approved == 0): ?>
                              <a href="#" style="margin-right:5px" onclick="accept(event, <?php echo e($vendor->id); ?>)"><i class="fa fa-check-circle text-success action-icon"></i></a>
                              <a href="#" title="Reject Request" onclick="reject(event, <?php echo e($vendor->id); ?>)"><i class="fa fa-times-circle text-danger action-icon"></i></a>
                            <?php elseif($vendor->approved == 1): ?>
                              <span class="badge badge-success">Approved</span>
                            <?php elseif($vendor->approved == -1): ?>
                              <span class="badge badge-danger">Rejected</span>
                            <?php endif; ?>
                          </td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
              <?php endif; ?>

               <!-- print pagination -->
               <div class="row">
                 <div class="col-md-12">
                   <div class="text-center">
                      <?php echo e($vendors->appends(['term' => $term])->links()); ?>

                   </div>
                 </div>
               </div>
               <!-- row -->
        </div>
     </div>
   </div>
  </main>

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

    function accept(e, vendorid) {
      e.preventDefault();
      console.log(vendorid);
      var fd = new FormData();
      fd.append('vendorid', vendorid);
      $.ajax({
        url: '<?php echo e(route('admin.vendors.accept')); ?>',
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        success: function(data) {
          if (data == "success") {
            window.location = '<?php echo e(url()->full()); ?>';
          }
        }
      })
    }

    function reject(e, vendorid) {
      e.preventDefault();
      console.log(vendorid);
      var fd = new FormData();
      fd.append('vendorid', vendorid);
      $.ajax({
        url: '<?php echo e(route('admin.vendors.reject')); ?>',
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        success: function(data) {
          if (data == "success") {
            window.location = '<?php echo e(url()->full()); ?>';
          }
        }
      })
    }
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>