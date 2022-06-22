@extends('template.karrir_template')

@section('content')
    <div class="container py-5">
        <div class="row mb-5">
            <div class="col-md-3 text-center">
                @if (!$lamaran->user->foto)
                    <img src="{{ url('/asset/logo/profile.png') }}" class="mb-2 foto-profile" id="prev">
                @else
                    <img src="{{ url('storage/' . $lamaran->user->foto) }}" class="mb-2 foto-profile">
                @endif
            </div>
            <div class="col-md-9">
                <div class="ps-5">
                    <table>
                        <tr class="mb-2">
                            <td>Nama Pelamar</td>
                            <td class="px-5">:</td>
                            <td>{{ $lamaran->user->nama }}</td>
                        </tr>
                        <tr class="mb-2">
                            <td>Umur Pelamar</td>
                            <td class="px-5">:</td>
                            <td>{{ $umur }} Tahun</td>
                        </tr>
                        <tr class="mb-2">
                            <td>Jenis Kelamin</td>
                            <td class="px-5">:</td>
                            <td>{{ $lamaran->user->kelamin }}</td>
                        </tr>
                        <tr class="mb-2">
                            <td>E-mail</td>
                            <td class="px-5"> :</td>
                            <td>{{ $lamaran->user->email }}</td>
                        </tr>
                        <tr class="mb-2">
                            <td>Lokasi</td>
                            <td class="px-5"> :</td>
                            <td>{{ $lamaran->user->alamat }}</td>
                        </tr>
                        <tr class="mb-2">
                            <td>Status Kependudukan</td>
                            <td class="px-5"> :</td>
                            <td>{{ $lamaran->user->status }}</td>
                        </tr>
                        <tr class="mb-2">
                            <td>Telepon</td>
                            <td class="px-5"> :</td>
                            <td>{{ $lamaran->telepon }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="mb-3">
            <p>Resume</p>
            <a href="/download/resume/{{ $lamaran->user_id }}"
                class="btn py-2 px-5 bg-informasi-user w-100 text-light fs-3">
                <div class="row">
                    <div class="col-md-1">
                        <i class="bi bi-filetype-pdf"></i>
                    </div>
                    <div class="col-md-10 text-start">
                        Resume/CV {{ $lamaran->user->nama }}.pdf
                    </div>
                    <div class="col">
                        <i class="bi bi-download"></i>
                    </div>
                </div>
            </a>
        </div>

        <div class="mb-3">
            <p>Pengalaman Organisasi</p>
            <a href="/download/organisasi/{{ $lamaran->user_id }}"
                class="btn py-2 px-5 bg-informasi-user w-100 text-light fs-3">
                <div class="row">
                    <div class="col-md-1">
                        <i class="bi bi-filetype-pdf"></i>
                    </div>
                    <div class="col-md-10 text-start">
                        Pengalaman Organisasi {{ $lamaran->user->nama }}.pdf
                    </div>
                    <div class="col">
                        <i class="bi bi-download"></i>
                    </div>
                </div>
            </a>
        </div>

        <div class="mb-3">
            <p>Sertifikasi</p>
            <a href="/download/sertifikasi/{{ $lamaran->user_id }}"
                class="btn py-2 px-5 bg-informasi-user w-100 text-light fs-3">
                <div class="row">
                    <div class="col-md-1">
                        <i class="bi bi-filetype-pdf"></i>
                    </div>
                    <div class="col-md-10 text-start">
                        Sertifikasi {{ $lamaran->user->nama }}.pdf
                    </div>
                    <div class="col">
                        <i class="bi bi-download"></i>
                    </div>
                </div>
            </a>
        </div>

        <div class="mb-3">
            <p>Portofolio</p>
            <a href="/download/portofolio/{{ $lamaran->user_id }}"
                class="btn py-2 px-5 bg-informasi-user w-100 text-light fs-3">
                <div class="row">
                    <div class="col-md-1">
                        <i class="bi bi-filetype-pdf"></i>
                    </div>
                    <div class="col-md-10 text-start">
                        Portofolio {{ $lamaran->user->nama }}.pdf
                    </div>
                    <div class="col">
                        <i class="bi bi-download"></i>
                    </div>
                </div>
            </a>
        </div>

        @if ($lamaran->dokumen != null)
            <div class="mb-3">
                <p>Dokumen Pendukung</p>
                <a href="/download/dokumen/{{ $lamaran->id }}"
                    class="btn py-2 px-5 bg-informasi-user w-100 text-light fs-3">
                    <div class="row">
                        <div class="col-md-1">
                            <i class="bi bi-filetype-pdf"></i>
                        </div>
                        <div class="col-md-10 text-start">
                            Dokumen Pendukung {{ $lamaran->user->nama }}.pdf
                        </div>
                        <div class="col">
                            <i class="bi bi-download"></i>
                        </div>
                    </div>
                </a>
            </div>
        @endif
        @if ($lamaran->status == 'Pending')
            <form action="/provider/rekrutmen/lamaran/{{ $lamaran->id }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="status" class="form-label">Apakah Perusahaan Anda menerima Pelamar?</label>
                    <select name="status" id="status" class="form-select">
                        <option value="Terima">Terima</option>
                        <option value="Tolak">Tolak</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Pesan</label>
                    <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control"></textarea>
                </div>

                <div class="mb-3 text-end">
                    <button type="submit" class="btn btn-primer px-5">Kirim</button>
                </div>
            </form>
        @endif

        @if ($lamaran->status == 'Terima')
            <p class="btn py-3 px-5 w-100 btn-success fs-3"><i class="bi bi-check-circle-fill"></i> Pelamar Anda Terima</p>
        @endif

        @if ($lamaran->status == 'Tolak')
            <p class="btn py-3 px-5 w-100 btn-danger fs-3"><i class="bi bi-x-circle-fill"></i> Pelamar Anda Terima</p>
        @endif
    </div>
@endsection
