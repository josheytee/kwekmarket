<?php $__env->startSection('content'); ?>
  <main class="app-content">
     <div class="app-title">
        <div>
           <h1>Charge Setting</h1>
        </div>
     </div>

     <div class="row">
        <div class="col-md-12">
           <div class="tile">
              <div class="tile-body">
                    
                    <h3 class="text-white">Shpping Methods & Delivery Charge</h3>
                    
                    <form action="<?php echo e(route('admin.shipping.update')); ?>" method="post">
                      <?php echo csrf_field(); ?>
                      
        <div class="row">
            
            
            
            
            <div class="col-md-4">
        
                  <div class="card">
                          <div class="card-header bg-primary"> 
                          <h3 class="text-white">    In <?php echo e($gs->main_city); ?></h3>                        
                          </div>
                          <div class="card-body">
                              
                              
                              <div class="row">
                                  
                                  
                            <div class="col-md-12">
                            <lable><strong>Cash on delivery charge</strong></lable>
                            
                            <div class="input-group mb-3">
                            <input name="in_cash_on_delivery" type="text" class="form-control" placeholder="" value="<?php echo e($gs->in_cash_on_delivery); ?>" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2"><?php echo e($gs->base_curr_text); ?></span>
                            </div>
                            </div>

                            </div>

                            <div class="col-md-12">
                            <lable><strong>Advance delivery charge</strong></lable>
                            
                            <div class="input-group mb-3">
                            <input name="in_advanced" type="text" value="<?php echo e($gs->in_advanced); ?>" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2"><?php echo e($gs->base_curr_text); ?></span>
                            </div>
                            </div>                                
                            </div>
                            
                                <div class="col-md-5">
                                <lable><strong>Delivery Speed</strong></lable>
                                <div class="input-group mb-3">
                                <input name="in_min" value="<?php echo e(old('in_min') ? old('in_min') : $gs->in_min); ?>" type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><?php echo e($gs->base_curr_text); ?></span>
                                </div>
                                </div>                                
                                </div>
                                <div class="col-md-1 pt-4">
                                    -                              
                                </div>
                                <div class="col-md-5">
                                <lable><strong>&nbsp;</strong></lable>
                                <div class="input-group mb-3">
                                <input name="in_max" value="<?php echo e(old('in_max') ? old('in_max') : $gs->in_max); ?>" type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><?php echo e($gs->base_curr_text); ?></span>
                                </div>
                                </div>                                
                                </div>
                                
                                <div class="col-md-12">
                                  <?php if($errors->has('in_min')): ?>
                                    <p class="text-danger">These fields are required</p>
                                  <?php elseif($errors->has('in_max')): ?>
                                    <p class="text-danger">These fields are required</p>
                                  <?php endif; ?>
                                </div>
                            
                            </div>

                              </div>
                              
                              
                              
                              
                          </div>
                      </div>





            <div class="col-md-4">
        
                  <div class="card">
                          <div class="card-header bg-primary"> 
                          <h3 class="text-white">    Around <?php echo e($gs->main_city); ?></h3>                        
                          </div>
                          <div class="card-body">
                              
                              
                              <div class="row">
                                  
                                  
                            <div class="col-md-12">
                            <lable><strong>Cash on delivery charge</strong></lable>
                            
                            <div class="input-group mb-3">
                            <input name="around_cash_on_delivery" type="text" class="form-control" placeholder="" value="<?php echo e($gs->around_cash_on_delivery); ?>" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2"><?php echo e($gs->base_curr_text); ?></span>
                            </div>
                            </div>

                            </div>

                            <div class="col-md-12">
                            <lable><strong>Advance delivery charge</strong></lable>
                            
                            <div class="input-group mb-3">
                            <input name="around_advanced" type="text" class="form-control" value="<?php echo e($gs->around_advanced); ?>" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2"><?php echo e($gs->base_curr_text); ?></span>
                            </div>
                            </div>                                
                            </div>
                            
                                <div class="col-md-5">
                                <lable><strong>Delivery Speed</strong></lable>
                                <div class="input-group mb-3">
                                <input name="am_min" value="<?php echo e(old('am_min') ? old('am_min') : $gs->am_min); ?>" type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><?php echo e($gs->base_curr_text); ?></span>
                                </div>
                                </div>                                
                                </div>
                                <div class="col-md-1 pt-4">
                                    -                              
                                </div>
                                <div class="col-md-5">
                                <lable><strong>&nbsp;</strong></lable>
                                <div class="input-group mb-3">
                                <input name="am_max" value="<?php echo e(old('am_max') ? old('am_max') : $gs->am_max); ?>" type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><?php echo e($gs->base_curr_text); ?></span>
                                </div>
                                </div>                                
                                </div>
                                
                                <div class="col-md-12">
                                  <?php if($errors->has('am_min')): ?>
                                    <p class="text-danger">These fields are required</p>
                                  <?php elseif($errors->has('am_max')): ?>
                                    <p class="text-danger">These fields are required</p>
                                  <?php endif; ?>                                    
                                </div>
                            
                            </div>

                              </div>
                              
                              
                              
                              
                          </div>
                      </div>
                      
                      
                      



            <div class="col-md-4">
        
                  <div class="card">
                          <div class="card-header bg-primary"> 
                          <h3 class="text-white">    Other Places</h3>                        
                          </div>
                          <div class="card-body">
                              
                              
                              <div class="row">
                                  
                                  
                            <div class="col-md-12">
                            <lable><strong>Cash on delivery charge</strong></lable>
                            
                            <div class="input-group mb-3">
                            <input name="world_cash_on_delivery" type="text" class="form-control" placeholder="" value="<?php echo e($gs->world_cash_on_delivery); ?>" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2"><?php echo e($gs->base_curr_text); ?></span>
                            </div>
                            </div>

                            </div>

                            <div class="col-md-12">
                            <lable><strong>Advance delivery charge</strong></lable>
                            
                            <div class="input-group mb-3">
                            <input name="world_advanced" value="<?php echo e($gs->world_advanced); ?>" type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2"><?php echo e($gs->base_curr_text); ?></span>
                            </div>
                            </div>                                
                            </div>
                            
                                <div class="col-md-5">
                                <lable><strong>Delivery Speed</strong></lable>
                                <div class="input-group mb-3">
                                <input name="aw_min" value="<?php echo e(old('aw_min') ? old('aw_min') : $gs->aw_min); ?>" type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><?php echo e($gs->base_curr_text); ?></span>
                                </div>
                                </div>                                
                                </div>
                                <div class="col-md-1 pt-4">
                                    -                              
                                </div>
                                <div class="col-md-5">
                                <lable><strong>&nbsp;</strong></lable>
                                <div class="input-group mb-3">
                                <input name="aw_max" value="<?php echo e(old('aw_max') ? old('aw_max') : $gs->aw_max); ?>" type="text" class="form-control" placeholder="" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><?php echo e($gs->base_curr_text); ?></span>
                                </div>
                                </div>                                
                                </div>
                                <div class="col-md-12">
                                  <?php if($errors->has('aw_min')): ?>
                                    <p class="text-danger">These fields are required</p>
                                  <?php elseif($errors->has('aw_max')): ?>
                                    <p class="text-danger">These fields are required</p>
                                  <?php endif; ?>
                                </div>
                                

                            
                            </div>

                              </div>
                              
                              
                              
                              
                          </div>
                      </div>


















                      </div> <!--row-->



                      
                      
                      

                      <div class="row mt-5">
                          <div class="col-md-6">
                              <label>Tax in Percentage</label>
                                <div class="input-group mb-3">
                                <input name="tax" type="text" class="form-control form-control-lg" placeholder="Tax in percentage" value="<?php echo e($gs->tax); ?>">
                                <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">%</span>
                                </div>
                                </div>
                        </div>
                              
                              
                          
                          
                          
                           <div class="col-md-6">
                                <label>&nbsp;</label>
                          <button type="submit" class="btn btn-info btn-block btn-lg"> Update </button>    
                           </div>
                          
                      </div>
                      
                      
                      
                    </form>
                </div>
              
              
              
              
            

              </div>
           </div>
        </div>
     </div>
  </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>