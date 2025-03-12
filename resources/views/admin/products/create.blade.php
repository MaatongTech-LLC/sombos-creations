@extends('layouts.admin')
@section('title', 'Add Product')

@section('content')
    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-30">
                <h3>Add Product</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{ route('admin.dashboard') }}"><div class="text-tiny">Dashboard</div></a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <a href="{{ route('admin.products.index') }}"><div class="text-tiny">Product</div></a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Add Product</div>
                    </li>
                </ul>
            </div>
            <!-- form-add-product -->
            <form class="form-add-product" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="wg-box mb-30">
                    <fieldset class="name">
                        <div class="body-title mb-10">Product Name <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" placeholder="Enter title" name="name" tabindex="0" value="" aria-required="true" required="">
                        @error('name')
                            <div class="text-tiny text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>
                    <fieldset>
                        <div class="body-title mb-10">Product Image <span class="tf-color-1">*</span></div>
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
                    <fieldset class="category">
                        <div class="body-title mb-10">Category <span class="tf-color-1">*</span></div>
                        <select name="category_id" id="category_id" required>
                            <option label="Select a category" disabled></option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-tiny text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>
                    <div class="gap-2 d-flex align-items-center">
                        <fieldset class="price">
                            <div class="body-title mb-10">Price <span class="tf-color-1">*</span></div>
                            <input class="" type="number" placeholder="Price" name="price" tabindex="0" min="1" value="" aria-required="true" required="">
                        </fieldset>
                        @error('price')
                            <div class="text-tiny text-danger">{{ $message }}</div>
                        @enderror
                        <fieldset class="stock">
                            <div class="body-title mb-10">Stock <span class="tf-color-1">*</span></div>
                            <input class="" type="number" placeholder="Enter Stock" name="stock" tabindex="0" value="" aria-required="true" required="">
                            @error('stock')
                                <div class="text-tiny text-danger">{{ $message }}</div>
                            @enderror
                        </fieldset>
                    </div>

                    <fieldset class="description">
                        <div class="body-title mb-10">Description <span class="tf-color-1">*</span></div>
                        <textarea class="mb-10" name="description" placeholder="Short description about product" tabindex="0" aria-required="true" required=""></textarea>
                        @error('description')
                            <div class="text-tiny text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>
                </div>
                <div class="wg-box mb-30">
                    <fieldset>
                        <div class="body-title mb-10">Images Gallery</div>
                        <div class="upload-image flex-grow">
                            <div class="up-load">
                                <label class="uploadfile" for="galleryImages">
                                                        <span class="icon">
                                                            <i class="icon-upload-cloud"></i>
                                                        </span>
                                    <span class="body-text">Drop your images here or select <span class="tf-color">click to browse</span></span>
                                    <img id="myFile-input" src="" alt="">
                                    <input type="file" class="filepond" name="gallery_images[]" id="galleryImages" multiple accept="image/*">
                                </label>
                            </div>
                            <div class="flex gap20 flex-wrap gallery-wrap"></div>
                        </div>
                        @error('gallery_images')
                        <div class="text-tiny text-danger">{{ $message }}</div>
                        @enderror
                    </fieldset>
                </div>

                <div class="cols gap10">
                    <button class="tf-button w380" type="submit">Add product</button>
                    <a href="{{ route('admin.products.index') }}" class="tf-button style-3 w380">Cancel</a>
                </div>
            </form>
            <!-- /form-add-product -->
        </div>
        <!-- /main-content-wrap -->
    </div>
@endsection

@push('scripts')
    <script>
       /* const inputElement = document.querySelector('#galleryImages');

        // Create a FilePond instance
        const pond = FilePond.create(inputElement, {
            allowImagePreview: true,
            allowImageFilter: true,
            imagePreviewHeight: 100,
            allowMultiple: true,
            allowFileTypeValidation: true,
            allowRevert: true,
            acceptedFileTypes: ["image/png", "image/jpeg", "image/jpg"],
            maxFiles: 5,
            credits: false,
            server: {
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: '/products',
                process: false,
                fetch: false,
            }
        });*/
    </script>
@endpush
