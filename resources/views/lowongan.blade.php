@extends('template.karrir_template')

@section('content')
    <section id="Lowongan" class="py-5">
        <div class="container">
            <div class="row mb-5 ">
                <div class="col-md-5 py-2">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-0" id="basic-addon1"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control border-0" placeholder="Cari Lowongan" aria-label="Cari Lowongan"
                            aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-md-5 py-2">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-0" id="basic-addon1"><i
                                class="bi bi-geo-alt-fill"></i></span>
                        <input type="text" class="form-control border-0" placeholder="Lokasi" aria-label="Lokasi"
                            aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="text-center">
                        <button class="btn btn-secondary bg-primer text-dark border-0 px-5 py-3 btn-search">Cari</button>
                    </div>
                </div>
            </div>
            @foreach ($lowongan as $data)
                <div class="col-md-3">
                    <a href="/lowongan/detail/{{ $data->id }}" class="text-decoration-none text-dark">
                        <div class="card p-2">
                            <div class="d-flex">
                                <div class="text-center">
                                    <img src="{{ URL::asset('storage/' . $data->perusahaan->foto) }}" class="lowongan-logo">
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
    </section>
@endsection