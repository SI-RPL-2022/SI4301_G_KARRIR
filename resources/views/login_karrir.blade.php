@extends('template.karrir_template')

@section('content')
    <section id="Login" class="bg-sekunder min-vh-100">
        <div class="container px-5 py-5">
            @if (session('pesan'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('pesan') }}
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

			@if (session('berhasil'))
			<div class="alert alert-success alert-dismissible fade show">
				{{ session('berhasil') }}
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		@endif
            <div class="row">
                <div class="col-md-4 bg-white form-login p-4">
                    <div class="p-3">
                        <h3 class="pb-2">Selamat Datang</h3>
                        <h6 class="fw-light pb-2">Masuk Dengan Akunmu</h6>
                    </div>
                    <form action="/login" method="POST" class="mx-2">
						@csrf
                        <input type="email" name="email" placeholder="e-mail" class="form-control mb-4 py-3 px-4">
                        <input type="password" name="password" placeholder="Password" class="form-control mb-4 py-3 px-4">
                        <button type="submit" class="btn btn-primer w-100 p-3">MASUK</button>
                        <div class="text-center my-2">
                            <div class="form-check form-check-inline">
                                <input type="radio" name="role" value="Admin" class="form-check-input">
                                <label class="form-check-label">Admin</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="role" value="Pelamar" class="form-check-input" checked>
                                <label class="form-check-label">Pelamar</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="role" value="Perusahaan" class="form-check-input">
                                <label class="form-check-label">Perusahaan</label>
                            </div>
                        </div>
                    </form>
                    <div class="text-center">
                        <p class="my-2">Lupa Password? <a href="#"
                                class="link-danger text-decoration-none fw-bold">Atur Ulang</a></p>
                        <p class="my-2">Belum Mempunyai Akun? <a href="/karrir/daftar"
                                class="primer fw-bold text-decoration-none">Daftar</a></p>
                    </div>
                </div>
                <div class="col-md-8 p-5 mx-auto">
                    <div class="text-center p-5">
                        <img src="{{ URL::asset('asset/logo/main_logo.png') }}">
                        <h5 class="fw-bold opacity">Kembangkan Karirmu, Maksimalkan Potensimu</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<!-- #halaman login -->