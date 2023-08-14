@extends('layouts.profile')
@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-xl-12">
            <!-- Basic Examples -->
                <div class="card card-default">
                    <div class="card-header">
                        <h2>Edit Visi Misi</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('profile/update', $profiles->id ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="exampleVisi">Visi</label>
                            <input type="text" class="form-control" id="visi" name="visi" placeholder="Enter Visi" value="{{ $profiles->visi }}">
                        </div>  
                        <div class="form-group">
                            <label for="exampleMisi">Misi</label>
                            <textarea class="form-control" id="misi" name="misi" rows="3" value="{{ $profiles->misi }}">{{ $profiles->misi }}</textarea>
                        </div>
                        <div class="form-footer mt-6">
                            <button type="submit" class="btn btn-info btn-pill">Edit</button>
                            <a class="btn btn-light btn-pill" href="{{ url ('/profile') }}">Cancel</a>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection