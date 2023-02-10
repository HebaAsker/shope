<title>Product</title>
@include('layouts.header')
    <main id="main" class="main-site">

        <div class="container">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="/" class="link">Home</a></li>
                    <li class="item-link"><span>{{$product->name}}</span></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                    <div class="wrap-product-detail">

                        <div class="detail-media">
                            <div class="product-gallery">
                                <ul class="slides">
                                   <li data-thumb="{{ asset('assets/uploads/product/'. $product->image) }}">
                                        <img src="{{ asset('assets/uploads/product/'. $product->image) }}" alt="" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="detail-info product_data">
                            <div class="product-rating">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <a href="#" class="count-review">({{  $product->reviews->count() }}  review)</a>
                            </div>
                            <h2 class="product-name product_id">{{ $product->slug }}</h2>
                            <div class="short-desc">
                                <ul>
                                    <li>{{ $product->name }}</li>
                                </ul>
                            </div>
                            <div class="wrap-social">
                                <a class="link-socail" href="#"><img src="{{ asset('assets/images/social-list.png') }}" alt=""></a>
                            </div>
                            <div class="wrap-price"><span class="product-price">${{ $product->selling_price }}</span></div>
                            <div class="stock-info in-stock">
                                @if ($product->qty==0)
                                    <p class="availability">Availability: <b>OUT OF STOCK</b></p>
                                @else
                                <p class="availability">Availability: <b>IN STOCK</b></p>
                                @endif
                            </div>
                            <div class="quantity">
                                <span>Quantity:</span>
                                <div class="quantity-input">
                                    <input type="text" name="product_qty" class=" qty-input qty-num-btn" value="{{ ($product->product_qty-$product->product_qty)+1 }}" data-max="120" pattern="[0-9]*" >
                                    <a class="btn decrement-btn qty-num-btn"></a>
                                    <a class="btn increment-btn qty-num-btn"></a>
                                </div>
                            </div>

                            <div class="wrap-butons">
                                @if ($product->qty>0)
                                    <form action="{{ url('/addToCart') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $product->id }}" name="product_id" class="product_id">
                                        <input type="hidden" value="{{ $product->small_description }}" name="small_description">
                                        <input type="hidden" value="{{ $product->selling_price }}" name="selling_price" class="selling_price">
                                        <input type="hidden" value="{{ $product->image }}"  name="image">
                                        <input type="hidden" value="1" name="product_qty" class="qty-input">
                                        <button class="btn add-to-cart addToCartBtn">Add To Cart</button>
                                    </form>
                                @endif
                                <div class="wrap-btn">
                                    <a href="#" class="btn btn-compare">Add Compare</a>
                                    <form action="{{ url('/addToWishlist') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $product->id }}" name="product_id" class="product_id">
                                        <input type="hidden" value="{{ $product->small_description }}" name="small_description">
                                        <input type="hidden" value="{{ $product->selling_price }}" name="selling_price" class="selling_price">
                                        <input type="hidden" value="{{ $product->image }}"  name="image">
                                        <input type="hidden" value="1" name="product_qty" class="qty-input">
                                        <button class="btn btn-wishlist addToCartBtn">Add To Wishlist</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="advance-info">
                            <div class="tab-control normal">
                                <a href="#description" class="tab-control-item active">description</a>
                                <a href="#add_infomation" class="tab-control-item">Addtional Infomation</a>
                                <a href="#review" class="tab-control-item">Reviews</a>
                            </div>
                            <div class="tab-contents">
                                <div class="tab-content-item active" id="description">
                                    <p>{{ $product->description }}{{ $product->description }}{{ $product->description }}{{ $product->description }}{{ $product->description }}
                                       {{ $product->description }}{{ $product->description }}{{ $product->description }}{{ $product->description }}{{ $product->description }}
                                       {{ $product->description }}{{ $product->description }}{{ $product->description }}{{ $product->description }}{{ $product->description }}
                                       {{ $product->description }}{{ $product->description }}{{ $product->description }}{{ $product->description }}{{ $product->description }}
                                    </p>
                                </div>
                                <div class="tab-content-item " id="add_infomation">
                                    <table class="shop_attributes">
                                        <tbody>
                                            <tr>
                                                <th>Weight</th><td class="product_weight">1 kg</td>
                                            </tr>
                                            <tr>
                                                <th>Dimensions</th><td class="product_dimensions">12 x 15 x 23 cm</td>
                                            </tr>
                                            <tr>
                                                <th>Color</th><td><p>Black, Blue, Grey, Violet, Yellow</p></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-content-item " id="review">

                                    <div class="wrap-review-form">

                                        <div id="comments">
                                            <h2 class="woocommerce-Reviews-title">{{ $product->reviews->count() }} review for <span>Radiant-360 R6 Chainsaw Omnidirectional [Orage]</span></h2>
                                            <ol class="commentlist">
                                                <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1" id="li-comment-20">
                                                    <div id="comment-20" class="comment_container">

                                                        <div class="comment-text">
                                                                @foreach ($reviews as $product)
                                                                <img alt="" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRNVCBUALVp1RABFd7mLfo5DJG0EAp4F7wysA&usqp=CAU"  width="80">
                                                                <div class="comment-form-rating">
                                                                    <p class="stars">
                                                                        @for ($i=1; $i<=$product->rating; $i++)
                                                                        <i class="fa fa-star" style="color: #efce4a"></i>
                                                                        @endfor
                                                                        @if ($product->rating<5)
                                                                            @for ($i=5; $i>$product->rating; $i--)
                                                                                <i class="fa fa-star" style="color: #e6e6e6;"></i>
                                                                            @endfor
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                                <p class="meta">
                                                                    <strong class="woocommerce-review__author">{{ $product->name }}</strong>
                                                                    <span class="woocommerce-review__dash">–</span>
                                                                    <time class="woocommerce-review__published-date" datetime="2008-02-14 20:00" >{{  $product->created_at->diffForHumans() }}</time>
                                                                </p>
                                                                <div class="description">
                                                                    <p>{{ $product->review }}</p>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </li>
                                            </ol>
                                        </div><!-- #comments -->

                                        <div id="review_form_wrapper">
                                            <div id="review_form">
                                                <div id="respond" class="comment-respond">
                                                    <form action="{{ url('review/'.$product->id) }}" method="POST" name="frm-contact" id="commentform" class="comment-form">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                                                        <div class="comment-form-rating">
                                                            <span>Your rating</span>
                                                            <p class="stars">
                                                                <label for="rated-1"></label>
                                                                <input type="radio" id="rated-1" name="rating" value="1">
                                                                <label for="rated-2"></label>
                                                                <input type="radio" id="rated-2" name="rating" value="2">
                                                                <label for="rated-3"></label>
                                                                <input type="radio" id="rated-3" name="rating" value="3">
                                                                <label for="rated-4"></label>
                                                                <input type="radio" id="rated-4" name="rating" value="4">
                                                                <label for="rated-5"></label>
                                                                <input type="radio" id="rated-5" name="rating" value="5" checked="checked">
                                                            </p>
                                                        </div>

                                                        <p class="comment-form-author">
                                                            <label for="name">Name</label>
                                                            <input type="text"  id="name" name="name" :value="old('name')">
                                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                                        </p>

                                                        <p class="comment-form-email">
                                                            <label for="email">Email</label>
                                                            <input type="email"  id="email" name="email" :value="old('email')">
                                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                                        </p>

                                                        <p class="comment-form-comment">
                                                            <label for="review">Your review <span class="required">*</span></label>
                                                            <textarea name="review" id="review" cols="45" rows="8" :value="old('review')"></textarea>
                                                            <x-input-error :messages="$errors->get('review')" class="mt-2" />
                                                        </p>

                                                        <p class="form-submit">
                                                            <input type="submit" name="submit" value="Submit" id="submit" class="submit" >
                                                        </p>

                                                    </form>

                                                </div><!-- .comment-respond-->
                                            </div><!-- #review_form -->
                                        </div><!-- #review_form_wrapper -->

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!--end main products area-->

                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                    <div class="widget widget-our-services ">
                        <div class="widget-content">
                            <ul class="our-services">

                                <li class="service">
                                    <a class="link-to-service" href="#">
                                        <i class="fa fa-truck" aria-hidden="true"></i>
                                        <div class="right-content">
                                            <b class="title">Free Shipping</b>
                                            <span class="subtitle">On Oder Over $99</span>
                                            <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="service">
                                    <a class="link-to-service" href="#">
                                        <i class="fa fa-gift" aria-hidden="true"></i>
                                        <div class="right-content">
                                            <b class="title">Special Offer</b>
                                            <span class="subtitle">Get a gift!</span>
                                            <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                        </div>
                                    </a>
                                </li>

                                <li class="service">
                                    <a class="link-to-service" href="#">
                                        <i class="fa fa-reply" aria-hidden="true"></i>
                                        <div class="right-content">
                                            <b class="title">Order Return</b>
                                            <span class="subtitle">Return within 7 days</span>
                                            <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div><!-- Categories widget-->

                    <div class="widget mercado-widget widget-product">
                        <h2 class="widget-title">Popular Products</h2>
                        <div class="widget-content">
                            <ul class="products">
                                <li class="product-item">
                                    @foreach ( $popular_product as $product)
                                            <div class="product product-widget-style">
                                                <div class="thumbnnail">
                                                    <a href="{{ url('product detail/'.$product->id) }}" title="">
                                                        <figure><img src="{{ asset('assets/uploads/product/'. $product->image) }}" alt=""></figure>
                                                    </a>
                                                </div>
                                                <div class="product-info">
                                                    <a href="#" class="product-name"><span>{{ $product->name }}</span></a>
                                                    @if ($product->tax==0)
                                                        <div class="wrap-price"><span class="product-price">${{ $product->original_price }}</span></div>
                                                    @else
                                                    <div class="wrap-price"><ins><p class="product-price">${{ $product->selling_price }}</p></ins> <del><p class="product-price">{{ $product->original_price }}</p></del></div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                </li>
                            </ul>
                        </div>
                    </div>

                </div><!--end sitebar-->

            </div><!--end row-->

        </div><!--end container-->

    </main>
@include('layouts.footer')
