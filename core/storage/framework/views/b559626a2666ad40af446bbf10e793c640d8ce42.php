<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header base-bg">
        <h4 class="title no-margin white-txt">Product Descriptions</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <?php echo $product->description; ?>

          </div>
        </div>

        <div class="card bg-light py-3 px-3">
           <div class="row">
             <div class="col-md-4 text-center">
                 <div class="card">
                     <div class="card-header base-bg">
                       <h4 class="text-white mb-0">
                         <i class="fa fa-map-marker"></i>
                         In <?php echo e($gs->main_city); ?> delivery charge
                       </h4> 
                     </div>
                     <div class="card-body text-left">
                       <ul>
                         <li>
                           <i class="fa fa-check-circle base-txt"></i> Cash on delivery charge - <strong><?php echo e($gs->in_cash_on_delivery); ?> <?php echo e($gs->base_curr_text); ?></strong>
                         </li>
                         <li>
                           <i class="fa fa-check-circle base-txt"></i> If you pay advance then delivery charge - <strong><?php echo e($gs->in_advanced); ?> <?php echo e($gs->base_curr_text); ?></strong>
                         </li>
                       </ul> 
                     </div>
                 </div>
             </div>
             <div class="col-md-4 text-center">
                 <div class="card">
                     <div class="card-header base-bg">
                       <h4 class="text-white mb-0">
                         <i class="fa fa-map-marker"></i>
                         Around <?php echo e($gs->main_city); ?> delivery charge
                       </h4> 
                     </div>
                     <div class="card-body text-left">
                       <ul>
                         <li>
                           <i class="fa fa-check-circle base-txt"></i> Cash on delivery charge - <strong><?php echo e($gs->around_cash_on_delivery); ?> <?php echo e($gs->base_curr_text); ?></strong>
                         </li>
                         <li>
                           <i class="fa fa-check-circle base-txt"></i> If you pay advance then delivery charge - <strong><?php echo e($gs->around_advanced); ?> <?php echo e($gs->base_curr_text); ?></strong>
                         </li>
                       </ul> 
                     </div>
                 </div>
             </div>
             <div class="col-md-4 text-center">
                 <div class="card">
                     <div class="card-header base-bg">
                       <h4 class="text-white mb-0">
                         <i class="fa fa-map-marker"></i>
                         Other Places
                       </h4> 
                     </div>
                     <div class="card-body text-left">
                       <ul>
                         <li>
                           <i class="fa fa-check-circle base-txt"></i> Cash on delivery charge - <strong><?php echo e($gs->world_cash_on_delivery); ?> <?php echo e($gs->base_curr_text); ?></strong>
                         </li>
                         <li>
                           <i class="fa fa-check-circle base-txt"></i> If you pay advance then delivery charge - <strong><?php echo e($gs->world_advanced); ?> <?php echo e($gs->base_curr_text); ?></strong>
                         </li>
                       </ul>

                     </div>
                 </div> 
                 
             </div>
           </div>
        </div>

        <div class="row refund_policy">
            <div class="col-md-12">
                <h3 class="base-txt"><i class="fa fa-check-circle"></i> Refund Policy</h3>
                <div class=""><?php echo $gs->refund_policy; ?></div>
            </div>
        </div>

        <div class="row replacement_policy">
            <div class="col-md-12">
                <h3 class="base-txt"><i class="fa fa-check-circle"></i> Replacement Policy</h3>
                <div class=""><?php echo $gs->replacement_policy; ?></div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
