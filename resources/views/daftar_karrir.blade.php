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
			<div class="col-md-7 p-5 bg-white form-login">
				<h5 class="fw-bold pb-3">Ayo mulai berKARRIR!</h5>
				<form action="/daftar" method="POST">
					@csrf
					<div class="row">
						<div class="col">
							<input type="text" name="nama" placeholder="Nama Lengkap/Nama Perusahaan" class="form-control mb-4 py-3 px-4">
						</div>
					</div>
					<div class="row">
						<div class="col">
							<select class="form-select mb-4 py-3 px-4" name="role">
								<option selected disabled hidden>Roles</option>
								<option>Pelamar</option>
								<option>Perusahaan</option>
							</select>
						</div>
						<div class="col">
							<select class="form-select mb-4 py-3 px-4" name="status">
								<option selected disabled hidden>Status Kependudukan</option>
								<option>WNA</option>
								<option>WNI</option>
							</select>
						</div>
					</div>
					<div class="row mb-2">
						<div class="col">
							<input type="email" name="email" placeholder="Email" class="form-control mb-4 py-3 px-4">
						</div>
						<div class="col">
							<input type="password" name="password" placeholder="Password" class="form-control mb-4 py-3 px-4">
						</div>
					</div>
					<div class="row mb-2">
						<div class="col">
							<input type="number" name="telepon" placeholder="Telepon" class="form-control mb-4 py-3 px-4">
						</div>
						<div class="col">
							<div class="form-text">*Informasi ini dibutuhkan agar perusahaan dapat menghubungimu</div>
						</div>
					</div>
					<div class="row">
						<div class="text-center">
							<button type="submit" class="btn btn-primer py-3 w-50">Daftar</button>
							<p class="form-text pb-0 mb-0">Sudah Punya Akun? <a href="/karrir/login" class="primer">Masuk</a></p>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

@endsection