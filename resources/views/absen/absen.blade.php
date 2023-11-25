@extends('template')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
@endsection
@section('title')
    <h3>Daftar Absen</h3>
@endsection
@section('content')
    <div class="table-responsive mt-3">
        <a class="btn btn-primary mb-4" href="/guru/absen/tambah" role="button">Tambah Absen</a>
        <table id="example" class="table table-striped table-bordered datatables" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Guru Pengajar</th>
                    <th>Pelajaran</th>
                    <th>Materi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwal as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->guru->nama_guru }}</td>
                        <td>{{ $item->hari . ' / ' . 'Kelas ' . $item->nama_kelas . ' / ' . $item->nama_mapel }}</td>
                        <td>{{ $item->materi }}</td>
                        <td><a class="btn btn-warning" href="/guru/absen/edit/{{ $item->id }}" role="button">Ubah</a>
                            <a class="btn btn-danger" href="/guru/absen/delete/{{ $item->id }}" role="button">Hapus</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>
                <th>No</th>
                <th>Guru Pengajar</th>
                <th>Pelajaran</th>
                <th>Materi</th>
                <th>Action</th>
            </tfoot>
        </table>
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.7.0.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        new DataTable('#example');
    </script>
    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
            });
        @endif
    </script>

    <script>
        $(document).ready(function() {
            @if (session('errors'))
                var errors = @json(session('errors')->all());
                console.log(errors);
                var errorMessage = errors;
                var indonesianMessages = {
                    'The jam field is required.': 'Jam Harus Di Isi',
                };
                for (var key in indonesianMessages) {
                    if (indonesianMessages.hasOwnProperty(key) && errorMessage.includes(key)) {
                        errorMessage = indonesianMessages[key];
                        break;
                    }
                }

                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: errorMessage,
                });
            @endif
        });
    </script>
@endsection
