<!-- support bar area two start -->
<?php echo $__env->make('layout.partials.sidenav', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<div class="support-bar-two bg-white home-6">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="left-content" style="position: relative">
                    <!-- Toggler/collapsibe Button -->
                    <button style="
font-size: 1.25rem;
line-height: 1;
background-color:transparent;
border: 0px;
" type="button" onclick="openNav()" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <a href="<?php echo e(route('user.home')); ?>" class="logo main-logo">
                        <img src="<?php echo e(asset('assets/user/interfaceControl/logoIcon/logo.jpg')); ?>" alt="logo">
                    </a>

                </div>
                <div class="right-content">
                    <ul>

                        <li>
                            <div class="support-search-area">
                                <form
                                    action="<?php echo e(url('/').'/shop'.'/'.Request::route('category').'/'.Request::route('subcategory')); ?>"
                                    class="search-form">
                                    <div class="form-element has-icon" action="<?php echo e(route('user.search')); ?>">
                                        <input name="term" type="text" class="input-field"
                                               placeholder="Search your keyword" value="<?php echo e(request()->input('term')); ?>">
                                        <div class="the-icon">
                                            <select class="category select selectpicker"
                                                    onchange="categoryChange(this.value)">
                                                <option value="" selected disabled>Category</option>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="submit-btn"><i class="fas fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </li>

                        
                        
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" style="text-align: center" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src=" <?php echo e(asset('assets/custom/customer_care.png')); ?>" width="25"/>
                                <span class="badge d-block">Need Help?</span>

                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#"> <?php echo e($gs->support_phone); ?></a>
                                <a class="dropdown-item" href="#"> <?php echo e($gs->support_email); ?></a>
                                
                            </div>
                        </li>
                        <?php if(auth()->guard('vendor')->check()): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" style="text-align: center" id="shopDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src=" <?php echo e(asset('assets/custom/shop.png')); ?>" width="25"/>
                                    <span class="badge d-block">My shop</span>

                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    
                                    <a class="nav-link" href="<?php echo e(route('vendor.dashboard')); ?>">Dashboard</a>
                                    
                                    
                                    <a class="nav-link" href="<?php echo e(route('package.index')); ?>">Packages</a>
                                    
                                    
                                    <a class="nav-link" href="<?php echo e(route('vendor.showDepositMethods')); ?>">Deposit</a>
                                    
                                    
                                    <a class="nav-link" href="<?php echo e(route('vendor.withdrawMoney')); ?>">Withdraw</a>
                                    
                                    
                                    <a class="nav-link" href="<?php echo e(route('vendor.orders')); ?>">Orders</a>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    

                                    
                                    <div class="dropdown-divider"></div>
                                    <a href="<?php echo e(route('vendor.product.manage')); ?>" class="dropdown-item">Manage Products</a>
                                    <a href="<?php echo e(route('vendor.product.create')); ?>" class="dropdown-item">Upload Product</a>
                                </div>

                            </li>
                        <?php endif; ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link " style="text-align: center" href="#" id="accountDropdown"
                               role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="<?php echo e(asset('assets/custom/user.png')); ?>" width="25"/>
                                <span class="badge d-block">My Account</span>

                            </a>
                            <div class="dropdown-menu">
                                <?php if(!Auth::check() && !Auth::guard('vendor')->check()): ?>
                                    
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>">Login</a>
                                    <a class="nav-link" href="<?php echo e(route('user.register')); ?>">Register</a>

                                    
                                  <?php elseif(Auth::guard('vendor')->check()): ?>
                                    
                                        <a href="<?php echo e(route('vendor.setting')); ?>" class="dropdown-item">Settings</a>
                                        <a href="<?php echo e(route('vendor.changePassword')); ?>" class="dropdown-item">Change
                                            Password</a>
                                        <a href="<?php echo e(route('vendor.transactions')); ?>" class="dropdown-item">Transaction Log</a>
                                        <a href="<?php echo e(route('vendor.couponlog')); ?>" class="dropdown-item">Coupon Log</a>
                                        <a href="<?php echo e(route('vendor.logout', Auth::guard('vendor')->user()->id)); ?>"
                                           class="dropdown-item">Logout</a>
                                     
                                <?php elseif(Auth::check()): ?>
                                    <a class="nav-link dropdown-toggle" href="#"
                                       data-toggle="dropdown"><?php echo e(Auth::user()->username); ?></a>
                                    <a class="dropdown-item" href="<?php echo e(route('user.profile')); ?>">Profile</a>
                                    <a class="dropdown-item" href="<?php echo e(route('user.wishlist')); ?>">Wishlist</a>
                                    <a class="dropdown-item" href="<?php echo e(route('user.orders')); ?>">Orders</a>
                                    <a class="dropdown-item" href="<?php echo e(route('user.shipping')); ?>">Shipping Address</a>
                                    <a class="dropdown-item" href="<?php echo e(route('user.billing')); ?>">Billing Address</a>
                                    <a class="dropdown-item" href="<?php echo e(route('user.logout')); ?>">Logout</a>
                            </div>
                            <?php endif; ?>
                        </li>

                        <?php if(!Auth::guard('vendor')->check()): ?>
                            
                            
                            <?php if(!Auth::guard('vendor')->check() || request()->is('product/*/details') || request()->is('cart')): ?>
                                <li class="cart" id="cart" style="text-align: center">
                                    
                                    <a href="#">

                                        <img src=" <?php echo e(asset('assets/custom/cart.png')); ?>" width="25"/>

                                        <span class="badge d-block" id="itemsCountVue">{{itemsCount}} item(s)</span>
                                        <span class="badge d-none" id="itemsCountJquery"></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            
                            
                        <?php endif; ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- support bar area two end -->

<!-- navbar area start -->

<!-- /.navbar btn wrapper -->

<!-- navbar collapse end -->





<!-- navbar area end -->

<div class="body-overlay" id="body-overlay"></div>
<div class="search-popup" id="search-popup">
    <form action="index.html" class="search-popup-form">
        <div class="form-element">
            <input type="text" class="input-field" placeholder="Search.....">
        </div>
        <button type="submit" class="submit-btn"><i class="fas fa-search"></i></button>
    </form>
</div>
<!-- slide sidebar area start -->
<div class="slide-sidebar-area" id="slide-sidebar-area">
    <div class="top-content">
        <!-- top content -->
        <a href="<?php echo e(route('user.home')); ?>" class="logo">
            <img src="<?php echo e(asset('assets/user/interfaceControl/logoIcon/logo.jpg')); ?>" alt="logo">
        </a>
        <span class="side-sidebar-close-btn" id="side-sidebar-close-btn"><i class="fas fa-times"></i></span>
    </div><!-- //. top content -->
</div>
<!-- slide sidebar area end -->

<?php if(!Auth::guard('vendor')->check() || request()->is('product/*/details') || request()->is('cart')): ?>
    <!-- cart sidebar area start -->
    <div class="cart-sidebar-area" id="cart-sidebar-area">
        <div class="top-content">
            <!-- top content -->
            <a href="<?php echo e(route('user.home')); ?>" class="logo">
                <img src="<?php echo e(asset('assets/user/interfaceControl/logoIcon/footer_logo.jpg')); ?>" alt="footer-logo">
            </a>
            <span class="side-sidebar-close-btn"><i class="fas fa-times"></i></span>
        </div><!-- //. top content -->
        <div class="bottom-content">
            <!-- bottom content -->
            <div class="cart-products">
                <!-- cart product -->
                <h4 class="title">Shopping cart</h4>
                <div class="">
                    <?php
                        if (Auth::check()) {
                        $sessionid = Auth::user()->id;
                        } else {
                        $sessionid = session()->get('browserid');
                        }
                        $carts = \App\Cart::where('cart_id', $sessionid)->get();
                    ?>

                    <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="single-product-item" id="singleitem<?php echo e($cart->id); ?>">
                            <!-- single product item -->
                            <div class="thumb">
                                <img
                                    src="<?php echo e(asset('assets/user/img/products/') . '/' . \App\Product::find($cart->product_id)->previewimages()->first()->image); ?>"
                                    alt="recent review">
                            </div>
                            <div class="content">
                                <a href="<?php echo e(route('user.product.details', [$cart->product->slug, $cart->product->id])); ?>">
                                    <h4 class="title"><?php echo e(strlen($cart->title) > 18 ? substr($cart->title, 0, 18) . '...' : $cart->title); ?></h4>
                                </a>
                                <div class="price" style="font-size:12px;">
                                    <?php if(empty($cart->current_price)): ?>
                                        <span class="pprice"
                                              id="price<?php echo e($cart->id); ?>"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($cart->price); ?></span>
                                        <span class="sidequantity"
                                              id="quantity<?php echo e($cart->id); ?>">(<?php echo e($cart->quantity); ?>)</span>
                                    <?php else: ?>
                                        <span class="pprice"
                                              id="price<?php echo e($cart->id); ?>"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($cart->current_price); ?></span>
                                        <del id="delprice<?php echo e($cart->id); ?>"
                                             class="dprice"><?php echo e($gs->base_curr_symbol); ?> <?php echo e($cart->price); ?></del> <span
                                            class="sidequantity" id="quantity<?php echo e($cart->id); ?>">(<?php echo e($cart->quantity); ?>)</span>
                                    <?php endif; ?>
                                </div>
                                <?php
                                    $storedattr = json_decode($cart->attributes, true);
                                ?>
                                <?php if(count($storedattr) > 0): ?>
                                    <div style="font-size:12px;">
                                        <?php
                                            $attrs = '';
                                            $j=0;
                                            foreach ($storedattr as $key => $values) {
                                            $attrs .= "".str_replace('_', ' ', $key).": ";
                                            $i = 0;
                                            foreach ($values as $v) {
                                            $attrs .= "$v";
                                            if (count($values)-1 != $i) {
                                            $attrs .= ", ";
                                            } else {
                                            $attrs .= " ";
                                            }
                                            $i++;
                                            }
                                            if (count($storedattr) - 1 != $j) {
                                            $attrs .= ' | ';
                                            }
                                            $j++;
                                            }
                                        ?>
                                        <?php echo e($attrs); ?>

                                    </div>
                                <?php endif; ?>
                                <a style="font-size:12px;" href="#" class="remove-cart"
                                   @click="precartlen--;removeproduct(<?php echo e($cart->id); ?>)">Remove</a>
                            </div>
                        </div><!-- //. single product item -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="single-product-item" v-for="(product, index) in products">
                        <!-- single product item -->
                        <div class="thumb">
                            <img :src="'<?php echo e(url('/assets/user/img/products/')); ?>'+'/'+product.preimg" alt="recent review">
                        </div>
                        <div class="content">
                            <a :href="'<?php echo e(url('/')); ?>/product/' + product.slug + '/' + product.id">
                                <h4 class="title">{{product.title.length > 18 ? product.title.substring(0, 18) + '...'
                                    : product.title.substring}}</h4>
                            </a>
                            <div style="font-size:12px;" class="price" v-if="!product.current_price"><span
                                    class="pprice" :id="'price'+product.cart_id"><?php echo e($gs->base_curr_symbol); ?> {{product.price * product.quantity}}</span>
                                <span :id="'quantity'+product.cart_id">({{product.quantity}})</span></div>
                            <div style="font-size:12px;" class="price" v-if="product.current_price"><span class="pprice"
                                                                                                          :id="'price'+product.cart_id"><?php echo e($gs->base_curr_symbol); ?> {{product.current_price * product.quantity}}</span>
                                <del class="dprice" :id="'delprice'+product.cart_id"><?php echo e($gs->base_curr_symbol); ?>

                                    {{product.price * product.quantity}}
                                </del>
                                <span :id="'quantity'+product.cart_id">({{product.quantity}})</span></div>
                            <div style="font-size:12px;" v-if="product.countattr > 0">
                                {{product.attrs}}
                            </div>
                            <a style="font-size:12px;" href="#" class="remove-cart"
                               @click="products.splice(index, 1);removeproduct(product.cart_id)">Remove</a>
                        </div>
                    </div><!-- //. single product item -->

                    <div class="btn-wrapper" v-show="checkoutbtn" id="checkoutbtn">
                        <a href="<?php echo e(route('cart.index')); ?>" class="boxed-btn view-cart-btn">View Cart</a>
                        <a href="<?php echo e(route('user.checkout.index')); ?>" class="boxed-btn checkout-btn">Checkout</a>
                    </div>
                </div>

                <div v-show="noproduct">
                    <h4 class="text-center white-txt">NO ITEM ADDED TO CART</h4>
                </div>
                <div id="noproduct" style="display:none;">
                    <h4 class="text-center white-txt">NO ITEM ADDED TO CART</h4>
                </div>
            </div> <!-- //. cart product -->
        </div><!-- //. bottom content -->
    </div>
    <!-- cart sidebar area end -->
<?php endif; ?>



