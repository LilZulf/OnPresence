@extends('template')
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Data Mata Pelajaran</h4>
        </div>

        <div class="card-body">
            <form action="{{url('/mapel/tambah')}}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput">Kode Mata Pelajaran</label>
                            <input type="text" class="form-control" id="kode_mapel" name="kode_mapel">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput">Nama Mata Pelajaran</label>
                            <input type="text" class="form-control" id="nama_mapel" name="nama_mapel">
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-success" type="submit">Tambah</button>
        </form>
    </div>
</section>
@endsection