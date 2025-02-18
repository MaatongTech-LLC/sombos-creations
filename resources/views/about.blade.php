@extends('layouts.main')
@section('title')
    About Us
@endsection

@section('content')
    <section class="tf-slideshow about-us-page position-relative">
        <div class="banner-wrapper">
            <img class=" ls-is-cached lazyloaded" src="images/slider/about-banner-01.jpg" data-src="images/slider/about-banner-01.jpg" alt="image-collection">
            <div class="box-content text-center">
                <div class="container">
                    <div class="text text-white">Achieve Your Fitness Goals,  <br class="d-xl-block d-none"> Embrace African Elegance!</div>
                </div>
            </div>
        </div>
    </section>


    <section class="flat-spacing-9">
        <div class="container">
            <div class="flat-title my-0">
                <span class="title">We are Sombos Creations</span>
                <p class="sub-title text_black-2">
                    Welcome to Sombos Creations, <br>where African heritage meets contemporary fashion,
                    offering a curated selection of clothing, jewelry,
                    and accessories <br> that embody the beauty and diversity of Africa.
                </p>
            </div>
        </div>
    </section>


    <section class="flat-spacing-23 flat-image-text-section">
        <div class="container">
            <div class="tf-grid-layout md-col-2 tf-img-with-text style-4">
                <div class="tf-image-wrap">
                    <img class="w-100 h-100 ls-is-cached lazyloaded" data-src="images/collections/collection-18.jpg" src="images/collections/collection-18.jpg" alt="collection-img">
                </div>
                <div class="tf-content-wrap px-0 d-flex justify-content-center w-100">
                    <div>
                        <div class="heading">Established - {{ date('Y') }}</div>
                        <div class="text">
                            Sombos Creations was founded in {{ date('Y') }} by Brenda, a fashion lover with a <br class="d-xl-block d-none">
                            passion for timeless african style. Brenda had always been drawn to classic <br class="d-xl-block d-none">
                            pieces that could be worn season after season, and she believed that <br class="d-xl-block d-none">
                            there was a gap in the market for a store that focused solely on african classic <br class="d-xl-block d-none">
                            clothing & accessories. She opened her first store in a small town in Indiana, <br class="d-xl-block d-none">
                            where it quickly became a local favorite.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="flat-spacing-15">
        <div class="container">
            <div class="tf-grid-layout md-col-2 tf-img-with-text style-4">
                <div class="tf-content-wrap px-0 d-flex justify-content-center w-100">
                    <div>
                        <div class="heading">Our mission</div>
                        <div class="text">
                            At <strong>Sombos Creations</strong>, our mission is to celebrate and promote African culture through fashion. <br class="d-xl-block d-none">
                            We aim to empower local artisans and designers by providing them with a global platform to showcase their talents and traditional craftsmanship <br class="d-xl-block d-none">
                            By curating a collection of high-quality, culturally significant products, <br class="d-xl-block d-none">
                            we strive to offer our customers unique pieces that tell a story and inspire a connection to Africa.
                        </div>
                    </div>
                </div>
                <div class="grid-img-group">
                    {{--<div class="tf-image-wrap box-img item-1">
                        <div class="img-style">
                            <img class=" ls-is-cached lazyloaded" src="images/collections/collection-20.jpg" data-src="images/collections/collection-20.jpg" alt="img-slider">
                        </div>
                    </div>--}}
                    <div class="tf-image-wrap box-img item-2">
                        <div class="img-style">
                            <img class=" ls-is-cached lazyloaded" src="images/collections/collection-30.jpg" data-src="images/collections/collection-30.jpg" alt="img-slider">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container">
            <div class="bg_grey-2 radius-10 flat-wrap-iconbox">
                <div class="flat-title lg">
                    <span class="title fw-5">Quality is our priority</span>
                    <div>
                        <p class="sub-title text_black-2">Our talented stylists have put together outfits that are perfect for the season.</p>
                        <p class="sub-title text_black-2">They've variety of ways to inspire your next fashion-forward look.</p>
                    </div>
                </div>
                <div class="flat-iconbox-v3 lg">
                    <div class="wrap-carousel wrap-mobile">
                        <div dir="ltr" class="swiper tf-sw-mobile" data-preview="1" data-space="15">
                            <div class="swiper-wrapper wrap-iconbox lg">
                                <div class="swiper-slide">
                                    <div class="tf-icon-box text-center">
                                        <div class="icon">
                                            <i class="icon-materials"></i>
                                        </div>
                                        <div class="content">
                                            <div class="title">High-Quality Materials</div>
                                            <p class="text_black-2">Crafted with precision and excellence, our activewear is meticulously engineered using premium materials to ensure unmatched comfort and durability.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="tf-icon-box text-center">
                                        <div class="icon">
                                            <i class="icon-design"></i>
                                        </div>
                                        <div class="content">
                                            <div class="title">Laconic Design</div>
                                            <p class="text_black-2">Simplicity refined. Our activewear embodies the essence of minimalistic design, delivering effortless style that speaks volumes.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="tf-icon-box text-center">
                                        <div class="icon">
                                            <i class="icon-sizes"></i>
                                        </div>
                                        <div class="content">
                                            <div class="title">Various Sizes</div>
                                            <p class="text_black-2">Designed for every body and anyone, our activewear embraces diversity with a wide range of sizes and shapes, celebrating the beauty of individuality.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="sw-dots style-2 sw-pagination-mb justify-content-center"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="flat-spacing-1">
        {{--<div class="container">
            <div class="flat-title">
                <span class="title">Shop Gram</span>
                <p class="sub-title">Inspire and let yourself be inspired, from one unique fashion to another.</p>
            </div>
            <div class="wrap-shop-gram">
                <div dir="ltr" class="swiper tf-sw-shop-gallery swiper-initialized swiper-horizontal swiper-pointer-events swiper-backface-hidden" data-preview="5" data-tablet="3" data-mobile="2" data-space-lg="7" data-space-md="7">
                    <div class="swiper-wrapper" id="swiper-wrapper-63db2b1021d710251" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
                        <div class="swiper-slide swiper-slide-active" style="width: 282.4px; margin-right: 7px;" role="group" aria-label="1 / 5">
                            <div class="gallery-item hover-img">
                                <div class="img-style">
                                    <img class="img-hover ls-is-cached lazyloaded" data-src="images/shop/gallery/gallery-7.jpg" src="images/shop/gallery/gallery-7.jpg" alt="image-gallery">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide swiper-slide-next" style="width: 282.4px; margin-right: 7px;" role="group" aria-label="2 / 5">
                            <div class="gallery-item hover-img">
                                <div class="img-style">
                                    <img class="img-hover ls-is-cached lazyloaded" data-src="images/shop/gallery/gallery-3.jpg" src="images/shop/gallery/gallery-3.jpg" alt="image-gallery">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide" style="width: 282.4px; margin-right: 7px;" role="group" aria-label="3 / 5">
                            <div class="gallery-item hover-img">
                                <div class="img-style">
                                    <img class="img-hover ls-is-cached lazyloaded" data-src="images/shop/gallery/gallery-5.jpg" src="images/shop/gallery/gallery-5.jpg" alt="image-gallery">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide" style="width: 282.4px; margin-right: 7px;" role="group" aria-label="4 / 5">
                            <div class="gallery-item hover-img">
                                <div class="img-style">
                                    <img class="img-hover ls-is-cached lazyloaded" data-src="images/shop/gallery/gallery-8.jpg" src="images/shop/gallery/gallery-8.jpg" alt="image-gallery">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide" role="group" aria-label="5 / 5" style="width: 282.4px; margin-right: 7px;">
                            <div class="gallery-item hover-img">
                                <div class="img-style">
                                    <img class="img-hover ls-is-cached lazyloaded" data-src="images/shop/gallery/gallery-6.jpg" src="images/shop/gallery/gallery-6.jpg" alt="image-gallery">
                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                <div class="sw-dots sw-pagination-gallery justify-content-center swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal swiper-pagination-lock"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1" aria-current="true"></span></div>
            </div>
        </div>--}}
    </section>
@endsection
