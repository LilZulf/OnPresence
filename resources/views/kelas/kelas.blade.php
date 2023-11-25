@extends('template')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
@endsection
@section('title')
    <h3>Daftar Kelas</h3>
@endsection
@section('content')
    <div class="table-responsive">
        <a class="btn btn-primary mb-2" href="/kelas/tambah" role="button">Tambah Kelas</a>
        <table id="example" class="table table-striped table-bordered datatables" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Kelas</th>
                <th>Wali Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if (!$kelas->isEmpty())
            @foreach ($kelas as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->nama_kelas}}</td>
                <td>{{$item->nama_guru}}</td>
                <td><a class="btn btn-warning" href="/kelas/edit/{{$item->id_kelas}}" role="button">Ubah</a> <a class="btn btn-danger" href="/kelas/delete/{{$item->id_kelas}}" role="button">Hapus</a></td>
            </tr>
            @endforeach
            @endif
            
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Kelas</th>
                <th>Wali Kelas</th>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        // @if (session('error'))
        //     Swal.fire({
        //         icon: 'error',
        //         title: 'Gagal',
        //         text: '{{ session('error') }}',
        //     });
        // @endif
    </script>
@endsection