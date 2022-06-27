@extends('admin.layout')

@section('content')
    <h2 class="fw-bold">Data Perusahaan</h2>

    <div class="ps-5">
        {{-- Pending Lowongan --}}
        <h5>Perusahaan Belum Diverifikasi</h5>
        @php
            $jumlah_pending = $pending->count();
            $count = 1;
        @endphp
        <div class="row mb-3 ps-2 g-3">
            @foreach ($pending as $data)
                @if ($count <= 3)
                    <div class="col-md-4">
                        <a href="/admin/perusahaan/detail/{{ $data->id }}" class="text-decoration-none text-dark">
                            <div class="card p-2">
                                <div class="d-flex">
                                    <div class="text-center">
                                        <img src="{{ URL::asset('storage/' . $data->foto) }}"
                                            class="lowongan-logo">
                                    </div>
                                    <div class="text-start">
                                        <h6 class="text-uppercase">PT {{ $data->nama_perusahaan }}</h6>
                                        @if ($data->verifikasi == 1)
                                            <p class="lowongan-text text-secondary">Belum Diverifikasi</p>
                                        @endif
                                        @if ($data->verifikasi == 3)
                                            <p class="lowongan-text text-success">Sudah Diverifikasi</p>
                                        @endif
                                        <p class="lowongan-text fw-bold">Deskripsi Perusahaan</p>
                                        <p class="lowongan-text fw-bold ms-3">{{ Str::limit($data->tentang_kami, 50, '...') }}</p>
                                        <p class="lowongan-text"><i class="bi bi-geo-alt-fill"></i> {{ $data->alamat }}
                                        </p>
                                        <p class="lowongan-text"><i class="bi bi-people-fill"></i> 1000 Orang
                                        </p>
                                        <p class="lowongan-text"><i class="bi bi-bulding"> Industri {{ $data->industri }}</i></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
                @php
                    $count++;
                @endphp
            @endforeach
        </div>

        @php
            $count = 1;
        @endphp
        <div class="row mb-3 ps-2 g-3" id="pending-view" style="display: none">
            @foreach ($pending as $data)
                @if ($count > 3)
                    <div class="col-md-4">
                        <a href="/admin/perusahaan/detail/{{ $data->id }}" class="text-decoration-none text-dark">
                            <div class="card p-2">
                                <div class="d-flex">
                                    <div class="text-center">
                                        <img src="{{ URL::asset('storage/' . $data->foto) }}"
                                            class="lowongan-logo">
                                    </div>
                                    <div class="text-start">
                                        <h6 class="text-uppercase">PT {{ $data->nama_perusahaan }}</h6>
                                        @if ($data->verifikasi == 1)
                                            <p class="lowongan-text text-secondary">Belum Diverifikasi</p>
                                        @endif
                                        @if ($data->verifikasi == 3)
                                            <p class="lowongan-text text-success">Sudah Diverifikasi</p>
                                        @endif
                                        <p class="lowongan-text fw-bold">Deskripsi Perusahaan</p>
                                        <p class="lowongan-text fw-bold ms-3">{{ Str::limit($data->tentang_kami, 50, '...') }}</p>
                                        <p class="lowongan-text"><i class="bi bi-geo-alt-fill"></i> {{ $data->alamat }}
                                        </p>
                                        <p class="lowongan-text"><i class="bi bi-people-fill"></i> 1000 Orang
                                        </p>
                                        <p class="lowongan-text"><i class="bi bi-bulding"> Industri {{ $data->industri }}</i></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
                @php
                    $count++;
                @endphp
            @endforeach
        </div>
        @if ($jumlah_pending > 3)
            <div class="w-100 text-end">
                <button id="pending" class="btn btn-primer">See More <i class="bi bi-caret-down-fill"></i></button>
            </div>
        @endif

        @if ($jumlah_pending == 0)
        <a href="#" class="btn btn-primer px-5 py-3 mx-5">Tidak ada</a>
        @endif



        {{-- Accept Lowongan --}}
        <h5>Lowongan Sudah Diverifikasi</h5>
        @php
            $jumlah_accept = $accept->count();
            $count = 1;
        @endphp
        <div class="row mb-3 ps-2 g-3">
            @foreach ($accept as $data)
                @if ($count <= 3)
                    <div class="col-md-4">
                        <a href="/admin/perusahaan/detail/{{ $data->id }}" class="text-decoration-none text-dark">
                            <div class="card p-2">
                                <div class="d-flex">
                                    <div class="text-center">
                                        <img src="{{ URL::asset('storage/' . $data->foto) }}"
                                            class="lowongan-logo">
                                    </div>
                                    <div class="text-start">
                                        <h6 class="text-uppercase">PT {{ $data->nama_perusahaan }}</h6>
                                        @if ($data->verifikasi == 1)
                                            <p class="lowongan-text text-secondary">Belum Diverifikasi</p>
                                        @endif
                                        @if ($data->verifikasi == 3)
                                            <p class="lowongan-text text-success">Sudah Diverifikasi</p>
                                        @endif
                                        <p class="lowongan-text fw-bold">Deskripsi Perusahaan</p>
                                        <p class="lowongan-text fw-bold ms-3">{{ Str::limit($data->tentang_kami, 50, '...') }}</p>
                                        <p class="lowongan-text"><i class="bi bi-geo-alt-fill"></i> {{ $data->alamat }}
                                        </p>
                                        <p class="lowongan-text"><i class="bi bi-people-fill"></i> 1000 Orang
                                        </p>
                                        <p class="lowongan-text"><i class="bi bi-bulding"> Industri {{ $data->industri }}</i></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
                @php
                    $count++;
                @endphp
            @endforeach
        </div>

        @php
            $count = 1;
        @endphp
        <div class="row mb-3 ps-2 g-3" id="accept-view" style="display: none">
            @foreach ($accept as $data)
                @if ($count > 3)
                    <div class="col-md-4">
                        <a href="/admin/perusahaan/detail/{{ $data->id }}" class="text-decoration-none text-dark">
                            <div class="card p-2">
                                <div class="d-flex">
                                    <div class="text-center">
                                        <img src="{{ URL::asset('storage/' . $data->foto) }}"
                                            class="lowongan-logo">
                                    </div>
                                    <div class="text-start">
                                        <h6 class="text-uppercase">PT {{ $data->nama_perusahaan }}</h6>
                                        @if ($data->verifikasi == 1)
                                            <p class="lowongan-text text-secondary">Belum Diverifikasi</p>
                                        @endif
                                        @if ($data->verifikasi == 3)
                                            <p class="lowongan-text text-success">Sudah Diverifikasi</p>
                                        @endif
                                        <p class="lowongan-text fw-bold">Deskripsi Perusahaan</p>
                                        <p class="lowongan-text fw-bold ms-3">{{ Str::limit($data->tentang_kami, 50, '...') }}</p>
                                        <p class="lowongan-text"><i class="bi bi-geo-alt-fill"></i> {{ $data->alamat }}
                                        </p>
                                        <p class="lowongan-text"><i class="bi bi-people-fill"></i> 1000 Orang
                                        </p>
                                        <p class="lowongan-text"><i class="bi bi-bulding"> Industri {{ $data->industri }}</i></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
                @php
                    $count++;
                @endphp
            @endforeach
        </div>
        @if ($jumlah_accept > 3)
            <div class="w-100 text-end">
                <button id="accept" class="btn btn-primer">See More <i class="bi bi-caret-down-fill"></i></button>
            </div>
        @endif

        @if ($jumlah_accept == 0)
        <a href="#" class="btn btn-primer px-5 py-3 mx-5">Tidak ada</a>
        @endif


        {{-- Toal Lowongan --}}
        <h5>Perusahaan Tolak Diverifikasi</h5>
        @php
            $jumlah_tolak = $tolak->count();
            $count = 1;
        @endphp
        <div class="row mb-3 ps-2 g-3">
            @foreach ($tolak as $data)
                @if ($count <= 3)
                    <div class="col-md-4">
                        <a href="/admin/perusahaan/detail/{{ $data->id }}" class="text-decoration-none text-dark">
                            <div class="card p-2">
                                <div class="d-flex">
                                    <div class="text-center">
                                        <img src="{{ URL::asset('storage/' . $data->foto) }}"
                                            class="lowongan-logo">
                                    </div>
                                    <div class="text-start">
                                        <h6 class="text-uppercase">PT {{ $data->nama_perusahaan }}</h6>
                                        @if ($data->verifikasi == 1)
                                            <p class="lowongan-text text-secondary">Belum Diverifikasi</p>
                                        @endif
                                        @if ($data->verifikasi == 3)
                                            <p class="lowongan-text text-success">Sudah Diverifikasi</p>
                                        @endif
                                        <p class="lowongan-text fw-bold">Deskripsi Perusahaan</p>
                                        <p class="lowongan-text fw-bold ms-3">{{ Str::limit($data->tentang_kami, 50, '...') }}</p>
                                        <p class="lowongan-text"><i class="bi bi-geo-alt-fill"></i> {{ $data->alamat }}
                                        </p>
                                        <p class="lowongan-text"><i class="bi bi-people-fill"></i> 1000 Orang
                                        </p>
                                        <p class="lowongan-text"><i class="bi bi-bulding"> Industri {{ $data->industri }}</i></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
                @php
                    $count++;
                @endphp
            @endforeach
        </div>

        @php
            $count = 1;
        @endphp
        <div class="row mb-3 ps-2 g-3" id="tolak-view" style="display: none">
            @foreach ($tolak as $data)
                @if ($count > 3)
                    <div class="col-md-4">
                        <a href="/admin/perusahaan/detail/{{ $data->id }}" class="text-decoration-none text-dark">
                            <div class="card p-2">
                                <div class="d-flex">
                                    <div class="text-center">
                                        <img src="{{ URL::asset('storage/' . $data->foto) }}"
                                            class="lowongan-logo">
                                    </div>
                                    <div class="text-start">
                                        <h6 class="text-uppercase">PT {{ $data->nama_perusahaan }}</h6>
                                        @if ($data->verifikasi == 1)
                                            <p class="lowongan-text text-secondary">Belum Diverifikasi</p>
                                        @endif
                                        @if ($data->verifikasi == 3)
                                            <p class="lowongan-text text-success">Sudah Diverifikasi</p>
                                        @endif
                                        <p class="lowongan-text fw-bold">Deskripsi Perusahaan</p>
                                        <p class="lowongan-text fw-bold ms-3">{{ Str::limit($data->tentang_kami, 50, '...') }}</p>
                                        <p class="lowongan-text"><i class="bi bi-geo-alt-fill"></i> {{ $data->alamat }}
                                        </p>
                                        <p class="lowongan-text"><i class="bi bi-people-fill"></i> 1000 Orang
                                        </p>
                                        <p class="lowongan-text"><i class="bi bi-bulding"> Industri {{ $data->industri }}</i></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
                @php
                    $count++;
                @endphp
            @endforeach
        </div>
        @if ($jumlah_tolak > 3)
            <div class="w-100 text-end">
                <button id="tolak" class="btn btn-primer">See More <i class="bi bi-caret-down-fill"></i></button>
            </div>
        @endif

        @if ($jumlah_tolak == 0)
        <a href="#" class="btn btn-primer px-5 py-3 mx-5">Tidak ada</a>
        @endif
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
    <script>
        // Button Pending
        $("button#pending").click(function() {
            $("div#pending-view").slideToggle("fast");
            var $this = $(this);
            $this.toggleClass("open");

            if ($this.hasClass("open")) {
                $this.html("See Less <i class='bi bi-caret-up-fill'></i>");
            } else {
                $this.html("See more <i class='bi bi-caret-down-fill'></i>");
            }
        });

        // Button Accept
        $("button#accept").click(function() {
            $("div#accept-view").slideToggle("fast");
            var $this = $(this);
            $this.toggleClass("open");

            if ($this.hasClass("open")) {
                $this.html("See Less <i class='bi bi-caret-up-fill'></i>");
            } else {
                $this.html("See more <i class='bi bi-caret-down-fill'></i>");
            }
        });

        // Button Tolak
        $("button#tolak").click(function() {
            $("div#tolak-view").slideToggle("fast");
            var $this = $(this);
            $this.toggleClass("open");

            if ($this.hasClass("open")) {
                $this.html("See Less <i class='bi bi-caret-up-fill'></i>");
            } else {
                $this.html("See more <i class='bi bi-caret-down-fill'></i>");
            }
        });
    </script>
@endsection
