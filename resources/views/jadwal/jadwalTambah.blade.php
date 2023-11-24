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
                                <div>
                                    <select class="choices form-select" name="guru">
                                        <option value="senin">Bu Salmah</option>
                                        <option value="selasa">Pak Andi</option>
                                        <option value="rabu">Pak Agus</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="helpInputTop">Jam ke -</label>
                                <input type="text" class="form-control" name="jam" id="helpInputTop">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="helperText">Hari</label>
                                <div>
                                    <select class="choices form-select" name="hari">
                                        <option value="senin">Senin</option>
                                        <option value="selasa">Selasa</option>
                                        <option value="rabu">Rabu</option>
                                        <option value="kamis">Kamis</option>
                                        <option value="jumat">Jum'at</option>
                                        <option value="sabtu">Sabtu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="helperText">Mata Pelajaran</label>
                                <div>
                                    <select class="choices form-select" name="pelajaran">
                                        <option value="senin">IPA</option>
                                        <option value="selasa">IPS</option>
                                        <option value="rabu">Agama</option>
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
