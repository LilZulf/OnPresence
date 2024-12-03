<!-- resources/views/laporan/pdf.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Rekap Laporan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        img {
            max-width: 150px;
            margin-bottom: 20px;
        }

        h1 {
            text-align: center;
            color: #3498db;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #3498db;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        .signature {
            margin-top: 30px;
        }

        .signature p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <img src="{{ public_path('dist/assets/compiled/png/logo_smk.png') }}" alt="Logo">

    <h1>Rekap Laporan</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kelas</th>
                <th>Nama Siswa</th>
                <th>Hadir</th>
                <th>Sakit</th>
                <th>Izin</th>
                <th>Alpha</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswaAbsen as $siswa)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $siswa->nama_kelas }}</td>
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ $siswa->hadir }}</td>
                    <td>{{ $siswa->sakit }}</td>
                    <td>{{ $siswa->izin }}</td>
                    <td>{{ $siswa->alpha }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="signature">
        <p>_________________________</p>
        <p>Signature</p>
    </div>

</body>
</html>
