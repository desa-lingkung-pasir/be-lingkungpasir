@extends('layouts.perangkat-desa')
@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-xl-12">
            <!-- Basic Examples -->
                <div class="card card-default">
                    <div class="card-header">
                        <h2>Edit Perangkat Desa</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('perangkat-desa/update', $perangkat_desas->id ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleNIP">NIP</label>
                            <input type="text" class="form-control" id="nip" name="nip" placeholder="Isi NIP" value="{{ $perangkat_desas->nip }}">
                        </div>  
                        <div class="form-group">
                            <label for="exampleNama">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Isi Nama" value="{{ $perangkat_desas->name }}">
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <select class="form-control" id="jk" name="jk" value="{{$perangkat_desas->jk}}">
                                <option>Pilih Jenis Kelamin</option>
                                <option value="Laki-Laki" {{ $perangkat_desas->jk == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="Perempuan" {{ $perangkat_desas->jk == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="text" class="form-control" id="year" name="year" placeholder="Isi Nama" value="{{ $perangkat_desas->year }}">
                        </div>
                        <div class="form-group">
                            <label for="jk">Jabatan</label>
                            <select class="form-control" id="position_id" name="position_id">
                                <option>Pilih Jabatan</option>
                                @foreach($position as $row)
                                <option @selected($row->id == $perangkat_desas->position_id)
                                    value="{{ $row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-footer mt-6">
                            <button type="submit" class="btn btn-info btn-pill">Edit</button>
                            <a class="btn btn-light btn-pill" href="{{ url ('/perangkat-desa') }}">Cancel</a>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection