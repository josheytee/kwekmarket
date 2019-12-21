
<script src="<?php echo e(asset('assets/admin/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/main.js')); ?>"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="<?php echo e(asset('assets/admin/js/plugins/pace.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/plugins/chart.js')); ?>"></script>
<!-- Page specific javascripts-->
<script type="text/javascript" src="<?php echo e(asset('assets/admin/js/plugins/chart.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/bootstrap-toggle.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/bootstrap-fileinput.js')); ?>" type="text/javascript"></script>
<!-- jQuery UI popup -->
<script src="<?php echo e(asset('assets/user/js/jquery-ui.js')); ?>"></script>

<script src="<?php echo e(asset('assets/user/js/toastr.min.js')); ?>"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<?php if(session('success')): ?>
<script type="text/javascript">
    $(document).ready(function(){
      toastr["success"]("<strong>Success!</strong> <?php echo e(session('success')); ?>!");
    });
</script>
<?php endif; ?>

<?php if(session('alert')): ?>
<script type="text/javascript">
    $(document).ready(function(){
        toastr["error"]("<?php echo e(session('alert')); ?>!");
    });
</script>
<?php endif; ?>


<script type="text/javascript">
  toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "3000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
</script>

<?php echo $__env->yieldPushContent('scripts'); ?>

<?php echo $__env->yieldContent('js-scripts'); ?>
