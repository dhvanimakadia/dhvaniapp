
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