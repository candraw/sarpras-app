<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cetak Data</title>
</head>
<body>
    <h1>Data Barang Praktikum</h1>
    <table border="1" cellspacing="0" cellpadding="3">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Barang</th>
                <th>Kode Barang</th>
                <th>Merk</th>
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
        @foreach($praktiks as $praktik)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $praktik->kode_d }}</td>
                <td>{{ $praktik->nama_d }}</td>
                <td>{{ $praktik->merk_d }}</td>
                <td>{{ $praktik->bahan_d }}</td>
                <td>{{ $praktik->kondisi_d}}</td>
                <td>{{ $praktik->tahun_d }}</td>
                <td>{{ $praktik->toko_d}}</td>
                <td>{{ $praktik->sumber_d }}</td>
                <td>{{ $praktik->ruangan->nama_a ?? '-'  }}</td>
                <td>{{ $praktik->ket_d }}</td>
            </tr>
            <!-- Tambahkan data lainnya di sini -->
        @endforeach
        </tbody>
    </table>
    <button onclick="window.print()">Cetak Halaman</button>
</body>
</html>
