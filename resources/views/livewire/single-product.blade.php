@php
    $images = \App\Models\ProductImage::where('product_id', $product->id)->get();
@endphp
<div class="tf-main-product">
    <div class="container">
        <div class="row">
            {{--<div class="col-md-6">
                <div class="tf-product-media-wrap sticky-top">
                    <div class="thumbs-slider">
                        <div dir="ltr" class="swiper tf-product-media-thumbs other-image-zoom swiper-initialized swiper-vertical swiper-pointer-events swiper-free-mode swiper-watch-progress swiper-thumbs" data-direction="vertical">
                            <div class="swiper-wrapper stagger-wrap" id="swiper-wrapper-d9f48536cfcaaa39" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">

                                @php
                                    $images = \App\Models\ProductImage::where('product_id', $product->id)->get();
                                @endphp

                                <div class="swiper-slide stagger-item swiper-slide-active swiper-slide-thumb-active stagger-finished swiper-slide-visible"  role="group" style="transition-delay: 1.2s; margin-bottom: 10px;">
                                    <div class="item">
                                        <img class=" ls-is-cached lazyloaded" data-src="{{ $product->getImage() }}" src="{{ $product->getImage() }}" alt="img-product">
                                    </div>
                                </div>
                                @foreach($images as $key => $image)
                                    <div class="swiper-slide stagger-item stagger-finished swiper-slide-visible"  role="group" style="transition-delay: 1.2s; margin-bottom: 10px;">
                                        <div class="item">
                                            <img class=" ls-is-cached lazyloaded" data-src="{{ $image->getImage() }}" src="{{ $image->getImage() }}" alt="img-product">
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                        <div dir="ltr" class="swiper tf-product-media-main swiper-initialized swiper-horizontal swiper-pointer-events" id="gallery-swiper-started">
                            <div class="swiper-wrapper"  style="transform: translate3d(0px, 0px, 0px);">


                                <div class="swiper-slide swiper-slide-active" style="width: 597px;">
                                    <a href="{{ $product->getImage() }}" target="_blank" class="item" data-pswp-width="770px" data-pswp-height="1075px">
                                        <img class="tf-image-zoom ls-is-cached lazyloaded" data-zoom="{{ $product->getImage() }}" data-src="{{ $product->getImage() }}" src="{{ $product->getImage() }}" alt="">
                                    </a>
                                </div>

                                @foreach($images as $image)
                                    <div class="swiper-slide" style="width: 597px;">
                                        <a href="{{ $image->getImage() }}" target="_blank" class="item" data-pswp-width="770px" data-pswp-height="1075px">
                                            <img class="tf-image-zoom ls-is-cached lazyloaded" data-zoom="{{ $image->getImage() }}" data-src="{{ $image->getImage() }}" src="{{ $image->getImage() }}" alt="">
                                        </a>
                                    </div>
                                @endforeach
                                <!-- beige -->


                            </div>
                            <div class="swiper-button-next button-style-arrow thumbs-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-a7dc8d1352967cc3" aria-disabled="false"></div>
                            <div class="swiper-button-prev button-style-arrow thumbs-prev swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-a7dc8d1352967cc3" aria-disabled="true"></div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                    </div>
                </div>
            </div>--}}

            <div class="col-md-6">
                <div class="tf-product-media-wrap wrapper-gallery-scroll">
                    <div class="mb_10">
                        <a href="{{ $product->getImage() }}" target="_blank" data-color="beige" class="item item-img-color" data-pswp-width="770px" data-pswp-height="1075px">
                            <img class="tf-image-zoom ls-is-cached lazyloaded" data-zoom="{{ $product->getImage() }}" data-src="{{ $product->getImage() }}" src="{{ $product->getImage() }}" alt="">
                        </a>
                    </div>

                    <div class="d-grid grid-template-columns-2 gap-10" id="gallery-started">
                        @foreach($images as $image)
                            <a href="{{ $image->getImage() }}" target="_blank" data-color="beige" class="item item-img-color" data-pswp-width="770px" data-pswp-height="1075px">
                                <img class="radius-10 tf-image-zoom ls-is-cached lazyloaded" data-zoom="{{ $image->getImage() }}" data-src="{{ $image->getImage() }}" src="{{ $image->getImage() }}" alt="img-product">
                            </a>
                        @endforeach


                    </div>

                </div>
            </div>

            <div class="col-md-6">
                <div class="tf-product-info-wrap position-relative">
                    <div class="tf-zoom-main"></div>
                    <div class="tf-product-info-list other-image-zoom">
                        <div class="tf-product-info-title">
                            <h5>{{ $product->name }}</h5>
                        </div>
                        {{-- <div class="tf-product-info-badges">
                             <div class="badges">Best seller</div>
                             <div class="product-status-content">
                                 <i class="icon-lightning"></i>
                                 <p class="fw-6">Selling fast! 56 people have  this in their carts.</p>
                             </div>
                         </div>--}}
                        <div class="tf-product-info-price">
                            <div class="price-on-sale">{{ $product->getPrice() }}</div>

                        </div>
                        {{--<div class="tf-product-info-liveview">
                            <div class="liveview-count">20</div>
                            <p class="fw-6">People are viewing this right now</p>
                        </div>--}}

                        {{--<div class="tf-product-info-variant-picker">
                            <div class="variant-picker-item">
                                <div class="variant-picker-label">
                                    Color: <span class="fw-6 variant-picker-label-value value-currentColor">beige</span>
                                </div>
                                <div class="variant-picker-values">
                                    <input id="values-beige" type="radio" name="color1" checked="">
                                    <label class="hover-tooltip radius-60 color-btn active" for="values-beige" data-color="beige" data-value="Beige">
                                        <span class="btn-checkbox bg-color-beige"></span>
                                        <span class="tooltip">Beige</span>
                                    </label>
                                    <input id="values-black" type="radio" name="color1">
                                    <label class="hover-tooltip radius-60 color-btn" data-price="9" for="values-black" data-color="black" data-value="Black">
                                        <span class="btn-checkbox bg-color-black"></span>
                                        <span class="tooltip">Black</span>
                                    </label>
                                    <input id="values-blue" type="radio" name="color1">
                                    <label class="hover-tooltip radius-60 color-btn" data-price="10" for="values-blue" data-color="blue" data-value="Blue">
                                        <span class="btn-checkbox bg-color-blue"></span>
                                        <span class="tooltip">Blue</span>
                                    </label>
                                    <input id="values-white" type="radio" name="color1">
                                    <label class="hover-tooltip radius-60 color-btn" data-price="12" for="values-white" data-color="white" data-value="White">
                                        <span class="btn-checkbox bg-color-white"></span>
                                        <span class="tooltip">White</span>
                                    </label>
                                </div>
                            </div>
                            <div class="variant-picker-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="variant-picker-label">
                                        Size: <span class="fw-6 variant-picker-label-value">S</span>
                                    </div>
                                    <a href="#find_size" data-bs-toggle="modal" class="find-size fw-6">Find your size</a>
                                </div>
                                <div class="variant-picker-values">
                                    <input type="radio" name="size1" id="values-s" checked="">
                                    <label class="style-text size-btn" for="values-s" data-value="S">
                                        <p>S</p>
                                    </label>
                                    <input type="radio" name="size1" id="values-m">
                                    <label class="style-text size-btn" data-price="9" for="values-m" data-value="M">
                                        <p>M</p>
                                    </label>
                                    <input type="radio" name="size1" id="values-l">
                                    <label class="style-text size-btn" data-price="10" for="values-l" data-value="L">
                                        <p>L</p>
                                    </label>
                                    <input type="radio" name="size1" id="values-xl">
                                    <label class="style-text size-btn" data-price="12" for="values-xl" data-value="XL">
                                        <p>XL</p>
                                    </label>
                                </div>
                            </div>
                        </div>--}}
                        <div class="tf-product-info-quantity">
                            <div class="quantity-title fw-6">Quantity</div>
                            <div class="wg-quantity">
                                <span class="btn-quantity" @click="$dispatch('decrement')">-</span>
                                <input type="text" class="quantity-product" name="quantity" wire:model="quantity" value="{{ $quantity }}">
                                <span class="btn-quantity " @click="$dispatch('increment')">+</span>
                            </div>
                        </div>
                        <div class="tf-product-info-buy-button">
                            <form class="">
                                <a href="javascript:void(0);" wire:click="addToCart" class="tf-btn btn-fill justify-content-center fw-6 fs-16 flex-grow-1 animate-hover-btn add-to-cart-btn"><span>Add to cart -&nbsp;</span><span class="tf-qty-price total-price">${{ number_format(floatval($product->price * $quantity), 2) }}</span></a>
                                <a href="javascript:void(0);" wire:click="addToWishlist" class="tf-product-btn-wishlist hover-tooltip box-icon bg_white wishlist btn-icon-action">
                                    <span class="icon icon-heart"></span>
                                    <span class="tooltip">Add to Wishlist</span>
                                    <span class="icon icon-delete"></span>
                                </a>
                                <div class="w-100">
                                    <button type="button" wire:click="buyNow" @if($isProcessing) disabled @endif class="btns-full border-0">Buy with <img src="{{ asset('images/payments/paypal.png') }}" alt="">
                                        @if($isProcessing)
                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                            Processing...
                                        @endif
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="tf-product-info-trust-seal">
                            <div class="tf-product-trust-mess">
                                <i class="icon-safe"></i>
                                <p class="fw-6">Guarantee Safe <br> Checkout</p>
                            </div>
                            <div class="tf-payment">
                                <img src="{{ asset('images/payments/visa.png')}}" alt="">
                                <img src="{{ asset('images/payments/img-1.png')}}" alt="">
                                <img src="{{ asset('images/payments/img-2.png')}}" alt="">
                                <img src="{{ asset('images/payments/img-3.png')}}" alt="">
                                <img src="{{ asset('images/payments/img-4.png')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
