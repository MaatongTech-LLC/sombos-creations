<div class="section-menu-left">
    <div class="box-logo py-3">
        <a href="{{ route('admin.dashboard') }}" class="" id="site-logo-inner">
            <img class="" id="logo_header" alt="" src="{{ asset('images/logo/logo.png') }}" data-light="{{ asset('images/logo/logo.png') }}" data-dark="{{ asset('images/logo/logo.png') }}">
        </a>
        <div class="button-show-hide">
            <i class="icon-chevron-left"></i>
        </div>
    </div>
    <div class="section-menu-left-wrap mt-3">
        <div class="center">
            <div class="center-item">
                <ul class="">
                    <li class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}" class="">
                            <div class="icon">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2652 3.57566C12.1187 3.42921 11.8813 3.42921 11.7348 3.57566L5.25 10.0605V19.8748C5.25 20.0819 5.41789 20.2498 5.625 20.2498H9V16.1248C9 15.0893 9.83947 14.2498 10.875 14.2498H13.125C14.1605 14.2498 15 15.0893 15 16.1248V20.2498H18.375C18.5821 20.2498 18.75 20.0819 18.75 19.8748V10.0605L12.2652 3.57566ZM20.25 11.5605L21.2197 12.5302C21.5126 12.8231 21.9874 12.8231 22.2803 12.5302C22.5732 12.2373 22.5732 11.7624 22.2803 11.4695L13.3258 2.51499C12.5936 1.78276 11.4064 1.78276 10.6742 2.515L1.71967 11.4695C1.42678 11.7624 1.42678 12.2373 1.71967 12.5302C2.01256 12.8231 2.48744 12.8231 2.78033 12.5302L3.75 11.5605V19.8748C3.75 20.9104 4.58947 21.7498 5.625 21.7498H18.375C19.4105 21.7498 20.25 20.9104 20.25 19.8748V11.5605ZM13.5 20.2498H10.5V16.1248C10.5 15.9177 10.6679 15.7498 10.875 15.7498H13.125C13.3321 15.7498 13.5 15.9177 13.5 16.1248V20.2498Z" fill="#111111"></path>
                                </svg>
                            </div>
                            <div class="text">Dashboard</div>
                        </a>
                    </li>
                    <li class="menu-item has-children {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon"><i class="icon-file-plus"></i></div>
                            <div class="text">Product</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item">
                                <a href="{{ route('admin.products.index') }}" class="">
                                    <div class="text">All Products</div>
                                </a>
                            </li>
                            <li class="sub-menu-item">
                                <a href="{{ route('admin.products.create') }}" class="">
                                    <div class="text">Add Product</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item has-children {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon"><i class="icon-layers"></i></div>
                            <div class="text">Category</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item">
                                <a href="{{ route('admin.categories.index') }}" class="">
                                    <div class="text">Category list</div>
                                </a>
                            </li>
                            <li class="sub-menu-item">
                                <a href="{{ route('admin.categories.create') }}" class="">
                                    <div class="text">New category</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item has-children {{ request()->routeIs('admin.collections.*') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon">
                                <svg width="24" height="22" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 1.875C0.5 0.839466 1.33947 0 2.375 0H19.625C20.6605 0 21.5 0.839466 21.5 1.875V3.375C21.5 4.29657 20.8351 5.06285 19.9589 5.22035L19.3733 15.1762C19.28 16.7619 17.9669 18 16.3785 18H5.62154C4.03311 18 2.71999 16.7619 2.62671 15.1762L2.04108 5.22035C1.16485 5.06285 0.5 4.29657 0.5 3.375V1.875ZM2.75659 3.75C2.75266 3.74997 2.74873 3.74997 2.74479 3.75H2.375C2.16789 3.75 2 3.58211 2 3.375V1.875C2 1.66789 2.16789 1.5 2.375 1.5H19.625C19.8321 1.5 20 1.66789 20 1.875V3.375C20 3.58211 19.8321 3.75 19.625 3.75H19.2552C19.2513 3.74997 19.2473 3.74997 19.2434 3.75H2.75659ZM3.54541 5.25L4.12412 15.0881C4.17076 15.8809 4.82732 16.5 5.62154 16.5H16.3785C17.1727 16.5 17.8292 15.8809 17.8759 15.0881L18.4546 5.25H3.54541ZM8.24976 8.25C8.24976 7.83579 8.58554 7.5 8.99976 7.5H12.9998C13.414 7.5 13.7498 7.83579 13.7498 8.25C13.7498 8.66421 13.414 9 12.9998 9H8.99976C8.58554 9 8.24976 8.66421 8.24976 8.25Z" fill="#111111"></path>
                                </svg>
                            </div>
                            <div class="text">Collections</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item">
                                <a href="{{ route('admin.collections.index') }}" class="">
                                    <div class="text">Collections</div>
                                </a>
                            </li>
                            <li class="sub-menu-item">
                                <a href="{{ route('admin.collections.create') }}" class="">
                                    <div class="text">Add Collections</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item has-children {{ request()->routeIs('admin.attributes.*') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon">
                                <svg width="24" height="22" viewBox="0 0 22 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 1.875C0.5 0.839466 1.33947 0 2.375 0H19.625C20.6605 0 21.5 0.839466 21.5 1.875V3.375C21.5 4.29657 20.8351 5.06285 19.9589 5.22035L19.3733 15.1762C19.28 16.7619 17.9669 18 16.3785 18H5.62154C4.03311 18 2.71999 16.7619 2.62671 15.1762L2.04108 5.22035C1.16485 5.06285 0.5 4.29657 0.5 3.375V1.875ZM2.75659 3.75C2.75266 3.74997 2.74873 3.74997 2.74479 3.75H2.375C2.16789 3.75 2 3.58211 2 3.375V1.875C2 1.66789 2.16789 1.5 2.375 1.5H19.625C19.8321 1.5 20 1.66789 20 1.875V3.375C20 3.58211 19.8321 3.75 19.625 3.75H19.2552C19.2513 3.74997 19.2473 3.74997 19.2434 3.75H2.75659ZM3.54541 5.25L4.12412 15.0881C4.17076 15.8809 4.82732 16.5 5.62154 16.5H16.3785C17.1727 16.5 17.8292 15.8809 17.8759 15.0881L18.4546 5.25H3.54541ZM8.24976 8.25C8.24976 7.83579 8.58554 7.5 8.99976 7.5H12.9998C13.414 7.5 13.7498 7.83579 13.7498 8.25C13.7498 8.66421 13.414 9 12.9998 9H8.99976C8.58554 9 8.24976 8.66421 8.24976 8.25Z" fill="#111111"></path>
                                </svg>
                            </div>
                            <div class="text">Attributes</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item">
                                <a href="{{ route('admin.attributes.index') }}" class="">
                                    <div class="text">Attributes</div>
                                </a>
                            </li>
                            <li class="sub-menu-item">
                                <a href="{{ route('admin.attributes.create') }}" class="">
                                    <div class="text">Add attributes</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item has-children {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon">
                                <svg width="24" height="22" viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M10.0001 2C8.34322 2 7.00008 3.34315 7.00008 5V5.75H13.0001V5C13.0001 3.34315 11.6569 2 10.0001 2ZM14.5001 5.75V5C14.5001 2.51472 12.4854 0.5 10.0001 0.5C7.51479 0.5 5.50008 2.51472 5.50008 5V5.75H3.51287C2.55332 5.75 1.74862 6.47444 1.64817 7.42872L0.385015 19.4287C0.268481 20.5358 1.13652 21.5 2.24971 21.5H17.7504C18.8636 21.5 19.7317 20.5358 19.6151 19.4287L18.352 7.42872C18.2515 6.47444 17.4468 5.75 16.4873 5.75H14.5001ZM13.0001 7.25H7.00008V8.66146C7.23023 8.86745 7.37508 9.16681 7.37508 9.5C7.37508 10.1213 6.8714 10.625 6.25008 10.625C5.62876 10.625 5.12508 10.1213 5.12508 9.5C5.12508 9.16681 5.26992 8.86745 5.50008 8.66146V7.25H3.51287C3.32096 7.25 3.16002 7.39489 3.13993 7.58574L1.87677 19.5857C1.85347 19.8072 2.02707 20 2.24971 20H17.7504C17.9731 20 18.1467 19.8072 18.1234 19.5857L16.8602 7.58574C16.8401 7.39489 16.6792 7.25 16.4873 7.25H14.5001V8.66146C14.7302 8.86746 14.8751 9.16681 14.8751 9.5C14.8751 10.1213 14.3714 10.625 13.7501 10.625C13.1288 10.625 12.6251 10.1213 12.6251 9.5C12.6251 9.16681 12.7699 8.86745 13.0001 8.66146V7.25Z" fill="#111111"></path>
                                </svg>
                            </div>
                            <div class="text">Order</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item">
                                <a href="{{ route('admin.orders.index') }}" class="">
                                    <div class="text">Order list</div>
                                </a>
                            </li>
                            <li class="sub-menu-item">
                                <a href="{{ route('admin.orders.create') }}" class="">
                                    <div class="text">Order detail</div>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="menu-item has-children {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon"><i class="icon-user"></i></div>
                            <div class="text">Users</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item">
                                <a href="{{ route('admin.users.index') }}" class="">
                                    <div class="text">All user</div>
                                </a>
                            </li>
                            <li class="sub-menu-item">
                                <a href="{{ route('admin.users.create') }}" class="">
                                    <div class="text">Add new user</div>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="menu-item has-children">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon">
                                <svg width="24" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M5.1392 7.41658C5.73654 7.87694 6.38132 8.27855 7.06498 8.61284C7.30482 7.3722 7.67417 6.24668 8.1472 5.30063C8.29118 5.01266 8.44837 4.7351 8.61825 4.47262C7.20101 5.11026 5.99608 6.13656 5.1392 7.41658ZM12 2.25C8.3534 2.25 5.17543 4.25226 3.50379 7.21378C2.70535 8.62832 2.25 10.2621 2.25 12C2.25 12.8417 2.35682 13.6595 2.55803 14.4401C3.64146 18.6436 7.45701 21.75 12 21.75C16.543 21.75 20.3585 18.6436 21.442 14.4401C21.6432 13.6595 21.75 12.8417 21.75 12C21.75 10.2621 21.2947 8.62832 20.4962 7.21378C18.8246 4.25226 15.6466 2.25 12 2.25ZM12 3.75C11.1945 3.75 10.2633 4.4225 9.48884 5.97145C9.0479 6.85334 8.69814 7.95052 8.48423 9.18993C9.5902 9.55342 10.772 9.75 12 9.75C13.228 9.75 14.4098 9.55342 15.5158 9.18993C15.3019 7.95052 14.9521 6.85334 14.5112 5.97145C13.7367 4.4225 12.8055 3.75 12 3.75ZM16.935 8.61284C16.6952 7.3722 16.3258 6.24668 15.8528 5.30063C15.7088 5.01266 15.5516 4.7351 15.3817 4.47262C16.799 5.11026 18.0039 6.13656 18.8608 7.41657C18.2635 7.87693 17.6187 8.27855 16.935 8.61284ZM15.7017 10.7042C14.53 11.0591 13.2872 11.25 12 11.25C10.7128 11.25 9.46996 11.0591 8.29832 10.7042C8.26657 11.1256 8.25 11.5583 8.25 12C8.25 13.2235 8.37714 14.3782 8.60185 15.4155C9.70027 15.6349 10.8365 15.75 12 15.75C13.1635 15.75 14.2997 15.6349 15.3981 15.4155C15.6229 14.3782 15.75 13.2235 15.75 12C15.75 11.5583 15.7334 11.1256 15.7017 10.7042ZM17.0027 15.0136C17.1639 14.0617 17.25 13.0479 17.25 12C17.25 11.3733 17.2192 10.7588 17.16 10.1625C18.023 9.7801 18.8356 9.30479 19.5851 8.7493C20.0129 9.74621 20.25 10.8447 20.25 12C20.25 12.6024 20.1856 13.189 20.0634 13.7535C19.0944 14.2668 18.0705 14.6906 17.0027 15.0136ZM14.9409 17.0206C13.9826 17.1716 13.0004 17.25 12 17.25C10.9996 17.25 10.0174 17.1716 9.0591 17.0206C9.18976 17.3811 9.33365 17.7182 9.48884 18.0286C10.2633 19.5775 11.1945 20.25 12 20.25C12.8055 20.25 13.7367 19.5775 14.5112 18.0286C14.6664 17.7182 14.8102 17.3811 14.9409 17.0206ZM15.3819 19.5272C15.5517 19.2648 15.7089 18.9873 15.8528 18.6994C16.1562 18.0925 16.417 17.4118 16.6283 16.6742C17.5649 16.4364 18.4735 16.1281 19.348 15.7552C18.4955 17.42 17.0936 18.757 15.3819 19.5272ZM8.61812 19.5272C8.44828 19.2648 8.29114 18.9873 8.1472 18.6994C7.84377 18.0925 7.583 17.4118 7.37171 16.6742C6.4351 16.4364 5.52652 16.1281 4.65199 15.7552C5.50454 17.42 6.9064 18.757 8.61812 19.5272ZM3.93656 13.7535C4.90563 14.2668 5.92951 14.6906 6.99729 15.0136C6.83612 14.0617 6.75 13.0479 6.75 12C6.75 11.3733 6.7808 10.7588 6.84003 10.1625C5.97701 9.7801 5.16437 9.30479 4.41491 8.7493C3.98705 9.74621 3.75 10.8447 3.75 12C3.75 12.6024 3.81444 13.189 3.93656 13.7535Z" fill="#0A0A0C"></path>
                                </svg>
                            </div>
                            <div class="text">Online Store</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item">
                                <a href="{{ route('home') }}" target="_blank" class="">
                                    <div class="text">View Store</div>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="report.html" class="">
                            <div class="icon"><i class="icon-pie-chart"></i></div>
                            <div class="text">Report</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
