@extends('admin.layout')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1>Verifikasi PROFIL PERUSAHAAN</h1>
    </div>
    <div class="row mb-5">
        <div class="col-md-3 text-center">
            @if (!$perusahaan->foto)
                <img src="{{ url('/asset/logo/profile.png') }}" class="mb-2 foto-profile" id="prev">
            @else
                <img src="{{ url('storage/' . $perusahaan->foto) }}" class="mb-2 foto-profile">
            @endif



        </div>
        <div class="col-md-9">
            <h3>Profil Perusahaan</h3>
            <h5 class="my-3 fw-bold">{{ $perusahaan->nama_perusahaan }}</h5>

            <p class="text-uppercase">Informasi Umum</p>
            <div class="ps-5">
                <table>
                    <tr>
                        <td class="py-3">E-mail</td>
                        <td class="px-5"> :</td>
                        <td id="email-text">{{ $perusahaan->email }}</td>
                    </tr>
                    <tr>
                        <td class="py-3">Lokasi</td>
                        <td class="px-5"> :</td>
                        <td id="alamat-text">{{ $perusahaan->alamat }}</td>
                    </tr>
                    <tr>
                        <td class="py-3">Industri</td>
                        <td class="px-5"> :</td>
                        <td id="industri-text">{{ $perusahaan->industri }}</td>
                    </tr>
                    <tr>
                        <td class="py-3">Telepon</td>
                        <td class="px-5"> :</td>
                        <td id="telepon-text">{{ $perusahaan->telepon }}</td>
                    </tr>
                </table>
            </div>
            @if ($perusahaan->verifikasi === 2)
                <form action="/admin/verifikasi/{{ $perusahaan->id }}" method="POST">
                    @csrf
                    <button type="submit" name="tolak" value="yes"
                        class="btn btn-primer px-5 py-3 mx-5 bg-danger">Tolak</button>
                    <button type="submit" name="konfirmasi" value="yes"
                        class="btn btn-primer px-5 py-3 mx-5">Konfirmasi</button>
                </form>
            @endif
        </div>
    </div>
</div>
<section id="InformasiUser" class="bg-informasi-user py-5">
    <div class="container bg-light py-2">
        <div class="px-5">
            <div class="my-4">
                <div class="col">
                    <h6>TENTANG KAMI</h6>
                </div>
                <div class="col px-5 mx-5">
                    <p class="text-center" id="deskripsi-text">

                        {{ $perusahaan->tentang_kami }}

                    </p>


                </div>
                <hr>

                <div class="col">
                    <h6>VISI</h6>
                </div>
                <div class="col px-5 mx-5">
                    <p class="px-5 text-center" id="visi-text">

                        {{ $perusahaan->visi }}

                    </p>


                </div>
                <hr>

                <div class="col">
                    <h6>MISI</h6>
                </div>
                <div class="col px-5 mx-5">
                    <p class="px-5 text-center" id="misi-text">

                        {{ $perusahaan->misi }}

                    </p>


                </div>
                <hr>

                <div class="d-flex justify-content-center">
                    @if ($perusahaan->verifikasi === 2)
                        <form action="/admin/verifikasi/{{ $perusahaan->id }}" method="POST">
                            @csrf
                            <input type="hidden" name="verifikasi" value="perusahaan">
                            <button type="submit" name="tolak" value="yes"
                                class="btn btn-primer px-5 py-3 mx-5 bg-danger">Tolak</button>
                            <button type="submit" name="konfirmasi" value="yes"
                                class="btn btn-primer px-5 py-3 mx-5">Konfirmasi</button>
                        </form>
                    @endif

                    @if ($perusahaan->verifikasi === 3)
                        <a href="#" class="btn btn-primer px-5 py-3 mx-5">Konfirmed</a>
                    @endif

                    @if ($perusahaan->verifikasi === 4)
                        <a href="#" class="btn btn-danger px-5 py-3 mx-5">Ditolak</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </form>
</section>
@endsection