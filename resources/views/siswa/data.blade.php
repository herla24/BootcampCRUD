@extends('layout.main')

@section('content')
<h3>Data Murid</h3>
<div class="card">
    <div class="card-header">
      <button type="button" class="btn btn-sm btn-primary" onclick="window.location='{{ url('siswa/add') }}' ">
        <i class="fas fa-plus-circle"></i> Tambah Data
      </button>
    </div>
    <div class="card-body">
      @if (session('msg'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Sukses</strong> {{ session('msg') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      <form method="GET">
        <div class="row mb-3">
          <label for="Search" class="col-sm-2 col-form-label">Cari Data</label>
          <div class="col-sm-10">
            <input type="text" class="form-control form-control-sm" value="" placeholder="Please input Key For Search Data..." name="search"
            autofocus value="{{ $search }}">
          </div>
        </div>

      </form>

      <table class="table table-sm table-stripped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>No Hp</th>
            </tr>
        </thead>
        <tbody>
            @php
              $nomor = 1 + (($siswa->currentPage() - 1) * $siswa->perPage());
            @endphp
            @foreach ($siswa as $row)
                <tr>
                    {{-- <th>{{ $loop->iteration }}</th> --}}
                    <td>{{ $nomor++ }}</td>
                    <td>{{ $row->NIK }}</td>
                    <td>{{ $row->NamaLengkap}}</td>
                    <td>{{ $row->JenisKelamin }}</td>
                    <td>{{ $row->Alamat}}</td>
                    <td>{{ $row->NoHp}}</td>
                    <td>
                      <button onclick="window.location='{{ url('siswa/'.$row->id) }}'" type="button" class="btn btn-sm btn-info" title="Edit Data">
                        <i class="fas fa-edit"></i>
                      </button>

                      <form onsubmit="return deleteData('{{ $row->NamaLengkap }}')" style="display:inline" method="POST" action="{{  url('siswa/'.$row->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="Hapus Data" class="btn btn-danger btn-sm">
                          <i class="fas fa-trash-alt"></i> 
                        </button>
                      </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{ $siswa->links() }}
    </div>
  </div>
            <script>
             function deleteData(name){
              pesan = confirm(`Yakin data siswa dengan nama ${name} ini dihapus?`);
              if(pesan) return true;
              else return false;
             }
            </script>

@endsection