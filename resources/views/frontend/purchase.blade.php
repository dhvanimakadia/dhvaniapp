<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/lux/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background-color: #fdfd96;
        }

        header, footer {
            background-color: #ff6961;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            border-bottom: 5px solid #ffb347;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .notification {
            position: fixed;
            top: 10px;
            right: 10px;
            padding: 10px;
            background-color: #77dd77;
            color: #fff;
            border-radius: 10px;
            display: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .total-price {
            font-size: 20px;
            font-weight: bold;
            margin-top: 20px;
        }

        .ttlAmt {
            background-color: #fdfd96;
            padding: 10px 20px;
            border-radius: 20px;
            display: inline-block;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .product-card {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 20px;
            overflow: hidden;
            transition: transform 0.2s;
            background-color: #fff;
            border: 2px solid #ffb347;
            margin-bottom: 20px;
        }

        .product-card:hover {
            transform: scale(1.05);
        }

        .product-image {
            border-radius: 10px;
            border: 2px solid #ffb347;
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

        .card-title {
            color: #ff6961;
            font-weight: bold;
        }

        .card-text {
            color: #333;
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
    </style>
</head>
<body>
    <header>
        <h1>Dhvani Shoppsy</h1>
    </header>
    
    <div class="notification" id="notification">Item added to cart!</div>

    <div class="container">
        @if (!is_null($cartItems) && count($cartItems) > 0)
            <div class="row">
                @foreach ($cartItems as $item)
                    @if ($item->product)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-frame">
                                    <p><img height="100" width="100" src="{{ asset('images/' . $item->product->image) }}" class="product-image" alt="{{ $item->product->name }}"></p>
                                    <input type="hidden" name="cartItems[{{ $item->id }}][product_id]" value="{{ $item->product->id }}">
                                    <input type="hidden" name="cartItems[{{ $item->id }}][quantity]" value="{{ $item->quantity }}">
                                    <h2 class="card-title">{{ $item->product->name }}</h2>
                                    <p class="card-text">Price: <span class="current-quantity">{{ $item->product->price }}</span> Rs</p>
                                    
                                    <div class="quantity-controls">
                                        <span class="dec updtQty" data-id="{{ $item->product->id }}">
                                            <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                        </span>
                                        <span class="num">Quantity: {{ $item->quantity }}</span>
                                        <span class="inc updtQty" data-id="{{ $item->product->id }}">
                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        @else
            <p>No items in the cart.</p>
        @endif
    </div>

    <div class="col-12">
        <div class="total-price-box">
            <p class="total-price">Total Price:</p>
            <span class="ttlAmt">{{ $totalSum }} Rs</span>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Dhvani Shoppsy. All rights reserved.</p>
    </footer>

    <script>
        function showNotification(message) {
            const notification = document.getElementById('notification');
            notification.textContent = message;
            notification.style.display = 'block';
            setTimeout(() => {
                notification.style.display = 'none';
            }, 3000);
        }
    </script>
</body>
</html>
