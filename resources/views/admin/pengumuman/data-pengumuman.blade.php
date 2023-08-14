@extends ('layouts.pengumuman')

@section('content')

<div class="content-wrapper">
  <div class="content">
    <div class="row">
      <div class="col-xl-12">
    <!-- Basic Table-->
        <div class="card card-default">
          <div class="card-header">
            <h2>Data Pengumuman</h2>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalForm">
              Tambah Pengumuman
            </button>
          </div>
          
          <div class="card-body">
            
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Judul</th>
                  <th scope="col">Deskripsi</th>
                  <th scope="col">Foto</th>
                  <th scope="col">AKSI</th>
                </tr>
              </thead>
              <tbody>
                @foreach($pengumumans as $row)
                <tr>
                  <td scope="row">{{$row->id}}</td>
                  <td>{{ $row->title }}</td>
                  <td>{{ $row->desc }}</td>
                  <td>
                    <a href="{{ url('images/'. $row->image) }}" target="_blank" rel="noopener noreferrer">Lihat Gambar</a>
                  </td>
                  <th>
                    <a href="{{ url('/pengumuman/edit', $row->id) }}">
                      <i class="mdi mdi-open-in-new"></i>
                    </a>
                    <a href="{{ url('/pengumuman/delete', $row->id) }}">
                      <i class="mdi mdi-close text-danger"></i>
                    </a>
                  </th>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Create Modal -->
<div class="modal fade" id="exampleModalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalFormTitle">Tambah Pengumuman</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/pengumuman/post') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="title">Judul</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Isi Judul">
          </div>
          <div class="form-group">
            <label for="desc">Deskripsi</label>
            <textarea class="form-control" id="desc" name="desc" rows="3" placeholder="Isi Deskripsi"></textarea>
          </div>
          <div class="form-group">
          <label for="" class="form-label"> Foto</label>
            <div class="input-group mb-3">
              <input type="file" name="image" class="form-control" id="inputGroupFile">
              <label for="inputGroupFile" class="input-group-text">Upload</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection