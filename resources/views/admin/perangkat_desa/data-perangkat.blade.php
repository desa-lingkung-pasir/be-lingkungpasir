@extends ('layouts.perangkat-desa')

@section('content')

<div class="content-wrapper">
  <div class="content">
    <div class="row">
      <div class="col-xl-12">
    <!-- Basic Table-->
        <div class="card card-default">
          <div class="card-header">
            <h2>Data Perangkat Desa</h2>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalForm">
              Tambah Perangkat Desa
            </button>
          </div>
          
          <div class="card-body">
            
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nip</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Jenis Kelamin</th>
                  <th scope="col">Tahun</th>
                  <th scope="col">Jabatan</th>
                  <th scope="col">AKSI</th>
                </tr>
              </thead>
              <tbody>
                @foreach($perangkat_desas as $row)
                <tr>
                  <td scope="row">{{$row->id}}</td>
                  <td>{{ $row->nip }}</td>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->jk }}</td>
                  <td>{{ $row->year }}</td>
                  <td>{{ $row->position->name }}</td>
                  <th>
                    <a href="{{ url('perangkat-desa/edit', $row->id) }}">
                      <i class="mdi mdi-open-in-new"></i>
                    </a>
                    <a href="{{ url('perangkat-desa/delete', $row->id) }}">
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
        <h5 class="modal-title" id="exampleModalFormTitle">Tambah Perangkat Desa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/perangkat-desa/store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="nip">NIP</label>
            <input type="text" class="form-control" id="nip" name="nip" placeholder="Isi NIP">
          </div>
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Isi Nama">
          </div>
          <div class="form-group">
            <label for="jk">Jenis Kelamin</label>
            <select class="form-control" id="jk" name="jk">
                <option>Pilih Jenis Kelamin</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label for="tahun">Tahun</label>
            <input type="text" class="form-control" id="year" name="year" placeholder="Isi Nama">
          </div>
          <div class="form-group">
            <label for="jk">Jabatan</label>
            <select class="form-control" id="position_id" name="position_id">
                <option>Pilih Jabatan</option>
                @foreach($position as $row)
                <option value="{{$row->id}}">{{$row->name}}</option>
                @endforeach
            </select>
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
