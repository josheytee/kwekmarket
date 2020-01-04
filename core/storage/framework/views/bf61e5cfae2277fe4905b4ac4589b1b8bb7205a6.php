<!-- header area start -->
<div class="container">
    <div class="row">
        <div class="col-md-9 mt-2">
            <div class="hero-carousel owl-carousel owl-theme">
                <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e($slider->url); ?>">
                    <div class="header-area-three header-bg-four home-six" style="background-image: url('<?php echo e(asset('assets/user/interfaceControl/sliders/'.$slider->image)); ?>');border-radius: .6rem">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="header-inner">
                                        <!-- header inner -->
                                        
                                        
                                        
                                        
                                        
                
            </div><!-- //. header inner -->
        </div>
    </div>
</div>
</div>
</a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
</div>

<div class="col-md-3 mt-sm-2" style="background:white; border-radius: .6rem">
    <div class="row py-2">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-12">
            <a href="<?php echo e(route('user.search', $cat->id)); ?>">
                <div class="nav-box ">
                    <div style="display: inline-block">
                        <img src=" <?php echo e(asset('assets/custom/category/'.$cat->name.'.png')); ?>" width="25" />
                    </div>
                    <div style="display: inline-block" class="nav-right-box">
                        <?php echo e($cat->name); ?>

                    </div>
                </div>
            </a>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
</div>
</div>

<!-- header area end -->