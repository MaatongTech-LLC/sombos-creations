@extends('layouts.main')
@section('title') Shop @endsection

@section('content')
    <div class="tf-page-title">
        <div class="container-full">
            <div class="row">
                <div class="col-12">
                    <div class="heading text-center">Shop</div>
                    <p class="text-center text-2 text_black-2 mt_5">Shop through our latest selection of African Fashion</p>
                </div>
            </div>
        </div>
    </div>

    <section class="flat-spacing-1">
        <div class="container">
            <div class="tf-shop-control grid-3 align-items-center">
                <div class="tf-control-filter">
                    <a href="#filterShop" data-bs-toggle="offcanvas" aria-controls="offcanvasLeft" class="tf-btn-filter"><span class="icon icon-filter"></span><span class="text">Filter</span></a>
                </div>
                <ul class="tf-control-layout d-flex justify-content-center">
                    <li class="tf-view-layout-switch sw-layout-list list-layout" data-value-layout="list">
                        <div class="item"><span class="icon icon-list"></span></div>
                    </li>
                    <li class="tf-view-layout-switch sw-layout-2" data-value-layout="tf-col-2">
                        <div class="item"><span class="icon icon-grid-2"></span></div>
                    </li>
                    <li class="tf-view-layout-switch sw-layout-3" data-value-layout="tf-col-3">
                        <div class="item"><span class="icon icon-grid-3"></span></div>
                    </li>
                    <li class="tf-view-layout-switch sw-layout-4 active" data-value-layout="tf-col-4">
                        <div class="item"><span class="icon icon-grid-4"></span></div>
                    </li>
                    <li class="tf-view-layout-switch sw-layout-5" data-value-layout="tf-col-5">
                        <div class="item"><span class="icon icon-grid-5"></span></div>
                    </li>
                    <li class="tf-view-layout-switch sw-layout-6" data-value-layout="tf-col-6">
                        <div class="item"><span class="icon icon-grid-6"></span></div>
                    </li>
                </ul>
                <div class="tf-control-sorting d-flex justify-content-end">
                    <div class="tf-dropdown-sort" data-bs-toggle="dropdown">
                        <div class="btn-select">
                            <span class="text-sort-value">Featured</span>
                            <span class="icon icon-arrow-down"></span>
                        </div>
                        <div class="dropdown-menu">
                            <div class="select-item active">
                                <span class="text-value-item">Featured</span>
                            </div>
                            <div class="select-item">
                                <span class="text-value-item">Best selling</span>
                            </div>
                            <div class="select-item" data-sort-value="a-z">
                                <span class="text-value-item">Alphabetically, A-Z</span>
                            </div>
                            <div class="select-item" data-sort-value="z-a">
                                <span class="text-value-item">Alphabetically, Z-A</span>
                            </div>
                            <div class="select-item" data-sort-value="price-low-high">
                                <span class="text-value-item">Price, low to high</span>
                            </div>
                            <div class="select-item" data-sort-value="price-high-low">
                                <span class="text-value-item">Price, high to low</span>
                            </div>
                            <div class="select-item">
                                <span class="text-value-item">Date, old to new</span>
                            </div>
                            <div class="select-item">
                                <span class="text-value-item">Date, new to old</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrapper-control-shop gridLayout-wrapper">
                <div class="meta-filter-shop" style="display: none;">
                    <div id="product-count-grid" class="count-text"><span class="count">12</span> Products Found</div>
                    <div id="product-count-list" class="count-text"><span class="count">8</span> Products Found</div>
                    <div id="applied-filters"></div>
                    <button id="remove-all" class="remove-all-filters" style="display: none;">Remove All <i class="icon icon-close"></i></button>
                </div>
                <div class="tf-list-layout wrapper-shop" id="listLayout" style="display: none;">
                    @foreach($products as $product)
                        <!-- card product 1 -->
                        <div class="card-product list-layout" data-product-id="{{ $product->id }}" data-availability="{{ $product->stock > 0 ? 'In stock' : 'Out of stock' }}" data-brand="Sombos">
                            <div class="card-product-wrapper">
                                <a href="{{ route('products', $product->slug) }}" class="product-img">
                                    <img class="lazyload img-product" data-src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}" src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}" alt="image-product">
                                    <img class="img-hover ls-is-cached lazyloaded" data-src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}" src="{{ \Illuminate\Support\Facades\Storage::url($product->image)}}" alt="image-product">
                                </a>
                            </div>
                            <div class="card-product-info">
                                <a href="{{ route('products', $product->slug) }}" class="title link">{{ $product->name }}</a>
                                <span class="price">{{ $product->getPrice()}}</span>
                                <p class="description">{{ $product->description !== null ? $product->description : '' }}</p>

                                <div class="list-product-btn">
                                    <a href="#quick_add2" data-bs-toggle="modal" class="box-icon quick-add style-3 hover-tooltip"><span class="icon icon-bag"></span><span class="tooltip">Quick add</span></a>
                                    <a href="#" class="box-icon wishlist style-3 hover-tooltip"><span class="icon icon-heart"></span> <span class="tooltip">Add to Wishlist</span></a>
                                    <a href="#compare2" data-bs-toggle="offcanvas" class="box-icon compare style-3 hover-tooltip"><span class="icon icon-compare"></span> <span class="tooltip">Add to Compare</span></a>
                                    <a href="#quick_view2" data-bs-toggle="modal" class="box-icon quickview style-3 hover-tooltip"><span class="icon icon-view"></span><span class="tooltip">Quick view</span></a>
                                </div>

                            </div>

                        </div>
                    @endforeach


                    <!-- pagination -->
                    <ul class="wg-pagination tf-pagination-list justify-content-start">
                        <li class="active">
                            <a href="#" class="pagination-link">1</a>
                        </li>
                        <li>
                            <a href="#" class="pagination-link animate-hover-btn">2</a>
                        </li>
                        <li>
                            <a href="#" class="pagination-link animate-hover-btn">3</a>
                        </li>
                        <li>
                            <a href="#" class="pagination-link animate-hover-btn">
                                <span class="icon icon-arrow-right"></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tf-grid-layout wrapper-shop tf-col-4" id="gridLayout">
                    @foreach($products as $product)
                        <!-- card product 1 -->
                        <div class="card-product style-2 grid" data-product-id="{{ $product->id }}" data-availability="{{ $product->stock > 0 ? 'In stock' : 'Out of stock' }}">
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
                                <a href="{{ route('products', $product->id) }}" class="title link">{{ $product->name }}</a>
                                <span class="price">{{ $product->getPrice()}}</span>

                            </div>
                        </div>
                    @endforeach
{{--            Paginations        --}}
                    {{ $products->links() }}

                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/nouislider.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/shop.js') }}"></script>
@endpush
