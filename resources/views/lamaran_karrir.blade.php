@extends('template.karrir_template')

@section('content')
    <div class="container py-5">
        <div class="row mb-5">
            <div class="col-md-3 text-center">
                @if (!auth()->user()->foto)
                    <img src="{{ url('/asset/logo/profile.png') }}" class="mb-2 foto-profile" id="prev">
                @else
                    <img src="{{ url('storage/' . auth()->user()->foto) }}" class="mb-2 foto-profile">
                @endif
            </div>
            <div class="col-md-9">
                <div class="ps-5">
                    <table>
                        <tr class="mb-2">
                            <td>Nama Pelamar</td>
                            <td class="px-5">:</td>
                            <td>{{ auth()->user()->nama }}</td>
                        </tr>
                        <tr class="mb-2">
                            <td>Umur Pelamar</td>
                            <td class="px-5">:</td>
                            <td>{{ $umur }} Tahun</td>
                        </tr>
                        <tr class="mb-2">
                            <td>Jenis Kelamin</td>
                            <td class="px-5">:</td>
                            <td>{{ auth()->user()->kelamin }}</td>
                        </tr>
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
                            <td>{{ $lamaran->telepon }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        @if ($lamaran->status == 'Pending')
            <div class="bg-white w-100 text-center pt-3 px-3 box-status-pending">
                <h4><b>{{ $lamaran->lowongan->nama }}</b> PT {{ $lamaran->perusahaan->nama_perusahaan }}</h4>
                <h5>{{ $lamaran->lowongan->jabatan }}</h5>
                <p>Lamaran Pekerjaan Anda sedang di review oleh Perusahaan Terkait</p>

                <div class="btn btn-secondary">Pending</div>
            </div>
        @endif
        @if ($lamaran->status == 'Terima')
            <div class="bg-white w-100 text-center pt-3 px-3 box-status-success">
                <h4><b>{{ $lamaran->lowongan->nama }}</b> PT {{ $lamaran->perusahaan->nama_perusahaan }}</h4>
                <h5>{{ $lamaran->lowongan->jabatan }}</h5>
                <p>{{$lamaran->pesan}}</p>

                <div class="btn btn-success"><i class="bi bi-check-circle-fill"></i> Diterima</div>
            </div>
        @endif

        @if ($lamaran->status == 'Tolak')
            <div class="bg-white w-100 text-center pt-3 px-3 box-status-danger">
                <h4><b>{{ $lamaran->lowongan->nama }}</b> PT {{ $lamaran->perusahaan->nama_perusahaan }}</h4>
                <h5>{{ $lamaran->lowongan->jabatan }}</h5>
                <p>{{$lamaran->pesan}}</p>

                <div class="btn btn-danger"><i class="bi bi-x-circle"></i> Ditolak</div>
            </div>
        @endif
    </div>
@endsection
