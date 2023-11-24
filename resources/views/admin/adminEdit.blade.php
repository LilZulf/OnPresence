@extends('template')
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Admin</h4>
            </div>

            <div class="card-body">
                <form action="{{ url('/admin/edit/' . $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="basicInput">Nama Admin</label>
                                <input type="text" class="form-control" id="basicInput" name="nama"
                                    value="{{ $user->name }}">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Email</label>
                                <input type="email" class="form-control" id="basicInput" name="email"
                                    value="{{ $user->email }}">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Email</label>
                                <input type="text" class="form-control" id="basicInput" name="password"
                                    value="{{ $user->password }}">
                            </div>

                        </div>
                    </div>
            </div>
            <button class="btn btn-success" type="submit">Ubah</button>
        </div>
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
                    'The nama field is required.': 'Nama Harus Di Isi',
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
