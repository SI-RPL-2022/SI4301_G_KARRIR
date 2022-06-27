@extends('template.karrir_template')

@section('content')
    <div class="container py-5">
        <div class="d-flex">
            <div class="text-center">
                <img src="{{ URL::asset('storage/' . auth()->user()->foto) }}" class="foto-profile">
            </div>
            <div class="m-4 p-2">
                <h5 class="fw-bold">LOWONGAN PEKERJAAN PT {{ auth()->user()->nama_perusahaan }}</h5>
                <a href="/provider/lowongan/create" class="text-decoration-none"><i class="bi bi-plus-circle"></i> Tambahkan
                    Lowongan</a>
            </div>
        </div>
        <div class="row g-4 my-3">
            @foreach ($lowongan as $data)
                <div class="col-md-3">
                    <a href="/provider/lowongan/detail/{{ $data->id }}" class="text-decoration-none text-dark">
                        <div class="card p-2">
                            <div class="d-flex">
                                <div class="text-center">
                                    <img src="{{ URL::asset('storage/' . auth()->user()->foto) }}" class="lowongan-logo">
                                </div>
                                <div class="text-start">
                                    <h6 class="text-uppercase">{{ $data->nama }}</h6>
                                    @if ($data->verifikasi == 1)
                                        <p class="lowongan-text text-danger">Belum Diverifikasi</p>
                                    @endif
                                    @if ($data->verifikasi == 3)
                                        <p class="lowongan-text text-success">Sudah Diverifikasi</p>
                                    @endif
                                    <p class="lowongan-text"><i class="bi bi-geo-alt-fill"></i> {{ $data->lokasi }}</p>
                                    <p class="lowongan-text"><i class="bi bi-currency-dollar"></i>
                                        {{ $data->gaji }}/Month</p>
                                    <p class="lowongan-text"><i class="bi bi-briefcase-fill"></i> {{ $data->periode }}
                                        Tahun
                                    </p>
                                    <p class="lowongan-text"><i class="bi bi-calendar3"></i>
                                        {{ \Carbon\Carbon::parse($data->regis_start)->format('j F, Y') }} -
                                        {{ \Carbon\Carbon::parse($data->regis_end)->format('j F, Y') }} </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
