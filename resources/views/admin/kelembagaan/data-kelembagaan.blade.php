@extends ('layouts.pengumuman')

@section('content')

<div class="content-wrapper">
  <div class="content">
    <div class="row">
      <div class="col-xl-12">
    <!-- Basic Table-->
        <div class="card card-default">
          <div class="card-header">
            <h2>Data Kelembagaan</h2>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalForm">
              Tambah Kelembagaan
            </button>
          </div>
          
          <div class="card-body">
            
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Nama Lembaga</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">AKSI</th>
                </tr>
              </thead>
              <tbody>
                @foreach($kelembagaans as $row)
                <tr>
                  <td>{{ $row->nama }}</td>
                  <td>{{ $row->alamat }}</td>
                  <th>
                    <a href="{{ url('/kelembagaan/edit', $row->id) }}">
                      <i class="mdi mdi-open-in-new"></i>
                    </a>
                    <a href="{{ url('/kelembagaan/delete', $row->id) }}">
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
        <h5 class="modal-title" id="exampleModalFormTitle">Tambah Kelembagaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ url('/kelembagaan/post') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="namaLembaga">Nama Lembaga</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Isi Nama Lembaga">
          </div>
          <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Isi Alamat"></textarea>
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