@extends('template')

@section('title', 'Home / Dashboard')

@section('content')
    <div class="row mt-4 ps-5">
        <div class="col">
            <!-- Card pertama -->
            <div class="card" style="width: 30rem;">
                <div class="card-body">
                    <h5 class="card-title">Siswa</h5>
                    <div class="row">
                        <div class="col-auto">
                            <i class="bi bi-people bi-lg"></i>
                        </div>
                        <div class="col">
                            <h3 class="card-text">5</h3>
                            <h6 class="card-text">Dari 2 Kelas</h6>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col">
            <!-- Card pertama -->
            <div class="card" style="width: 30rem;">
                <div class="card-body">
                    <h5 class="card-title">Sakit | Bulan Ini</h5>
                    <div class="row">
                        <div class="col-auto">
                            <i class="bi bi-emoji-frown-fill"></i>
                        </div>
                        <div class="col">
                            <h3 class="card-text">0</h3>
                            <h6 class="card-text">Total 5 Siswa</h6>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{-- Izin --}}
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Izin | Bulan</h5>
                <div class="row">
                    <div class="col-auto">
                        <i class="bi bi-emoji-wink-fill"></i>
                    </div>
                    <div class="col">
                        <h3 class="card-text">0</h3>
                        <h6 class="card-text">Total 5 Siswa</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Alpha --}}
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Alpa | Bulan</h5>
                <div class="row">
                    <div class="col-auto">
                        <i class="bi bi-emoji-smile-fill"></i>
                    </div>
                    <div class="col">
                        <h3 class="card-text">0</h3>
                        <h6 class="card-text">Total 5 Siswa</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Laporan --}}
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Laporan</h5>
                <div class="row">
                    <div class="col-auto">
                        <i class="bi bi-file-earmark-ruled"></i>
                    </div>
                    <div class="col">
                        <h3 class="card-text">Kelola Laporan</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Absen --}}
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Absen Hari ini
                </h5>
                <h5>{{ date('d-m-Y') }} </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Graiden</td>
                                <td>vehicula.aliquet@semconsequat.co.uk</td>
                                <td>Offenburg</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Dale</td>
                                <td>fringilla.euismod.enim@quam.ca</td>
                                <td>New Quay</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Nathaniel</td>
                                <td>mi.Duis@diam.edu</td>
                                <td>Grumo Appula</td>
                                <td>
                                    <span class="badge bg-danger">Inactive</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Darius</td>
                                <td>velit@nec.com</td>
                                <td>Ways</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Oleg</td>
                                <td>rhoncus.id@Aliquamauctorvelit.net</td>
                                <td>Rossignol</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Kermit</td>
                                <td>diam.Sed.diam@anteVivamusnon.org</td>
                                <td>Patna</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Jermaine</td>
                                <td>sodales@nuncsit.org</td>
                                <td>Mold</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Ferdinand</td>
                                <td>gravida.molestie@tinciduntadipiscing.org</td>
                                <td>Marlborough</td>
                                <td>
                                    <span class="badge bg-danger">Inactive</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Kuame</td>
                                <td>Quisque.purus@mauris.org</td>
                                <td>Tresigallo</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Deacon</td>
                                <td>Duis.a.mi@sociisnatoquepenatibus.com</td>
                                <td>Karapınar</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Channing</td>
                                <td>tempor.bibendum.Donec@ornarelectusante.ca</td>
                                <td>Warrnambool</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Aladdin</td>
                                <td>sem.ut@pellentesqueafacilisis.ca</td>
                                <td>Bothey</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Cruz</td>
                                <td>non@quisturpisvitae.ca</td>
                                <td>Shikarpur</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Keegan</td>
                                <td>molestie.dapibus@condimentumDonecat.edu</td>
                                <td>Assen</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Ray</td>
                                <td>placerat.eget@sagittislobortis.edu</td>
                                <td>Hofors</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Maxwell</td>
                                <td>diam@dapibus.org</td>
                                <td>Thane</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Carter</td>
                                <td>urna.justo.faucibus@orci.com</td>
                                <td>Biez</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Stone</td>
                                <td>velit.Aliquam.nisl@sitametrisus.com</td>
                                <td>Olivar</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Berk</td>
                                <td>fringilla.porttitor.vulputate@taciti.edu</td>
                                <td>Sanquhar</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Philip</td>
                                <td>turpis@euenimEtiam.org</td>
                                <td>Okara</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Kibo</td>
                                <td>feugiat@urnajustofaucibus.co.uk</td>
                                <td>La Cisterna</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Bruno</td>
                                <td>elit.Etiam.laoreet@luctuslobortisClass.edu</td>
                                <td>Rocca d"Arce</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Leonard</td>
                                <td>blandit.enim.consequat@mollislectuspede.net</td>
                                <td>Lobbes</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Hamilton</td>
                                <td>mauris@diam.org</td>
                                <td>Sanzeno</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Harding</td>
                                <td>Lorem.ipsum.dolor@etnetuset.com</td>
                                <td>Obaix</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Emmanuel</td>
                                <td>eget.lacus.Mauris@feugiatSednec.org</td>
                                <td>Saint-Remy-Geest</td>
                                <td>
                                    <span class="badge bg-success">Active</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
    <!-- Basic Tables end -->

    <!-- Minimal jQuery Datatable start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Absen Kemarin
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive datatable-minimal">
                    <table class="table" id="table2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 30; $i++)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>Graiden</td>
                                    <td>Offenburg</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                </tr>
                            @endfor

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
    <!-- Minimal jQuery Datatable end -->
    <!-- Minimal jQuery Datatable start -->
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Rekap Absen 1 minggu
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive datatable-minimal">
                    <table class="table" id="table2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>sakit</th>
                                <th>Izin</th>
                                <th>Alpha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 30; $i++)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>Graiden</td>
                                    <td>vehicula.aliquet@semconsequat.co.uk</td>
                                    <td>076 4820 8838</td>
                                    <td>Offenburg</td>
                                    <td>
                                        <span class="badge bg-success">Active</span>
                                    </td>
                                </tr>
                            @endfor

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
    <!-- Minimal jQuery Datatable end -->

@endsection

@section('script')
    <script src="{{ asset('dist/assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('dist/assets/extensions/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('dist/assets/static/js/pages/datatables.js') }}"></script>
@endsection
