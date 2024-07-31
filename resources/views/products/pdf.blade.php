<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <style>
        body { font-family: 'Comic Sans MS', cursive, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table th, table td { padding: 12px; text-align: left; border: 1px solid #ddd; }
        table th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h1>Products</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Price</th>
                <th>Discount</th>
               
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->status }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->discount }}</td>
                 
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
