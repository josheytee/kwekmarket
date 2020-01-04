<!-- header area start -->
<div class="container">
    <div class="row">
        <div class="col-md-9 mt-2">
            <div class="hero-carousel owl-carousel owl-theme">
                @foreach ($sliders as $key => $slider)
                <a href="{{$slider->url}}">
                    <div class="header-area-three header-bg-four home-six" style="background-image: url('{{asset('assets/user/interfaceControl/sliders/'.$slider->image)}}');border-radius: .6rem">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="header-inner">
                                        <!-- header inner -->
                                        {{-- <span class="subtitle">{{$slider->title}}</span>--}}
                                        {{-- <h1 class="title">{{$slider->bold_text}}</h1>--}}
                                        {{-- <p>{{$slider->small_text}}</p>--}}
                                        {{-- <div class="btn-wrapper">--}}
                                        {{-- <a href="{{$slider->url}}" class="boxed-btn">View Collections
                </a>--}}
                {{-- </div>--}}
            </div><!-- //. header inner -->
        </div>
    </div>
</div>
</div>
</a>
@endforeach
</div>
</div>

<div class="col-md-3 mt-sm-2" style="background:white; border-radius: .6rem">
    <div class="row py-2">
        @foreach ($categories as $key => $cat)
        <div class="col-12">
            <a href="{{route('user.search', $cat->id)}}">
                <div class="nav-box ">
                    <div style="display: inline-block">
                        <img src=" {{asset('assets/custom/category/'.$cat->name.'.png')}}" width="25" />
                    </div>
                    <div style="display: inline-block" class="nav-right-box">
                        {{$cat->name}}
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
</div>
</div>

<!-- header area end -->