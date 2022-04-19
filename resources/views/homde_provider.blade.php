@extends('template.provider_template')

@section('content')

<div class="container py-5">
	<div class="d-flex">
		<div class="text-center">
			<img src="{{ URL::asset('/asset/logo/logo_perusahaan.png') }}">
		</div>
		<div class="m-4 p-2">
			<h5 class="fw-bold">LOWONGAN PEKERJAAN PT.LION PARCEL</h5>
			<a href="#" class="text-decoration-none"><i class="bi bi-plus-circle"></i> Tambahkan Lowongan</a>
		</div>
	</div>
	<div class="row g-4 my-3">
		@for($i=0;$i<8;$i++)
		<div class="col-md-3">
			<div class="card p-2">
				<div class="d-flex">
					<div class="text-center">
						<img src="{{ URL::asset('/asset/logo/logo_perusahaan.png') }}" class="lowongan-logo">
					</div>
					<div class="text-start">
						<h5 class="text-uppercase">sowftware qa</h5>
						<p class="lowongan-text"><i class="bi bi-geo-alt-fill"></i> Jakarta, Indonesia</p>
						<p class="lowongan-text"><i class="bi bi-currency-dollar"></i> IDR 6.000.000-10.000.000/Month</p>
						<p class="lowongan-text"><i class="bi bi-briefcase-fill"></i> 2-4 Tahun</p>
						<p class="lowongan-text"><i class="bi bi-calendar3"></i> 20 Maret - 20 Juni</p>
					</div>
				</div>
			</div>
		</div>
		@endfor
	</div>
</div>

@endsection