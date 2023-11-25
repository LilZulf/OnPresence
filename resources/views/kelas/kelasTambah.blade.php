@extends('template')
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Data Kelas</h4>
        </div>

        <div class="card-body">
            <form action="{{url('/kelas/tambah')}}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput">Nama Kelas</label>
                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="helperText">Wali Kelas</label>
                                <div>
                                    <select class="choices form-select" name="id_guru" id="id_guru">
                                    <!-- <option selected>Pilih Guru</option> -->
                                        @foreach ($guru as $item)
                                        <option value="{{$item->id}}" >{{$item->nama_guru}}</option>
                                        @endforeach
                                        {{-- <option value="1" >Square</option>
                                        <option value="2" >Rectangle</option> --}}
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
                    'The nama_kelas has already been taken.': 'Kelas sudah terdaftar.',
                    'The nama_kelas field is required.': 'Kelas Harus Di Isi',
                    'The id_guru field is required.': 'Wali Kelas Harus Di Isi'

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