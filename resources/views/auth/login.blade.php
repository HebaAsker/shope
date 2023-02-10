<x-guest-layout>
    <!-- haeder -->
    <header id="header" class="header header-style-1">
        <div class="container-fluid">
            <div class="row">
                <div class="topbar-menu-area">
                    <div class="container">
                        <div class="topbar-menu left-menu">
                            <ul>
                                <li class="menu-item" >
                                    <a title="Hotline: (+20) 102 093 790 1" href="#" ><span class="icon label-before fa fa-mobile"></span>Hotline: (+20) 102 093 790 1</a>
                                </li>
                            </ul>
                        </div>
                        <div class="topbar-menu right-menu">
                            <ul>
                                <li class="menu-item lang-menu menu-item-has-children parent">
                                    <a title="English" href="#"><span class="img label-before"><img src="assets/images/lang-en.png" alt="lang-en"></span>English<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="submenu lang" >
                                        <li class="menu-item" ><a title="hungary" href="#"><span class="img label-before"><img src="assets/images/lang-hun.png" alt="lang-hun"></span>Hungary</a></li>
                                        <li class="menu-item" ><a title="german" href="#"><span class="img label-before"><img src="assets/images/lang-ger.png" alt="lang-ger" ></span>German</a></li>
                                        <li class="menu-item" ><a title="french" href="#"><span class="img label-before"><img src="assets/images/lang-fra.png" alt="lang-fre"></span>French</a></li>
                                        <li class="menu-item" ><a title="canada" href="#"><span class="img label-before"><img src="assets/images/lang-can.png" alt="lang-can"></span>Canada</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item menu-item-has-children parent" >
                                    <a title="Dollar (USD)" href="#">Dollar (USD)<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="submenu curency" >
                                        <li class="menu-item" >
                                            <a title="Pound (GBP)" href="#">Pound (GBP)</a>
                                        </li>
                                        <li class="menu-item" >
                                            <a title="Euro (EUR)" href="#">Euro (EUR)</a>
                                        </li>
                                        <li class="menu-item" >
                                            <a title="Dollar (USD)" href="#">Dollar (USD)</a>
                                        </li>
                                    </ul>

                                    @guest  <!-- Used to start a new session -->

                                        <!-- if the user clicked register make him an acoount then show his name in the nav bar -->
                                        @if (Route::has('register'))
                                            <li class="menu-item">
                                                <a  href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif

                                    @endguest
                                </li>

                                </li>

                            </ul>
                        </div>
                    </div>
                </div>

        </div>
    </header>


        <main id="main" class="main-site left-sidebar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                        <div class=" main-content-area ">
                            <div class="wrap-login-item ">
                                <div class="login-form form-item form-stl">

                                    <!-- Session Status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <fieldset class="wrap-title">
                                            <h3 class="form-title">Log in to your account</h3>
                                        </fieldset>
                                        <fieldset class="wrap-input">
                                            <label for="email">Email Address:</label>
                                            <input type="email" id="email" name="email" placeholder="Type your email address" :value="old('email')" required autofocus>
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </fieldset>
                                        <fieldset class="wrap-input">
                                            <label for="password">Password:</label>
                                            <input type="password" id="password" name="password" placeholder="************" required>
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </fieldset>

                                        <fieldset class="wrap-input">
                                            <label class="remember-field" for="remember_me">
                                                <input class="frm-input " name="remember" id="remember_me" value="forever" type="checkbox"><span>Remember me</span>
                                            </label>
                                            @if (Route::has('password.request'))
                                            <a class="link-function left-position" href="{{ route('password.request') }}" title="Forgot your password?">Forgot your password?</a>
                                            @endif
                                        </fieldset>
                                        <input type="submit" class="btn btn-submit" value="Login" name="submit">
                                    </form>
                                </div>
                            </div>
                        </div><!--end main products area-->
                    </div>
                </div><!--end row-->

            </div><!--end container-->

        </main>

</x-guest-layout>

