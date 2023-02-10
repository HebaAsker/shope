<title>Contact Us</title>
@include('layouts.header')

<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>Contact us</span></li>
            </ul>
        </div>
        <div class="row">
            <div class=" main-content-area">
                <div class="wrap-contacts ">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="contact-box contact-form">
                            <h2 class="box-title">Leave a Message</h2>
                            <form action="{{ url('/contact') }}" method="POST" name="frm-contact">
                                @csrf
                                <label for="name">Name</label>
                                <input type="text"  id="name" name="name" :value="old('name')">
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />

                                <label for="email">Email</label>
                                <input type="email"  id="email" name="email" :value="old('email')">
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                <label for="phone">Number Phone</label>
                                <input type="text"  id="phone" name="phone" :value="old('phone')">
                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />

                                <label for="comment">Comment</label>
                                <textarea name="comment" id="comment" :value="old('comment')"></textarea>
                                <x-input-error :messages="$errors->get('comment')" class="mt-2" />

                                <input type="submit" name="ok" value="Submit" >

                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="contact-box contact-info">
                            <div class="wrap-map">
                                <div class="mercado-google-maps"
                                     id="az-google-maps57341d9e51968"
                                     data-hue=""
                                     data-lightness="1"
                                     data-map-style="2"
                                     data-saturation="-100"
                                     data-modify-coloring="false"
                                     data-title_maps="Kute themes"
                                     data-phone="088-465 9965 02"
                                     data-email="kutethemes@gmail.com"
                                     data-address="Z115 TP. Thai Nguyen"
                                     data-longitude="-0.120850"
                                     data-latitude="51.508742"
                                     data-pin-icon=""
                                     data-zoom="16"
                                     data-map-type="ROADMAP"
                                     data-map-height="263">
                                </div>
                            </div>
                            <h2 class="box-title">Contact Detail</h2>
                            <div class="wrap-icon-box">

                                <div class="icon-box-item">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <div class="right-info">
                                        <b>Email</b>
                                        <p>hebaasker1772002@gmail.com</p>
                                    </div>
                                </div>

                                <div class="icon-box-item">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <div class="right-info">
                                        <b>Phone</b>
                                        <p>(+20) 102 093 790 1</p>
                                    </div>
                                </div>

                                <div class="icon-box-item">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <div class="right-info">
                                        <b>Mail Office</b>
                                        <p>Sed ut perspiciatis unde omnis<br />Street Name, Los Angeles</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end main products area-->

        </div><!--end row-->

    </div><!--end container-->

</main>

@include('layouts.footer')
