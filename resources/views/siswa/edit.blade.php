@extends('layout.main')

@section('content')
<h3>Form Edit Data Siswa</h3>
<div class="card">
    <div class="card-header">
      <button type="button" class="btn btn-sm btn-success" onclick="window.location='{{ url('siswa') }}' ">
        Kembali
      </button>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('siswa/'.$data->id) }}">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <label for="NIK" class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form-control-sm @error('NIK') is-invalid @enderror" id="NIK" name="NIK" value="{{ $data->NIK }} " readonly>
                @error('NIK')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
                @enderror
                  
                </div>
              </div>

              <div class="row mb-3">
                <label for="NamaLengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control form-control-sm @error('NamaLengkap') is-invalid @enderror" id="NamaLengkap" name="NamaLengkap" value="{{ $data->NamaLengkap }}">
                  @error('NamaLengkap')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                      @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="JenisKelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-4">
                  <select   class="form-select form-select-sm @error('JenisKelamin') is-invalid @enderror"  name="JenisKelamin" id="JenisKelamin">
                    <option selected>{{ $data->JenisKelamin }}</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-8">
                  <textarea class="form-control @error('Alamat') is-invalid @enderror" name="Alamat" id="Alamat" cols="30" rows="10">{{ $data->Alamat }}</textarea>
                  @error('Alamat')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                      @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="NoHp" class="col-sm-2 col-form-label">No Hp</label>
                <div class="col-sm-3">
                  <input type="text" name="NoHp"    id="NoHp" class="form-control form-control-sm @error('Alamat') is-invalid @enderror" value="{{ $data->NoHp }}">
                  @error('NoHp')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                      @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-6">
                  <button type="submit" class="btn btn-sm btn-success">
                    Simpan
                  </button>
                </div>
              </div>

        </form>
    </div>
</div>

@endsection
