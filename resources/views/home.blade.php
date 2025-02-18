@extends('layouts.main')
@section('title') Home @endsection
@section('content')
    <!-- Slider -->
    <div class="tf-slideshow slider-effect-fade position-relative">
        <div dir="ltr" class="swiper tf-sw-slideshow swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden" data-preview="1" data-tablet="1" data-mobile="1" data-centered="false" data-space="0" data-loop="true" data-auto-play="true" data-delay="0" data-speed="1000">
            <div class="swiper-wrapper" id="swiper-wrapper-fe1de996e392580a" aria-live="polite" style="transform: translate3d(-1880px, 0px, 0px); transition-duration: 0ms;"><div class="swiper-slide swiper-slide-duplicate swiper-slide-prev" data-swiper-slide-index="2" style="width: 1880px;" role="group" aria-label="3 / 3">
                    <div class="wrap-slider">
                        <img src="images/slider/fashion-slideshow-03.jpg" alt="fashion-slideshow">
                        <div class="box-content">
                            <div class="container">
                                <h1 class="fade-item fade-item-1">Timeless African Elegance!</h1>
                                <p class="fade-item fade-item-2">Showcasing vibrant, authentic styles that connect you to tradition and culture.</p>
                                <a href="{{ route('shop') }}" class="fade-item fade-item-3 tf-btn btn-fill animate-hover-btn btn-xl radius-3"><span>Shop collection</span><i class="icon icon-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" style="width: 1880px;" role="group" aria-label="1 / 3">
                    <div class="wrap-slider">
                        <img src="images/slider/fashion-slideshow-01.jpg" alt="fashion-slideshow">
                        <div class="box-content">
                            <div class="container">
                                <h1 class="fade-item fade-item-1">Step Into African Fashion</h1>
                                <p class="fade-item fade-item-2"> Speak Your Soul!.</p>
                                <a href="{{ route('shop') }}" class="fade-item fade-item-3 tf-btn btn-fill animate-hover-btn btn-xl radius-3"><span>Shop collection</span><i class="icon icon-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="1" style="width: 1880px;" role="group" aria-label="2 / 3">
                    <div class="wrap-slider">
                        <img src="images/slider/fashion-slideshow-05.jpg" alt="fashion-slideshow">
                        <div class="box-content">
                            <div class="container">
                                <h1 class="fade-item fade-item-1">Timeless African Elegance <br class="md-hidden"></h1>
                                <p class="fade-item fade-item-2">Wear Your Roots!</p>
                                <a href="{{ route('shop') }}" class="fade-item fade-item-3 tf-btn btn-fill animate-hover-btn btn-xl radius-3"><span>Shop collection</span><i class="icon icon-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide swiper-slide-duplicate-prev" data-swiper-slide-index="2" style="width: 1880px;" role="group" aria-label="3 / 3">
                    <div class="wrap-slider">
                        <img src="images/slider/fashion-slideshow-04.jpg" alt="fashion-slideshow">
                        <div class="box-content">
                            <div class="container">
                                <h1 class="fade-item fade-item-1">Bold, Beautiful, African</h1>
                                <p class="fade-item fade-item-2">From casual to formal, we've got you covered</p>
                                <a href="{{ route('shop') }}" class="fade-item fade-item-3 tf-btn btn-fill animate-hover-btn btn-xl radius-3"><span>Shop collection</span><i class="icon icon-arrow-right"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active" data-swiper-slide-index="0" role="group" aria-label="1 / 3" style="width: 1880px;">
                    <div class="wrap-slider">
                        <img src="images/slider/fashion-slideshow-01.jpg" alt="fashion-slideshow">
                        <div class="box-content">
                            <div class="container">
                                <h1 class="fade-item fade-item-1">Glamorous<br>Glam</h1>
                                <p class="fade-item fade-item-2">From casual to formal, we've got you covered</p>
                                <a href="{{ route('shop') }}" class="fade-item fade-item-3 tf-btn btn-fill animate-hover-btn btn-xl radius-3"><span>Shop collection</span><i class="icon icon-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
        <div class="wrap-pagination">
            <div class="container">
                <div class="sw-dots sw-pagination-slider justify-content-center swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1" aria-current="true"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span></div>
            </div>
        </div>
    </div>
    <!-- /Slider -->
    <!-- Collection -->
    <section class="flat-spacing-12 bg_grey-3">
        <div class="container">
            <div class="flat-title flex-row justify-content-between align-items-center px-0 wow fadeInUp" data-wow-delay="0s">
                <h3 class="title">Unique African Collections</h3>
                <a href="{{ route('collections') }}" class="tf-btn btn-line">View all collections<i class="icon icon-arrow1-top-left"></i></a>
            </div>
            <div class="hover-sw-nav hover-sw-2">
                <div dir="ltr" class="swiper tf-sw-collection" data-preview="4" data-tablet="3" data-mobile="2" data-space-lg="50" data-space-md="30" data-space="15" data-loop="false" data-auto-play="true">
                    <div class="swiper-wrapper">
                        @if(isset($collections))
                            @foreach($collections as $collection)
                                <div class="swiper-slide" lazy="true">
                                    <div class="collection-item-circle hover-img">
                                        <a href="/shop?collection={{ $collection->slug }}" class="collection-image img-style">
                                            <img class="lazyload" data-src="{{ \Illuminate\Support\Facades\Storage::url($collection->image) }}" src="{{ \Illuminate\Support\Facades\Storage::url($collection->image) }}" alt="collection-img">
                                        </a>
                                        <div class="collection-content text-center">
                                            <a href="/shop?collection={{ $collection->slug }}" class="link title fw-5">{{ ucwords($collection->name) }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
                <div class="sw-dots style-2 sw-pagination-collection justify-content-center"></div>
                <div class="nav-sw nav-next-slider nav-next-collection"><span class="icon icon-arrow-left"></span></div>
                <div class="nav-sw nav-prev-slider nav-prev-collection"><span class="icon icon-arrow-right"></span></div>
            </div>
        </div>
    </section>
    <!-- /Collection -->

    <section class="flat-spacing-4 flat-categorie">
        <div class="container-full">

            <div class="row">
                <div class="col-xl-9 col-lg-8 col-md-8">
                    <div dir="ltr" class="swiper tf-sw-collection swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden" data-preview="3" data-tablet="2" data-mobile="2" data-space-lg="30" data-space-md="30" data-space="15" data-loop="true" data-auto-play="true">
                        <div class="swiper-wrapper" id="swiper-wrapper-6faeb1e710eb7e86" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
                            @foreach($categories as $category)
                                <div class="swiper-slide " lazy="true" style="width: 433.333px; margin-right: 30px;" role="group" aria-label="1 / 5">
                                    <div class="collection-item style-left hover-img">
                                        <div class="collection-inner">
                                            <a href="/shop?category_id={{ $category->id }}" class="collection-image img-style">
                                                <img class=" ls-is-cached lazyloaded" data-src="{{ \Illuminate\Support\Facades\Storage::url($category->image) }}" src="{{ \Illuminate\Support\Facades\Storage::url($category->image) }}" alt="collection-img">
                                            </a>
                                            <div class="collection-content">
                                                <a href="/shop?category_id={{ $category->id }}" class="tf-btn collection-title hover-icon fs-15"><span>{{ $category->name }}</span><i class="icon icon-arrow1-top-left"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-4">
                    <div class="discovery-new-item">
                        <h5>Discovery all new items</h5>
                        <a href="{{ route('shop') }}"><i class="icon-arrow1-top-left"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Sale Product -->
    <section class="flat-spacing-17">
        <div class="container">
            <div class="flat-animate-tab">
                <ul class="widget-tab-2 d-flex justify-content-center wow fadeInUp" data-wow-delay="0s" role="tablist">
                    <li class="nav-tab-item" role="presentation">
                        <a href="#bestSeller" class="active" data-bs-toggle="tab">Best seller</a>
                    </li>
                    <li class="nav-tab-item" role="presentation">
                        <a href="#newArrivals"  data-bs-toggle="tab">New arrivals</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active show" id="bestSeller" role="tabpanel">
                        <div class="grid-layout loadmore-item" data-grid="grid-4">
                           @foreach($products as $product)
                                <!-- card product 1 -->
                                <div class="card-product fl-item" data-product-id="{{ $product->id }}">
                                    <div class="card-product-wrapper" >
                                        <a href="{{ route('products', $product->slug) }}" class="product-img">
                                            <img class="lazyload img-product" data-src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}" src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}" alt="{{$product->slug}}">
                                            <img class="img-hover ls-is-cached lazyloaded" data-src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}" src="{{ \Illuminate\Support\Facades\Storage::url($product->image)}}" alt="{{$product->slug}}">
                                        </a>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>

                                            <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="{{ route('products', $product->slug) }}" class="title link">{{ $product->name }}</a>
                                        <span class="price">{{ $product->getPrice()}}</span>

                                    </div>
                                </div>
                           @endforeach
                        </div>
                        <div class="tf-pagination-wrap view-more-button text-center">
                            <button class="tf-btn-loading tf-loading-default style-2 btn-loadmore "><span class="text">Load more</span></button>
                        </div>
                    </div>
                    <div class="tab-pane" id="newArrivals" role="tabpanel">
                        <div class="grid-layout loadmore-item2" data-grid="grid-4">
                            @foreach($newArrivals as $product)
                                <!-- card product 1 -->
                                <div class="card-product fl-item" data-product-id="{{ $product->id }}">
                                    <div class="card-product-wrapper">
                                        <a href="{{ route('products', $product->slug) }}" class="product-img">
                                            <img class="lazyload img-product" data-src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}" src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}" alt="{{$product->slug}}">
                                            <img class="img-hover ls-is-cached lazyloaded" data-src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}" src="{{ \Illuminate\Support\Facades\Storage::url($product->image)}}" alt="{{$product->slug}}">
                                        </a>
                                        <div class="list-product-btn">
                                            <a href="#quick_add" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                                                <span class="icon icon-bag"></span>
                                                <span class="tooltip">Quick Add</span>
                                            </a>
                                            <a href="javascript:void(0);" class="box-icon bg_white wishlist btn-icon-action">
                                                <span class="icon icon-heart"></span>
                                                <span class="tooltip">Add to Wishlist</span>
                                                <span class="icon icon-delete"></span>
                                            </a>

                                            <a href="#quick_view" data-bs-toggle="modal" class="box-icon bg_white quickview tf-btn-loading">
                                                <span class="icon icon-view"></span>
                                                <span class="tooltip">Quick View</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-product-info">
                                        <a href="{{ route('products', $product->slug) }}" class="title link">{{ $product->name }}</a>
                                        <span class="price">{{ $product->getPrice()}}</span>

                                    </div>
                                </div>
                            @endforeach
                        <div class="tf-pagination-wrap view-more-button2 text-center">
                            <button class="tf-btn-loading tf-loading-default style-2 btn-loadmore2"><span class="text">Load more</span></button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!-- /Sale Product -->

    <!-- Icon box -->
    <section class="flat-spacing-1 flat-iconbox">
        <div class="container">
            <div class="wrap-carousel wrap-mobile wow fadeInUp" data-wow-delay="0s">
                <div dir="ltr" class="swiper tf-sw-mobile" data-preview="1" data-space="15">
                    <div class="swiper-wrapper wrap-iconbox">
                        <div class="swiper-slide">
                            <div class="tf-icon-box style-row">
                                <div class="icon">
                                    <i class="icon-shipping"></i>
                                </div>
                                <div class="content">
                                    <div class="title fw-4">Shipping</div>
                                    <p>Free shipping for order over $120</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="tf-icon-box style-row">
                                <div class="icon">
                                    <i class="icon-payment fs-22"></i>
                                </div>
                                <div class="content">
                                    <div class="title fw-4">Flexible Payment</div>
                                    <p>Pay with Multiple Credit Cards</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="tf-icon-box style-row">
                                <div class="icon">
                                    <i class="icon-return fs-20"></i>
                                </div>
                                <div class="content">
                                    <div class="title fw-4">14 Day Returns</div>
                                    <p>Within 30 days for an exchange</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="tf-icon-box style-row">
                                <div class="icon">
                                    <i class="icon-suport"></i>
                                </div>
                                <div class="content">
                                    <div class="title fw-4">Premium Support</div>
                                    <p>Outstanding premium support</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="sw-dots style-2 sw-pagination-mb justify-content-center"></div>
            </div>
        </div>
    </section>
    <!-- /Icon box -->
    <!-- Location -->
    <section>
        <div class="container">
            <div class="flat-location">
                <div class="banner-map overflow-x-hidden">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d196237.185003195!2d-86.29756082989212!3d39.77993181458865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x886b50ffa7796a03%3A0xd68e9df640b9ea7c!2sIndianapolis%2C%20IN%2C%20USA!5e0!3m2!1sen!2scm!4v1735574156332!5m2!1sen!2scm" width="1525" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="content">
                    <h3 class="heading wow fadeInUp" data-wow-delay="0s">Sombos Creations</h3>
                    <p class="subtext wow fadeInUp" data-wow-delay="0s">
                        2345 Main Street, Indianapolis, IN 46202
                        <br>
                        contact@sombos-creations.com
                        <br>
                        (08) 8942 1299
                    </p>
                    <p class="subtext wow fadeInUp" data-wow-delay="0s">
                        Mon - Fri, 8:30am - 5:30pm
                        <br>
                        Saturday, 8:30am - 5:30pm
                        <br>
                        Sunday Closed
                    </p>
                    <a href="https://maps.app.goo.gl/3ShQUXSn2vHcU2eY8" target="_self" class="tf-btn btn-line collection-other-link fw-6 wow fadeInUp" data-wow-delay="0s">Get Directions<i class="icon icon-arrow1-top-left"></i></a>
                </div>
            </div>
        </div>
    </section>
    <!-- /Location -->
@endsection

@push('scripts')

@endpush
