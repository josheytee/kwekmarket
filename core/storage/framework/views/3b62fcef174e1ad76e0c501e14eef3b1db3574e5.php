<!-- footer area one start -->
<footer class="footer-arae-one">
    <div class="footer-top-one blue-bg"><!-- footer top one-->
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget about">
                        <div class="widget-body">
                            <a href="<?php echo e(route('user.home')); ?>" class="footer-logo">
                                <img src="<?php echo e(asset('assets/user/interfaceControl/logoIcon/footer_logo.jpg')); ?>" alt="footer-logo">
                            </a>
                            <ul class="contact-info-list">
                                <li>
                                    <div class="single-contact-info">
                                        <div class="icon">
                                                <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="content">
                                            <span class="details"><?php echo e($gs->con_address); ?></span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="single-contact-info">
                                        <div class="icon">
                                                <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="content">
                                            <span class="details"><?php echo e($gs->con_email); ?></span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="single-contact-info">
                                        <div class="icon">
                                                <i class="fas fa-phone"></i>
                                        </div>
                                        <div class="content">
                                            <span class="details"><?php echo e($gs->con_phone); ?></span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="footer-widget">
                        <div class="widget-title">
                            <h4 class="title">Our Services</h4>
                        </div>
                        <div class="widget-body">
                            <ul class="page-list">
                                <li><a href="<?php echo e(route('user.home')); ?>">--  Home</a></li>
                                <li><a href="<?php echo e(route('user.search')); ?>">--  Shop</a></li>
                                <li><a href="<?php echo e(route('vendor.login')); ?>">--  Vendor</a></li>
                                <li><a href="<?php echo e(route('user.wishlist')); ?>">--  Wishlist</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <div class="footer-widget">
                        <div class="widget-title">
                            <h4 class="title">Information</h4>
                        </div>
                        <div class="widget-body">
                            <ul class="page-list">
                                <li><a href="<?php echo e(route('privacy')); ?>">--  Privacy Policy</a></li>
                                <li><a href="<?php echo e(route('terms')); ?>">--  Terms & Conditions</a></li>
                                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <li><a href="<?php echo e(route('user.dynamicPage', $menu->slug)); ?>">--  <?php echo e($menu->name); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e(route('user.contact')); ?>">--  Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="footer-widget">
                        <div class="widget-title">
                            <h4 class="title">Subscribe</h4>
                        </div>
                        <div class="widget-body">
                          <div class="coupon-code-wrapper">
                            <form onsubmit="subscribe(event)" id="subscribeForm">
                              <?php echo e(csrf_field()); ?>

                              <div class="form-element">
                                  <input id="mail" name="email" type="text" class="input-field" placeholder="Email Address">
                              </div>
                              <button type="submit" class="submit-btn">Subscribe</button>
                            </form>

                          </div>
                        </div>
                        <div class="widget-title" style="margin-bottom: 0px; margin-top:20px;">
                            <h4 class="title">Follow Us</h4>
                        </div>
                        <div class="widget-body">
                          <ul class="social-links">
                            <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <li>
                                <a href="<?php echo e($social->url); ?>"><i class="fab fa-<?php echo e($social->fontawesome_code); ?>"></i></a>
                              </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- //.footer top one -->
    <div class="copyright-area blue-bg"><!-- copyright area -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-inner"><!-- copyright inner -->
                        <div class="text-center">
                            <span class="copyright-text"><?php echo e($gs->footer); ?></span>
                        </div>
                    </div><!-- //. copyright inner -->
                </div>
            </div>
        </div>
    </div><!-- //. copyright area -->
</footer>
<!-- footer area one end -->
