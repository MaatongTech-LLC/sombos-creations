<!DOCTYPE html>
<html  lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Sombos Creations - @yield('title') </title>

    <meta name="author" content="https:/maatonggroup.com/usa">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- font -->
    <link rel="stylesheet" href="{{ asset('fonts/fonts.css') }}">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('fonts/font-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}"/>

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="{{ asset('images/logo/favicon.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/logo/favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('vendor/flasher/flasher.min.css') }}">

    @stack('styles')

</head>

<body class="preload-wrapper">
<!-- preload -->
<div class="preload preload-container">
    <div class="preload-logo">
        <div class="spinner"></div>
    </div>
</div>
<!-- /preload -->
<div id="wrapper">
    @include('partials.header')

    @yield('content')

    @include('partials.footer')

</div>

<!-- gotop -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 286.138;"></path>
    </svg>
</div>
<!-- /gotop -->


@include('partials.mobile-menu')

@include('modals.canvas-search')
{{--@include('modals.toolbar-shop')--}}
@include('modals.login')
@include('modals.shopping-cart')
@include('modals.compare')
@include('modals.quick-add')
@include('modals.quick-view')
@include('modals.find-size')
@include('modals.filter-shop')

<!-- Javascript -->
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/swiper-bundle.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/carousel.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/lazysize.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/count-down.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/wow.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/nouislider.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/multiple-modal.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>

<script src="{{ asset('vendor/flasher/flasher.min.js') }}"></script>

<script>
    $('.card-product').each(function() {
        let quickviewBtn = $(this).find('.quickview');
        let el = $(this);

        quickviewBtn.click(function() {
            let productId = el.data('productId');

            $.ajax({
                url: "/product/" + productId,
                method: "GET",
                success: function(response) {
                    if (response.success) {
                        console.log(response.data);

/*                        let swiperWrapper = $('.swiper-wrapper');
                        swiperWrapper.empty();

                        response.data.images.forEach(function(image) {
                            let imageHtml = `
                                       <div class="swiper-slide">
                                        <div class="item">
                                            <img src="${image.image_url}" alt="">
                                        </div>
                                    </div>`;
                            swiperWrapper.append(imageHtml);
                        });

                        swiper.update();*/

                        $('#productName').text(response.data.name);
                        $('#productName').attr('href', `/products/${productId}`);
                        $('#productDescription').text(response.data.description);
                        $('#productPrice').text('$' + response.data.price);
                        $('.tf-qty-price').text('$' + response.data.price);
                        $('#productLink').attr('href', `/products/${productId}`);
                        $('#productImage').attr('src', 'storage/' + response.data.image);


                    }
                },
            })
        });
    });
</script>

@stack('scripts')

</body>

</html>
