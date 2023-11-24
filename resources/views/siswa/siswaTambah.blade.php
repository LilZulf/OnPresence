@extends('template')
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Data Siswa</h4>
        </div>

        <div class="card-body">
            <form action="{{url('/siswa/tambah')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput">Nama Siswa</label>
                            <input type="text" class="form-control" id="basicInput" name="nama">
                        </div>
    
                        <div class="form-group">
                            <label for="helpInputTop">Nisn</label>
                            <input type="text" class="form-control" name="nisn" id="helpInputTop">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="helperText">Kelas</label>
                                <div>
                                    <select class="choices form-select" name="id_kelas">
                                        <option value="1" >Square</option>
                                        <option value="2" >Rectangle</option>
                                    </select>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="helperText">Kelas</label>
                                <div>
                                    <select class="choices form-select" name="jenis_kelamin">
                                        <option value="Laki-Laki" >Laki-Laki</option>
                                        <option value="Perempuan" >Perempuan</option>
                                    </select>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-success" type="submit">Tambah</button>
        </form>
    </div>
</section>
@endsection