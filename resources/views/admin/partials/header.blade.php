<div class="header-dashboard"style="z-index: 1;">
    <div class="wrap">
        <div class="header-left">
            <a href="{{ route('admin.dashboard') }}" class="py-3">
                <img class="" id="logo_header_mobile" alt="" src="{{ asset('images/logo/logo.png') }}"
                     data-light="{{ asset('images/logo/logo.png') }}" data-dark="{{ asset('images/logo/logo.png') }}">
            </a>
            <div class="button-show-hide">
                <i class="icon-chevron-left"></i>
            </div>
        </div>
        <div class="header-grid">

            <div class="header-item button-dark-light">
                <i class="icon-moon"></i>
            </div>
            <div class="popup-wrap message type-header">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2"
                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="header-item">
                                                <span class="text-tiny">0</span>
                                                <i class="icon-bell"></i>
                                            </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton2">
                        <li>
                            <h6>Message</h6>
                        </li>
                        <h6 class="text-center">No Notification</h6>
                        {{--<li>
                            <div class="message-item item-1">
                                <div class="image">
                                    <i class="icon-noti-1"></i>
                                </div>
                                <div>
                                    <div class="body-title-2">Discount available</div>
                                    <div class="text-tiny">Morbi sapien massa, ultricies at rhoncus at, ullamcorper nec
                                        diam
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li><a href="#" class="tf-button w-full">View all</a></li>--}}
                    </ul>
                </div>
            </div>
            <div class="header-item button-zoom-maximize">
                <div class="">
                    <i class="icon-maximize"></i>
                </div>
            </div>
            <div class="popup-wrap user type-header">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton3"
                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="header-user wg-user">
                                                <span class="image">
                                                    <img src="{{ asset('admin/images/avatar/user-1.png') }}" alt="">
                                                </span>
                                                <span class="flex flex-column">
                                                    <span
                                                        class="body-text text-main-dark">{{ auth()->user()->firstname ?? '' }}</span>
                                                    <span class="text-tiny">Administrator</span>
                                                </span>
                                            </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton3">
                        <li>
                            <a href="#" class="user-item">
                                <div class="icon">
                                    <i class="icon-user"></i>
                                </div>
                                <div class="body-title-2">Account</div>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="user-item">
                                <div class="icon">
                                    <i class="icon-bell"></i>
                                </div>
                                <div class="body-title-2">Inbox</div>
                                <div class="number"></div>
                            </a>
                        </li>

                        <li>
                            <a href="#" class="user-item">
                                <div class="icon">
                                    <i class="icon-settings"></i>
                                </div>
                                <div class="body-title-2">Setting</div>
                            </a>
                        </li>

                        <li>
                            <form  action="{{ route('logout') }}" method="POST" class="user-item">
                                @csrf
                                <div class="icon">
                                    <i class="icon-log-out"></i>
                                </div>
                                <button class="body-title-2 m-0 p-0" type="submit">Log out</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
