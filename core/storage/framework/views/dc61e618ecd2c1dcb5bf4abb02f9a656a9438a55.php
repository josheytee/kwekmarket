<?php $__env->startSection('title', "$product->title"); ?>

<?php $__env->startSection('headertxt', 'Product Details'); ?>

<?php $__env->startPush('styles'); ?>
  <style media="screen">
  div.ratingpro {
      display: inline-block;
  }
  .product-details-slider.owl-carousel .owl-item img {
    width: auto;
  }
  @media  only screen and (max-width: 575px) {
    .product-details-slider.owl-carousel .owl-item img {
      width: 100%;
    }
  }
  </style>
  <link rel="stylesheet" href="<?php echo e(asset('assets/user/css/comments.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/user/css/easyzoom.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  <!-- product details content area  start -->
      <div class="product-details-content-area">
          <div class="container">
              <div class="row">
                  <div class="col-lg-6">
                      <div class="left-content-area"><!-- left content area -->
                          <div class="product-details-slider" id="product-details-slider" data-slider-id="1">
                            <?php $__currentLoopData = $product->previewimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $previewimage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <div class="single-product-thumb">
                              <div class="easyzoom easyzoom--overlay">
                        				<a href="<?php echo e(asset('assets/user/img/products/'.$previewimage->big_image)); ?>">
                        					<img class="single-image" src="<?php echo e(asset('assets/user/img/products/'.$previewimage->image)); ?>" alt=""/>
                        				</a>
                        			</div>
                              </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </div>
                          <ul class="owl-thumbs product-deails-thumb" data-slider-id="1">
                              <?php $__currentLoopData = $product->previewimages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $previewimage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="owl-thumb-item">
                                    <img src="<?php echo e(asset('assets/user/img/products/'.$previewimage->image)); ?>" alt="product details thumb">
                                </li>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </ul>


                      </div><!-- //.left content area -->
                  </div>

                  <div class="col-lg-6">
                      <div class="right-content-area"><!-- right content area -->
                          <div class="top-content">
                              <ul class="review">
                                  <div class="ratingpro" id="ratingPro<?php echo e($product->id); ?>"></div>
                                  <?php if(\App\ProductReview::where('product_id', $product->id)->count() == 0): ?>
                                    <li class="reviewes"><span class="badge badge-danger">No Reviews</span> </li>
                                  <?php else: ?>
                                    <li class="reviewes">(<?php echo e(\App\ProductReview::where('product_id', $product->id)->count()); ?> <small>reviews</small>)</li>
                                  <?php endif; ?>
                              </ul>
                              <span class="orders">Orders (<?php echo e($sales); ?>)</span>
                          </div>
                          <form class="bottom-content" id="attrform" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                              <span class="cat"><?php echo e($product->category->name); ?></span>
                              <h3 class="title">
                                <?php echo e($product->title); ?>

                                <?php if($product->deleted == 1): ?>
                                  <span class="badge badge-danger">Removed</span>
                                <?php endif; ?>
                              </h3>
                              <div class="price-area">
                                  <div class="left">
                                      <?php if(empty($product->current_price)): ?>
                                        <span class="sprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e(round($product->price, 2)); ?></span>
                                      <?php else: ?>
                                        <span class="sprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e(round($product->current_price, 2)); ?></span>
                                        <span class="dprice"><del><?php echo e($gs->base_curr_symbol); ?> <?php echo e(round($product->price, 2)); ?></del></span>
                                      <?php endif; ?>
                                  </div>
                              </div>

                              <ul class="product-spec">
                                  <li>Subcategory:  <span class="right"><?php echo e($product->subcategory->name); ?> </span></li>
                                  <li>Product Code: <span class="right"><?php echo e($product->product_code); ?></span></li>
                                  <?php if($product->quantity > 0): ?>
                                    <li>Stock:  <span class="right base-color" id="stock">In Stock </span></li>
                                  <?php else: ?>
                                    <li>Stock:  <span class="right text-danger" id="stock">Out of stock </span></li>
                                  <?php endif; ?>

                                  <?php
                                    $attrs = json_decode($product->attributes, true);
                                  ?>

                                  <?php $__currentLoopData = $attrs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                      $pieces = explode("_", $key);
                                      foreach ($pieces as &$piece)
                                      {
                                          $piece = ucfirst($piece);
                                      }
                                      $wrapped_lines = join(' ', $pieces);
                                    ?>
                                    <li>

                                      <strong class="mb-2"><?php echo e($wrapped_lines); ?></strong>:<br>
                                      <?php $__currentLoopData = $attr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="mr-2"><input type="radio" name="<?php echo e($key); ?>[]" value="<?php echo e($value); ?>"> <?php echo e($value); ?></span>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </li>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <li>Shop Name:  <span class="right"><a href="<?php echo e(route('vendor.shoppage', $product->vendor->id)); ?>" style="color:#<?php echo e($gs->base_color_code); ?>;font-weight:700;"><?php echo e($product->vendor->shop_name); ?></a> </span></li>
                                  <p class="text-danger" id="errattr"></p>
                              </ul>


                              <div class="paction">
                                  <div class="qty">
                                      <ul>
                                          <li><span class="qtminus" id="qtminus" onclick="qtchange('minus')"><i class="fas fa-minus"></i></span></li>
                                          <li><span class="qttotal" ref="qttotal" id="qttotal">1</span></li>
                                          <li><span class="qtplus" id="qtplus" onclick="qtchange('plus')"><i class="fas fa-plus"></i></span></li>
                                      </ul>
                                  </div>
                                  <ul class="activities">
                                    <?php if(Auth::check()): ?>
                                      <?php
                                        $count = \App\Favorit::where('user_id', Auth::user()->id)->where('product_id', $product->id)->count();
                                      ?>
                                      <?php if($count == 0): ?>
                                        <li><a href="#" onclick="favorit(event, <?php echo e($product->id); ?>)"><i id="heart" class="fas fa-heart"></i></a></li>
                                      <?php else: ?>
                                        <li><a href="#" onclick="favorit(event, <?php echo e($product->id); ?>)"><i id="heart" class="fas fa-heart red"></i></a></li>
                                      <?php endif; ?>
                                    <?php else: ?>
                                      <li><a href="<?php echo e(route('login')); ?>"><i id="heart" class="fas fa-heart"></i></a></li>
                                    <?php endif; ?>

                                      <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(url()->current())); ?>"><i class="fab fa-facebook-f"></i></a></li>
                                      <li><a href="https://twitter.com/intent/tweet?text=my share text&amp;url=<?php echo e(urlencode(url()->current())); ?>"><i class="fab fa-twitter"></i></a></li>
                                      <li><a href="https://plus.google.com/share?url=<?php echo e(urlencode(url()->current())); ?>"><i class="fab fa-google-plus-g"></i></a></li>
                                  </ul>
                                  <?php if(!Auth::guard('vendor')->check()): ?>
                                    <div class="btn-wrapper">
                                        <a href="#" class="boxed-btn" @click.prevent="addtocart(<?php echo e($product->id); ?>, $refs.qttotal.innerHTML)">add to cart</a>
                                    </div>
                                  <?php endif; ?>

                              </div>
                          </form>
                      </div><!-- //. right content area -->
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-12">
                      <div class="product-details-area">
                          <div class="product-details-tab-nav">
                              <ul class="nav nav-tabs" role="tablist">
                                  <li class="nav-item">
                                    <a class="nav-link <?php echo e(session('success')=='Reviewed successfully'?'':'active'); ?>" id="descr-tab" data-toggle="tab" href="#descr" role="tab" aria-controls="descr" aria-selected="false">descriptions</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link <?php echo e(session('success')=='Reviewed successfully'?'active':''); ?>" id="item-review-tab" data-toggle="tab" href="#item_review" role="tab" aria-controls="item_review" aria-selected="true">item review</a>
                                  </li>
                                  <?php if(auth()->guard()->check()): ?>
                                    <?php if(\App\ProductReview::where('user_id', Auth::user()->id)->where('product_id', $product->id)->count() == 0): ?>
                                      <?php if(\App\Orderedproduct::where('user_id', Auth::user()->id)->where('product_id', $product->id)->where('shipping_status', 2)->count() > 0): ?>
                                        <li class="nav-item">
                                          <a class="nav-link" id="write-tab" data-toggle="tab" href="#write" role="tab" aria-controls="write" aria-selected="false">Write Reviews</a>
                                        </li>
                                      <?php endif; ?>
                                    <?php endif; ?>
                                  <?php endif; ?>
                                  <li class="nav-item">
                                    <a class="nav-link" id="item-review-tab" data-toggle="tab" href="#vendor_info" role="tab" aria-controls="item_review" aria-selected="true">Vendor Information</a>
                                  </li>
                              </ul>
                          </div>
                            <div class="tab-content" >
                              <div class="tab-pane fade <?php echo e(session('success')=='Reviewed successfully'?'':'show active'); ?>" id="descr" role="tabpanel" aria-labelledby="descr-tab">
                                  <div class="descr-tab-content">
                                      <?php if ($__env->exists('product.partials.description')) echo $__env->make('product.partials.description', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                  </div>
                              </div>
                              <div class="tab-pane fade <?php echo e(session('success')=='Reviewed successfully'?'show active':''); ?>" id="item_review" role="tabpanel" aria-labelledby="item-review-tab">
                                <div class="descr-tab-content">
                                    <?php if ($__env->exists('product.partials.comments')) echo $__env->make('product.partials.comments', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                </div>
                              </div>
                              <?php if(auth()->guard()->check()): ?>
                                <?php if(\App\ProductReview::where('user_id', Auth::user()->id)->where('product_id', $product->id)->count() == 0): ?>
                                  <?php if(\App\Orderedproduct::where('user_id', Auth::user()->id)->where('product_id', $product->id)->where('shipping_status', 2)->count() > 0): ?>
                                    <div class="tab-pane fade" id="write" role="tabpanel" aria-labelledby="write-tab">
                                        <div class="more-feature-content">
                                          <?php if ($__env->exists('product.partials.writereview')) echo $__env->make('product.partials.writereview', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        </div>
                                    </div>
                                  <?php endif; ?>
                                <?php endif; ?>
                              <?php endif; ?>
                              <div class="tab-pane fade" id="vendor_info" role="tabpanel" aria-labelledby="item-review-tab">
                                <div class="descr-tab-content">
                                    <?php if ($__env->exists('product.partials.vendor_info')) echo $__env->make('product.partials.vendor_info', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                </div>
                              </div>
                            </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  <!-- product details content area end -->

  <!-- recently added start -->
  <div class="recently-added-area product-details">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="recently-added-nav-menu"><!-- recently added nav menu -->
                      <ul>
                          <li>Related Products</li>
                      </ul>
                  </div><!-- //.recently added nav menu -->
              </div>
              <div class="col-lg-12">
                  <div class="recently-added-carousel" id="recently-added-carousel"><!-- recently added carousel -->
                    <?php $__currentLoopData = $rproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $rproduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="single-new-collection-item "><!-- single new collections -->
                          <div class="thumb">
                              <img src="<?php echo e(asset('assets/user/img/products/'.$rproduct->previewimages()->first()->image)); ?>" alt="new collcetion image">
                              <div class="hover">
                                <a href="<?php echo e(route('user.product.details', [$rproduct->slug, $rproduct->id])); ?>" class="view-btn"><i class="fa fa-eye"></i></a>
                              </div>
                          </div>
                          <div class="content">
                              <span class="category"><?php echo e(\App\Category::find($rproduct->category_id)->name); ?></span>
                              <a href="<?php echo e(route('user.product.details', [$rproduct->slug, $rproduct->id])); ?>"><h4 class="title"><?php echo e(strlen($rproduct->title) > 25 ? substr($rproduct->title, 0, 25) . '...' : $rproduct->title); ?></h4></a>
                              <?php if(empty($rproduct->current_price)): ?>
                                <div class="price"><span class="sprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($rproduct->price); ?></span></div>
                              <?php else: ?>
                                <div class="price"><span class="sprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($rproduct->current_price); ?></span> <del class="dprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($rproduct->price); ?></del></div>
                              <?php endif; ?>
                          </div>
                      </div><!-- //. single new collections  -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="single-new-collection-item ">
                      <div class="view-all-wrapper">
                        <div class="view-all-inner">
                          <a class="view-all-icon-wrapper" href="<?php echo e(route('user.search', [$rproduct->category_id, $rproduct->subcategory_id])); ?>">
                            <i class="fa fa-angle-right"></i>
                          </a>
                          <a class="d-block view-all-txt" href="<?php echo e(route('user.search', [$rproduct->category_id, $rproduct->subcategory_id])); ?>">View All</a>
                        </div>
                      </div>
                    </div>
                  </div><!-- //. recently added carousel -->
              </div>
          </div>
      </div>
  </div>
  <!-- recently added end -->


<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
  <script src="<?php echo e(asset('assets/user/js/easyzoom.js')); ?>"></script>
  <script>
  $(document).ready(function() {
    var $easyzoom = $('.easyzoom').easyZoom();
  });

  </script>
  <script>
    function favorit(e, productid) {
      e.preventDefault();
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      var fd = new FormData();
      fd.append('productid', productid);
      $.ajax({
        url: '<?php echo e(route('user.favorit')); ?>',
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        success: function(data) {
          if (data == "favorit") {
            toastr["success"]("Added to wishlist!");
            $("#heart").addClass('red');
          } else if (data == "unfavorit") {
            $("#heart").removeClass('red');
          }
        }
      })
    }

    function qtchange(status) {
      var qt = $("#qttotal").text();
      if (status == 'plus') {
        var newqt = parseInt(qt) + 1;
      } else if (status == 'minus' && qt>=2) {
        var newqt = parseInt(qt) - 1;
      } else {
        var newqt = 1;
      }
      $("#qttotal").html(newqt);
      console.log(newqt);
    }
  </script>

  <script>
    var globalrating;

    $(function () {
      $("#writeRateYo").rateYo({
        onChange: function (rating, rateYoInstance) {
          $(this).next().text(rating);
          globalrating = rating;
          console.log(rating);
        },
      });
    });

    function reviewsubmit(e) {
      e.preventDefault();
      // console.log(globalrating);
      var form = document.getElementById('reviewform');
      var fd = new FormData(form);
      if (globalrating) {
        fd.append('rating', globalrating);
      } else {
        fd.append('rating', '');
      }

      $.ajax({
        url: '<?php echo e(route('user.review.submit')); ?>',
        type: 'POST',
        data: fd,
        contentType: false,
        processData: false,
        success: (data) => {
          console.log(data);

          if(typeof data.error != 'undefined') {
              if (typeof data.rating != 'undefined') {
                document.getElementById('errrating').innerHTML = data.rating[0];
              }
          } else {
            window.location = '<?php echo e(url()->current()); ?>';
          }
        }
      });
    }

    $(document).ready(function() {
      var pid = <?php echo e($product->id); ?>;
      $.get("<?php echo e(route('user.avgrating', $product->id)); ?>", function(data){
        $("#ratingPro"+pid).rateYo({
          rating: data,
          readOnly: true,
          starWidth: "16px"
        });
      });
    });
  </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>