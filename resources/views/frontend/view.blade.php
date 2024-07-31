<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/lux/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Comic Sans MS', cursive, sans-serif;
        }
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #fdfd96;
            padding-top: 20px;
        }
        header, footer {
            background-color: #ff6961;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            border-bottom: 5px solid #ffb347;
        }
        .container {
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        h3 {
            text-align: center;
            color: #ff6961;
            font-weight: bold;
            margin-bottom: 20px;
            width: 100%;
        }
        .card {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 20px;
            overflow: hidden;
            transition: transform 0.2s;
            background-color: #fff;
            border: 2px solid #ffb347;
            margin-bottom: 20px;
            flex: 1 1 250px;
            max-width: 250px;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card-frame {
           
            padding: 10px;
            
        } 
        .product-image {
            border-radius: 10px;
            border: 2px solid #ffb347;
            margin-bottom: 10px;
            max-width: 100%;
            height: auto;
            margin-left:65px;
        }
        .quantity-controls {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .quantity-controls .fa {
            cursor: pointer;
            font-size: 1.5rem;
            color: #ff6961;
        }
        .quantity-controls .num {
            font-size: 1.2rem;
            font-weight: bold;
            color: #ff6961;
        }
        .btn-add-product {
            background-color: #ff6961;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px auto;
            border-radius: 10px;
            text-decoration: none !important;
            transition: background-color 0.3s ease;
        }
        .btn-add-product:hover {
            background-color: #fff;
            color: #ff6961;
            border: 1px solid #ff6961;
        }
        .total-price-box {
            background-color: #ffef96;
            border: 2px solid #ffb347;
            padding: 20px;
            margin-top: 20px;
            text-align: center;
            border-radius: 20px;
            position: sticky;
            bottom: 20px;
            /* box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); */
        }
        .total-price {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .ttlAmt {
            font-weight: bold;
            color: #335933;
            margin-top: 20px;
            display: block;
            text-align: center;
            width: 100%;
        }
        .btn-back {
            background-color: #ff6961;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 10px;
            display: inline-block;
            margin-bottom: 10px;
            font-weight: bold;
            transition: background-color 0.2s;
            float: left;
        }

        .btn-back:hover {
            background-color: #ff4500;
        }

    </style>
</head>
<body>
    <header>
        <h1>Dhvani Shoppsy</h1>
    </header>
    
    <div class="container mt-4">
        <a href="{{ route('home.index') }}" class="btn-back">Back</a>
        <legend><h3>Cart Items :</h3></legend>
   
        @if (count($cartItems) > 0)
            @foreach($cartItems as $item)
                @if($item->product)
                    <div class="card">
                        <div class="card-frame">
                            <p>{{ $item->product->name }}</p>
                            <img height="100" width="100" src="{{ asset('images/' . $item->product->image) }}" class="product-image">
                            <p>Price: <span class="current-quantity">{{ $item->product->price }}</span> Rs</p>
                            <input type="hidden" name="cartItems[{{ $item->id }}][product_id]" value="{{ $item->product->id }}">
                            <div class="quantity-controls">
                                <span class="dec updtQty" data-id="{{ $item->product->id }}">
                                    <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                </span>
                                <span class="num">{{ $item->quantity }}</span>
                                <span class="inc updtQty" data-id="{{ $item->product->id }}">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            <div class="col-12">
                <div class="total-price-box">
                    <p class="total-price">Total Price:</p>
                    <span class="ttlAmt">{{ $totalSum }} Rs</span>
                </div>
            </div>
            <a href="{{ route('cart.additem') }}" class="btn-add-product">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i> Buy Now
            </a>
        @else
            <p>No items in the cart.</p>
        @endif
    </div>

    <footer>
        <p>&copy; 2024 Dhvani Shoppsy. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.inc').click(function() {
                var $num = $(this).siblings('.num');
                var prnum = parseInt($num.text());
                var productId = $(this).data('id');
                prnum++;
                $num.text(prnum);
                updateQuantity(productId, prnum);
            });

            $('.dec').click(function() {
                var $num = $(this).siblings('.num');
                var prnum = parseInt($num.text());
                var productId = $(this).data('id');
                if (prnum > 1) {
                    prnum--;
                    $num.text(prnum);
                    updateQuantity(productId, prnum);
                }
            });

            function updateQuantity(productId, newQuantity) {
                $.ajax({
                    url: '{{ route('updt_cart') }}',
                    method: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'product_id': productId,
                        'new_quantity': newQuantity
                    },
                    success: function(response) {
                        $('.ttlAmt').text(response + " Rs");
                    },
                    error: function(xhr, status, error) {
                    console.error('Error updating quantity:');
                    console.error('XHR:', xhr);
                    console.error('Status:', status);
                    console.error('Error:', error);
}

                });
            }
        });
    </script>
     <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
     <script>
         document.getElementById('razorpay-button').onclick = function(e) {
             e.preventDefault(); // Prevent default button action
 
             // Set up the Razorpay options
           
                 var options = {
                 "key": "rzp_test_kyo3mQQCAx0PPC", // Your Razorpay Key
                 "amount": "10000", // Amount in paise (100 INR)
                 "currency": "INR",
                 "name": "GeekyAnts official",
                 "description": "Razorpay payment",
                 "image": "/images/logo-icon.png",
                 "handler": function (response) {
                     console.log('Payment successful! Payment ID: ', response.razorpay_payment_id);
                     alert('Payment successful! Payment ID: ' + response.razorpay_payment_id);
                 },
                 "prefill": {
                     "name": "ABC",
                     "email": "abc@gmail.com"
                 },
                 "theme": {
                     "color": "#ff7529"
                 }
             };
 
             // Check if Razorpay key is set
             if (!options.key) {
                 console.error('Razorpay key is missing.');
                 return;
             }
 
             var rzp = new Razorpay(options);
             rzp.open();
         };
     </script>
</body>
</html>
