@extends('template')
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Absen Siswa</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 mb-5">
                        <form action="{{ url('/laporan') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="helperText">Kelas</label>
                                        <div>
                                            <select class="choices form-select" name="id_kelas">
                                                <option value="">Pilih kelas...</option>       
                                                @foreach ($kelas as $kls)
                                                    <option value="{{ $kls->id_kelas }}">{{ $kls->nama_kelas }}</option>
                                                @endforeach                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jam">Mulai</label>
                                        <input id="helpInputTop" class="form-control" type="date" name="mulai">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jam">Selesai</label>
                                        <input id="helpInputTop" class="form-control" type="date" name="selesai">
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit" name="action" value="filter">Filter</button>
                            <button class="btn btn-success" type="submit" name="action" value="excel">
                                <i class="bi bi-file-excel"></i> Export Excel</button>
                                <button class="btn btn-danger" type="submit" name="action" value="pdf">
                                    <i class="bi bi-file-pdf"></i> Export PDF</button>
                        </form>
                    </div>
                    <div class="col">
                        <table id="example" class="table table-striped table-bordered datatables" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kelas</th>
                                    <th>Nama</th>
                                    <th>Hadir</th>
                                    <th>Izin</th>
                                    <th>Sakit</th>
                                    <th>Alpha</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($siswaAbsen) && !$siswaAbsen->isEmpty())
                                    @foreach ($siswaAbsen as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_kelas }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->hadir }}</td>
                                            <td>{{ $item->sakit }}</td>
                                            <td>{{ $item->izin }}</td>
                                            <td>{{ $item->alpha }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                   
                                @endif
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Kelas</th>
                                    <th>Nama</th>
                                    <th>Hadir</th>
                                    <th>Izin</th>
                                    <th>Sakit</th>
                                    <th>Alpha</th>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.7.0.js" type="text/javascript"></script> --}}
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            @if (session('errors'))
                var errors = @json(session('errors')->all());
                var errorMessage = errors;
                var indonesianMessages = {
                    'The mulai field is required.': 'Kolom Mulai Harus Di Isi',
                    'The selesai field is required.': 'Kolom Selesai Harus Di Isi'

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

    <script>
        new DataTable('#example');
    </script>
@endsection
