@extends('template.karrir_template')

@section('content')
    <div class="container py-5">
        <h4>Lowongan Kerja</h4>
        {{ $lowongan->perusahaan->nama_perusahaan }}
        <div class="row">
            <div class="col-md-3">
                <img src="{{ URL::asset('storage/' . $lowongan->perusahaan->foto) }}" class="foto-profile">
            </div>
            <div class="col-md-6">
                <h4 class="fw-bold text-uppercase">{{ $lowongan->nama }}</h4>
                <h5>{{ $lowongan->perusahaan->nama_perusahaan }} - {{ $lowongan->lokasi }}</h5>
                <h6 class="text-secondary">Deskripsi Perusahaan</h6>
                <p class="form-text text-dark">Perusahaan yang bergerak di bidang {{ $lowongan->perusahaan->industri }}</p>
                <h3><i class="bi bi-building display-4"></i> {{ $lowongan->jabatan }}</h3>
                <h3><i class="bi bi-clock display-4"></i> {{ $lowongan->tipe }}</h3>
                <h3><i class="bi bi-coin display-4"></i> {{ $lowongan->gaji }}</h3>
                @auth('web')
                    <div class="d-flex my-3">
                        @if (auth()->user()->cv == null)
                            <button type="button" class="btn btn-primer px-5" data-bs-toggle="modal"
                                data-bs-target="#lengkapi">Lamar</button>
                        @else
                            <button type="button" class="btn btn-primer px-5" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">Lamar</button>
                        @endif

                        <button class="btn btn-primer px-5 mx-5" id="copyBtn" data-text="{{ url()->current() }}">Share <i
                                class="bi bi-share-fill"></i></button>
                    </div>

                    <div class="modal fade" id="lengkapi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Lamaran Pekerjaan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    Kamu Belum Melengkapi Profil Kamu, Ayo Lengkapi Profil Agar Kamu Bisa Melamar
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <a href="/karrir/profile" class="btn btn-primer w-100">Oke</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Lamaran Pekerjaan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="/lowongan/lamar/{{ $lowongan->id }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body text-center">
                                        <p>Kamu Akan Melamar Sebagai <b>{{ $lowongan->nama }}</b> Pada Perusahaan
                                            <b>{{ $lowongan->perusahaan->nama_perusahaan }}</b>
                                        </p>
                                        <img src="{{ asset('storage/' . $lowongan->perusahaan->foto) }}"
                                            class="foto-profile" alt="">
                                        <div class="mb-2 mt-2 text-start">
                                            Resume
                                            <div class="mb-2">
                                                <label id="preview" class="form-upload-label w-100"><a
                                                        href="/download/resume">Resume/CV
                                                        {{ auth()->user()->nama }}.pdf</a>
                                                </label>
                                                <div id="passwordHelpBlock" class="form-text" style="text-align: justify">
                                                    *Resume ini mengambil Data Diri, bila ingin mengubah <a
                                                        href="/karrir/profile">Klik Disini</a> untuk menuju profil
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <div class="col-md-2">
                                                    <select name="nomor" id="nomor" class="form-select">
                                                        <option value="+61">+61</option>
                                                        <option value="+62" selected>+62</option>
                                                        <option value="+63">+63</option>
                                                        <option value="+64">+64</option>
                                                    </select>
                                                </div>
                                                <input type="number" name="telepon" id="telepon" class="form-control">
                                            </div>
                                            <div id="passwordHelpBlock" class="form-text mb-2" style="text-align: justify">
                                                Data ini diperlukan agar Perusahaan dapat menghubungimu lebih cepat
                                            </div>
                                            Dokumen Pendukung
                                            <div class="mb-2 w-100 text-center">
                                                <label for="up_sertifikasi" class="form-label form-upload-label w-100"
                                                    id="preview_sertifikasi">Dokumen Pendukung</label>
                                                <input type="file" name="dokumen" id="up_sertifikasi"
                                                    accept="application/pdf" hidden>

                                                <div id="passwordHelpBlock" class="form-text mb-2" style="text-align: justify">
                                                    Optional<br>
                                                    Bisa berupa surat lamaran maupun rekomendas
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primer w-100">Lamar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endauth
                @guest
                    <div class="d-flex my-3">
                        <button class="btn btn-primer px-5">Lamar</button>
                    </div>
                @endguest
            </div>
            @auth('perusahaan')
                <div class="col text-end">
                    <a href="/provider/lowongan/update/{{ $lowongan->id }}" class="btn btn-secondary">Update</a>
                </div>
            @endauth
        </div>
        <hr>
        <div class="row mb-3">
            <div class="col-md-9">
                <h3>Job Description</h3>
                <p>Pengalaman Kerja {{ $lowongan->periode }} Tahun</p>

                <p>{{ $lowongan->deskripsi }}</p>
            </div>
            <div class="col">
                Periode Pendaftaran Kerja
                <p>{{ \Carbon\Carbon::parse($lowongan->regis_start)->format('j F Y') }} -
                    {{ \Carbon\Carbon::parse($lowongan->regis_end)->format('j F Y') }} </p>
            </div>
        </div>
    </div>
    <section id="Perusahaan" class="bg-primer">
        <div class="container p-3">
            <h3>Tentang Perusahaan</h3>
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ URL::asset('storage/' . $lowongan->perusahaan->foto) }}" class="foto-profile">
                </div>
                <div class="col">
                    <h4 class="fw-bold">{{ $lowongan->perusahaan->nama_perusahaan }}</h4>
                    <p>{{ $lowongan->perusahaan->tentang_kami }}</p>
                </div>
            </div>
        </div>
    </section>


    <script>
        const copyBtn = document.querySelector('#copyBtn');
        copyBtn.addEventListener('click', e => {
            const input = document.createElement('input');
            input.value = copyBtn.dataset.text;
            document.body.appendChild(input);
            input.select();
            if (document.execCommand('copy')) {
                alert('Url Copied');
                document.body.removeChild(input);
            }
        });


        var fileSertifikasi = document.getElementById('up_sertifikasi');
        var previewSertifikasi = document.getElementById('preview_sertifikasi');

        fileSertifikasi.onchange = function() {
            var files = Array.from(this.files);
            files = files.map(file => file.name);
            previewSertifikasi.innerHTML = files.join('<br/>');
        }
    </script>
@endsection
