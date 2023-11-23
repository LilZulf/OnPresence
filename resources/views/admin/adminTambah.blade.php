@extends('template')
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Tambah Admin</h4>
            </div>

            <div class="card-body">
                <form action="{{ url('/admin/tambah') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="helpInputTop">Nama</label>
                                <input type="text" class="form-control" name="nama" id="helpInputTop">
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="helpInputTop">Email</label>
                                <input type="email" class="form-control" name="email" id="helpInputTop">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="helpInputTop">Password</label>
                                <input type="text" class="form-control" name="password" id="helpInputTop">
                            </div>
                        </div>
                    </div>
            </div>
            <button class="btn btn-success" type="submit">Tambah</button>
            </form>
        </div>
    </section>
@endsection
