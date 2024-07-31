<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listing</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/lux/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Bootstrap Bundle with Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background-color: #fdfd96;
            padding-top: 20px;
        }
        h3 {
            text-align: center;
            color: #ff6961;
            font-weight: bold;
            font-family: 'Comic Sans MS', cursive, sans-serif;
        }
        .card {
            border: none;
            border-radius: 20px;
            background: #fff2e6;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-family: 'Comic Sans MS', cursive, sans-serif;
        }
        .card-body {
            padding: 20px;
        }
        .card-img-top {
            max-width: 120px;
            max-height: 120px;
            margin: 0 auto 10px;
            border-radius: 10px;
        }
        .btn-primary {
            background-color: #ff6961;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #fff;
            color: #ff6961;
            border: 1px solid #ff6961;
        }
        .btn-top-right {
            position: absolute;
            top: 10px;
            right: 20px;
            z-index: 1000;
            background-color: #008000;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            color: #fff;
        }
        .btn-top-right:hover {
            background-color: #fff;
            color: #008000;
            border: 1px solid #008000;
        }
        .legend-heading {
            border-bottom: 2px solid #333;
            padding-bottom: 5px;
            margin-bottom: 20px;
        }
    .btn-back {
    display: inline-block; 
    text-decoration: none; 
    padding: 10px 20px; 
    margin: 40px;
    height: 60px;
    color: #333; 
}

.btn-back i {
    margin-right: 10px;
}
    </style>
</head>
<body>
    <div class="container mt-4">
        <a href="{{ route('home.index') }}" class="btn-back">
            <span style='font-size:100px;'>&#8592;</span>
        </a>

        <h3>Products</h3>
        <legend class="legend-heading">
        </legend>
        <div class="row">
            @foreach ($product as $product)
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card">
                    <a href="{{ route('product.detail', $product->id) }}" style="text-decoration: none; color: inherit;">
                        <div class="card-body">
                            <h2>{{ $product->name }}</h2>
                            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="card-img-top img-fluid">
                            <p>Price: {{ $product->price }}</p>
                            <p>Description: {{ $product->description }}</p>
                            <p>Quantity: {{ $product->quantity }}</p>
                            <p class="card-text">
                                Status:
                                @if ($product->status == 'active')
                                <i class="bi bi-check-circle-fill text-success"></i> Active
                                @else
                                <i class="bi bi-x-circle-fill text-danger"></i> Inactive
                                @endif
                            </p>
                            <button class="btn btn-primary add-to-cart" data-productid="{{ $product->id }}" data-productname="{{ $product->name }}" data-quantity="1">
                                <i class="fa fa-shopping-cart"></i> Add to Cart
                            </button>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <button id="view-button" class="btn btn-primary btn-top-right">
        View Cart
    </button>
   
<!--EXTRA CODE-->
<div class="container mt-4">
    <legend class="legend-heading">
        <h3>Jwellery</h3>
    </legend>
    <div class="row">
        @foreach ($jwellerys as $jwellery)
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card">
                <a href="{{ route('jwellery.detail', $jwellery->id) }}" style="text-decoration: none; color: inherit;">
                    <div class="card-body">
                        <p>{{ $jwellery->name }}</p>
                        <img src="{{ asset('images/' . $jwellery->image) }}" alt="{{ $jwellery->name }}" class="card-img-top img-fluid">
                        <p>Price: {{ $jwellery->price }}</p>
                        <p>Quantity: {{ $jwellery->quantity }}</p>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!--owner-->
<div class="container mt-4">
    <legend class="legend-heading">
        <h3>Owner</h3>
    </legend>
    <div class="row">
        @foreach ($owners as $owner)
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card">
                <a href="{{ route('owner.detail', $owner->id) }}" style="text-decoration: none; color: inherit;">
                    <div class="card-body">
                        <p>{{ $owner->name }}</p>
                        <img src="{{ asset('images/' . $owner->image) }}" alt="{{ $owner->name }}" class="card-img-top img-fluid">
                       <p>{{$owner->role}}</p>
                       <p>{{$owner->email}}</p>

                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>


    <div id="cart-items"></div>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script>
        let slideIndex = 1;
        showSlides(slideIndex);
    
        function plusSlides(n) {
            showSlides(slideIndex += n);
        }
    
        function currentSlide(n) {
            showSlides(slideIndex = n);
        }
    
        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            if (n > slides.length) { slideIndex = 1 }
            if (n < 1) { slideIndex = slides.length }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex - 1].style.display = "block";
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.add-to-cart').on('click', function() {
                var productId = $(this).data('productid');
                var productName = $(this).data('productname');
                var quantity = $(this).data('quantity');
                
                $.ajax({
                    url: '{{ route("cart.store") }}',
                    method: 'POST',
                    data: {
                        productid: productId,
                        quantity: quantity,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Product added to cart successfully!');
                            cartProducts.push({
                                id: productId,
                                name: productName,
                                quantity: quantity
                            });
                        } else {
                            alert('Failed to add product to cart.');
                        }
                    },
                    error: function(error) {
                        alert('An error occurred. Please try again.');
                    }
                });
            });

            $('#view-button').on('click', function() {
                window.location.href = '{{ route("cart.index") }}';
            });
        });
    </script>

</body>
</html>
