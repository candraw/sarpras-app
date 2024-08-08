<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cetak Data</title>
</head>
<body>
    <h1>Data Barang Elektronik</h1>
    <table border="1" cellspacing="0" cellpadding="3">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Serial Number</th>
                <th>Merk</th>
                <th>Kondisi</th>
                <th>Spesifikasi</th>
                <th>Tahun</th>
                <th>Toko</th>
                <th>Sumber Dana</th>
                <th>Ruangan</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
        @foreach($elektroniks as $elektronik)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $elektronik->kode_b }}</td>
                <td>{{ $elektronik->nama_b }}</td>
                <td>{{ $elektronik->sn_b }}</td>
                <td>{{ $elektronik->merk_b }}</td>
                <td>{{ $elektronik->kondisi_b}}</td>
                <td>{{ $elektronik->spek_b }}</td>
                <td>{{ $elektronik->tahun_b }}</td>
                <td>{{ $elektronik->toko_b }}</td>
                <td>{{ $elektronik->sumberdana_b }}</td>
                <td>{{ $elektronik->ruangan->nama_a ?? '-'  }}</td>
                <td>{{ $elektronik->ket_b }}</td>
            </tr>
            <!-- Tambahkan data lainnya di sini -->
        @endforeach
        </tbody>
    </table>
    <button onclick="window.print()">Cetak Halaman</button>
</body>
</html>
