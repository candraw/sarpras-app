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
                <!-- Sesuaikan header dengan kolom daftar Perbaikan -->
                <th>No.</th>
                <th>Daftar Pekerjaan</th>
                <th>Ruangan</th>
                <th>Laporan Masuk</th>
                <th>Petugas</th>
                <th>Proses</th>
                <th>Tgl Selesai</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
        @foreach($perbaikans as $perbaikan)
            <tr>
                <!-- Tampilkan daftar perbaikan yang sudah difilter -->
                <td>{{ $loop->iteration }}</td>
                <td>{{ $perbaikan->pekerjaan }}</td>
                <td>{{ $perbaikan->ruangan->nama_a ?? '-'  }}</td>
                <td>{{ $perbaikan->created_at->format('d-m-Y') }}</td>
                <td>{{ $perbaikan->petugas }}</td>
                <td>{{ $perbaikan->proses }}</td>
                <td>{{ $perbaikan->tglselesai}}</td>
                <td>{{ $perbaikan->ket_e }}</td>
            </tr>
            <!-- Tambahkan data lainnya di sini -->
        @endforeach
        </tbody>
    </table>
</body>
</html>
