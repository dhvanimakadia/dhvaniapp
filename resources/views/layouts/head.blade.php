<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backend</title>
    <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/lux/bootstrap.min.css" rel="stylesheet">
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
            color: #ff6961;
            margin-bottom: 65px;
        }

        .action-icons button:hover {
            color: #ff4500;
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

        .alert-success {
            background-color: #77dd77;
            color: #fff;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
        }
    </style>