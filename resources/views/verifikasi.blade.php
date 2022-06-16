@extends('template.karrir_template')

@section('content')
<section id="Profile">
	<form action="/daftar/verifikasi/{{Auth::guard('perusahaan')->user()->id}}" method="POST" class="form-login" runat="server" enctype="multipart/form-data">
		@csrf
		<div class="container py-5">
			<div class="text-center mb-5">
				<h1>LENGKAPI PROFIL PERUSAHAAN</h1>
			</div>
			<div class="row mb-5">
				<div class="col-md-3 text-center">
					@if(!(Auth::guard('perusahaan')->user()->foto))
					<img src="{{url('/asset/logo/profile.png')}}" class="mb-2 foto-profile" id="prev">
					@else
					<img src="{{url('storage/'. Auth::guard('perusahaan')->user()->foto)}}" class="mb-2 foto-profile">
					@endif

					

					<!-- Button trigger modal -->
					<button type="button" class="bg-transparent border-0 text-decoration-none link-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
						<i class="bi bi-pencil-square"></i> Sunting Data Profil
					</button>
				</div>
				<div class="col-md-9">
					<h3 >Profil Perusahaan</h3>
					<h5 class="my-3 fw-bold">{{Auth::guard('perusahaan')->user()->nama_perusahaan}}</h5>

					<p class="text-uppercase">Informasi Umum</p>
					<div class="ps-5">
						<table>
							<tr>
								<td class="py-3">E-mail</td>
								<td class="px-5"> :</td>
								<td id="email-text">{{ Auth::guard('perusahaan')->user()->email }}</td>
							</tr>
							<tr>
								<td class="py-3">Lokasi</td>
								<td class="px-5"> :</td>
								<td id="alamat-text">{{ Auth::guard('perusahaan')->user()->alamat }}</td>
							</tr>
							<tr>
								<td class="py-3">Industri</td>
								<td class="px-5"> :</td>
								<td id="industri-text">{{ Auth::guard('perusahaan')->user()->industri }}</td>
							</tr>
							<tr>
								<td class="py-3">Telepon</td>
								<td class="px-5"> :</td>
								<td id="telepon-text">{{ Auth::guard('perusahaan')->user()->telepon }}</td>
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
						<h6>TENTANG KAMI</h6>
					</div>
					<div class="col px-5 mx-5">
						<p class="text-center"  id="deskripsi-text">
							@if(!(Auth::guard('perusahaan')->user()->tentang_kami))

							Isi deskripsi perusahaanmu supaya pelamar dapat mengetahui informasi terkait perusahaan yang kamu miliki

							@else

							{{ Auth::guard('perusahaan')->user()->tentang_kami }}

							@endif
						</p>

						<div class="text-center">
							<button type="button" class="bg-transparent border-0 text-decoration-none link-secondary" data-bs-toggle="modal" data-bs-target="#deskripsiModal">
								<h6 class="fw-bold">
									<i class="bi bi-plus-circle px-4"></i>TAMBAHKAN DESKRIPSI TENTANG KAMI
								</h6>
							</button>

						</div>
					</div>
					<hr>

					<div class="col">
						<h6>VISI</h6>
					</div>
					<div class="col px-5 mx-5">
						<p class="px-5 text-center" id="visi-text">
							@if(!(Auth::guard('perusahaan')->user()->visi))

							Isi Visi perusahaanmu supaya pelamar dapat mengetahui visi yang terdapat di perusahaan kamu


							@else

							{{ Auth::guard('perusahaan')->user()->visi }}

							@endif
						</p>

						<div class="text-center">
							<button type="button" class="bg-transparent border-0 text-decoration-none link-secondary" data-bs-toggle="modal" data-bs-target="#visiModal">
								<h6 class="fw-bold">
									<i class="bi bi-plus-circle px-4"></i>TAMBAHKAN DESKRIPSI Visi
								</h6>
							</button>

						</div>
					</div>
					<hr>

					<div class="col">
						<h6>MISI</h6>
					</div>
					<div class="col px-5 mx-5">
						<p class="px-5 text-center" id="misi-text">
							@if(!(Auth::guard('perusahaan')->user()->misi))

							Isi Misi perusahaanmu supaya pelamar dapat mengetahui misi yang terdapat di perusahaan kamu


							@else

							{{ Auth::guard('perusahaan')->user()->misi }}

							@endif
						</p>

						<div class="text-center">
							<button type="button" class="bg-transparent border-0 text-decoration-none link-secondary" data-bs-toggle="modal" data-bs-target="#misiModal">
								<h6 class="fw-bold">
									<i class="bi bi-plus-circle px-4"></i>TAMBAHKAN DESKRIPSI misi
								</h6>
							</button>

						</div>
					</div>
					<hr>

					<div class="d-flex justify-content-center">
						<button type="reset" class="btn btn-primer px-5 py-3 mx-5 bg-danger">Batal</button>
						<button type="submit" class="btn btn-primer px-5 py-3 nx-5">Simpan</button>
					</div>
				</div>
			</div>
		</div>




		<!--INFOOOOO Modal -->
		<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">INFORMASI UMUM</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="text-center">
							<img src="{{url('/asset/logo/profile.png')}}" class="mb-2 foto-profile" id="blah">
						</div>
						<div class="text-center">
							<label for="imgInp"> 
								<i class="bi bi-camera-fill" id="icon"></i>
							</label>
							<input class="fileInput" type="file" name="foto" id="imgInp" accept="image/png, image/jpeg" required>
						</div>

						<p>Email<br><b>{{Auth::guard('perusahaan')->user()->email}}</b></p>

						<input type="email" name="email" class="form-control bg-sekunder-2 mb-3" placeholder="Perbarui Email" id="email" value="{{Auth::guard('perusahaan')->user()->email}}">

						<input type="number" name="telepon" class="form-control bg-sekunder-2 mb-3" placeholder="Telepon" id="telepon" value="{{Auth::guard('perusahaan')->user()->telepon}}">

						<input type="text" name="alamat" class="form-control bg-sekunder-2 mb-3" placeholder="Alamat" id="alamat">

						<input type="text" name="industri" class="form-control bg-sekunder-2 mb-3" placeholder="Industri Perusahaan" id="industri">

					</div>
					<div class="modal-footer">
						<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
						<button type="button" class="btn btn-primary" onclick="simpanInfo()" data-bs-dismiss="modal">Simpan</button>
					</div>
				</div>
			</div>
		</div>


		<!--DESKRIPSIIIIIIIIIII Modal -->
		<div class="modal fade" id="deskripsiModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">TENTANG KAMI</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body text-center">
						<p>Isi deskripsi perusahaanmu supaya pelamar dapat mengetahui informasi terkait perusahaan yang kamu miliki</p>

						<textarea class="form-control" rows="4" name="deskripsi" placeholder="Isi Deskripsi ..." id="deskripsi"></textarea>
					</div>
					<div class="modal-footer">
						<button type="button" data-bs-dismiss="modal" onclick="simpanDeskripsi()" class="btn btn-primary px-5">Simpan</button>
					</div>
				</div>
			</div>
		</div>

		<!-- VISIIIIIIIIIII Modal -->
		<div class="modal fade" id="visiModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">Visi</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body text-center">
						<p>Isi visi perusahaanmu supaya pelamar dapat mengetahui informasi terkait perusahaan yang kamu miliki</p>

						<textarea class="form-control" rows="4" name="visi" placeholder="Isi Visi ..." id="visi"></textarea>
					</div>
					<div class="modal-footer">
						<button type="button" data-bs-dismiss="modal" onclick="simpanVisi()" class="btn btn-primary px-5">Simpan</button>
					</div>
				</div>
			</div>
		</div>

		<!--MISIIIIIIIIII Modal -->
		<div class="modal fade" id="misiModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="staticBackdropLabel">TENTANG KAMI</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body text-center">
						<p>Isi misi perusahaanmu supaya pelamar dapat mengetahui informasi terkait perusahaan yang kamu miliki</p>

						<textarea class="form-control" rows="4" name="misi" placeholder="Isi Misi ..." id="misi"></textarea>
					</div>
					<div class="modal-footer">
						<button type="button" data-bs-dismiss="modal" onclick="simpanMisi()" class="btn btn-primary px-5">Simpan</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</section>


<script type="text/javascript">

	// function previewImage() {
		
	// 	const image = document.querySelector('#foto-profile');
	// 	const imgPrev = document.querySelector('.foto-profile');

	// 	imgPrev.style.display = 'block';

	// 	const oFReader = new FileReader();
	// 	oFReader.readAsDataURL(image.files[0]);

	// 	oFReader.onload = function(oFREvent){
	// 		imgPrev.src = oFREvent.target.result;
	// 	}

	// }

	imgInp.onchange = evt => {
		const [file] = imgInp.files
		if (file) {
			blah.src = URL.createObjectURL(file)
		}
	}

	function simpanInfo() {

		const [file] = imgInp.files
		if (file) {
			prev.src = URL.createObjectURL(file)
		}

		var email = document.getElementById('email').value;
		var telepon = document.getElementById('telepon').value;
		var industri = document.getElementById('industri').value;
		var alamat = document.getElementById('alamat').value;

		document.getElementById('email-text').innerHTML = email;
		document.getElementById('telepon-text').innerHTML = telepon;
		document.getElementById('industri-text').innerHTML = industri;
		document.getElementById('alamat-text').innerHTML = alamat;

	}

	function simpanDeskripsi() {
		var deskripsi = document.getElementById('deskripsi').value;
		
		document.getElementById('deskripsi-text').innerHTML = deskripsi;

	}

	function simpanVisi() {
		var visi = document.getElementById('visi').value;
		
		document.getElementById('visi-text').innerHTML = visi;

	}

	function simpanMisi() {
		var misi = document.getElementById('misi').value;
		
		document.getElementById('misi-text').innerHTML = misi;

	}


</script>
@endsection