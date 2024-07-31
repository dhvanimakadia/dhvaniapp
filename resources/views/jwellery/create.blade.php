<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Include Bootstrap CSS - Lux Theme -->
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/lux/bootstrap.min.css" rel="stylesheet">
    
    <!-- Optionally, Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    
    <!-- Additional CSS for custom styles -->
    <style>
        body {
            padding-top: 20px;
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background-color: #fdfd96;
        }

        .container {
            max-width: 600px;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            padding: 20px;
            margin-top: 20px;
        }

        h2 {
            text-align: center;
            color: #ff6961;
            font-weight: bold;
        }

        .form-group label {
            font-weight: bold;
            color: #ff6961;
        }

        .form-control, .form-control-file, .form-control:focus {
            border-radius: 10px;
            border: 2px solid #ffb347;
        }

        .form-control-file {
            padding: 5px;
        }

        .btn-primary {
            background-color: #ff6961;
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: bold;
            transition: background-color 0.2s;
        }

        .btn-primary:hover {
            background-color: #ff4500;
        }
    </style>
    
    <title>Jwellery Product</title>
</head>
<body>
    <div class="container">
        <h2>Create Product</h2>
        
        <form action="{{ route('jwellery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control-file" id="image" name="image">
                @if ($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
            </div>
          
            
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="text" pattern="[0-9]*" inputmode="numeric" class="form-control" id="quantity" name="quantity" required>
                <small id="quantityHelp" class="form-text text-muted">Please enter a valid quantity (numbers only).</small>
            </div>
            
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" pattern="[0-9]*" inputmode="numeric" class="form-control" id="price" name="price" required>
                <small id="priceHelp" class="form-text text-muted">Please enter a valid price (numbers only).</small>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script>
          function validateForm() {
            var name = document.getElementById('name').value;
            var image = document.getElementById('image').value;
            var description = document.getElementById('description').value;
            var quantity = document.getElementById('quantity').value;
            var status = document.getElementById('status').value;
            var price = document.getElementById('price').value;

            if (name.trim() == '') {
                alert('Please enter a product name.');
                return false;
            }
            if (image.trim() == '') {
                alert('Please select an image.');
                return false;
            }
            if (description.trim() == '') {
                alert('Please enter a description.');
                return false;
            }
            if (quantity.trim() == '' || isNaN(quantity)) {
                alert('Please enter a valid quantity.');
                return false;
            }
            if (status.trim() == '') {
                alert('Please select a status.');
                return false;
            }
            if (price.trim() == '' || isNaN(price)) {
                alert('Please enter a valid price.');
                return false;
            }
            return true;
        }
        </script>
</body>
</html>
