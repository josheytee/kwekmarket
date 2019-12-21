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
{{--<nav class="sidenav" id="mySidenav">--}}
{{--    <div class="side-mega-menu" >--}}
{{--        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>--}}
{{--        @foreach ($categories as $key => $cat)--}}
{{--            <h6 class="title">{{$cat->name}}</h6>--}}
{{--            <ul>--}}
{{--                @foreach ($cat->subcategories()->where('status', 1)->get() as $key => $subcat)--}}
{{--                    <li>--}}
{{--                        <a href="{{route('user.search', [$cat->id, $subcat->id])}}">{{$subcat->name}}</a>--}}
{{--                    </li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--</nav>--}}

<nav class="sidenav" id="mySidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    <div class="category-sidebar"><!-- category sidebar -->
        <div class="category-filter-widget"><!-- category-filter-widget -->
            <div class="sidebar-header">
                <h4>Categories</h4>
            </div>
            <ul class="cat-list">
{{--                <li>--}}
{{--                    <a href="{{url('/').'/shop_page'.'/'.$vendorid}}"--}}
{{--                       class="{{!Request::route('category') ? 'base-txt' : '' }}">All Categories </a>--}}
{{--                </li>--}}
                @foreach ($categories as $key => $category)
                    <li>
                        <a href="#"
                           class="category-btn {{Request::route('category') == $category->id ? 'base-txt' : '' }}">{{$category->name}}
                            <span class="right"><i class="fa fa-caret-down"></i></span></a>
                        <ul class="subcategories {{Request::route('category') == $category->id ? 'open' : '' }}">
                            @foreach ($category->subcategories()->where('status', 1)->get() as $key => $subcategory)
                                <li><a href="{{route('user.search', [ $category->id, $subcategory->id])}}"
                                       class="{{Request::route('subcategory') == $subcategory->id ? 'base-txt' : '' }}">{{$subcategory->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div><!-- //.category-filter-widget -->
    </div><!-- //. category sidebar -->
</nav>
<div id="overlay" onclick="closeNav()"></div>
