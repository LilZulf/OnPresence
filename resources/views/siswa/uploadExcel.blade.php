@extends('template')
@section('content')
<div class="col-12 col-md-12">
    <form action="/siswa/import" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Import Data Mahasiswa dengan Excel</h5>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <input type="file" name="file">
                </div>
            </div>
            <button class="btn btn-success" type="submit">Tambah</button>
        </div>
    </form>
</div>
@endsection