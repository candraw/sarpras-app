<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cetak Data</title>
</head>
<body>
    <h1>Data Barang Mebeulair</h1>
    <table border="1" cellspacing="0" cellpadding="3">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Bahan</th>
                <th>Kondisi</th>
                <th>Tahun</th>
                <th>Toko</th>
                <th>Sumber Dana</th>
                <th>Ruangan</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
        @foreach($mebeulairs as $mebeulair)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mebeulair->kode_c }}</td>
                <td>{{ $mebeulair->nama_c }}</td>
                <td>{{ $mebeulair->bahan_c }}</td>
                <td>{{ $mebeulair->kondisi_c}}</td>
                <td>{{ $mebeulair->tahun_c }}</td>
                <td>{{ $mebeulair->toko_c}}</td>
                <td>{{ $mebeulair->sumberdana_c}}</td>
                <td>{{ $mebeulair->ruangan->nama_a ?? '-' }}</td>
                <td>{{ $mebeulair->ket_c }}</td>
            </tr>
            <!-- Tambahkan data lainnya di sini -->
        @endforeach
        </tbody>
    </table>
    <button onclick="window.print()">Cetak Halaman</button>
</body>
</html>
