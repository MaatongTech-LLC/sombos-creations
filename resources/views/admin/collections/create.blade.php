@extends('layouts.admin')
@section('title', 'Create Collection')

@section('content')
    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-30">
                <h3>Create Collection</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{ route('admin.dashboard') }}"><div class="text-tiny">Dashboard</div></a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <a href="{{ route('admin.collections.index') }}"><div class="text-tiny">Collection</div></a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Create Collection</div>
                    </li>
                </ul>
            </div>
            <!-- new-category -->
            <div class="wg-box">
                <form class="form-new-product form-style-1" action="{{ route('admin.collections.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <fieldset class="name">
                        <div class="body-title">Collection Name <span class="tf-color-1">*</span></div>
                        <input class="flex-grow" type="text" placeholder="Collection name" name="name" tabindex="0" value="" aria-required="true" required="">
                        @error('name')
                        <div class="text-tiny text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>
                    <fieldset>
                        <div class="body-title mb-10">Category Image <span class="tf-color-1">*</span></div>
                        <div class="upload-image flex-grow">
                            <div class="up-load">
                                <label class="uploadfile h250" for="myFile">
                                                        <span class="icon">
                                                            <i class="icon-upload-cloud"></i>
                                                        </span>
                                    <span class="body-text">Drop your images here or select <span class="tf-color">click to browse</span></span>
                                    <img id="myFile-input" src="" alt="">
                                    <input type="file" id="myFile" name="image">
                                </label>
                            </div>
                        </div>
                        @error('image')
                        <div class="text-tiny text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>
                    <fieldset>
                        <div class="body-title mb-10">Collection's Products <span class="tf-color-1">*</span></div>
                        <select name="products[]" id="products" multiple required>
                            <option label="Select a products" disabled></option>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                        @error('products')
                        <div class="text-tiny text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>
                    <div class="bot">
                        <div></div>
                        <button class="tf-button w208" type="submit">Save</button>
                    </div>
                </form>
            </div>
            <!-- /new-category -->
        </div>
        <!-- /main-content-wrap -->
    </div>
@endsection
