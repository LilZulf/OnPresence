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
                                        @forelse ($kelas as $kelas)
                                        <option value="{{$kelas->id_kelas}}" @selected($siswa->id_kelas == $kelas->id_kelas )>{{$kelas->nama_kelas}}</option>
                                        @empty
                                            
                                        @endforelse
                                        {{-- <option value="1" @selected($siswa->id_kelas == 1 )>{{$siswa->kelas->nama_kelas}}</option>
                                        <option value="2" @selected($siswa->id_kelas == 2 )>Rectangle</option> --}}
                                    </select>
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="helperText">Jenis Kelamin</label>
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
            <button class="btn btn-success" type="submit">Ubah</button>
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