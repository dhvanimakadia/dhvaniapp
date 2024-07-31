<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/lux/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .wrapper {
            display: flex;
            height: 100%;
        }

        .sidebar {
            width: 250px;
            background: #343a40;
            color: #fff;
            display: flex;
            flex-direction: column;
            padding-top: 20px;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            padding: 15px;
            display: flex;
            align-items: center;
            transition: background 0.3s;
        }

        .sidebar a:hover {
            background: #495057;
        }

        .sidebar .logo {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .sidebar .logo img {
            max-width: 40px;
            margin-right: 10px;
        }

        .content {
            flex: 1;
            padding: 20px;
            position: relative;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #343a40;
            color: #fff;
            padding: 10px 20px;
        }

        .btn-add-product {
            background-color: #ff6961;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 10px;
            margin: 10px;
            font-weight: bold;
            transition: background-color 0.2s;
        }

        .btn-add-product:hover {
            background-color: #ff4500;
        }

        iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="logo">
                <a href="{{ route('welcome') }}">
                    <img src="{{ asset('images/dhvani.png') }}" alt="Jewellery Logo" style="max-width: 100px; margin-right: 10px;">
                </a>
            </div>
            
            <a href="/products" onclick="loadContent('{{ route('products.index') }}')">
                <i class="fas fa-box-open" style="margin-right: 10px;"></i>
                Products
            </a>
            <a href="/jwellery" onclick="loadContent('{{ route('jwellery.index') }}')">
                <i class="fas fa-gem" style="margin-right: 10px;"></i>
                Jewellery
            </a>
            <a href="/owner" onclick="loadContent('{{ route('owner.index') }}')">
                <i class="fas fa-user-tie" style="margin-right: 10px;"></i>
                Owner
            </a> 
            <a href="/gallery" onclick="loadContent('{{ route('gallery.index') }}')">
                <i class="fas fa-images" style="margin-right: 10px;"></i>
                Gallery
            </a>
            {{-- <a href="/news" onclick="loadContent('{{ route('news.index') }}')">
                <i class="fas fa-newspaper" style="margin-right: 10px;"></i>
                News
            </a> --}}
            <a href="/contact" onclick="loadContent('{{ route('contact.show') }}')">
                <i class="fas fa-envelope" style="margin-right: 10px;"></i>
                Contact Us
            </a>
          
            <!-- Add more links as needed -->
        </div>
        <div class="content">
            <iframe id="contentFrame" src=""></iframe>
        </div>
    </div>
    <script>
        function loadContent(url) {
            document.getElementById('contentFrame').src = url;
        }
    </script>
</body>
</html>
