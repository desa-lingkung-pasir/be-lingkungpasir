@extends('layouts.position')
@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-xl-12">
            <!-- Basic Examples -->
                <div class="card card-default">
                    <div class="card-header">
                        <h2>Edit Jabatan</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('position/update', $positions->id ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleNama">Nama Jabatan</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Visi" value="{{ $positions->name }}">
                        </div>  
                        <div class="form-group">
                            <label for="exampleDeskripsi">Deskripsi</label>
                            <textarea class="form-control" id="desc" name="desc" rows="3" value="{{ $positions->desc }}">{{ $positions->desc }}</textarea>
                        </div>
                        <div class="form-footer mt-6">
                            <button type="submit" class="btn btn-info btn-pill">Edit</button>
                            <a class="btn btn-light btn-pill" href="{{ url ('/position') }}">Cancel</a>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection