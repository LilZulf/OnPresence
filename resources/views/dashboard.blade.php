@extends('template')

@section('title')
    <h3>Dashboard</h3>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            {{-- Total Siswa --}}
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Siswa</h5>
                        <div class="row">
                            <div class="col-auto">
                                <i class="bi bi-people-fill h1"></i>
                            </div>
                            <div class="col-auto">
                                <h3 class="card-text">{{ $jumlahSiswa }}</h3>
                                <p class="card-subtitle">Jumlah Siswa</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Total Guru --}}
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Guru</h5>
                        <div class="row">
                            <div class="col-auto">
                                <i class="bi bi-person-vcard h1"></i>
                            </div>
                            <div class="col-auto">
                                <h3 class="card-text">{{ $jumlahGuru }}</h3>
                                <p class="card-subtitle">Jumlah Guru</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Total Kelas --}}
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Kelas</h5>
                        <div class="row">
                            <div class="col-auto">
                                <i class="bi bi-shop-window h1"></i>
                            </div>
                            <div class="col-auto">
                                <h3 class="card-text">{{ $jumlahKelas }}</h3>
                                <p class="card-subtitle">Jumlah Kelas</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('dist/assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dist/assets/extensions/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('dist/assets/static/js/pages/datatables.js') }}"></script>
@endsection
