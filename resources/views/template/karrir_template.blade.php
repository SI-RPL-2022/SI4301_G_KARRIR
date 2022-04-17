<!doctype html>
	<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

		<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css'); }}">

		<title>Karrir</title>
	</head>
	<body>

		<nav class="navbar navbar-expand-lg bg-primer">
			<div class="container-fluid">
				<a class="navbar-brand" href="#"><img src="{{ URL::asset('asset/logo/nav_logo_karrir.png'); }}"></a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav me-auto fw-bold text-uppercase">
						<li class="nav-item">
							<a class="nav-link" href="#">Lowongan Pekerjaan</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/provider/login">Provider</a>
						</li>
					</ul>
					<span class="navbar-text">
						<ul class="navbar-nav fw-bold text-uppercase">
							@isset($login)

							<li class="nav-item">
								<a href="#" class="nav-link"><i class="bi bi-bell-fill"></i></a>
							</li>
							<li class="nav-item">
								<div class="btn-group">
									<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
										<i class="bi bi-person-circle"></i>
									</a>
									<ul class="dropdown-menu dropdown-menu-dark dropdown-menu-lg-end">
										<li><a href="/karrir/profile" class="dropdown-item">Peofile</a></li>
										<li><a href="/karrir/login" class="dropdown-item" >Keluar</a></li>
									</ul>
								</div>
							</li>
							@else

							<li class="nav-item">
								<a href="/karrir/daftar" class="nav-link">Daftar</a>
							</li>
							<li class="nav-item">
								<a href="/karrir/login" class="nav-link">Masuk</a>
							</li>
							@endisset
						</ul>
					</span>
				</div>
			</div>
		</nav>

		@yield('content')

		<!-- Option 1: Bootstrap Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	</body>
	</html>