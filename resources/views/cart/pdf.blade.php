<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .total {
            text-align: right;
            font-size: 1.2rem;
            font-weight: bold;
        }
    </style>
</head>
<body>

        <h1>Cart Invoice</h1>
        <p><strong>Customer Name:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>

        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                <tr>
                    <td>
                        <img src="{{ public_path('uploads/' . $item->product->photo) }}" alt="{{ $item->product->productname }}" width="50">
                    </td>
                    <td>{{ $item->product->productname }}</td>
                    <td>${{ number_format($item->product->price, 2) }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Total: ${{ number_format($grandTotal, 2) }}</h3>

</body>
</html>
