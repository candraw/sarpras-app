<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Data</title>
</head>
<body>
    <h1>Daftar Perbaikan Barang/Ruang (Bulan: {{ $selectedMonth }} - {{ $selectedYear }})</h1>
    <table border="1" cellspacing="0" cellpadding="3">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Peminjam</th>
                <th>Asal Instansi</th>
                <th>Barang</th>
                <th>Kontak</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
        @foreach($peminjamans as $peminjaman)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $peminjaman->peminjam }}</td>
                <td>{{ $peminjaman->instansi }}</td>
                <td>{{ $peminjaman->barang }}</td>
                <td>{{ $peminjaman->kontak }}</td>
                <td>{{ $peminjaman->created_at->format('d-m-Y') }}</td>
                <td>{{ $peminjaman->tglkembali }}</td>
                <td>{{ $peminjaman->status }}</td>
                <td>{{ $peminjaman->ket_f }}</td>
        @endforeach
        </tbody>
    </table>
</body>
</html>
