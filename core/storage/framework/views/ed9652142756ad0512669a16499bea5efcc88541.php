<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('navbar'); ?>
  <?php if ($__env->exists('layout.partials.navbar')) echo $__env->make('layout.partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('headerarea'); ?>
  <?php if ($__env->exists('layout.partials.headerarea')) echo $__env->make('layout.partials.headerarea', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div id="home">
    <div class="body-overlay" id="body-overlay"></div>
    <div class="search-popup" id="search-popup">
        <form action="index.html" class="search-popup-form">
            <div class="form-element">
                    <input type="text"  class="input-field" placeholder="Search.....">
            </div>
            <button type="submit" class="submit-btn"><i class="fas fa-search"></i></button>
        </form>
    </div>

    <!-- feature area home 6 start -->
    <div class="feature-area-home-6">
        <div class="container">
        <h3 style="padding: 20px;">Special Deals</h3>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                   <div class="img-wrapper">
                        <?php echo show_ad(1); ?>

                   </div>
                </div>
                <div class="col-lg-4 col-md-6">
                   <div class="img-wrapper">
                        <?php echo show_ad(1); ?>

                   </div>
                </div>
                <div class="col-lg-4 col-md-6">
                   <div class="img-wrapper">
                        <?php echo show_ad(1); ?>

                   </div>
                </div>
            </div>
        </div>
    </div>
    <!-- feature area home 6 end -->

    <div id="flashsaleContainer">
      <?php if(count($flashsales) > 0): ?>
        <div class="trending-seller-area home-6" id="flashSale">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header base-bg">
                    <h3 class="text-white">
                      Flash Sales
                      <div class="countdown">
                        <span id="hour" class="time-block base-txt"></span><span>:</span>
                        <span id="mins" class="time-block base-txt"></span><span>:</span>
                        <span id="seconds" class="time-block base-txt"></span>
                      </div>
                    </h3>
                  </div>
                  <div class="card-body">
                    <!-- recently added start -->
                    <div class="recently-added-area home-6" style="padding: 0px;">
                            <div class="row">
                                <div class="col-lg-12">

                                    
                                    <div class="recently-added-carousel flash-sale-carousel"><!-- recently added carousel -->
                                      <?php $__currentLoopData = $flashsales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $flashsale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="single-new-collection-item"><!-- single new collections -->
                                            <div class="thumb">
                                              <img src="<?php echo e(asset('assets/user/img/products/'.$flashsale->previewimages()->first()->image)); ?>" alt="new collcetion image">
                                              <div class="hover">
                                                <a href="<?php echo e(route('user.product.details', [$flashsale->slug,$flashsale->id])); ?>" class="view-btn"><i class="fa fa-eye"></i></a>
                                              </div>
                                              <span class="discount-badge"> -<?php echo e($flashsale->flash_type == 0 ? "$gs->base_curr_symbol" : ''); ?> <?php echo e($flashsale->flash_amount); ?><?php echo e($flashsale->flash_type == 1 ? '%' : ''); ?></span>
                                            </div>
                                            <div class="content">
                                                <span class="category"><?php echo e($flashsale->category->name); ?></span>
                                                <a href="<?php echo e(route('user.product.details', [$flashsale->slug,$flashsale->id])); ?>"><h4 class="title"><?php echo e(strlen($flashsale->title) > 20 ? substr($flashsale->title, 0, 20) . '...' : $flashsale->title); ?></h4></a>
                                                <?php if(empty($flashsale->current_price)): ?>
                                                  <div class="price"><span class="sprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($flashsale->price); ?></span></div>
                                                <?php elseif(!empty($flashsale->current_price)): ?>
                                                  <div class="price"><span class="sprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($flashsale->current_price); ?></span> <del class="dprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($flashsale->price); ?></del></div>
                                                <?php endif; ?>
                                            </div>
                                        </div><!-- //. single new collections  -->
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                            </div>
                    </div>
                    <!-- recently added end -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>


    <div class="trending-seller-area home-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="home-six-trending-seller-filter"><!-- home six trending seller filter -->
                       <div class="row">
                           <div class="col-lg-12">
                             <div class="card">
                               <div class="card-header base-bg">
                                 <div class="home-six-trending-sellter-filter-nav">
                                         <ul class="nav nav-tabs"  role="tablist">
                                             <li class="nav-item">
                                                 <a class="nav-link active" id="bestseller-tab" data-toggle="tab" href="#bestseller" role="tab" aria-controls="bestseller" aria-selected="true">Top Sales</a>
                                             </li>
                                             <li class="nav-item">
                                                 <a class="nav-link" id="trendeseller-tab" data-toggle="tab" href="#trendeseller" role="tab" aria-controls="trendeseller" aria-selected="false">Top Rated</a>
                                             </li>
                                             <li class="nav-item">
                                                 <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Special</a>
                                             </li>
                                         </ul>
                                 </div>
                               </div>
                               <div class="card-body">
                                 <div class="home-six-trending-masonry">
                                         <div class="tab-content" >
                                             <div class="tab-pane fade show active" id="bestseller" role="tabpanel" aria-labelledby="bestseller-tab">
                                                 <div class="row">
                                                   <?php $__currentLoopData = $topSoldPros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $topSoldPro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                     <div class="col-lg-3 col-md-6">
                                                       <div class="single-new-collection-item "><!-- single new collections -->
                                                           <div class="thumb">
                                                               <img src="<?php echo e(asset('assets/user/img/products/'.$topSoldPro->previewimages()->first()->image)); ?>" alt="new collcetion image">
                                                               <div class="hover">
                                                                 <a href="<?php echo e(route('user.product.details', [$topSoldPro->slug, $topSoldPro->id])); ?>" class="view-btn"><i class="fa fa-eye"></i></a>
                                                               </div>
                                                           </div>
                                                           <div class="content">
                                                               <span class="category"><?php echo e(\App\Category::find($topSoldPro->category_id)->name); ?></span>
                                                               <a href="<?php echo e(route('user.product.details', [$topSoldPro->slug, $topSoldPro->id])); ?>"><h4 class="title"><?php echo e(strlen($topSoldPro->title) > 20 ? substr($topSoldPro->title, 0, 20) . '...' : $topSoldPro->title); ?></h4></a>
                                                               <?php if(empty($topSoldPro->current_price)): ?>
                                                                 <div class="price"><span class="sprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($topSoldPro->price); ?></span></div>
                                                               <?php else: ?>
                                                                 <div class="price"><span class="sprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($topSoldPro->current_price); ?></span> <del class="dprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($topSoldPro->price); ?></del></div>
                                                               <?php endif; ?>
                                                           </div>
                                                       </div><!-- //. single new collections  -->
                                                     </div>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                   <div class="col-12 text-center">
                                                     <a class="view-all-products" href="<?php echo e(url('/shop').'?sort_by=sales_desc'); ?>">View All <i class="fa fa-angle-right"></i></a>
                                                   </div>
                                                 </div>
                                             </div>
                                             <div class="tab-pane fade" id="trendeseller" role="tabpanel" aria-labelledby="trendeseller-tab">
                                               <div class="row">
                                                 <?php $__currentLoopData = $topRatedPros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $topRatedPro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                   <div class="col-lg-3 col-md-6">
                                                     <div class="single-new-collection-item "><!-- single new collections -->
                                                         <div class="thumb">
                                                             <img src="<?php echo e(asset('assets/user/img/products/'.$topRatedPro->previewimages()->first()->image)); ?>" alt="new collcetion image">
                                                             <div class="hover">
                                                               <a href="<?php echo e(route('user.product.details', [$topRatedPro->slug, $topRatedPro->id])); ?>" class="view-btn"><i class="fa fa-eye"></i></a>
                                                             </div>
                                                         </div>
                                                         <div class="content">
                                                             <span class="category"><?php echo e(\App\Category::find($topRatedPro->category_id)->name); ?></span>
                                                             <a href="<?php echo e(route('user.product.details', [$topRatedPro->slug, $topRatedPro->id])); ?>"><h4 class="title"><?php echo e(strlen($topRatedPro->title) > 20 ? substr($topRatedPro->title, 0, 20) . '...' : $topRatedPro->title); ?></h4></a>
                                                             <?php if(empty($topRatedPro->current_price)): ?>
                                                               <div class="price"><span class="sprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($topRatedPro->price); ?></span></div>
                                                             <?php else: ?>
                                                               <div class="price"><span class="sprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($topRatedPro->current_price); ?></span> <del class="dprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($topRatedPro->price); ?></del></div>
                                                             <?php endif; ?>
                                                         </div>
                                                     </div><!-- //. single new collections  -->
                                                   </div>
                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                 <div class="col-12 text-center">
                                                   <a class="view-all-products" href="<?php echo e(url('/shop').'?sort_by=rate_desc'); ?>">View All <i class="fa fa-angle-right"></i></a>
                                                 </div>
                                               </div>
                                             </div>
                                             <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                               <div class="row">
                                                 <?php $__currentLoopData = $specialPros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $specialPro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                   <div class="col-lg-3 col-md-6">
                                                     <div class="single-new-collection-item "><!-- single new collections -->
                                                         <div class="thumb">
                                                             <img src="<?php echo e(asset('assets/user/img/products/'.$specialPro->previewimages()->first()->image)); ?>" alt="new collcetion image">
                                                             <div class="hover">
                                                               <a href="<?php echo e(route('user.product.details', [$specialPro->slug, $specialPro->id])); ?>" class="view-btn"><i class="fa fa-eye"></i></a>
                                                             </div>
                                                         </div>
                                                         <div class="content">
                                                             <span class="category"><?php echo e(\App\Category::find($specialPro->category_id)->name); ?></span>
                                                             <a href="<?php echo e(route('user.product.details', [$specialPro->slug, $specialPro->id])); ?>"><h4 class="title"><?php echo e(strlen($specialPro->title) > 20 ? substr($specialPro->title, 0, 20) . '...' : $specialPro->title); ?></h4></a>
                                                             <?php if(empty($specialPro->current_price)): ?>
                                                               <div class="price"><span class="sprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($specialPro->price); ?></span></div>
                                                             <?php else: ?>
                                                               <div class="price"><span class="sprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($specialPro->current_price); ?></span> <del class="dprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($specialPro->price); ?></del></div>
                                                             <?php endif; ?>
                                                         </div>
                                                     </div><!-- //. single new collections  -->
                                                   </div>
                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                 <div class="col-12 text-center">
                                                   <a class="view-all-products" href="<?php echo e(url('/shop').'?type=special'); ?>">View All <i class="fa fa-angle-right"></i></a>
                                                 </div>
                                               </div>
                                             </div>
                                         </div>
                                 </div>
                               </div>
                             </div>
                        </div><!-- //.home six trending seller filter -->
                           </div>
                       </div>
                </div>
            </div>
        </div>
    </div>


    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

      <?php if($cat->products()->where('deleted', 0)->count() > 0): ?>
        <!-- recently added start -->
        <div class="recently-added-area home-6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="recently-added-nav-menu"><!-- recently added nav menu -->
                            <ul>
                              <li><?php echo e($cat->name); ?></li>
                            </ul>
                        </div><!-- //.recently added nav menu -->
                    </div>
                    <div class="col-lg-2">
                      <ul class="home-subcategories">
                        <?php $__currentLoopData = $cat->subcategories()->where('status', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <li><a href="<?php echo e(route('user.search', [$cat->id, $subcategory->id])); ?>"><?php echo e($subcategory->name); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      </ul>
                    </div>
                    <div class="col-lg-10">
                        <div class="recently-added-carousel cat-carousel" id="recently-added-carousel"><!-- recently added carousel -->
                          <?php $__currentLoopData = $cat->products()->where('deleted', 0)->orderBy('id', 'DESC')->limit(8)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="single-new-collection-item "><!-- single new collections -->
                                <div class="thumb">
                                    <img src="<?php echo e(asset('assets/user/img/products/'.$product->previewimages()->first()->image)); ?>" alt="new collcetion image">
                                    <div class="hover">
                                      <a href="<?php echo e(route('user.product.details', [$product->slug, $product->id])); ?>" class="view-btn"><i class="fa fa-eye"></i></a>
                                    </div>
                                </div>
                                <div class="content">
                                    <span class="category"><?php echo e(\App\Category::find($product->category_id)->name); ?></span>
                                    <a href="<?php echo e(route('user.product.details', [$product->slug, $product->id])); ?>"><h4 class="title"><?php echo e(strlen($product->title) > 20 ? substr($product->title, 0, 20) . '...' : $product->title); ?></h4></a>
                                    <?php if(empty($product->current_price)): ?>
                                      <div class="price"><span class="sprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($product->price); ?></span></div>
                                    <?php else: ?>
                                      <div class="price"><span class="sprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($product->current_price); ?></span> <del class="dprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($product->price); ?></del></div>
                                    <?php endif; ?>
                                </div>
                            </div><!-- //. single new collections  -->
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <div class="single-new-collection-item ">
                            <div class="view-all-wrapper">
                              <div class="view-all-inner">
                                <a class="view-all-icon-wrapper" href="<?php echo e(route('user.search', $cat->id)); ?>">
                                  <i class="fa fa-angle-right"></i>
                                </a>
                                <a class="d-block view-all-txt" href="<?php echo e(route('user.search', $cat->id)); ?>">View All</a>
                              </div>
                            </div>
                          </div>
                        </div><!-- //. recently added carousel -->
                    </div>
                </div>
            </div>
        </div>
        <!-- recently added end -->
      <?php endif; ?>

  </div>

  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  <!-- recently added start -->
  <div class="recently-added-area home-6">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="recently-added-nav-menu"><!-- recently added nav menu -->
                      <ul>
                          <li>Recently Added</li>
                      </ul>
                  </div><!-- //.recently added nav menu -->
              </div>
              <div class="col-lg-12">
                  <div class="recently-added-carousel" id="recently-added-carousel"><!-- recently added carousel -->
                    <?php $__currentLoopData = $latestPros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $latestPro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="single-new-collection-item "><!-- single new collections -->
                          <div class="thumb">
                              <img src="<?php echo e(asset('assets/user/img/products/'.$latestPro->previewimages()->first()->image)); ?>" alt="new collcetion image">
                              <div class="hover">
                                <a href="<?php echo e(route('user.product.details', [$latestPro->slug,$latestPro->id])); ?>" class="view-btn"><i class="fa fa-eye"></i></a>
                              </div>
                          </div>
                          <div class="content">
                              <span class="category"><?php echo e(\App\Category::find($latestPro->category_id)->name); ?></span>
                              <a href="<?php echo e(route('user.product.details', [$latestPro->slug,$latestPro->id])); ?>"><h4 class="title"><?php echo e(strlen($latestPro->title) > 20 ? substr($latestPro->title, 0, 20) . '...' : $latestPro->title); ?></h4></a>
                              <?php if(empty($latestPro->current_price)): ?>
                                <div class="price"><span class="sprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($latestPro->price); ?></span></div>
                              <?php else: ?>
                                <div class="price"><span class="sprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($latestPro->current_price); ?></span> <del class="dprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($latestPro->price); ?></del></div>
                              <?php endif; ?>
                          </div>
                      </div><!-- //. single new collections  -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="single-new-collection-item ">
                      <div class="view-all-wrapper" style="height:405px;">
                        <div class="view-all-inner">
                          <a class="view-all-icon-wrapper" href="<?php echo e(url('/').'/shop?sort_by=date_desc'); ?>">
                            <i class="fa fa-angle-right"></i>
                          </a>
                          <a class="d-block view-all-txt" href="<?php echo e(url('/').'/shop?sort_by=date_desc'); ?>">View All</a>
                        </div>
                      </div>
                    </div>
                  </div><!-- //. recently added carousel -->
              </div>
          </div>
      </div>
  </div>
  <!-- recently added end -->

  <!-- brand logo carousel area one start -->
  <div class="brand-logo-carousel-area-one">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12">
                  <div class="brand-logo-carousel-one" id="brand-logo-carousel-one"><!-- brand logo carousel one -->
                    <?php $__currentLoopData = $partners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $partner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="single-brang-logo-carousel-one-item">
                          <a href="<?php echo e($partner->url); ?>">
                              <img src="<?php echo e(asset('assets/user/interfaceControl/partners/'.$partner->image)); ?>" alt="brand logo image">
                          </a>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div><!-- //.brand logo carousel one -->
              </div>
          </div>
      </div>
  </div>
  <!-- brand logo carousel area one end -->


<?php $__env->stopSection(); ?>


  <?php $__env->startSection('js-scripts'); ?>

    <script>
      var home = new Vue({
        el: '#home',
        data: {

        },
        mounted() {
          this.countdown();
          this.flashsalecheck();
        },
        methods: {
          countdown() {
            // Set the date we're counting down to
            var countDownDate = new Date("<?php echo e(!empty($countto) ? $countto : ''); ?>").getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {

              // Get todays date and time
              var now = new Date().getTime();

              // Find the distance between now and the count down date
              var distance = countDownDate - now;

              // Time calculations for hours, minutes and seconds
              var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
              var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
              var seconds = Math.floor((distance % (1000 * 60)) / 1000);

              // Output the result in an element with id="demo"
              $("#hour").html(hours < 10 ? '0'+hours : hours);
              $("#mins").html(minutes < 10 ? '0'+minutes : minutes);
              $("#seconds").html(seconds < 10 ? '0'+seconds : seconds);

              // If the count down is over, write some text
              if (distance < 0) {
                clearInterval(x);
              }
            }, 1000);
          },


          flashsalecheck() {
            setInterval(function() {
              $.get("<?php echo e(route('flashsalecheck')); ?>", (data) => {
                // console.log(data);
                if (data.status == 1) {
                  window.location = '<?php echo e(url()->current()); ?>';
                }
              });
            }, 5000);

          }
        }
      });
    </script>
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>