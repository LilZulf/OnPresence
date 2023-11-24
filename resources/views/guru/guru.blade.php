@extends('template')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
@endsection
@section('title')
    <h3>Daftar Guru</h3>
@endsection
@section('content')
    <div class="table-responsive">
        <a class="btn btn-primary mb-2" href="/guru/tambah" role="button">Tambah Guru</a>
        <a class="btn btn-success mb-2" href="/guru/import" role="button">Import Excel</a>
        <table id="example" class="table table-striped table-bordered datatables" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Username</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if (!$guru->isEmpty())
                    @foreach ($guru as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_guru }}</td>
                            <td>{{ $item->nip }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->username }}</td>
                            <td><a class="btn btn-warning" href="/guru/edit/{{ $item->id }}" role="button">Ubah</a> <a
                                    class="btn btn-danger" href="/guru/delete/{{ $item->id }}" role="button">Hapus</a>
                            </td>
                        </tr>
                    @endforeach
                @endif

            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>username</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.7.0.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
    <script>
        new DataTable('#example');
    </script>
@endsection
