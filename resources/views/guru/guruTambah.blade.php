@extends('template')
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Data Guru</h4>
        </div>

        <div class="card-body">
            <form action="{{url('/guru/tambah')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput">Nama Guru</label>
                            <input type="text" class="form-control" id="basicInput" name="nama_guru">
                        </div>
                        <div class="form-group">
                            <label for="helpInputTop">Nip</label>
                            <input type="text" class="form-control" name="nip" id="helpInputTop">
                        </div>
                        <div class="form-group">
                            <label for="helpInputTop">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="helpInputTop">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="helperText">Jenis Kelamin</label>
                                <div>
                                    <select class="choices form-select" name="jenis_kelamin">
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="helpInputTop">Username</label>
                            <input type="text" class="form-control" name="username" id="helpInputTop">
                        </div>
                        <div class="form-group">
                            <label for="helpInputTop">Password</label>
                            <input type="password" class="form-control" name="password" id="helpInputTop">
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-success" type="submit">Tambah</button>
        </form>
    </div>
</section>
@endsection