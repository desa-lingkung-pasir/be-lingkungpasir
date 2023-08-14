@extends ('layouts.position')

@section('content')

<div class="content-wrapper">
  <div class="content">
    <div class="row">
      <div class="col-xl-12">
    <!-- Basic Table-->
        <div class="card card-default">
          <div class="card-header">
            <h2>Data Jabatan</h2>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalForm">
              Tambah Jabatan
            </button>
          </div>
          
          <div class="card-body">
            
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama Jabatan</th>
                  <th scope="col">Description</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($positions as $row)
                <tr>
                  <td scope="row">{{$row->id}}</td>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->desc }}</td>
                  <th>
                    <a href="{{ url('/position/edit', $row->id) }}">
                      <i class="mdi mdi-open-in-new"></i>
                    </a>
                    <a href="#">
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
        <h5 class="modal-title" id="exampleModalFormTitle">Tambah Jabatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/position/store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="exampleName">Nama Jabatan</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Isi Nama Jabatan">
          </div>
          <div class="form-group">
            <label for="exampleDesc">Deskripsi</label>
            <textarea class="form-control" id="desc" name="desc" rows="3" placeholder="Isi Deskripsi"></textarea>
          </div>
          <button type="submit" class="btn btn-info">Simpan</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-pill" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
