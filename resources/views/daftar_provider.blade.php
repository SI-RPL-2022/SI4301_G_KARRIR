@extends('template.provider_template')

@section('content')

<section id="DaftarKarrir" class="bg-sekunder min-vh-100">
	<div class="container px-5 pb-5">
		<div class="row">
			<div class="col-md-6 p-4 bg-white form-login">
				<h5 class="fw-bold pb-3">Ayo mulai dengan membuat profil KARRIR-mu.</h5>
				<form action="/provider/login">
					<div class="row">
						<div class="col">
							<input type="text" name="nama_depan" placeholder="Nama Depan" class="form-control mb-4 py-3 px-4">
						</div>
						<div class="col">
							<input type="text" name="nama_belakang" placeholder="Nama Belakang" class="form-control mb-4 py-3 px-4">
						</div>
					</div>
					<div class="row mb-4">
						<div class="col">
							<input type="email" name="email" placeholder="Email Kantor/Perusahaan" class="form-control py-3 px-4">
						</div>
					</div>
					<div class="row mb-4">
						<div class="col">
							<input type="text" name="telepon" placeholder="Telepon" class="form-control py-3 px-4">
						</div>
					</div>
					<div class="row mb-4">
						<div class="col">
							<input type="password" name="password" placeholder="Password" class="form-control py-3 px-4">
						</div>
					</div>
					<div class="row mb-4">
						<div class="col px-3">
							<p class="fw-bold">Dengan mendaftar sebagai Perusahaan, Anda telah menyetujui Syarat dan Ketentuan yang berlaku</p>
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
			<div class="col-md-6 ps-5 py-5">
				<div class="text-center">
					<img src="{{ URL::asset('asset/logo/daftar_provider.png'); }}">
					<h4 class="fw-bold opacity">Bentuk Tim Impianmu dengan KARRIR!</h4>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection