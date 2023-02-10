<title>Wishlist</title>
@include('layouts.header')

<main id="main" class="main-site">
    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">Wishlist</a></li>
                <li class="item-link"><span>Wishlist Items</span></li>
            </ul>
        </div>
        <div class=" wish_items">
        @if($wishlistItems->count()>0)
        <div class=" main-content-area">
            <div class="wrap-iten-in-cart">
                <h3 class="box-title">Products Name</h3>
                <ul class="products-cart product_data">
                    @foreach ($wishlistItems as $wishlistItem)
                    <li class="pr-cart-item">
                        <div class="product-image">
                            <figure><img src="{{ asset('assets/uploads/product/'.$wishlistItem->Products->image) }}" alt="{{ $wishlistItem->Products->name }}"></figure>
                        </div>
                        <div class="product-name">
                            <input type="hidden" value="{{ $wishlistItem->Products->id }}" name="product_id" class="product_id">
                            <a class="link-to-product" href="#">{{ $wishlistItem->Products->name }}</a>
                        </div>
                        <div class="price-field produtc-price"><p class="price">${{ $wishlistItem->Products->selling_price }}</p></div>
                        <div class="quantity">
                            <div class="quantity-input">
                                <input type="number" name="product_qty" class=" qty-input" value="{{ $wishlistItem ->product_qty }}" data-max="120" pattern="[0-9]*">
                                <a class="btn increment-btn wishlist-qty-num-btn"></a>
                                <a class="btn decrement-btn wishlist-qty-num-btn"></a>
                            </div>
                        </div>
                        <div class="price-field sub-total"><p class="price">${{ $wishlistItem->Products->selling_price * $wishlistItem ->product_qty }}</p></div>
                        <div class="delete">
                            <a href="#" class="btn btn-wish-delete" title="" vv={{ $wishlistItem->Products->id }}>
                                <span>Delete from your wishlist</span>
                                <i class="fa fa-times-circle" aria-hidden="true"></i>
                            </a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="summary">
                <div class="checkout-info">
                    <form action="{{ url('/addToCart') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $wishlistItem->Products->id}}" name="product_id" class="product_id">
                        <input type="hidden" value="{{ $wishlistItem->Products->small_description }}" name="small_description">
                        <input type="hidden" value="{{ $wishlistItem->Products->selling_price }}" name="selling_price" class="selling_price">
                        <input type="hidden" value="{{ $wishlistItem->Products->image }}"  name="image">
                        <input type="hidden" value="{{ $wishlistItem ->product_qty }}" name="product_qty" class="qty-input">
                        <button class="btn btn-checkout addToCartBtn">Add To Cart</button>
                    </form>

                </div>

            </div>
        </div>
        </div><!--end main content area-->

        @else
        <div class="container-fluid">
            <div class="row">

               <div class="col-md-12">
                       <div class="card">
                   <div class="card-body cart">
                           <div class="col-sm-12 empty-cart-cls text-center" style="margin-bottom: 25px;">
                               <img src="https://fireballpress.com/content/images/empty-cart.png" width="250" class="img-fluid mr-3" style="margin-bottom: -45px;">
                               <h3><strong>Your Wishlist is Empty</strong></h3>
                               <h4>Add something to make me happy :)</h4>
                               <a href="{{ url('/shop') }}" class="btn btn-danger" style="margin-top: 8px;" data-abc="true">continue shopping</a>
                           </div>
                   </div>
           </div>
               </div>

            </div>

           </div>
        @endif
    </div><!--end container-->

</main>

@include('layouts.footer')
