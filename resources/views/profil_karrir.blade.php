@extends('template.karrir_template')

@section('content')
    <section id="Profile">
        <div class="container py-5">
            <div class="row mb-5">
                <div class="col-md-3 text-center">
                    @if (!auth()->user()->foto)
                        <img src="{{ url('/asset/logo/profile.png') }}" class="mb-2 foto-profile" id="prev">
                    @else
                        <img src="{{ url('storage/' . auth()->user()->foto) }}" class="mb-2 foto-profile">
                    @endif
                    <!-- Button trigger modal -->
                    <a type="button" class="text-decoration-none link-secondary" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        <i class="bi bi-pencil-square"></i> Sunting
                        Data Profil
                    </a>
                </div>
                <div class="col-md-9">
                    <h3>{{ auth()->user()->nama }}</h3>
                    <h6>{{ $umur }} Tahun</h6>
                    <h6>{{ auth()->user()->kelamin }}</h6>

                    <h6 class="text-uppercase">Informasi Umum</h6>
                    <div class="ps-5">
                        <table>
                            <tr class="mb-2">
                                <td>E-mail</td>
                                <td class="px-5"> :</td>
                                <td>{{ auth()->user()->email }}</td>
                            </tr>
                            <tr class="mb-2">
                                <td>Lokasi</td>
                                <td class="px-5"> :</td>
                                <td>{{ auth()->user()->alamat }}</td>
                            </tr>
                            <tr class="mb-2">
                                <td>Status Kependudukan</td>
                                <td class="px-5"> :</td>
                                <td>{{ auth()->user()->status }}</td>
                            </tr>
                            <tr class="mb-2">
                                <td>Telepon</td>
                                <td class="px-5"> :</td>
                                <td>0{{ auth()->user()->telepon }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Informasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/karrir/profile/{{ auth()->user()->id }}" method="post" class="form-login"
                        runat="server" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="text-center">
                                <img src="{{ url('/asset/logo/profile.png') }}" class="mb-2 foto-profile" id="blah">
                            </div>
                            <div class="text-center">
                                <label for="imgInp">
                                    <i class="bi bi-camera-fill" id="icon"></i>
                                </label>
                                <input class="fileInput" type="file" name="foto" id="imgInp"
                                    accept="image/png, image/jpeg">
                            </div>

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap"
                                    value="{{ auth()->user()->nama }}">
                            </div>

                            <div class="mb-3">
                                <label for="telepon" class="form-label">Telepon</label>
                                <input type="number" name="telepon" class="form-control " placeholder="Telepon"
                                    id="telepon" value="0{{ auth()->user()->telepon }}">
                            </div>

                            <p>Email<br><b>{{ auth()->user()->email }}</b></p>

                            <div class="mb-3">
                                <input type="email" name="email" class="form-control" placeholder="Perbarui Email"
                                    id="email" value="{{ auth()->user()->email }}">
                            </div>

                            <div class="mb-3">
                                <select name="alamat" id="" class="form-select">
                                    <option selected disabled hidden>Lokasi</option>
                                    <option value="Bandung">Bandung</option>
                                    <option value="Jakarta">Jakarta</option>
                                </select>
                            </div>

                            <label for="hari" class="form-label">Tanggal Lahir</label>
                            <div class="mb-3 input-group">

                                <select name="hari" id="hari" class="form-select mx-2">
                                    @for ($i = 1; $i <= 31; $i++)
                                        <option value="{{ $i }}"
                                            @if ($tanggal == $i) selected @endif>{{ $i }}</option>
                                    @endfor
                                </select>

                                <select name="bulan" id="bulan" class="form-select mx-2">
                                    @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}"
                                            @if ($bulan == $i) selected @endif>{{ $i }}</option>
                                    @endfor
                                </select>

                                <select name="tahun" id="tahun" class="form-select mx-2">
                                    @for ($i = 2022; $i > 1; $i--)
                                        <option value="{{ $i }}"
                                            @if ($tahun == $i) selected @endif>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>

                            <label for="kelamin" class="form-label">Jenis Kelamin</label>
                            <div class="mb-3 input-group justify-content-center">
                                <div class="form-check mx-3">
                                    <input type="radio" name="kelamin" id="laki" class="form-check-input" value="Laki-Laki"
                                        @if (auth()->user()->kelamin == 'Laki-Laki') checked @endif>
                                    <label for="laki" class="form-check-label">Laki-laki</label>
                                </div>

                                <div class="form-check mx-3">
                                    <input type="radio" name="kelamin" id="perempuan" class="form-check-input"
                                        value="Perempuan" @if (auth()->user()->kelamin == 'Perempuan') checked @endif>
                                    <label for="perempuan" class="form-check-label">Perempuan</label>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section id="InformasiUser" class="bg-informasi-user py-5">
        <div class="container bg-light py-2">
            <div class="text-center mb-3">
                TENTANG SAYA
                <hr>
            </div>
            <div class="px-5">
                <div class="my-4">
                    <div class="col">
                        <h6>RESUME/CV</h6>
                    </div>
                    <div class="col px-5 mx-5">
                        @if (auth()->user()->cv)
                            <p class="px-5 text-center"><a href="/download/resume">Resume/CV
                                    {{ auth()->user()->nama }}.pdf</a></p>
                        @else
                            <p class="px-5 text-center">80% perusahaan menganggap resume/CV sangat penting dalam lamaran
                                pekerjaan</p>
                        @endif

                        <h6 class="text-center fw-bold">
                            <a type="button" class="text-decoration-none text-dark" data-bs-toggle="modal"
                                data-bs-target="#resume">
                                <i class="bi bi-plus-circle px-4"></i>TAMBAHKAN RESUME/CV
                            </a>
                        </h6>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="resume" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Resume / CV</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="/upload/resume" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body text-center">
                                        <p>80% perusahaan menganggap resume/CV sangat penting dalam lamaran pekerjaan</p>


                                        <label for="up_resume" class="form-label form-upload-label"
                                            id="preview_resume">Unggah Resume/Cv
                                            kamu</label>
                                        <input type="file" name="resume" id="up_resume" accept="application/pdf" hidden>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary"
                                            data-bs-dismiss="modal">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="col">
                        <h6>PENGALAMAN ORGANISASI</h6>
                    </div>
                    <div class="col px-5 mx-5">
                        @if (auth()->user()->organisasi)
                            <p class="px-5 text-center"><a href="/download/organisasi">Pengalaman Organisasi
                                    {{ auth()->user()->nama }}.pdf</a></p>
                        @else
                            <p class="px-5 text-center">apa kegiatan yang ingin kamu tunjukan ke perusahaan?</p>
                        @endif
                        <h6 class="text-center fw-bold">
                            <a type="button" class="text-decoration-none text-dark" data-bs-toggle="modal"
                                data-bs-target="#organisasi">
                                <i class="bi bi-plus-circle px-4"></i>TAMBAHKAN PENGALAMAN ORGANISASI
                            </a>
                        </h6>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="organisasi" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Pengalaman Organisasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="/upload/organisasi" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body text-center">
                                        <p>apa kegiatan yang ingin kamu tunjukan ke perusahaan?</p>


                                        <label for="up_organisasi" class="form-label form-upload-label"
                                            id="preview_organisasi">Unggah PENGALAMAN ORGANISASI
                                            kamu</label>
                                        <input type="file" name="organisasi" id="up_organisasi" accept="application/pdf"
                                            hidden>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary"
                                            data-bs-dismiss="modal">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="col">
                        <h6>SERTIFIKASI</h6>
                    </div>
                    <div class="col px-5 mx-5">
                        @if (auth()->user()->sertifikasi)
                            <p class="px-5 text-center"><a href="/download/sertifikasi">Sertifikasi
                                    {{ auth()->user()->nama }}.pdf</a></p>
                        @else
                            <p class="px-5 text-center">sertifikasi dapat sangat membantu kamu dalam melamar pekerjaan di
                                perusahaan</p>
                        @endif
                        <h6 class="text-center fw-bold">
                            <a type="button" class="text-decoration-none text-dark" data-bs-toggle="modal"
                                data-bs-target="#sertifikasi">
                                <i class="bi bi-plus-circle px-4"></i>TAMBAHKAN SERTIFIKASI
                            </a>
                        </h6>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="sertifikasi" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Sertifikasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="/upload/sertifikasi" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body text-center">
                                        <p>sertifikasi dapat sangat membantu kamu dalam melamar pekerjaan di
                                            perusahaan</p>


                                        <label for="up_sertifikasi" class="form-label form-upload-label"
                                            id="preview_sertifikasi">Unggah Sertifikasi
                                            kamu</label>
                                        <input type="file" name="sertifikasi" id="up_sertifikasi" accept="application/pdf"
                                            hidden>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary"
                                            data-bs-dismiss="modal">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>

                    <div class="col">
                        <h6>PORTOFOLIO</h6>
                    </div>
                    <div class="col px-5 mx-5">
                        @if (auth()->user()->portofolio)
                            <p class="px-5 text-center"><a href="/download/portofolio">Portofolio
                                    {{ auth()->user()->nama }}.pdf</a></p>
                        @else
                            <p class="px-5 text-center">portfolio apa yang kamu miliki untuk di tunjukan ke perusahaan?</p>
                        @endif
                        <h6 class="text-center fw-bold">
                            <a type="button" class="text-decoration-none text-dark" data-bs-toggle="modal"
                                data-bs-target="#portofolio">
                                <i class="bi bi-plus-circle px-4"></i>TAMBAHKAN PORTOFOLIO
                            </a>
                        </h6>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="portofolio" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Portofolio</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form action="/upload/portofolio" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body text-center">
                                        <p>portfolio apa yang kamu miliki untuk di tunjukan ke perusahaan?</p>


                                        <label for="up_portofolio" class="form-label form-upload-label"
                                            id="preview_portofolio">Unggah Portofolio
                                            kamu</label>
                                        <input type="file" name="portofolio" id="up_portofolio" accept="application/pdf"
                                            hidden>
                                    </div>
                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary"
                                            data-bs-dismiss="modal">Upload</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </section>


    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }


        //upload resume
        var fileInput = document.getElementById('up_resume');
        var listFile = document.getElementById('preview_resume');

        fileInput.onchange = function() {
            var files = Array.from(this.files);
            files = files.map(file => file.name);
            listFile.innerHTML = files.join('<br/>');
        }

        // Organisasi
        var fileInput = document.getElementById('up_organisasi');
        var listFile = document.getElementById('preview_organisasi');

        fileInput.onchange = function() {
            var files = Array.from(this.files);
            files = files.map(file => file.name);
            listFile.innerHTML = files.join('<br/>');
        }

        // Sertifikasi
        var fileInput = document.getElementById('up_sertifikasi');
        var listFile = document.getElementById('preview_sertifikasi');

        fileInput.onchange = function() {
            var files = Array.from(this.files);
            files = files.map(file => file.name);
            listFile.innerHTML = files.join('<br/>');
        }

        // portofolio
        var fileInput = document.getElementById('up_portofolio');
        var listFile = document.getElementById('preview_portofolio');

        fileInput.onchange = function() {
            var files = Array.from(this.files);
            files = files.map(file => file.name);
            listFile.innerHTML = files.join('<br/>');
        }
    </script>
@endsection
