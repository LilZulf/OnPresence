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
                            <label for="helpInputTop">Email</label>
                            <input type="email" class="form-control" name="email" id="helpInputTop">
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
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            @if (session('errors'))
                var errors = @json(session('errors')->all());
                var errorMessage = errors;
                var indonesianMessages = {
                    'The email has already been taken.': 'Email sudah terdaftar.',
                    'The nip has already been taken.': 'NIP sudah terdaftar.',
                    'The nama_guru field is required.': 'Nama Harus Di Isi',
                    'The nip field is required.': 'NIP Harus Di Isi',
                    'The alamat field is required.': 'Alamat Harus Di Isi',
                    'The jenis_kelamin field is required.': 'Jenis Kelamin Harus Di Isi',
                    'The email field is required.': 'Email Harus Di Isi',
                    'The password field is required.': 'Password Harus Di Isi'

                };
                for (var key in indonesianMessages) {
                    if (indonesianMessages.hasOwnProperty(key) && errorMessage.includes(key)) {
                        errorMessage = indonesianMessages[key];
                        break;
                    }
                }

                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: errorMessage,
                });
            @endif
        });
    </script>
@endsection