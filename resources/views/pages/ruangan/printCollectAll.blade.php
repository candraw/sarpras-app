<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cetak Data</title>
</head>
<body>
    <h1>Barang Inventaris - {{ $ruangan->nama_a }}</h1>
    <hr>
    <!-- Elektronik -->
    <table border="1" cellspacing="0" cellpadding="3">
        <thead>
            <h2>Elektronik</h2>
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
        @foreach($barangElektronik as $elektronik)
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

    <!-- Mebeulair -->
    <table border="1" cellspacing="0" cellpadding="3">
        <thead>
        <h2>Mebeulair</h2>
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
        @foreach($barangMebeulair as $mebeulair)
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
    <!-- Praktik -->
    <table border="1" cellspacing="0" cellpadding="3">
        <thead>
        <h2>Praktik</h2>
            <tr>
                <th>No.</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
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
        @foreach($barangPraktik as $praktik)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $praktik->nama_d }}</td>
                <td>{{ $praktik->kode_d }}</td>
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
</body>
</html>
