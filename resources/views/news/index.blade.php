<!DOCTYPE html>
<html>
<head>
    <title>News Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/lux/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #fdfd96;
            padding-top: 20px;
        }
        h1 {
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
            font-family: 'Comic Sans MS', cursive, sans-serif;
        }
        .card-header {
            background-color: #ff6961;
            color: #fff;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }
        .card-title {
            font-size: 24px;
        }
        .card-subtitle {
            font-size: 16px;
        }
        .card-body {
            padding: 20px;
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
        img {
            width: 120px;
            height:100px;
            margin-right: 10px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Latest News</h1>
        <a href="{{ route('home.index') }}" class="btn-back">Back</a>
        <div class="card mb-3">
            <div class="card-header">
                <h2 class="card-title">Necklace</h2>
                <p class="card-subtitle text-muted">Posted on June 29, 2024</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="images/1719484777.jpg" alt="Products Logo">
                    </div>
                    <div class="col-md-8">
                        <p>It has 10% off if you purchase before July 10</p>
                        <a href="{{ route('jwellery.index') }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>
