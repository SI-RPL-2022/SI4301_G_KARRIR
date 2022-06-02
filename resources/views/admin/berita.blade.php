@extends('admin.layout')

@section('content')
    <div class="mb-3">
        <h3>Berita</h3>
    </div>

    <div class="bg-white p-3 w-100 mb-3">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner px-5">
                <div class="carousel-item active">
                    <img src="{{ asset('asset/logo/berita.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('asset/logo/berita.png') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('asset/logo/berita.png') }}" class="d-block w-100" alt="...">
                </div>
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

    <div class="bg-white p-3">
        <div class="col-md-6 mx-auto">
            <div class="text-center">
                <div class="mb-3">
                    <h3>Tambah Berita</h3>
                </div>
                <form action="#" class="form-login">
                    <div class="mb-3">

                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Judul Berita">
                    </div>

                    <div class="mb-3">

                        <input type="text" name="link" id="link" class="form-control" placeholder="Link Berita">
                    </div>

                    <div class="mb-3">

                        <textarea name="deskripsi" id="" class="form-control" rows="3" placeholder="Tesxt Berita"></textarea>
                    </div>

                    <div class="mb-3">

                        <input type="file" class="form-control">
                    </div>


                    <div class="d-flex justify-content-center">
                        <button type="submit" name="tolak" value="yes"
                            class="btn btn-primer px-5 py-3 mx-5 bg-danger">Tolak</button>
                        <button type="submit" name="konfirmasi" value="yes"
                            class="btn btn-primer px-5 py-3 mx-5">Konfirmasi</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
