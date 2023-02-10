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
                                    @if (Route::has('login'))
                                        <li class="menu-item">
                                            <a  href="{{ route('login') }}">{{ __('Login') }}</a>
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
                <div class=" main-content-area">
                    <div class="wrap-login-item ">
                        <div class="register-form form-item ">
                            <form class="form-stl" method="POST" action="{{ route('register') }}">
                                @csrf
                                <fieldset class="wrap-title">
                                    <h3 class="form-title">Create an account</h3>
                                    <h4 class="form-subtitle">Personal infomation</h4>
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="name">Name</label>
                                    <input id="name"  type="text" name="name" :value="old('name')" required autofocus>
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="email">Email Address</label>
                                    <input id="email"  type="email" name="email" :value="old('email')" required>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </fieldset>
                                <fieldset class="wrap-input item-width-in-half left-item ">
                                    <label for="password">Password</label>
                                    <input  id="password"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </fieldset>
                                <fieldset class="wrap-input item-width-in-half ">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required>
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <a class="link-function left-position" href="{{ route('login') }}" title="Already registered?">Already registered?</a>
                                </fieldset>
                                <input type="submit" class="btn btn-sign" value="Register" name="register">
                            </form>
                        </div>
                    </div>
                </div><!--end main products area-->
            </div>
        </div><!--end row-->

    </div><!--end container-->

</main>

</x-guest-layout>



