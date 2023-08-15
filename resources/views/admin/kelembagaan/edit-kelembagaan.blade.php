@extends('layouts.kelembagaan')
@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-xl-12">
            <!-- Basic Examples -->
                <div class="card card-default">
                    <div class="card-header">
                        <h2>Edit Kelembagaan</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('kelembagaan/update', $kelembagaan->id ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleNama">Nama Lembaga</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Isi Nama Lembaga" value="{{ $kelembagaan->nama }}">
                        </div>  
                        <div class="form-group">
                            <label for="exampleMisi">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" value="{{ $kelembagaan->alamat }}">{{ $kelembagaan->alamat }}</textarea>
                        </div>
                        <div class="form-footer mt-6">
                            <button type="submit" class="btn btn-info btn-pill">Edit</button>
                            <a class="btn btn-light btn-pill" href="{{ url ('/kelembagaan') }}">Cancel</a>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection