$(document).ready(function () {

    $.ajaxSetup
    ({
        headers:
        {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click','.increment-btn', function (e) {
        e.preventDefault();
        var inc_value = $(this).closest('.product_data').find('.qty-input').val();
        var value=parseInt(inc_value,10);
        value=isNaN(value) ? 0 : value;
        if (value<100)
        {
            value++;

            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });

        $(document).on('click','.decrement-btn', function (e) {
        e.preventDefault();


        var dec_value = $(this).closest('.product_data').find('.qty-input').val();
        var value=parseInt(dec_value,10);
        value=isNaN(value) ? 0 : value;
        if (value<100 && value>1)
        {
            value--;
            $(this).closest('.product_data').find('.qty-input').val(value);
        }
    });


    $(document).on('click','.addToCart-btn', function (e) {
        e.preventDefault();
        $.ajaxSetup
        ({
            headers:
            {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var product_id  = $(this).closest('.product_data').find('.product_id').val();
        var quantity = $(this).closest('.product_data').find('.qty-input').val();
        var price = $(this).closest('.product_data').find('.selling_price').val();
        data =
        {
            'product_id' : product_id ,
            'product_qty' : quantity ,
            'selling_price':price,
        }
        $.ajax({
            method: "POST",
            url: "/addToCart",
            data: data,
            success: function (response) {

                $('.cart_items').load(location.href+ " .cart_items");
            }
        });
    });

    $(document).on('click','.addToWishlist-btn', function (e) {
        e.preventDefault();
        $.ajaxSetup
        ({
            headers:
            {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var product_id  = $(this).closest('.product_data').find('.product_id').val();
        var quantity = $(this).closest('.product_data').find('.qty-input').val();
        var price = $(this).closest('.product_data').find('.selling_price').val();
        data =
        {
            'product_id' : product_id ,
            'product_qty' : quantity ,
            'selling_price':price,
        }
        $.ajax({
            method: "POST",
            url: "/addToWishlist",
            data: data,
            success: function (response) {

                $('.cart_items').load(location.href+ " .cart_items");
            }
        });
    });

            $(document).on('click','.cart-qty-num-btn', function (e) {
            e.preventDefault();
            $.ajaxSetup
            ({
                headers:
                {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var product_id  = $(this).closest('.product_data').find('.product_id').val();
            var quantity = $(this).closest('.product_data').find('.qty-input').val();
            data =
            {
                'product_id' : product_id ,
                'product_qty' : quantity ,
            }
            $.ajax({
                method: "POST",
                url: "/quantity-number",
                data: data,
                success: function (response) {

                    $('.cart_items').load(location.href+ " .cart_items");
                }
            });
        });

        $(document).on('click','.wishlist-qty-num-btn', function (e) {
            e.preventDefault();
            $.ajaxSetup
            ({
                headers:
                {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var product_id  = $(this).closest('.product_data').find('.product_id').val();
            var quantity = $(this).closest('.product_data').find('.qty-input').val();
            data =
            {
                'product_id' : product_id ,
                'product_qty' : quantity ,
            }
            $.ajax({
                method: "POST",
                url: "/wishlist-quantity-number",
                data: data,
                success: function (response) {
                    $('.wish_items').load(location.href+ " .wish_items");
                }
            });
        });

    });
