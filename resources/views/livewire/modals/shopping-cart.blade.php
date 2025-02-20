<!-- shoppingCart -->
<div wire:ignore.self class="modal fullRight fade modal-shopping-cart" id="shoppingCart">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="header">
                <div class="title fw-5">Shopping cart</div>
                <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
            </div>
            <div class="wrap">
                @if(count($items) > 0)
                    <div class="tf-mini-cart-wrap">
                        <div class="tf-mini-cart-main">
                            <div class="tf-mini-cart-sroll">
                                <div class="tf-mini-cart-items">
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach($items as $item)
                                        @php
                                            if(is_array($item)) {
                                               $item = (object) $item;
                                            }
                                        @endphp
                                        <livewire:cart-item :item="$item" wire:key="{{ $i++ }}"></livewire:cart-item>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tf-mini-cart-bottom">

                            <div class="tf-mini-cart-bottom-wrap">
                                <div class="tf-cart-totals-discounts">
                                    <div class="tf-cart-total">Subtotal</div>
                                    <div class="tf-totals-total-value fw-6">${{ $subTotal }} USD</div>
                                </div>
                                <div class="tf-mini-cart-line"></div>
                                <form action="{{ route('checkout') }}" id="cartCheckoutForm">

                                    <div class="tf-cart-checkbox">
                                            <div class="tf-checkbox-wrapp">
                                                <input class="" type="checkbox" id="CartDrawer-Form_agree" name="agree_checkbox" required>
                                                <div>
                                                    <i class="icon-check"></i>
                                                </div>
                                            </div>
                                            <label for="CartDrawer-Form_agree">
                                                I agree with the
                                                <a href="#" title="Terms of Service">terms and conditions</a>
                                            </label>
                                    </div>
                                </form>

                                <div class="tf-mini-cart-view-checkout">
                                    {{--<a href="{{ route('cart') }}"
                                       class="tf-btn btn-outline radius-3 link w-100 justify-content-center">View cart</a>--}}
                                    <button form="cartCheckoutForm" type="submit"
                                       class="tf-btn btn-fill animate-hover-btn radius-3 w-100 justify-content-center"><span>Check out</span></button>
                                </div>
                            </div>
                        </div>


                    </div>
                @else
                    <h6 class="text-center mt-4">Cart is empty</h6>
                @endif

            </div>
        </div>
    </div>
</div>
<!-- /shoppingCart -->
