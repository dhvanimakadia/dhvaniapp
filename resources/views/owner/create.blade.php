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
    
    <title>Create Product</title>
</head>
<body>
    <div class="container">
        <h2>Create Product</h2>
        
        <form action="{{ route('owner.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Owner Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control-file" id="image" name="image" required>
            </div>
        
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
                <small id="emailHelp" class="form-text text-muted">Please enter a valid email address.</small>
            </div>
            
            <div class="form-group">
                <label for="role">Role:</label>
                <select class="form-control" id="role" name="role" required>
                    <option value=""></option>
                    <option value="Businessman">Businessman</option>
                    <option value="Engineer">Engineer</option>
                    <option value="Police">Police</option>
                    <option value="Head">Head</option>
                    <option value="Dr.">Dr.</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
