<script>
    /* Set the width of the side navigation to 250px */
    function openNav() {
        document.getElementById("mySidenav").style.width = "20rem";
        document.getElementById("overlay").style.height = "100vh";
        document.getElementById("mySidenav").style.padding = "1rem";
    }

    /* Set the width of the side navigation to 0 */
    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("overlay").style.height = "0";
        document.getElementById("mySidenav").style.padding = "0";
    }
</script>
















<nav class="sidenav" id="mySidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    <div class="category-sidebar"><!-- category sidebar -->
        <div class="category-filter-widget"><!-- category-filter-widget -->
            <div class="sidebar-header">
                <h4>Categories</h4>
            </div>
            <ul class="cat-list">




                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="#"
                           class="category-btn <?php echo e(Request::route('category') == $category->id ? 'base-txt' : ''); ?>"><?php echo e($category->name); ?>

                            <span class="right"><i class="fa fa-caret-down"></i></span></a>
                        <ul class="subcategories <?php echo e(Request::route('category') == $category->id ? 'open' : ''); ?>">
                            <?php $__currentLoopData = $category->subcategories()->where('status', 1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e(route('user.search', [ $category->id, $subcategory->id])); ?>"
                                       class="<?php echo e(Request::route('subcategory') == $subcategory->id ? 'base-txt' : ''); ?>"><?php echo e($subcategory->name); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div><!-- //.category-filter-widget -->
    </div><!-- //. category sidebar -->
</nav>
<div id="overlay" onclick="closeNav()"></div>
