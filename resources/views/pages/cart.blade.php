<title>Cart</title>
@include('layouts.header')

<main id="main" class="main-site">
    <div class="container">

        <div class="wrap-breadcrumb mb-10">
            <ul>
                <li class="item-link"><a href="#" class="link">Cart</a></li>
                <li class="item-link"><span>Cart Items</span></li>
            </ul>
        </div>
        <div class=" cart_items">
        @if($cartItems->count()>0)
        <div class=" main-content-area">
            <div class="wrap-iten-in-cart">
                <h3 class="box-title ">Products Name</h3>
                <ul class="products-cart product_data">
                    @foreach ($cartItems as $cartItem)
                    <input type="hidden" id="product_id" class="product_id" value="{{ $cartItem->product_id }}" name="product_id">
                    <li class="pr-cart-item">
                        <div class="product-image">
                            <figure><img src="{{ asset('assets/uploads/product/'.$cartItem->Products->image) }}" alt="{{ $cartItem->Products->name }}"></figure>
                        </div>
                        <div class="product-name">
                            <a class="link-to-product" href="#">{{ $cartItem->Products->name }}</a>
                        </div>
                        <div class="price-field produtc-price"><p class="price">${{ $cartItem->selling_price }}</p></div>
                        <div class="quantity">
                            <div class="quantity-input">
                                <input type="number" name="product_qty" class=" qty-input" value="{{ $cartItem->product_qty}}" data-max="120" pattern="[0-9]*">
                                <a class="btn increment-btn cart-qty-num-btn"></a>
                                <a class="btn decrement-btn cart-qty-num-btn"></a>
                            </div>
                        </div>
                        <div class="price-field sub-total"><p class="price">${{ $cartItem->selling_price * $cartItem->product_qty }}</p></div>
                        <div  class='delete'>
                                <a href="#" class="btn btn-delete" title="" vv={{ $cartItem->product_id }}>
                                    <span>Delete from your cart</span>
                                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                                </a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="summary">
                <div class="order-summary">
                    <h4 class="title-box">Order Summary</h4>
                    <p class="summary-info"><span class="title">Subtotal</span><b class="index">${{($cartItem->getSubTotalPrice())}}</b></p>
                    <p class="summary-info"><span class="title">Shipping</span><b class="index">Free Shipping</b></p>
                    <p class="summary-info total-info "><span class="title total">Total</span><b class="index">${{($cartItem->getTotalPrice())}}</b></p>
                </div>

                <div class="checkout-info">
                    <label class="checkbox-field">
                        <input class="frm-input " name="have-code" id="have-code" value="" type="checkbox"><span>I have promo code</span>
                    </label>
                    <a class="btn btn-checkout" href="{{ url('/checkout') }}">Check out</a>
                </div>

            </div>
        </div>
        </div>
        @else
        <div class="container-fluid">
            <div class="row">

               <div class="col-md-12">
                       <div class="card">
                   <div class="card-body cart">
                           <div class="col-sm-12 empty-cart-cls text-center" style="margin-bottom: 25px;">
                               <img src="https://fireballpress.com/content/images/empty-cart.png" width="250" class="img-fluid mr-3" style="margin-bottom: -45px;">
                               <h3><strong>Your Cart is Empty</strong></h3>
                               <h4>Add something to make me happy :)</h4>
                               <a href="{{ url('/shop') }}" class="btn btn-danger" style="margin-top: 8px;" data-abc="true">continue shopping</a>
                           </div>
                   </div>
           </div>
               </div>

            </div>

           </div>
        @endif
        <!--end main content area-->
    </div><!--end container-->

</main>
@include('layouts.footer')

