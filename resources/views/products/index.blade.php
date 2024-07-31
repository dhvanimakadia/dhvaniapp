    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Backend</title>
        <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/lux/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        <style>
             .example {
        position: relative;
        margin: 10px 0;
        max-width: 300px; /* Adjust as per your layout */
    }

    .example input[type="text"] {
        width: calc(100% - 40px); /* Adjust to leave space for the search icon */
        padding: 10px;
        border: 2px solid #ffb347;
        border-radius: 10px;
        font-size: 1rem;
        outline: none;
    }

    .example button[type="submit"] {
        background-color: #ff6961;
        border: none;
        color: white;
        padding: 10px 20px;
        border-radius: 10px;
        cursor: pointer;
        transition: background-color 0.2s;
        position: absolute;
        top: 0;
        right: 0;
    }

    .example button[type="submit"]:hover {
        background-color: #ff4500;
    }

    .fa-search {
        font-size: 1.5rem;
    }
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

            /* Table Styles */
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
                border-radius: 10px;
                overflow: hidden;
            }

            table th, table td {
                padding: 12px;
                text-align: center;
                border: 2px solid #ffb347;
            }

            table th {
                background-color: #ffef96;
                color: #ff6961;
                font-weight: bold;
            }

            table tbody tr:nth-child(even) {
                background-color: #fff0f0;
            }

            .product-image {
                max-width: 100px;
                height: auto;
                display: block;
                margin: 0 auto;
                border-radius: 10px;
                border: 2px solid #ffb347;
            }

            .action-icons {
                display: flex;
                justify-content: center;
                gap: 10px;
            }

            .action-icons form {
                display: inline;
            }

            .action-icons button {
                background-color: transparent;
                border: none;
                cursor: pointer;
                font-size: 1.5rem;
                margin-bottom: 65px;
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
                float: right; 
            }

            .btn-back:hover {
                background-color: #ff4500;
            }

            
            .alert-success {
                background-color: #77dd77;
                color: #fff;
                padding: 10px;
                border-radius: 10px;
                text-align: center;
            }

        
            .icon-edit {
                color: #007bff;
                font-size: 1.5rem;
            }

            .icon-delete {
                color: #dc3545; 
                font-size: 2rem;
            }

            .icon-edit:hover {
                color: #0056b3; 
            }

            .icon-delete:hover {
                color: #c82333; 
            }
            . btn btn-info{
                border-radius: 10px;
            }
            .btn-product {
                background-color: #64f164;
                color: #fff;
                text-decoration: none;
                padding: 10px 20px;
                border-radius: 10px;
                display: inline-block;
                margin-bottom: 10px;
                font-weight: bold;
                transition: background-color 0.2s;
            
            }

            .btn-product:hover {
                background-color: #f0c474;
             }
.table-footer {
    margin-top: 20px;
    padding: 10px 0;
    text-align: center;
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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <div class="container">
            <h1>Products</h1>
            <form class="example" action="{{ route('products.index') }}" method="GET">
                <input type="text" placeholder="Search.." name="search" value="{{ request()->input('search') }}">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
            
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <a href="{{ route('products.create') }}" class="btn-add-product">Add Product</a>
            <a href="{{ route('frontend.display') }}" class="btn-product" >view</a>
            <a href="{{ route('home.index') }}" class="btn-back">Back</a>
            <form action="{{ route('products.export-pdf') }}" method="GET" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-info rounded-lg">PDF</button>

            </form>
            <form action="{{ route('products.export-excel') }}" method="GET" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-info rounded-lg">Excel</button>
            </form>
            <form action="{{ route('products.export-csv') }}" method="GET" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-info rounded-lg">CSV</button>
            </form>

            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td><img src="{{ asset('images/' . $product->image) }}" class="product-image" alt="{{ $product->name }}"></td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->status }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->discount }}</td>
                        <td class="action-icons">
                            <!-- Edit Form -->
                            <form action="{{ route('products.edit', $product->id) }}" method="GET">
                                @csrf
                                <button type="submit" title="Edit"><i class="fas fa-edit icon-edit"></i></button>
                            </form>
                            <!-- Delete Form -->
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" title="Delete"><i class="fas fa-trash-alt icon-delete"></i></button>
                            </form>
                            <form action="{{ route('products.see', $product->id) }}" method="GET">
                                @csrf
                                <button type="submit" title="View"><i class="fa-solid fa-eye"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                
                </tbody>
            </table>
        </div>
        {{-- <!-- Modal for Image View -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel">Product Image</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <img id="modalImage" src="" alt="Product Image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        </div> --}}
        <div class="table-footer">
            <a href="{{ route('home.index') }}" class="arrow-link left"><i class="fas fa-chevron-left"></i></a>
            <a href="{{ route('jwellery.index') }}" class="arrow-link right"> <i class="fas fa-chevron-right"></i></a>
        </div>
        <div class="card card-default">
          
            <div class="card-body text-center">
                <button id="razorpay-button">Pay 1000 INR</button>
            </div>
        </div>
        
        <script>
            $(document).ready(function() {
                $('.product-image').on('click', function() {
                    var src = $(this).attr('src');
                    $('#modalImage').attr('src', src);
                    $('#imageModal').modal('show');
                });
            });
        </script>

        <!-- Bootstrap JS and dependencies -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
       
    </body>
    </html>
