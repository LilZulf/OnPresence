@extends('template')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
@endsection
@section('title')
    <h3>Daftar Mata Pelajaran</h3>
@endsection
@section('content')
    <div class="table-responsive">
        <a class="btn btn-primary mb-2" href="/mapel/tambah" role="button">Tambah Mata Pelajaran</a>
        <table id="example" class="table table-striped table-bordered datatables" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Mata Pelajaran</th>
                <th>Nama Mata Pelajaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if (!$mapel->isEmpty())
            @foreach ($mapel as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->kode_mapel}}</td>
                <td>{{$item->nama_mapel}}</td>
                <td><a class="btn btn-warning" href="/mapel/edit/{{$item->id_mapel}}" role="button">Ubah</a> <a class="btn btn-danger" href="/mapel/delete/{{$item->id_mapel}}" role="button">Hapus</a></td>
            </tr>
            @endforeach
            @endif
            
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Kode Mata Pelajaran</th>
                <th>Nama Mata Pelajaran</th>
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
