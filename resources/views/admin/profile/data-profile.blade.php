@extends ('layouts.profile')

@section('content')

<div class="content-wrapper">
  <div class="content">
    <div class="row">
      <div class="col-xl-12">
    <!-- Basic Table-->
        <div class="card card-default">
          <div class="card-header">
            <h2>Data Visi Misi</h2>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalForm">
              Tambah Visi Misi
            </button>
          </div>
          
          <div class="card-body">
            
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Visi</th>
                  <th scope="col">Misi</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($profiles as $row)
                <tr>
                  <td scope="row">{{$row->id}}</td>
                  <td>{{ $row->visi }}</td>
                  <td>{{ $row->misi }}</td>
                  <th class="text-center">
                    <a href="{{ url('profile/edit', $row->id) }}">
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
        <h5 class="modal-title" id="exampleModalFormTitle">Tambah Visi Misi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('store/') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="exampleVisi">Visi</label>
            <input type="text" class="form-control" id="visi" name="visi" placeholder="Visi">
          </div>
          <div class="form-group">
            <label for="exampleMisi">Misi</label>
            <textarea class="form-control" id="misi" name="misi" rows="3"></textarea>
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
