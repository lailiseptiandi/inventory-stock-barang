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
        <h4 class="text-center mb-2">Laporan Data Produk Masuk</h4>
        <div class="row">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Nama Supplier</th>
                        <th>Qty</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $product)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->Product->name }}</td>
                        <td>{{ $product->Supplier->name }}</td>
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