@extends('admin.layout')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <!-- Custom fonts for this template-->
    <link href="{{ url('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ url('css/sb-admin-2.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h2>Admin Dashboard</h2>

    <div class="row row-cols-1 row-cols-md-3">
        <div class="col mb-4">
            <div class="card shadow mb-5 bg-white rounded border-0">
                <div class="card-body row">
                    <div class="col">
                        <p>Total Pelamar Kerja</p>
                        <h3>{{ $user->count() }}</h3>
                    </div>
                    <div class="col-md-5">
                        <div class="progress mx-auto" data-value='{{ $persen_user }}'>
                            <span class="progress-left">
                                <span class="progress-bar border-primary"></span>
                            </span>
                            <span class="progress-right">
                                <span class="progress-bar border-primary"></span>
                            </span>
                            <div
                                class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                <div class="h2 font-weight-bold">{{ $persen_user }}<sup class="small">%</sup></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col mb-4">
            <div class="card shadow mb-5 bg-white rounded border-0">
                <div class="card-body row">
                    <div class="col">
                        <p>Total Perusahaan</p>
                        <h3>{{ $perusahaan_all->count() }}</h3>
                    </div>
                    <div class="col-md-5">
                        <div class="progress mx-auto" data-value='{{ $persen_perusahaan }}'>
                            <span class="progress-left">
                                <span class="progress-bar border-warning"></span>
                            </span>
                            <span class="progress-right">
                                <span class="progress-bar border-warning"></span>
                            </span>
                            <div
                                class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                <div class="h2 font-weight-bold">{{ $persen_perusahaan }}<sup class="small">%</sup></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card shadow mb-5 bg-white rounded border-0">
                <div class="card-body row">
                    <div class="col">
                        <p>Total Lowongan Kerja</p>
                        <h3>{{ $lowongan_all->count() }}</h3>
                    </div>
                    <div class="col-md-5">
                        <div class="progress mx-auto" data-value='{{ $persen_lowongan }}'>
                            <span class="progress-left">
                                <span class="progress-bar border-danger"></span>
                            </span>
                            <span class="progress-right">
                                <span class="progress-bar border-danger"></span>
                            </span>
                            <div
                                class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                <div class="h2 font-weight-bold">{{ $persen_lowongan }}<sup class="small">%</sup></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-xl-8 col-lg-7">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 bg-primer rounded p-3">
            <div class="text-center">
                <img src="{{ url('/asset/logo/profile.png') }}" class="mb-2 foto-profile" id="prev">
                <h3 class="fw-bold text-dark">Admin</h3>
            </div>

            Notifikasi
            @php
                $count = 1;
            @endphp
            @foreach ($notifikasi as $data)
                @if ($count <= 3)
                    <div class="w-100 bg-white p-2 mb-2">
                        {{ Str::limit($data->pesan, 25, '...') }}  <i class="bi bi-circle-fill text-primary ms-4" style="font-size:12px"></i>
                    </div>
                @else
                @break
            @endif
            @php
                $count++;
            @endphp
        @endforeach

    </div>
</div>


<!-- Bootstrap core JavaScript-->
<script src="{{ url('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ url('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ url('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ url('js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ url('vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ url('js/demo/chart-area-demo.js') }}"></script>
<script src="{{ url('js/demo/chart-pie-demo.js') }}"></script>
<script src="{{ url('js/demo/chart-bar-demo.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script>
    $(function() {

        $(".progress").each(function() {

            var value = $(this).attr('data-value');
            var left = $(this).find('.progress-left .progress-bar');
            var right = $(this).find('.progress-right .progress-bar');

            if (value > 0) {
                if (value <= 50) {
                    right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
                } else {
                    right.css('transform', 'rotate(180deg)')
                    left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
                }
            }

        })

        function percentageToDegrees(percentage) {

            return percentage / 100 * 360

        }

    });
</script>
@endsection
