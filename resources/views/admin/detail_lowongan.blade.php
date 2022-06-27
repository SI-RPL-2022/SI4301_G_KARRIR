@extends('admin.layout')

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

                @if ($lowongan->verifikasi == 1)
                    <div class="d-flex my-3">
                        <form action="/admin/verifikasi/{{ $lowongan->id }}" method="POST" class="d-flex">
                            @csrf
                            <input type="hidden" name="verifikasi" value="lowongan">
                            <button type="submit" name="tolak" value="yes"
                                class="btn btn-primer px-5 py-3 mx-5 bg-danger">Tolak</button>
                            <button type="submit" name="konfirmasi" value="yes"
                                class="btn btn-primer px-5 py-3 mx-5">Konfirmasi</button>
                        </form>
                    </div>
                @endif

                @if ($lowongan->verifikasi === 3)
                    <a href="#" class="btn btn-primer px-5 py-3 mx-5">Konfirmed</a>
                @endif

                @if ($lowongan->verifikasi === 4)
                    <a href="#" class="btn btn-danger px-5 py-3 mx-5">Ditolak</a>
                @endif
            </div>
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
