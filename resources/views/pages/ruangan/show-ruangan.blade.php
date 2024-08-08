<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Ruangan</title>
</head>
<body>
    <h1>Detail Ruangan</h1>
    <ul>
        <li><strong>Nama Ruangan:</strong> {{ $ruangan->nama_a }}</li>
        <li><strong>Kode Ruangan:</strong> {{ $ruangan->kode_a }}</li>
        <li><strong>Luas Ruangan:</strong> {{ $ruangan->luas_a }}</li>
        <li><strong>Kondisi Ruangan:</strong> {{ $ruangan->kondisi_a }}</li>
        <li><strong>Keterangan:</strong> {{ $ruangan->ket_a }}</li>
    </ul>
    <a href="{{ route('admin.ruangan.index') }}">Kembali</a>
</body>
</html>
