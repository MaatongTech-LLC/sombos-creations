@extends('layouts.admin')
@section('title', 'Products')

@section('content')
    <!-- main-content-wrap -->
    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-30">
                <h3>All Products</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{ route('admin.dashboard') }}"><div class="text-tiny">Dashboard</div></a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <a href="#"><div class="text-tiny">Product</div></a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">All Products</div>
                    </li>
                </ul>
            </div>
            <!-- product-list -->
            <div class="wg-box">

                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <div class="show">
                            <div class="text-tiny">Showing</div>
                            <div class="select">
                                <select class="">
                                    <option>10</option>
                                    <option>20</option>
                                    <option>30</option>
                                </select>
                            </div>
                            <div class="text-tiny">entries</div>
                        </div>
                        <form class="form-search">
                            <fieldset class="name">
                                <input type="text" placeholder="Search here..." class="" name="name" tabindex="2" value="" aria-required="true" required="">
                            </fieldset>
                            <div class="button-submit">
                                <button class="" type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <a class="tf-button style-1 w208" href="{{ route('admin.products.create') }}"><i class="icon-plus"></i>Add new</a>
                </div>
                <div class="wg-table table-product-list">
                    <ul class="table-title flex gap20 mb-14">
                        <li>
                            <div class="body-title">Product</div>
                        </li>
                        <li>
                            <div class="body-title">Product ID</div>
                        </li>
                        <li>
                            <div class="body-title">Category</div>
                        </li>
                        <li>
                            <div class="body-title">Price</div>
                        </li>
                        <li>
                            <div class="body-title">Quantity</div>
                        </li>

                        <li>
                            <div class="body-title">Stock</div>
                        </li>
                        <li>
                            <div class="body-title">Added date</div>
                        </li>
                        <li>
                            <div class="body-title">Action</div>
                        </li>
                    </ul>
                    <ul class="flex flex-column">
                        @forelse($products as $product)
                            <li class="wg-product item-row gap20">
                                <div class="name">
                                    <div class="image">
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}" alt="">
                                    </div>
                                    <div class="title line-clamp-2 mb-0">
                                        <a href="{{ route('products', $product->slug) }}" target="_blank" class="body-text">{{ $product->name }}</a>
                                    </div>
                                </div>
                                <div class="body-text text-main-dark mt-4">#{{ $product->id }}</div>
                                <div class="body-text text-main-dark mt-4">{{ $product->category->name }}</div>
                                <div class="body-text text-main-dark mt-4">{{ $product->getPrice() }}</div>
                                <div class="body-text text-main-dark mt-4">{{ $product->stock }}</div>
                                <div>
                                    <div class="{{ $product->stock > 0 ? 'block-available' : 'block-stock' }} bg-1 fw-7">{{ $product->stock > 0 ? 'In Stock' : 'Out of stock' }}</div>
                                </div>
                                <div class="body-text text-main-dark mt-4">{{ $product->created_at->format('d/m/Y') }}</div>
                                <div class="list-icon-function">
                                    <a class="item eye" target="_blank" href="{{ route('products', $product->slug) }}"><i class="icon-eye"></i></a>

                                    <a class="item edit" href="{{route('admin.products.edit',$product->id)}}"><i class="icon-edit-3"></i></a>

                                    <a class="item trash" data-confirm-delete="true"  href="{{ route('admin.products.destroy', $product->id) }}"><i class="icon-trash-2"></i></a>

                                </div>
                            </li>
                        @empty
                            <li class="text-center">No Product Yet</li>
                        @endforelse

                    </ul>
                </div>
                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10">
                    <div class="text-tiny">Showing 10 entries</div>
                    <ul class="wg-pagination">
                        <li>
                            <a href="#"><i class="icon-chevron-left"></i></a>
                        </li>
                        <li>
                            <a href="#">1</a>
                        </li>
                        <li class="active">
                            <a href="#">2</a>
                        </li>
                        <li>
                            <a href="#">3</a>
                        </li>
                        <li>
                            <a href="#"><i class="icon-chevron-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /product-list -->
        </div>
        <!-- /main-content-wrap -->
    </div>
    <!-- /main-content-wrap -->
@endsection
