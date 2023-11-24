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

@section('script')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            @if (session('errors'))
                var errors = @json(session('errors')->all());
                var errorMessage = errors;
                var indonesianMessages = {
                    'The kode_mapel has already been taken.': 'Kode Mata Pelajaran sudah ada.',
                    'The kode_mapel field is required.': 'Kode Mata Pelajaran Harus Di Isi',
                    'The nama_mapel field is required.': 'Nama Mata Pelajaran Harus Di Isi'

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