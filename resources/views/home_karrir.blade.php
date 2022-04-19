@extends('template.karrir_template')

@section('content')
<div class="container py-5">
	<div class="text-center pb-5">
		<h4 class="fw-bold opacity">Mulai Karirmu, AYO Cari Pekerjaanmu!</h4>
	</div>
	<div class="row">
		<div class="col-md-5 py-2">
			<div class="input-group">
				<span class="input-group-text bg-white border-0" id="basic-addon1"><i class="bi bi-search"></i></span>
				<input type="text" class="form-control border-0" placeholder="Cari Lowongan" aria-label="Cari Lowongan" aria-describedby="basic-addon1">
			</div>
		</div>
		<div class="col-md-5 py-2">
			<div class="input-group">
				<span class="input-group-text bg-white border-0" id="basic-addon1"><i class="bi bi-geo-alt-fill"></i></span>
				<input type="text" class="form-control border-0" placeholder="Lokasi" aria-label="Lokasi" aria-describedby="basic-addon1">
			</div>
		</div>
		<div class="col-md-2">
			<div class="text-center">
				<button class="btn btn-secondary bg-primer text-dark border-0 px-5 py-3 btn-search">Cari</button>
			</div>
		</div>
	</div>
</div>
@endsection