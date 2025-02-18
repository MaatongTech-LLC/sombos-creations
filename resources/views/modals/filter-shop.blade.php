<div class="offcanvas offcanvas-start canvas-filter" id="filterShop" aria-modal="true" role="dialog">
    <div class="canvas-wrapper">
        <header class="canvas-header header-bg" style="top: 0px;">
            <div class="filter-icon">
                <span class="icon icon-filter"></span>
                <span>Filter</span>
            </div>
            <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></span>
        </header>
        <div class="canvas-body">
            <div class="widget-facet wd-categories">
                <div class="facet-title" data-bs-target="#categories" data-bs-toggle="collapse" aria-expanded="true" aria-controls="categories">
                    <span>Product categories</span>
                    <span class="icon icon-arrow-up"></span>
                </div>
                <div id="categories" class="collapse show">
                    <ul class="list-categoris current-scrollbar mb_36">
                       @if(isset($categories))
                            @foreach($categories as $category)
                                <li class="cate-item {{ request()->get('category') === $category->id ? 'current' : '' }}">
                                    <a href="/shop?category={{$category->id}}">
                                        <span>{{ ucwords($category->name) }}</span>
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <form action="#" id="facet-filter-form" class="facet-filter-form">
                <div class="widget-facet">
                    <div class="facet-title" data-bs-target="#availability" data-bs-toggle="collapse" aria-expanded="true" aria-controls="availability">
                        <span>Availability</span>
                        <span class="icon icon-arrow-up"></span>
                    </div>
                    <div id="availability" class="collapse show">

                        <ul class="tf-filter-group current-scrollbar mb_36">
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="availability" class="tf-check" id="inStock">
                                <label for="inStock" class="label"><span>In stock</span>&nbsp;<span>({{ $inStockCount ?? 0  }})</span></label>
                            </li>
                            <li class="list-item d-flex gap-12 align-items-center">
                                <input type="radio" name="availability" class="tf-check" id="outStock">
                                <label for="outStock" class="label"><span>Out of stock</span>&nbsp;<span>({{ $outOfStockCount ?? 0  }})</span></label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="widget-facet">
                    <div class="facet-title" data-bs-target="#price" data-bs-toggle="collapse" aria-expanded="true" aria-controls="price">
                        <span>Price</span>
                        <span class="icon icon-arrow-up"></span>
                    </div>
                    <div id="price" class="collapse show">
                        <div class="widget-price filter-price">
                            <div class="price-val-range" id="price-value-range" data-min="0" data-max="500">

                            </div>
                            <div class="box-title-price">
                                <span class="title-price">Price :</span>
                                <div class="caption-price">
                                    <div class="price-val" id="price-min-value" data-currency="$">0</div>
                                    <span>-</span>
                                    <div class="price-val" id="price-max-value" data-currency="$">500</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                @php
                    $attributes = \App\Models\Attribute::all();
                @endphp

                @if(isset($attributes))
                    @foreach($attributes as $attribute)
                        <div class="widget-facet">
                            <div class="facet-title" data-bs-target="#{{strtolower( $attribute->name )}}" data-bs-toggle="collapse" aria-expanded="true" aria-controls="color">
                                <span>{{ ucwords( $attribute->name) }}</span>
                                <span class="icon icon-arrow-up"></span>
                            </div>
                            <div id="color" class="collapse">
                                <ul class="tf-filter-group current-scrollbar">
                                    @foreach($attribute->values as $value)
                                        @if($value->products->count() > 0)
                                            <li class="list-item d-flex gap-12 align-items-center">
                                                <input type="radio"
                                                       name="{{strtolower( $attribute->name )}}"
                                                       class="tf-check tf-check-{{strtolower( $attribute->name )}} @if($attribute->name) {{ 'bg-color-' . strtolower($value->name) }} @endif"
                                                       value="{{ ucwords($value->name) }}"
                                                       id="{{ $value->name }}">
                                                <label for="{{ $value->name}}" class="label"><span>{{ ucwords($value->name) }}</span>&nbsp;<span>({{ $value->products->count() }})</span></label>
                                            </li>
                                        @endif
                                    @endforeach


                                </ul>
                            </div>
                        </div>
                    @endforeach
                @endif


            </form>
        </div>
    </div>
</div>
