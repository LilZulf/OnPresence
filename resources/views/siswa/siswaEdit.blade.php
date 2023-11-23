@extends('template')
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Data Siswa</h4>
        </div>

        <div class="card-body">
            <form action="{{url('/siswa/edit/'.$siswa->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput">Nama Siswa</label>
                            <input type="text" class="form-control" id="basicInput" name="nama" value="{{$siswa->nama}}">
                        </div>
    
                        <div class="form-group">
                            <label for="helpInputTop">Nisn</label>
                            <input type="text" class="form-control" name="nisn" id="helpInputTop" value="{{$siswa->nisn}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="helperText">Kelas</label>
                                <div>
                                    <select class="choices form-select" name="id_kelas">
                                        <option value="1" @selected($siswa->id_kelas == 1 )>Square</option>
                                        <option value="2" @selected($siswa->id_kelas == 2 )>Rectangle</option>
                                    </select>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="helperText">Kelas</label>
                                <div>
                                    <select class="choices form-select" name="jenis_kelamin">
                                        <option value="Laki-Laki" @selected($siswa->jenis_kelamin ===  'Laki-Laki')>Laki-Laki</option>
                                        <option value="Perempuan" @selected($siswa->jenis_kelamin ===  'Perempuan')>Perempuan</option>
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