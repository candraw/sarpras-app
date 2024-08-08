<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cetak Data Ruangan</title>
</head>
<body>
    <h1>Data Ruangan</h1>
    <table border="1" cellspacing="0" cellpadding="3">
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode Ruangan</th>
                <th>Nama Ruangan</th>
                <th>Luas</th>
                <th>Kondisi</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
        @foreach($ruangans as $ruangan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ruangan->kode_a }}</td>
                <td>{{ $ruangan->nama_a }}</td>
                <td>{{ $ruangan->luas_a }}</td>
                <td>{{ $ruangan->kondisi_a}}</td>
                <td>{{ $ruangan->ket_a }}</td>
            </tr>
            <!-- Tambahkan data lainnya di sini -->
        @endforeach
        </tbody>
    </table>
    <button onclick="window.print()">Cetak Halaman</button>
</body>
</html>
