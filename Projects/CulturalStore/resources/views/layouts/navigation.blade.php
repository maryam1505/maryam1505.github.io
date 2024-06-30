<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__close">+</div>
    <ul class="offcanvas__widget">
        <li><span class="icon_search search-switch"></span></li>
        <li><a href="#"><span class="icon_heart_alt"></span>
                <div class="tip">2</div>
            </a></li>
        <li><a href="#"><span class="icon_bag_alt"></span>
                <div class="tip">2</div>
            </a></li>
    </ul>
    <div class="offcanvas__logo">
        <a href="{{Route('home')}}"><img src="{{asset('template/img/logo2.png')}}" alt="" style="max-width: 50%"></a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__auth">
        <a href="{{Route('login')}}">Login</a>
        <a href="{{Route('register')}}">Register</a>
    </div>
</div>
<!-- Offcanvas Menu End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-2">
                <div class="header__logo">
                    <a href="{{Route('home')}}"><img src="{{asset('template/img/logo2.png')}}" alt="logo"
                            style="max-width: 50%"></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <nav class="header__menu">
                    <ul>
                        <li class="{{ request()->route()->getName() === 'home' ? 'active' : '' }}">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="{{ request()->route()->getName() === 'womens' ? 'active' : '' }}">
                            <a href="{{ route('womens') }}">Women’s</a>
                        </li>
                        <li class="{{ request()->route()->getName() === 'mens' ? 'active' : '' }}">
                            <a href="{{ route('mens') }}">Men’s</a>
                        </li>

                        <li class="{{ request()->route()->getName() === 'shop' || 
                        request()->route()->getName() === 'shop.cart' || 
                        request()->route()->getName() === 'check.out' || 
                        request()->route()->getName() === 'product.details' ? 'active' : '' }}">
                            <a href="{{ route('shop') }}">Shop</a>
                        </li>

                        {{-- <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="{{Route('product.details')}}">Product Details</a></li>
                        <li><a href="{{Route('shop.cart')}}">Shop Cart</a></li>
                        <li><a href="{{Route('check.out')}}">Checkout</a></li>
                        <li><a href="{{Route('travel.details')}}">Travel Details</a></li>
                    </ul>
                    </li> --}}
                    <li
                        class="{{ request()->route()->getName() === 'travel' || request()->route()->getName() === 'explore.place' ? 'active' : '' }}">
                        <a href="{{ route('travel') }}">Travel</a>
                    </li>
                    <li class="{{ request()->route()->getName() === 'contact' ? 'active' : '' }}"><a
                            href="{{Route('contact')}}">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__right">
                    <div class="header__right__auth">

                        <a href="#" style="color: black; font-size: 17px;">
                            <i class="fas fa-heart"></i>
                            <!-- Display a badge with the count of liked products -->
                            @if(session()->has('LoggedUserInfo'))
                            @php
                            $likeCount = \App\Models\Product\LikeProduct::where('user_id',
                            session('LoggedUserInfo'))->count();
                            @endphp
                            @if($likeCount > 0)
                            <span class="badge badge-danger">{{ $likeCount }}</span>
                            @endif
                            @endif
                        </a>
                       

                        <a href="{{route('cart')}}" style="color: black; font-size: 17px;">
                            <i class="fas fa-shopping-cart"></i>
                            <!-- Display a badge with the count of items in the cart -->
                            @if(session()->has('LoggedUserInfo'))
                            @php
                            $cartCount = \App\Models\Product\Cart::where('user_id', session('LoggedUserInfo'))->count();
                            @endphp
                            @if($cartCount > 0)
                            <span class="badge badge-danger">{{ $cartCount }}</span>
                            @endif
                            @endif
                        </a>

                        &nbsp;&nbsp;&nbsp;

                        <!-- If user is logged in, show user dropdown and name -->
                        @if(session()->has('LoggedUserInfo'))
                        <a href="#" style="color: black; font-size: 17px;" class="user-dropdown-toggle fas fa-user"></a>
                        <ul class="dropdown">
                            <a href="{{ route('user.profile') }}">Profile</a>
                            <form id="logout-form" action="{{ route('user.logout') }}">
                                @csrf
                                <a href="{{ route('user.logout') }}">Logout</a>
                            </form>
                        </ul>
                        @php
                        $userInfo = \App\Models\User::find(session('LoggedUserInfo'));
                        @endphp
                        @if($userInfo && $userInfo->name)
                        <small style="color: black; font-size: 17px;">{{ $userInfo->name }}</small>
                        @endif
                        <!-- If user is not logged in, show login and register links -->
                        @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                        @endif
                    </div>
                </div>
            </div>





            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
</header>