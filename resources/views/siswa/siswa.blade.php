@extends('template')
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
@endsection
@section('title')
    <h3>Daftar Siswa</h3>

@endsection
@section('content')
    <div class="table-responsive">
        <a class="btn btn-primary mb-2" href="/siswa/tambah" role="button">Tambah Siswa</a>
        <table id="example" class="table table-striped table-bordered datatables" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NISN</th>
                <th>Kelas</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if (!$siswa->isEmpty())
            @foreach ($siswa as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->nisn}}</td>
                <td>{{$item->id_kelas}}</td>
                <td>{{$item->jenis_kelamin}}</td>
                <td><a class="btn btn-Warning" href="/siswa/edit/{{$item->id}}" role="button">Ubah</a> <a class="btn btn-dangger" href="/siswa/delete/{{$item->id}}" role="button">Hapus</a></td>
            </tr>
            @endforeach
            @endif
            
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NISN</th>
                <th>Kelas</th>
                <th>Jenis Kelamin</th>
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