<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">

    <title>Karrir</title>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 bg-primer min-vh-100 p-3">
                <div class="text-center mt-5 mb-3">
                    <img src="{{ asset('asset/logo/nav_logo_provider.png') }}" alt="">
                </div>

                <ul class="list-group list-group-flush ">
                    <li class="list-group-item border-0 bg-transparent mb-3 "><a href="#" class="sidebar-link"><i
                                class="bi bi-columns-gap"></i> Dashboard</a></li>
                    <li class="list-group-item border-0 bg-transparent mb-3 "><a href="#" class="sidebar-link"><i
                                class="bi bi-person-lines-fill"></i> Pelamar Kerja</a></li>
                    <li class="list-group-item border-0 bg-transparent mb-3 "><a href="#" class="sidebar-link"><i
                                class="bi bi-building"></i> Perusahaan</a></li>
                    <li class="list-group-item border-0 bg-transparent mb-3 "><a href="#" class="sidebar-link"><i
                                class="bi bi-briefcase"></i> Lowongan Pekerjaan</a></li>
                    <li class="list-group-item border-0 bg-transparent mb-3 "><a href="/admin/berita" class="sidebar-link"><i
                                class="bi bi-newspaper"></i> Berita</a></li>
                    <li class="list-group-item border-0 bg-transparent mb-3 "><a href="/admin/notifikasi"
                            class="sidebar-link"><i class="bi bi-bell-fill"></i> Notifikasi</a></li>
                    <li class="list-group-item border-0 bg-transparent mb-3 "><a href="/logout" class="sidebar-link"><i
                                class="bi bi-box-arrow-in-left"></i> Logout</a></li>
                </ul>
            </div>
            <div class="col-md-9 p-4">
                @yield('content')

            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
