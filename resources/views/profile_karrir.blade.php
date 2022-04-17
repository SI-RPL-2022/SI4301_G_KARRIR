@extends('template.karrir_template')

@section('content')
<section id="Profile">
	<div class="container py-5">
		<div class="row mb-5">
			<div class="col-md-3 text-center">
				<img src="{{url('/asset/logo/profile.png')}}" class="mb-2">
				<p><a href="#" class="text-decoration-none link-secondary"><i class="bi bi-pencil-square"></i> Sunting Data Profil</a></p>
			</div>
			<div class="col-md-9">
				<h3>Tatang Sutarma</h3>
				<h6>25 Tahun</h6>
				<h6>Laki-laki</h6>

				<h6 class="text-uppercase">Informasi Umum</h6>
				<div class="ps-5">
					<table>
						<tr class="mb-2">
							<td>E-mail</td>
							<td class="px-5"> :</td>
							<td>BlaBlaBla@gmail.com</td>
						</tr>
						<tr class="mb-2">
							<td>Lokasi</td>
							<td class="px-5"> :</td>
							<td>BANDUNG, INDONESIA</td>
						</tr>
						<tr class="mb-2">
							<td>Status Kependudukan</td>
							<td class="px-5"> :</td>
							<td>Warga Negara Indonesia</td>
						</tr>
						<tr class="mb-2">
							<td>Telepon</td>
							<td class="px-5"> :</td>
							<td>+628123456789</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="InformasiUser" class="bg-informasi-user py-5">
	<div class="container bg-light py-2">
		<div class="text-center mb-3">
			RESUME
			<hr>
		</div>
		<div class="px-5">
			<div class="my-4">
				<div class="col">
					<h6>TENTANG SAYA</h6>
				</div>
				<div class="col px-5 mx-5">
					<p class="px-5 text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

					<h6 class="text-center fw-bold"><a href="#" class="text-decoration-none text-dark"><i class="bi bi-plus-circle px-4"></i>TAMBAHKAN DESKRIPSI TENTANG SAYA </a></h6>
				</div>
				<hr>

				<div class="col">
					<h6>PENDIDIKAN</h6>
				</div>
				<div class="col px-5 mx-5">
					<p class="px-5 text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

					<h6 class="text-center fw-bold"><a href="#" class="text-decoration-none text-dark"><i class="bi bi-plus-circle px-4"></i>TAMBAHKAN DESKRIPSI PENDIDIKAN </a></h6>
				</div>
				<hr>

				<div class="col">
					<h6>PENGALAMAN KERJA</h6>
				</div>
				<div class="col px-5 mx-5">
					<p class="px-5 text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

					<h6 class="text-center fw-bold"><a href="#" class="text-decoration-none text-dark"><i class="bi bi-plus-circle px-4"></i>TAMBAHKAN DESKRIPSI PENGALAMAN KERJA </a></h6>
				</div>
				<hr>

				<div class="col">
					<h6>SERTIFIKASI</h6>
				</div>
				<div class="col px-5 mx-5">
					<p class="px-5 text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

					<h6 class="text-center fw-bold"><a href="#" class="text-decoration-none text-dark"><i class="bi bi-plus-circle px-4"></i>TAMBAHKAN DESKRIPSI SERTIFIKASI </a></h6>
				</div>
				<hr>
			</div>
		</div>
	</div>
</section>
@endsection