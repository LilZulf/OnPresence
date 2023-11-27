@extends('template')
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Absen</h4>
            </div>

            <div class="card-body">
                <form action="{{ url('guru/absen/edit/' . $jadwal->id_jadwal) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="guru" id="helpInputTop"
                                value="{{ $jadwal->id_guru }}" readonly hidden>
                            <div class="form-group">
                                <label for="helpInputTop">Jadwal</label>
                                <input type="text" class="form-control" name="jadwal" id="helpInputTop"
                                    value="{{ $jadwal->hari . ' / ' . 'Kelas ' . $jadwal->nama_kelas . ' / ' . $jadwal->nama_mapel }}"
                                    readonly>
                                <input type="hidden" name="id_jadwal" value="{{ $jadwal->id_jadwal }}">
                            </div>

                            <div class="form-group">
                                <label for="helpInputTop">Materi</label>
                                <input type="text" class="form-control" name="materi" id="helpInputTop"
                                    value="{{ $jadwal->materi }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div>
                                <div class="form-group">
                                    <label for="helperText">Hari</label>
                                    <div>
                                        <select class="choices form-select" name="hari" id="hariDropdown" disabled>
                                            <option value="Senin">Senin</option>
                                            <option value="Selasa">Selasa</option>
                                            <option value="Rabu">Rabu</option>
                                            <option value="Kamis">Kamis</option>
                                            <option value="Jumat">Jum'at</option>
                                            <option value="Sabtu">Sabtu</option>
                                            <option value="Minggu">Minggu</option>
                                        </select>
                                    </div>
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var today = new Date().toLocaleString('id-id', {
                weekday: 'long'
            });
            var hariDropdown = document.getElementById("hariDropdown");
            for (var i = 0; i < hariDropdown.options.length; i++) {
                if (hariDropdown.options[i].text === today) {
                    hariDropdown.selectedIndex = i;
                    break;
                }
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            @if (session('errors'))
                var errors = @json(session('errors')->all());
                var errorMessage = errors;
                var indonesianMessages = {
                    'The materi field is required.': 'Materi Harus Di Isi'

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
