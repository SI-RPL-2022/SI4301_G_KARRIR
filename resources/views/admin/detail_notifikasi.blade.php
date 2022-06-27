@extends('admin.layout')


@section('content')
    <section id="Profile">
        @if ($notifikasi->tipe == 'Verifikasi Akun')
            <div class="container py-5">
                <div class="text-center mb-5">
                    <h1>Verifikasi PROFIL PERUSAHAAN</h1>
                </div>
                <div class="row mb-5">
                    <div class="col-md-3 text-center">
                        @if (!$notifikasi->perusahaan->foto)
                            <img src="{{ url('/asset/logo/profile.png') }}" class="mb-2 foto-profile" id="prev">
                        @else
                            <img src="{{ url('storage/' . $notifikasi->perusahaan->foto) }}" class="mb-2 foto-profile">
                        @endif



                    </div>
                    <div class="col-md-9">
                        <h3>Profil Perusahaan</h3>
                        <h5 class="my-3 fw-bold">{{ $notifikasi->perusahaan->nama_perusahaan }}</h5>

                        <p class="text-uppercase">Informasi Umum</p>
                        <div class="ps-5">
                            <table>
                                <tr>
                                    <td class="py-3">E-mail</td>
                                    <td class="px-5"> :</td>
                                    <td id="email-text">{{ $notifikasi->perusahaan->email }}</td>
                                </tr>
                                <tr>
                                    <td class="py-3">Lokasi</td>
                                    <td class="px-5"> :</td>
                                    <td id="alamat-text">{{ $notifikasi->perusahaan->alamat }}</td>
                                </tr>
                                <tr>
                                    <td class="py-3">Industri</td>
                                    <td class="px-5"> :</td>
                                    <td id="industri-text">{{ $notifikasi->perusahaan->industri }}</td>
                                </tr>
                                <tr>
                                    <td class="py-3">Telepon</td>
                                    <td class="px-5"> :</td>
                                    <td id="telepon-text">{{ $notifikasi->perusahaan->telepon }}</td>
                                </tr>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        @endif
        @if ($notifikasi->tipe == 'Verifikasi Lowongan')
            <h4>Lowongan Kerja</h4>
            {{ $notifikasi->perusahaan->nama_perusahaan }}
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ URL::asset('storage/' . $notifikasi->perusahaan->foto) }}" class="foto-profile">
                </div>
                <div class="col-md-6">
                    <h4 class="fw-bold text-uppercase">{{ $notifikasi->lowongan->nama }}</h4>
                    <h5>{{ $notifikasi->perusahaan->nama_perusahaan }} - {{ $notifikasi->lowongan->lokasi }}</h5>
                    <h6 class="text-secondary">Deskripsi Perusahaan</h6>
                    <p class="form-text text-dark">Perusahaan yang bergerak di bidang
                        {{ $notifikasi->perusahaan->industri }}</p>
                    <h3><i class="bi bi-building display-4"></i> {{ $notifikasi->lowongan->jabatan }}</h3>
                    <h3><i class="bi bi-clock display-4"></i> {{ $notifikasi->lowongan->tipe }}</h3>
                    <h3><i class="bi bi-coin display-4"></i> {{ $notifikasi->lowongan->gaji }}</h3>

                    @if ($notifikasi->lowongan->verifikasi === 1)
                        <form action="/admin/verifikasi/{{ $notifikasi->lowongan->id }}" method="POST"
                            class="d-flex">
                            @csrf
                            <input type="hidden" name="verifikasi" value="lowongan">
                            <button type="submit" name="tolak" value="yes"
                                class="btn btn-primer px-5 py-3 mx-5 bg-danger">Tolak</button>
                            <button type="submit" name="konfirmasi" value="yes"
                                class="btn btn-primer px-5 py-3 mx-5">Konfirmasi</button>
                        </form>
                    @endif

                    @if ($notifikasi->perusahaan->verifikasi === 3)
                        <a href="#" class="btn btn-primer px-5 py-3 mx-5">Konfirmed</a>
                    @endif

                    @if ($notifikasi->perusahaan->verifikasi === 4)
                        <a href="#" class="btn btn-danger px-5 py-3 mx-5">Ditolak</a>
                    @endif
                </div>
            </div>
            <hr>
            <div class="row mb-3">
                <div class="col-md-9">
                    <h3>Job Description</h3>
                    <p>Pengalaman Kerja {{ $notifikasi->lowongan->periode }} Tahun</p>

                    <p>{{ $notifikasi->lowongan->deskripsi }}</p>
                </div>
                <div class="col">
                    Periode Pendaftaran Kerja
                    <p>{{ \Carbon\Carbon::parse($notifikasi->lowongan->regis_start)->format('j F Y') }} -
                        {{ \Carbon\Carbon::parse($notifikasi->lowongan->regis_end)->format('j F Y') }} </p>
                </div>
            </div>
        @endif
    </section>

    @if ($notifikasi->tipe == 'Verifikasi Akun')
        <section id="InformasiUser" class="bg-informasi-user py-5">
            <div class="container bg-light py-2">
                <div class="px-5">
                    <div class="my-4">
                        <div class="col">
                            <h6>TENTANG KAMI</h6>
                        </div>
                        <div class="col px-5 mx-5">
                            <p class="text-center" id="deskripsi-text">

                                {{ $notifikasi->perusahaan->tentang_kami }}

                            </p>


                        </div>
                        <hr>

                        <div class="col">
                            <h6>VISI</h6>
                        </div>
                        <div class="col px-5 mx-5">
                            <p class="px-5 text-center" id="visi-text">

                                {{ $notifikasi->perusahaan->visi }}

                            </p>


                        </div>
                        <hr>

                        <div class="col">
                            <h6>MISI</h6>
                        </div>
                        <div class="col px-5 mx-5">
                            <p class="px-5 text-center" id="misi-text">

                                {{ $notifikasi->perusahaan->misi }}

                            </p>


                        </div>
                        <hr>

                        <div class="d-flex justify-content-center">
                            @if ($notifikasi->perusahaan->verifikasi === 2)
                                <form action="/admin/verifikasi/{{ $notifikasi->perusahaan->id }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="verifikasi" value="perusahaan">
                                    <button type="submit" name="tolak" value="yes"
                                        class="btn btn-primer px-5 py-3 mx-5 bg-danger">Tolak</button>
                                    <button type="submit" name="konfirmasi" value="yes"
                                        class="btn btn-primer px-5 py-3 mx-5">Konfirmasi</button>
                                </form>
                            @endif

                            @if ($notifikasi->perusahaan->verifikasi === 3)
                                <a href="#" class="btn btn-primer px-5 py-3 mx-5">Konfirmed</a>
                            @endif

                            @if ($notifikasi->perusahaan->verifikasi === 4)
                                <a href="#" class="btn btn-danger px-5 py-3 mx-5">Ditolak</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </section>
    @endif

    @if ($notifikasi->tipe == 'Verifikasi Lowongan')
        <section id="Perusahaan" class="bg-primer">
            <div class="container p-3">
                <h3>Tentang Perusahaan</h3>
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ URL::asset('storage/' . $notifikasi->perusahaan->foto) }}" class="foto-profile">
                    </div>
                    <div class="col">
                        <h4 class="fw-bold">{{ $notifikasi->perusahaan->nama_perusahaan }}</h4>
                        <p>{{ $notifikasi->perusahaan->tentang_kami }}</p>
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
