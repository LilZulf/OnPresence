@extends('template')
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Jadwal</h4>
            </div>

            <div class="card-body">
                <form action="{{ url('/jadwal/tambah') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="helperText">Nama Guru</label>
                                <select class="choices form-select" name="guru">
                                    @foreach ($guru as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_guru }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="helpInputTop">Jam ke -</label>
                                <input type="text" class="form-control" name="jam" id="helpInputTop">
                            </div>
                            <div class="form-group">
                                <label for="helperText">Kelas</label>
                                <div>
                                    <select class="choices form-select" name="kelas">
                                        @foreach ($kelas as $item)
                                            <option value="{{ $item->id_kelas }}">{{ $item->nama_kelas }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="helperText">Hari</label>
                                <div>
                                    <select class="choices form-select" name="hari">
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jum'at</option>
                                        <option value="Sabtu">Sabtu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="helperText">Mata Pelajaran</label>
                                <div>
                                    <select class="choices form-select" name="pelajaran">
                                        @foreach ($mapel as $item)
                                            <option value="{{ $item->id_mapel }}">{{ $item->nama_mapel }}</option>
                                        @endforeach
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
