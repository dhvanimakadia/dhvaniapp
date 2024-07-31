<!-- resources/views/contact.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/lux/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Comic Sans MS', cursive, sans-serif;
            background-color: #fdfd96;
        }
        .container {
            margin-top: 50px;
        }
        .form-group label {
            color: #ff6961;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #ff6961;
            border: none;
        }
        .btn-primary:hover {
            background-color: #ff5c5c;
        }
        .alert-success {
            margin-top: 20px;
            color: #fff;
            background-color: #77dd77;
            border: none;
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
            float: top; /* Add this line */
        }

        .btn-back:hover {
            background-color: #ff4500;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Contact Us</h1>
        <a href="{{ route('home.index') }}" class="btn-back">Back</a>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('contact.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
</body>
</html>
