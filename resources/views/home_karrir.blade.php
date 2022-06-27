@extends('template.karrir_template')

@section('content')
    <div class="container py-5">
        <div class="text-center pb-5">
            <h4 class="fw-bold opacity">Mulai Karirmu, AYO Cari Pekerjaanmu!</h4>
        </div>
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
        <div class="bg-white p-3 w-100 mb-3" style="height: 250px">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner px-5">
                    <div class="carousel-item active">
                        <img src="{{ asset('asset/logo/berita.png') }}" class="d-block w-100" alt="...">
                    </div>
                    @foreach ($berita as $data)
                        <div class="carousel-item">
                            <a href="{{ $data->link }}" class="link-dark text-decoration-none" target="_blank">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{ asset('storage/' . $data->foto) }}" class="img-fluid" alt="...">
                                    </div>
                                    <div class="col">
                                        <h3>{{ $data->judul }}</h3>
                                        <p>{{ $data->deskripsi }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
@endsection
