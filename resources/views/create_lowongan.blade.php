@extends('template.karrir_template')

@section('content')
    <section id="DaftarKarrir" class="bg-sekunder min-vh-100">
        <div class="container pb-5">
            <div class="row">
                <div class="col-md-5 py-5">
                    <div class="text-center">
                        <img src="{{ URL::asset('asset/logo/daftar_provider.png') }}">
                        <h4 class="fw-bold opacity">Temukan kandidat terbaik dengan membuka lowongan pekerjaan</h4>
                    </div>
                </div>
                <div class="col-md-7 p-5 bg-white form-login">
                    <h5 class="fw-bold pb-3">Ayo Buka Lowonganmu</h5>
                    <form action="/provider/lowongan/create" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="nama" placeholder="Nama Lowongan"
                                    class="form-control py-3 px-4 @error('nama') is-invalid @enderror"
                                    value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="email" name="email" placeholder="Email"
                                    class="form-control py-3 px-4 @error('email') is-invalid @enderror"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col">
                                <input type="text" name="jabatan" placeholder="Jabatan"
                                    class="form-control py-3 px-4 @error('jabatan') is-invalid @enderror"
                                    value="{{ old('jabatan') }}">
                                @error('jabatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <select class="form-select py-3 px-4" name="lokasi">
                                    <option selected disabled hidden>Lokasi</option>
                                    <option>Bandung</option>
                                    <option>Jakarta</option>
                                </select>
                            </div>
                            <div class="col">
                                <select class="form-select py-3 px-4" name="tipe">
                                    <option selected disabled hidden>Tipe</option>
                                    <option>Full-Time</option>
                                    <option>Part-Time</option>
                                    <option>Magang</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="gaji_start" class="form-label">Kisaramn Gaji</label>
                            <div class="col-md-3">
                                <select name="duit" id="duit" class="form-select py-3 px-4">
                                    <option value="USD">USD</option>
                                    <option value="IDR">IDR</option>
                                </select>
                            </div>
                            <div class="col">
                                <input type="number" name="gaji_start" placeholder="1000000"  class="form-control py-3 px-4"
                                    value="{{ old('gaji_start') }}">
                            </div>
                            <div class="col-md-1 text-center fs-3">-</div>
                            <div class="col">
                                <input type="number" name="gaji_end" placeholder="1000000"  class="form-control py-3 px-4"
                                    value="{{ old('gaji_end') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="periode_start" class="form-label">Pengalaman</label>
                            <div class="col">
                                <input type="text" name="periode_start" placeholder="Pengalaman"
                                    class="form-control py-3 px-4 @error('periode_start') is-invalid @enderror"
                                    value="{{ old('periode_start') }}">
                                @error('periode_start')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                            <div class="col-md-1 text-center fs-4">-</div>
                            <div class="col">
                                <input type="text" name="periode_end" placeholder="Pengalaman"
                                    class="form-control py-3 px-4 @error('periode_end') is-invalid @enderror"
                                    value="{{ old('periode_end') }}">
                                @error('periode_end')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-1 me-3 text-center mt-3">Tahun</div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="regis_start" class="form-label">Registrasi dibuka</label>
                                <input type="date" name="regis_start" id="regis_start" class="form-control py-3 px-4">
                            </div>
                            <div class="col">
                                <label for="regis_end" class="form-label">Registrasi ditutup</label>
                                <input type="date" name="regis_end" id="regis_end" class="form-control py-3 px-4">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <textarea name="deskripsi" id="" rows="5" class="form-control @error('deskripsi') is-invalid @enderror"
                                    placeholder="Deskripsikan Pekerjaan">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primer py-3 w-50">Buat</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
