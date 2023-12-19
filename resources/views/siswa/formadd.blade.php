@extends('layout.main')

@section('content')
<h3>Form Tambah Data</h3>
<div class="card">
    <div class="card-header">
      <button type="button" class="btn btn-sm btn-success" onclick="window.location='{{ url('siswa') }}' ">
        Kembali
      </button>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ url('siswa') }}">
            @csrf
            <div class="row mb-3">
                <label for="NIK" class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form-control-sm @error('NIK') is-invalid @enderror" id="NIK" name="NIK" value="{{ old('NIK') }}">
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
                  <input type="text" class="form-control form-control-sm @error('NamaLengkap') is-invalid @enderror" id="NamaLengkap" name="NamaLengkap" value="{{ old('NamaLengkap') }}">
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
                    <option value="" selected>-Pilih-</option>
                    <option value="Laki-Laki" >Laki-Laki</option>
                    <option value="Perempuan" >Perempuan</option>
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                  <textarea class="form-control @error('Alamat') is-invalid @enderror" name="Alamat" id="Alamat" cols="20" rows="10"></textarea>
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
                  <input type="text" name="NoHp"    id="NoHp" class="form-control form-control-sm @error('Alamat') is-invalid @enderror">
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
