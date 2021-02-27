<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export Excel</title>
</head>
<body>
    <table>
    <thead>
    <tr>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Nama Supplier</th>
        <th>Jumlah</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $produk)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $produk->Product->name }}</td>
            <td>{{ $produk->Customer->name }}</td>
            <td>{{ $produk->qty }}</td>

        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>