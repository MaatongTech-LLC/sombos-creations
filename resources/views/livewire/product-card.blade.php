<div wire:ignore.self class="card-product fl-item" data-product-id="{{ $product->id }}" data-availability="{{ $product->stock > 0 ? 'In stock' : 'Out of stock' }}">
    <div class="card-product-wrapper" >
        <a href="{{ route('products', $product->slug) }}" class="product-img">
            <img class="lazyload img-product" data-src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}" src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}" alt="{{$product->slug}}">
            <img class="img-hover ls-is-cached lazyloaded" data-src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}" src="{{ \Illuminate\Support\Facades\Storage::url($product->image)}}" alt="{{$product->slug}}">
        </a>
        <div class="list-product-btn">
            <a href="javascript:void(0);" wire:click="addToCart" data-bs-toggle="modal" class="box-icon bg_white quick-add tf-btn-loading">
                <span class="icon icon-bag"></span>
                <span class="tooltip">Quick Add</span>
            </a>
            <a href="javascript:void(0);" wire:click="addToWishlist" class="box-icon bg_white wishlist btn-icon-action">
                <span class="icon icon-heart"></span>
                <span class="tooltip">Add to Wishlist</span>
                <span class="icon icon-delete"></span>
            </a>

            <a href="#" wire:click="openQuickView" data-bs-toggle="modal" data-bs-target="#quickViewModal" class="box-icon bg_white quickview tf-btn-loading">
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
