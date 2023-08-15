@extends ('layouts.aspirasi')

@section('content')

<div class="content-wrapper">
  <div class="content">
    <div class="row">
      <div class="col-xl-12">
    <!-- Basic Table-->
        <div class="card card-default">
          <div class="card-header">
            <h2>Data Aspirasi</h2>
          </div>
          
          <div class="card-body">
            
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Nama</th>
                  <th scope="col">Email</th>
                  <th scope="col">Telepon</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Perihal</th>
                  <th scope="col">Isi</th>
                  <th scope="col">AKSI</th>
                </tr>
              </thead>
              <tbody>
                @foreach($aspirasi as $row)
                <tr>
                  <td>{{ $row->nama }}</td>
                  <td>{{ $row->email }}</td>
                  <td>{{ $row->telepon }}</td>
                  <td>{{ $row->alamat }}</td>
                  <td>{{ $row->perihal }}</td>
                  <td>{{ $row->isi }}</td>
                  <th>
                    <a href="{{ url('/aspirasi/edit', $row->id) }}">
                      <i class="mdi mdi-open-in-new"></i>
                    </a>
                    <a href="{{ url('/aspirasi/delete', $row->id) }}">
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
@endsection