@extends('layouts.pengumuman')
@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-xl-12">
            <!-- Basic Examples -->
                <div class="card card-default">
                    <div class="card-header">
                        <h2>Edit Pengumuman</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('pengumuman/update', $pengumuman->id ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleTitle">Judul Kegiatan</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Isi Judul Kegiatan" value="{{ $pengumuman->title }}">
                        </div>  
                        <div class="form-group">
                            <label for="exampleDeskripsi">Deskripsi</label>
                            <textarea class="form-control" id="desc" name="desc" rows="3" value="{{ $pengumuman->desc }}">{{ $pengumuman->desc }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleImage" class="form-label">Gambar</label>
                            <div class="input-group mb-3">
                                <input type="file" name="image" class="form-control" id="inputGroupFile">
                                <label for="inputGroupFile" class="input-group-text">Upload</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <img width="150px" src="{{ url('/images/'. $pengumuman -> image) }}">
                        </div>
                        <div class="form-footer mt-6">
                            <button type="submit" class="btn btn-info btn-pill">Edit</button>
                            <a class="btn btn-light btn-pill" href="{{ url ('/pengumuman') }}">Cancel</a>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection