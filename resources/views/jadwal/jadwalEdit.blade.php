@extends('template')
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Jadwal</h4>
            </div>

            <div class="card-body">
                <!-- jadwal.edit.blade.php -->
                <form action="{{ url('/jadwal/edit/' . $jadwal->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_guru">Guru:</label>
                                <select name="guru" class="choices form-select">
                                    @foreach ($guruList as $guru)
                                        <option value="{{ $guru->id }}"
                                            {{ $guru->id == $jadwal->id_guru ? 'selected' : '' }}>
                                            {{ $guru->nama_guru }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jam">Jam ke:</label>
                                <input id="helpInputTop" class="form-control" type="text" name="jam"
                                    value="{{ $jadwal->jam }}">
                            </div>
                            <div class="form-group">
                                <label for="helperText">Kelas</label>
                                <div>
                                    <select name="kelas" class="choices form-select">
                                        @foreach ($kelasList as $kelas)
                                            <option value="{{ $kelas->id_kelas }}"
                                                {{ $kelas->id_kelas == $jadwal->id_kelas ? 'selected' : '' }}>
                                                {{ $kelas->nama_kelas }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="helperText">Hari</label>
                                <div>
                                    <select class="choices form-select" id="hari" name="hari">
                                        @php
                                            $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                                        @endphp
                                        @foreach ($hariList as $hariOption)
                                            <option value="{{ $hariOption }}"
                                                {{ $jadwal->hari == $hariOption ? 'selected' : '' }}>
                                                {{ $hariOption }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="helperText">Mata Pelajaran</label>
                                <div>
                                    <select name="pelajaran" class="choices form-select">
                                        @foreach ($pelajaranList as $pelajaran)
                                            <option value="{{ $pelajaran->id_mapel }}"
                                                {{ $pelajaran->id_mapel == $jadwal->id_pelajaran ? 'selected' : '' }}>
                                                {{ $pelajaran->nama_mapel }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>



                        </div>
                    </div>
            </div>
            <button class="btn btn-success" type="submit">Update</button>
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
                    'The jam field is required.': 'Jam Harus Di Isi',
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
