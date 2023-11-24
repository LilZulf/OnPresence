@extends('template')
@section('content')
<section class="section">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Data Kelas</h4>
        </div>

        <div class="card-body">
            <form action="{{url('/kelas/update/'.$kelas->id_kelas)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="basicInput">Nama Kelas</label>
                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="{{$kelas->nama_kelas}}">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="helperText">Wali Kelas</label>
                                <div>
                                    <select class="choices form-select" name="id_guru" id="id_guru">
                                        @forelse ($guru as $guru)
                                        <option value="{{$guru->id}}" @selected($kelas->id_guru == $guru->id )>{{$guru->nama_guru}}</option>
                                        @empty
                                            
                                        @endforelse
                                        <!-- {{-- <option value="1" @selected($kelas->id_guru == 1 )>{{$kelas->kelas->nama_kelas}}</option>
                                        <option value="2" @selected($kelas->id_guru == 2 )>Rectangle</option> --}} -->
                                    </select>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-success" type="submit">Ubah</button>
        </form>
    </div>
</section>
@endsection