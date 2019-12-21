<?php $__env->startSection('title', 'Shop Page'); ?>

<?php $__env->startSection('headertxt', 'Shop Page'); ?>

<?php $__env->startPush('styles'); ?>
  <style media="screen">
  /* search page css */
  ul.subcategories {
      padding-left: 20px;
      display: none;
  }
  ul.subcategories.open {
    display: block;
  }
  .category-btn {
      display: block;
  }
  .subcategories a {
      display: block;
      cursor: pointer;
  }
  .js-input-from.form-control, .js-input-to.form-control {
      width: 24%;
  }

  .js-input-from.form-control {
      margin-right: 4%;
  }

  .category-content-area .category-compare {
      padding: 20px;
  }
  li.page-item {
      display: inline-block;
  }

  ul.pagination {
      width: 100%;
  }
  .shop-breadcrumb-inner .logo-wrapper {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      margin-right: 25px;
      background-color: #fff;
  }

  .shop-breadcrumb-inner img.shop-logo {
      width: 100%;
      border-radius: 50%;
  }
  .shop-breadcrumb-inner {
      display: flex;
      justify-content: space-between;
      align-items: center;
  }
  .left-shop-header {
      display: flex;
      align-items: center;
  }
  .shop-breadcrumb-inner input[type="text"] {
      border: none;
      background-color: transparent;
      border-bottom: 1px solid #fff;
      color: #fff;
      width: 100%;
      padding-right: 30px;
      padding-bottom: 5px;
  }

  .shop-breadcrumb-inner button {
      background-color: transparent;
      border: none;
      outline: none;
      color: #fff;
      /* margin-right: 0px; */
      cursor: pointer;
      /* width: 17%; */
      position: absolute;
      right: -3px;
      top: -5px;
  }

  .right-shop-header {
      width: 250px;
  }

  .shop-breadcrumb-inner form {
      width: 100%;
      position: relative;
  }
  .shop-breadcrumb-inner input[type="text"]::placeholder {
      color: #fff;
  }
  .breadcrumb-area.extra {
      padding-bottom: 30px;
  }
  .breadcrumb-area {
      padding: 30px 0 110px 0;
  }

  </style>
<link rel="stylesheet" href="<?php echo e(asset('assets/user/css/range-slider.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  <!-- category content area start -->
  <div class="category-content-area search-page">
      <div class="container">
          <div class="row">
              <div class="col-lg-3">
                  <div class="category-sidebar"><!-- category sidebar -->
                      <div class="category-filter-widget"><!-- category-filter-widget -->
                        <div class="sidebar-header">
                          <h4>Categories</h4>
                        </div>
                          <ul class="cat-list">
                            <li>
                              <a href="<?php echo e(url('/').'/shop_page'.'/'.$vendorid); ?>" class="<?php echo e(!Request::route('category') ? 'base-txt' : ''); ?>">All Categories </a>
                            </li>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <li>
                                <a href="#" class="category-btn <?php echo e(Request::route('category') == $category->id ? 'base-txt' : ''); ?>"><?php echo e($category->name); ?> <span class="right"><i class="fa fa-caret-down"></i></span></a>
                                <ul class="subcategories <?php echo e(Request::route('category') == $category->id ? 'open' : ''); ?>">
                                  <?php $__currentLoopData = $category->subcategories()->where('status', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a href="<?php echo e(route('vendor.shoppage', [$vendorid, $category->id, $subcategory->id])); ?>" class="<?php echo e(Request::route('subcategory') == $subcategory->id ? 'base-txt' : ''); ?>"><?php echo e($subcategory->name); ?></a></li>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                              </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </ul>
                      </div><!-- //.category-filter-widget -->
                  </div><!-- //. category sidebar -->

                  <div class="category-compare margin-bottom-30">
                     <div class="sidebar-header">
                        <h4>Filters</h4>
                     </div>
                     <div class="">
                        <form class="wrapper" action="<?php echo e(url('/').'/shop_page'.'/'.$vendorid.'/'.Request::route('category').'/'.Request::route('subcategory')); ?>">
                          <input type="hidden" name="sort_by" value="<?php echo e(request()->input('sort_by')); ?>">
                          <input type="hidden" name="term" value="<?php echo e(request()->input('term')); ?>">
                          <p style="margin-bottom: 5px;"><strong>Price</strong></p>
                           <div class="range-slider">
                              <input type="text" class="js-range-slider" value="" />
                           </div>
                           <div class="extra-controls form-inline">
                              <div class="form-group">
                                 <input id="minprice" name="minprice" type="text" class="js-input-from form-control" value="0" />
                                 <input id="maxprice" name="maxprice" type="text" class="js-input-to form-control" value="0" />
                              </div>
                           </div>

                           <?php if(Request::route('subcategory')): ?>
                             <?php if(\App\Subcategory::find(Request::route('subcategory'))->attributes != '[]'): ?>
                               <?php
                                 $attrs = \App\Subcategory::find(Request::route('subcategory'))->attributes;
                                 $arrattr = json_decode($attrs, true);

                                 $attributes = \App\ProductAttribute::whereIn('id', $arrattr['attributes'])->get();
                               ?>
                               <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                 <p style="margin-bottom: 5px;"><strong><?php echo e($attribute->name); ?></strong></p>
                                 <?php $__currentLoopData = \App\Option::where('product_attribute_id', $attribute->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <div class="form-check">
                                     <input name="<?php echo e($attribute->attrname); ?>[]" class="form-check-input" type="checkbox" value="<?php echo e($option->name); ?>" id="defaultCheck<?php echo e($option->id); ?>" <?php if(array_key_exists("$attribute->attrname", $reqattrs)): ?> <?php echo e(in_array($option->name, $reqattrs["$attribute->attrname"]) ? 'checked' : ''); ?>  <?php endif; ?>>
                                     <label class="form-check-label" for="defaultCheck<?php echo e($option->id); ?>">
                                       <?php echo e($option->name); ?>

                                     </label>
                                   </div>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             <?php endif; ?>
                          <?php endif; ?>


                           <div class="text-right pt-2">
                             <button type="submit" class="btn btn-sm btn-warning">Apply</button>
                           </div>
                        </form>
                     </div>
                  </div>

                  <div class="banner-img">
                      <?php echo show_ad(3); ?>

                  </div>

              </div>
              <div class="col-lg-9">
                  <div class="right-content-area"><!-- right content area -->
                      <div class="top-content"><!-- top content -->
                          
                            <div class="left-conent">
                              <?php if(Request::route('category')): ?>
                                <span class="cat"><?php echo e(\App\Category::find(Request::route('category'))->name); ?> <?php if(!empty(Request::route('subcategory'))): ?> <i class="fa fa-arrow-right mx-1"></i> <?php echo e(\App\Subcategory::find(Request::route('subcategory'))->name); ?> <?php endif; ?></span>
                              <?php else: ?>
                                <span class="cat">All Categories</span>
                              <?php endif; ?>
                            </div>

                          <div class="right-content">
                              <ul>
                                  <li>
                                      <div class="form-element has-icon">
                                          <form id="sortForm" action="<?php echo e(url('/').'/shop_page'.'/'.$vendorid.'/'.Request::route('category').'/'.Request::route('subcategory')); ?>">
                                            <input type="hidden" name="minprice" value="<?php echo e(request()->input('minprice')); ?>">
                                            <input type="hidden" name="maxprice" value="<?php echo e(request()->input('maxprice')); ?>">
                                            <?php if(Request::route('subcategory')): ?>
                                              <?php if(\App\Subcategory::find(Request::route('subcategory'))->attributes != '[]'): ?>
                                                <?php
                                                  $attrs = \App\Subcategory::find(Request::route('subcategory'))->attributes;
                                                  $arrattr = json_decode($attrs, true);

                                                  $attributes = \App\ProductAttribute::whereIn('id', $arrattr['attributes'])->get();
                                                ?>
                                                <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                  <?php $__currentLoopData = \App\Option::where('product_attribute_id', $attribute->id)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="form-check" style="display: none;">
                                                      <input name="<?php echo e($attribute->attrname); ?>[]" class="form-check-input" type="checkbox" value="<?php echo e($option->name); ?>" id="defaultCheck<?php echo e($option->id); ?>" <?php if(array_key_exists("$attribute->attrname", $reqattrs)): ?> <?php echo e(in_array($option->name, $reqattrs["$attribute->attrname"]) ? 'checked' : ''); ?>  <?php endif; ?>>
                                                      <label class="form-check-label" for="defaultCheck<?php echo e($option->id); ?>">
                                                        <?php echo e($option->name); ?>

                                                      </label>
                                                    </div>
                                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                              <?php endif; ?>
                                            <?php endif; ?>
                                            <select name="sort_by" class="selectpicker input-field select" onchange="document.getElementById('sortForm').submit()">
                                                <option value="" selected disabled>sort by</option>
                                                <option value="date_desc" <?php echo e($sortby == 'date_desc' ? 'selected' : ''); ?>>Date: Newest on top</option>
                                                <option value="date_asc" <?php echo e($sortby == 'date_asc' ? 'selected' : ''); ?>>Date: Oldest on top</option>
                                                <option value="price_desc" <?php echo e($sortby == 'price_desc' ? 'selected' : ''); ?>>Price: High to low</option>
                                                <option value="price_asc" <?php echo e($sortby == 'price_asc' ? 'selected' : ''); ?>>Price: Low to high</option>
                                                <option value="sales_desc" <?php echo e($sortby == 'sales_desc' ? 'selected' : ''); ?>>Top Sales</option>
                                                <option value="rate_desc" <?php echo e($sortby == 'rate_desc' ? 'selected' : ''); ?>>Top Rated</option>
                                            </select>
                                          </form>

                                          <div class="the-icon">
                                                  <i class="fas fa-angle-down"></i>
                                          </div>
                                      </div>
                                  </li>
                                  <li class="grid icon ">
                                          <i class="fas fa-th-large"></i>
                                  </li>
                              </ul>
                          </div>
                      </div><!-- //. top content -->
                      <div class="bottom-content"><!-- top content -->
                          <div class="row">
                            <?php if(count($products) == 0): ?>
                              <div class="col-md-12 text-center">
                                <h4>NO PRODUCT FOUND</h4>
                              </div>
                            <?php else: ?>
                              <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-4 col-md-6">
                                  <div class="single-new-collection-item "><!-- single new collections -->
                                      <div class="thumb">
                                          <img src="<?php echo e(asset('assets/user/img/products/'.$product->previewimages()->first()->image)); ?>" alt="new collcetion image">
                                          <div class="hover">
                                              <a href="<?php echo e(route('user.product.details', [$product->slug, $product->id])); ?>" class="view-btn"><i class="fa fa-eye"></i></a>
                                          </div>
                                      </div>
                                      <div class="content">
                                          <span class="category"><?php echo e(\App\Category::find($product->category_id)->name); ?></span>
                                          <a href="<?php echo e(route('user.product.details', [$product->slug, $product->id])); ?>"><h4 class="title"><?php echo e(strlen($product->title) > 25 ? substr($product->title, 0, 25) . '...' : $product->title); ?></h4></a>
                                          <?php if(empty($product->current_price)): ?>
                                            <div class="price"><span class="sprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($product->price); ?></span></div>
                                          <?php else: ?>
                                            <div class="price"><span class="sprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($product->current_price); ?></span> <del class="dprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($product->price); ?></del></div>
                                          <?php endif; ?>
                                      </div>
                                  </div><!-- //. single new collections  -->
                                </div>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                              <?php
                                $parameters = ['term' => $term, 'sort_by'=>request()->input('sort_by'), 'minprice'=>request()->input('minprice'), 'maxprice' => request()->input('maxprice')];
                              ?>
                              <?php if(!empty($reqattrs)): ?>
                                  <?php $__currentLoopData = $reqattrs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attrkey => $reqattr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $reqattr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $optionkey => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <?php
                                        $parameters["$attrkey"][] = $option;
                                      ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              <?php endif; ?>
                              <div class="col-md-12">
                                <div class="text-center">
                                    <?php echo e($products->appends($parameters)->links()); ?>

                                </div>
                              </div>
                            <?php endif; ?>
                          </div>
                      </div><!-- //.top content -->
                  </div><!-- //. right content area -->
              </div>
          </div>
      </div>
  </div>
  <!-- category content area end -->

<?php $__env->stopSection(); ?>


<?php $__env->startSection('js-scripts'); ?>
  <script>
    $(document).ready(function() {
      $(document).on('click','.category-btn',function(e) {
        e.preventDefault();

        $('.category-btn').removeClass('base-txt');
        $('.category-btn').next('.subcategories').removeClass('open');

        $(this).toggleClass('base-txt');
        $(this).parent().children('.subcategories').toggleClass('open');

      });
    });
  </script>

  
  <script>
    var minprice = <?php echo e($minprice); ?>;
    var maxprice = <?php echo e($maxprice); ?>;
    var curr = '<?php echo e($gs->base_curr_symbol); ?>';
  </script>
  <script src="<?php echo e(asset('assets/user/js/range-slider.js')); ?>"></script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>