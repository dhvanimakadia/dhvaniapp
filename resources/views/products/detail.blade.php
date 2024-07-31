<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/lux/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            padding-top: 20px;
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background-color: #fdfd96;
        }

        .container {
            max-width: 800px;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            padding: 20px;
            margin-top: 20px;
        }

        h1 {
            text-align: center;
            color: #ff6961;
            font-weight: bold;
        }

        .product-image {
            border-radius: 20px;
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto 20px auto;
        }

        .product-info p {
            font-size: 1.2rem;
            color: #333;
        }

        .product-info strong {
            color: #ff6961;
        }

        .product-info .text-success {
            color: #77dd77 !important;
        }

        .product-info .text-danger {
            color: #ff6961 !important;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mb-4">{{ $product->name }}</h1>
                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid product-image mb-4">
                <div class="product-info">
                    <p class="mb-2"><strong>Price:</strong> ${{ $product->price }}</p>
                    <p class="mb-2"><strong>Description:</strong> {{ $product->description }}</p>
                    <p class="mb-2"><strong>Quantity:</strong> {{ $product->quantity }}</p>
                    <p class="mb-2">
                        <strong>Status:</strong>
                        @if ($product->status == 'active')
                        <i class="bi bi-check-circle-fill text-success"></i> Active
                        @else
                        <i class="bi bi-x-circle-fill text-danger"></i> Inactive
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+LG/zPfQgH9dK+Vz4uJ7bxIQqBK9eF54H+7/dTw/hJisI4u" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
