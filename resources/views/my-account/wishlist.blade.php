@extends('layouts.my-account')

@section('title2', 'Wishlist')

@section('my-account-content')
    <div class="my-account-content account-wishlist">
        <div class="grid-layout wrapper-shop" data-grid="grid-3">
            <!-- card product-->
            @foreach($wishlists as $product)
                <!-- card product 1 -->
                <div class="card-product" data-availability="{{ $product->product->stock > 0 ? 'In stock' : 'Out of stock' }}">
                    <div class="card-product-wrapper">
                        <a href="{{ route('products', $product->product->slug) }}" class="product-img">
                            <img class="lazyload img-product" data-src="{{ $product->product->image }}" src="{{ $product->product->image }}" alt="{{$product->product->slug}}">
                            <img class="img-hover ls-is-cached lazyloaded" data-src="{{ $product->product->image }}" src="{{ $product->product->image}}" alt="{{$product->product->slug}}">
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
                        <a href="{{ route('products', $product->product->id) }}" class="title link">{{ $product->product->name }}</a>
                        <span class="price">{{ $product->product->getPrice()}}</span>

                    </div>


                </div>
            @endforeach

    </div>
    {{ $wishlists->links() }}
@endsection
