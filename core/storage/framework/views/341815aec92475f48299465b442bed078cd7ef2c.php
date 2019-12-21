<div class="comments">
  <?php if($product->productreviews()->count() == 0): ?>
    <div class="card">
      <div class="card-body">
        <h3 class="text-center base-txt">No Review Given Yet</h3>
      </div>
    </div>

  <?php else: ?>
    <div class="row">
      <div class="col-md-12 text-center">
        <h2 class="mt-2" style="color:#f0932b"><?php echo e(round(\App\ProductReview::where('product_id', $product->id)->avg('rating'), 2)); ?>/5.0</h2>
        Based on <?php echo e(\App\ProductReview::where('product_id', $product->id)->count()); ?> reviews
      </div>
    </div>

    <div id="comments">
      <?php $__currentLoopData = $product->productreviews()->orderBy('id', 'DESC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productreview): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="comment-wrap">
           <div class="comment-block">
              <h4><?php echo e($productreview->user->username); ?></h4>
              <p class="comment-text">
                <?php echo e($productreview->comment); ?>

              </p>
              <div class="bottom-comment">
                 <div class="comment-date"><?php echo e(date('M d, Y @ g:i A', strtotime($productreview->created_at))); ?></div>
                 <ul class="comment-actions">
                    <div id="rateYo<?php echo e($productreview->id); ?>"></div>
                 </ul>
              </div>
           </div>
        </div>

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>


  <?php endif; ?>

</div>

<?php $__env->startPush('scripts'); ?>
<script>
  $(document).ready(function() {
    $.get("<?php echo e(route('user.productratings', $product->id)); ?>", function(data){
      console.log(data);
      for (var i = 0; i < data.length; i++) {
        $("#rateYo"+data[i].id).rateYo({
          rating: data[i].rating,
          readOnly: true,
          starWidth: "16px"
        });
      }

    });
  });
</script>
<?php $__env->stopPush(); ?>
