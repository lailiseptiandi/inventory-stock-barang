<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    <title>Export Data Produk </title>
</head>
<body>
    <div class="container">
        <h1>Laporan Data Produk</h1>
        <div class="row">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Foto</th>
                    <th>Qty</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td><img src="{{ public_path("storage/products/".$product->image) }}" width="50px"></td>
                        <td>{{ $product->qty }}</td>
                    </tr>
                    @empty
                        <td colspan="30" class="text-center">Tidak ada data</td> 
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>