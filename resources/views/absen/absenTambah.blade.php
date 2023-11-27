@extends('template')
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Absen</h4>
            </div>

            <div class="card-body">
                <form action="{{ url('/guru/absen/tambah') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="guru" id="helpInputTop"
                                value="{{ $guru->id }}" readonly hidden>
                            <div class="form-group">
                                <label for="helperText">Jadwal</label>
                                <select class="form-control choices form-select" name="jadwal">
                                    @foreach ($jadwal as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->hari . ' / ' . 'Kelas ' . $item->nama_kelas . ' / ' . $item->nama_mapel }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="helpInputTop">Materi</label>
                                <input type="text" class="form-control" name="materi" id="helpInputTop">
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
