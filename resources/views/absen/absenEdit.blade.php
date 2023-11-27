@extends('template')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Absen</h4>
            </div>
            <div class="card-body">
                <form action="{{ url('guru/absen/edit/' . $jadwal->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="guru" id="helpInputTop"
                                value="{{ $jadwal->id_guru }}" readonly hidden>
                            <div class="form-group">
                                <label for="helpInputTop">Jadwal</label>
                                <input type="text" class="form-control btn btn-secondary" name="jadwal"
                                    id="helpInputTop"
                                    value="{{ $jadwal->hari . ' / ' . 'Kelas ' . $jadwal->nama_kelas . ' / ' . $jadwal->nama_mapel }}"
                                    readonly>
                                <input type="hidden" name="id_jadwal" value="{{ $jadwal->id_jadwal }}">
                            </div>


                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="helpInputTop">Materi</label>
                                <input type="text" class="form-control" name="materi" id="helpInputTop"
                                    value="{{ $jadwal->materi }}">
                            </div>

                        </div>
                    </div>
            </div>
            <button class="btn btn-success" type="submit">Edit Materi</button>
            </form>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Absen Siswa</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-5">
                        <form action="{{ url('guru/absen/log/' . $jadwal->id) }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="helperText">Siswa</label>
                                        <select class="form-control choices form-select" name="siswa" id="siswa">
                                            @foreach ($siswas as $item)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->nisn . ' - ' . $item->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="helperText">Status</label>
                                        <select class="form-control choices form-select" name="status">
                                            <option value="1">Hadir</option>
                                            <option value="2">Sakit</option>
                                            <option value="3">Izin</option>
                                            <option value="4">Tanpa Keterangan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success" type="submit">Absen</button>
                        </form>
                    </div>
                    <div class="col">
                        <table id="example" class="table table-striped table-bordered datatables" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (!$siswaAbsens->isEmpty())
                                    @foreach ($siswaAbsens as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->nisn }}</td>
                                            <td>
                                                @if ($item->status == '1')
                                                    Hadir
                                                @elseif ($item->status == '2')
                                                    Sakit
                                                @elseif ($item->status == '3')
                                                    Izin
                                                @elseif ($item->status == '4')
                                                    Tanpa Keterangan
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-danger"
                                                    href="/guru/absen/delete-log/{{ $item->id }}/{{ $jadwal->id }}"
                                                    role="button">Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NISN</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
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
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
    <script>
        new DataTable('#example');
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#siswa').select2({
                placeholder: "Cari Murid",
                allowClear: true,
                theme: 'classic'
            });
        });
    </script>
@endsection
