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
                                        @foreach ($kelas as $item)
                                        <option value="{{$item->id_kelas}}" >{{$item->nama_kelas}}</option>
                                        @endforeach
                                        {{-- <option value="1" >Square</option>
                                        <option value="2" >Rectangle</option> --}}
                                    </select>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="helperText">Jenis Kelamin</label>
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
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            @if (session('errors'))
                var errors = @json(session('errors')->all());
                var errorMessage = errors;
                var indonesianMessages = {
                    'The nisn has already been taken.': 'Email sudah terdaftar.',
                    'The nama field is required.': 'Nama Harus Di Isi',
                    'The nisn field is required.': 'NIP Harus Di Isi',
                    'The kelas field is required.': 'Alamat Harus Di Isi',
                    'The jenis_kelamin field is required.': 'Jenis Kelamin Harus Di Isi',

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