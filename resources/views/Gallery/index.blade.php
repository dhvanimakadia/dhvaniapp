<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Lightbox2 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background-color: #fdfd96;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            color: #ff6961;
            font-weight: bold;
        }

        .table {
            margin-top: 20px;
            border-radius: 10px;
            overflow: hidden;
        }

        .table th, .table td {
            padding: 12px;
            text-align: center;
            border: 2px solid #ffb347;
        }

        .table th {
            background-color: #ffef96;
            color: #ff6961;
            font-weight: bold;
        }

        .table tbody tr:nth-child(even) {
            background-color: #fff0f0;
        }

        .product-image {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid #ffb347;
        }

        .btn-add-product {
            background-color: #ff6961;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 10px;
            display: inline-block;
            margin-bottom: 10px;
            font-weight: bold;
            transition: background-color 0.2s;
        }

        .btn-add-product:hover {
            background-color: #ff4500;
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
       
        .table-footer {
    text-align: center; 
    margin-top: 20px; 
}
.arrow-link {
    color: #ff6961;
    text-decoration: none;
    padding: 10px 20px;
    border: 2px solid #ffb347;
    border-radius: 10px;
    transition: background-color 0.2s, color 0.2s;
    margin: 0 5px; /* Adjust margin to control spacing */
    font-weight: bold;
    display: inline-block;
    vertical-align: middle;
}

.arrow-link:hover {
    background-color: #ffef96;
    color: #ff4500;
}

.arrow-link .fas {
    margin-right: 8px;
}

.arrow-link.left {
    background-color: #ff6961;
   
}

.arrow-link.right {
    background-color: #64f164;
    color: #fff;
}

.arrow-link.left .fas {
    color: #fff;
}

.arrow-link.right .fas {
    color: #fff;
}

.arrow-link.left:hover {
    background-color: #ff4500;
}

.arrow-link.right:hover {
    background-color: #f0c474;
}

    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Data</h1>
        {{-- <a href="{{ route('home.index') }}" class="btn-back">Back</a> --}}
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>Name</th>
                    <th>Image</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>
                            <a href="{{ asset('images/' . $product->image) }}" data-lightbox="image-{{ $product->id }}" data-title="{{ $product->name }}">
                                <img src="{{ asset('images/' . $product->image) }}" class="product-image" alt="{{ $product->name }}">
                            </a>
                        </td>
                       
                    </tr>
                @endforeach
                @foreach ($jwellery as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>
                            <a href="{{ asset('images/' . $item->image) }}" data-lightbox="image-{{ $item->id }}" data-title="{{ $item->name }}">
                                <img src="{{ asset('images/' . $item->image) }}" class="product-image" alt="{{ $item->name }}">
                            </a>
                        </td>
                        
                    </tr>
                @endforeach
                @foreach ($owner as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ asset('images/' . $item->image) }}" data-lightbox="image-{{ $item->id }}" data-title="{{ $item->name }}">
                            <img src="{{ asset('images/' . $item->image) }}" class="product-image" alt="{{ $item->name }}">
                        </a>
                    </td>
                  
                </tr>
            @endforeach
            </tbody>
        </table>
        
    </div>
    <div class="table-footer">
        <a href="{{ route('owner.index') }}" class="arrow-link left"><i class="fas fa-chevron-left"></i></a>
        <a href="{{ route('contact.submit') }}" class="arrow-link right"> <i class="fas fa-chevron-right"></i></a>
        </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Lightbox2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
</body>
</html>
