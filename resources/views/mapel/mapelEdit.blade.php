@extends('template')
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Data Mata Pelajaran</h4>
        </div>

        <div class="card-body">
            <form action="{{url('/mapel/update/'.$mapel->id_mapel)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput">Kode Mata Pelajaran</label>
                            <input type="text" class="form-control" id="kode_mapel" name="kode_mapel" value="{{$mapel->kode_mapel}}">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput">Nama Mata Pelajaran</label>
                            <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" value="{{$mapel->nama_mapel}}">
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-success" type="submit">Ubah</button>
        </form>
    </div>
</section>
@endsection