@extends('template.karrir_template')

@section('content')

<section id="DaftarKarrir" class="bg-sekunder min-vh-100">
	<div class="container pb-5">
		<div class="row">
			<div class="col-md-5 py-5">
				<div class="text-center">
					<img src="{{ URL::asset('asset/logo/daftar_karrir.png'); }}">
					<h4 class="fw-bold opacity">KARRIR Menyediakan Lowongan Pekerjaan Baru Setiap Bulannya</h4>
				</div>
			</div>
			<div class="col-md-7 p-4 bg-white form-login">
				<h5 class="fw-bold pb-3">Ayo mulai dengan membuat profil KARRIR-mu.</h5>
				<form action="/karrir/login">
					<div class="row">
						<div class="col">
							<input type="text" name="nama_depan" placeholder="Nama Depan" class="form-control mb-4 py-3 px-4">
						</div>
						<div class="col">
							<input type="text" name="nama_belakang" placeholder="Nama Belakang" class="form-control mb-4 py-3 px-4">
						</div>
					</div>
					<div class="row">
						<div class="col">
							<input type="email" name="email" placeholder="Email" class="form-control mb-4 py-3 px-4">
						</div>
						<div class="col">
							<input type="password" name="password" placeholder="Password" class="form-control mb-4 py-3 px-4">
						</div>
					</div>
					<div class="row mb-2">
						<div class="col">
							<label class="form-label">Masukkan Lokasimu</label>
							<select class="form-select text-uppercase">
								<option>Bandung Indonesia</option>
							</select>
						</div>
						<div class="col">
							<input type="text" name="telepon" placeholder="Telepon" class="form-control py-3 px-4">
							<div class="form-text">Informasi ini dibutuhkan agar perusahaan dapat menghubungimu</div>
						</div>
					</div>
					<div class="row">
						<div class="text-center">
							<button type="submit" class="btn btn-primer py-3 w-50">Daftar</button>
							<p class="form-text pb-0 mb-0">Sudah Punya Akun? <a href="/karrir/login" class="primer">Masuk</a></p>
							<a href="#" class="fw-bold primer">Daftar Sebagai Perusahaan</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

@endsection