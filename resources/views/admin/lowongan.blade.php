@extends('admin.layout')

@section('content')
    <h2 class="fw-bold">Daftar Lowongan</h2>

    <div class="ps-5">

        {{-- Pending Lowongan --}}
        <h5>Lowongan Belum Diverifikasi</h5>
        @php
            $jumlah_pending = $pending->count();
            $count = 1;
        @endphp
        <div class="row mb-3 ps-2 g-3">
            @foreach ($pending as $data)
                @if ($count <= 3)
                    <div class="col-md-4">
                        <a href="/admin/lowongan/detail/{{ $data->id }}" class="text-decoration-none text-dark">
                            <div class="card p-2">
                                <div class="d-flex">
                                    <div class="text-center">
                                        <img src="{{ URL::asset('storage/' . $data->perusahaan->foto) }}"
                                            class="lowongan-logo">
                                    </div>
                                    <div class="text-start">
                                        <h6 class="text-uppercase">{{ $data->nama }}</h6>
                                        @if ($data->verifikasi == 1)
                                            <p class="lowongan-text text-secondary">Belum Diverifikasi</p>
                                        @endif
                                        @if ($data->verifikasi == 3)
                                            <p class="lowongan-text text-success">Sudah Diverifikasi</p>
                                        @endif
                                        <p class="lowongan-text"><i class="bi bi-geo-alt-fill"></i> {{ $data->lokasi }}
                                        </p>
                                        <p class="lowongan-text"><i class="bi bi-currency-dollar"></i>
                                            {{ $data->gaji }}/Month</p>
                                        <p class="lowongan-text"><i class="bi bi-briefcase-fill"></i> {{ $data->periode }}
                                            Tahun
                                        </p>
                                        <p class="lowongan-text"><i class="bi bi-calendar3"></i>
                                            {{ \Carbon\Carbon::parse($data->regis_start)->format('j F, Y') }} -
                                            {{ \Carbon\Carbon::parse($data->regis_end)->format('j F, Y') }} </p>
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
                        <a href="/admin/lowongan/detail/{{ $data->id }}" class="text-decoration-none text-dark">
                            <div class="card p-2">
                                <div class="d-flex">
                                    <div class="text-center">
                                        <img src="{{ URL::asset('storage/' . $data->perusahaan->foto) }}"
                                            class="lowongan-logo">
                                    </div>
                                    <div class="text-start">
                                        <h6 class="text-uppercase">{{ $data->nama }}</h6>
                                        @if ($data->verifikasi == 1)
                                            <p class="lowongan-text text-secondary">Belum Diverifikasi</p>
                                        @endif
                                        @if ($data->verifikasi == 3)
                                            <p class="lowongan-text text-success">Sudah Diverifikasi</p>
                                        @endif
                                        <p class="lowongan-text"><i class="bi bi-geo-alt-fill"></i> {{ $data->lokasi }}
                                        </p>
                                        <p class="lowongan-text"><i class="bi bi-currency-dollar"></i>
                                            {{ $data->gaji }}/Month</p>
                                        <p class="lowongan-text"><i class="bi bi-briefcase-fill"></i>
                                            {{ $data->periode }}
                                            Tahun
                                        </p>
                                        <p class="lowongan-text"><i class="bi bi-calendar3"></i>
                                            {{ \Carbon\Carbon::parse($data->regis_start)->format('j F, Y') }} -
                                            {{ \Carbon\Carbon::parse($data->regis_end)->format('j F, Y') }} </p>
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


        {{-- Terverifikasi --}}
        <h5>Lowongan Sudah Diverifikasi</h5>
        @php
            $jumlah_accept = $accept->count();
            $count = 1;
        @endphp
        <div class="row mb-3 ps-2 g-3">
            @foreach ($accept as $data)
                @if ($count <= 3)
                    <div class="col-md-4">
                        <a href="/admin/lowongan/detail/{{ $data->id }}" class="text-decoration-none text-dark">
                            <div class="card p-2">
                                <div class="d-flex">
                                    <div class="text-center">
                                        <img src="{{ URL::asset('storage/' . $data->perusahaan->foto) }}"
                                            class="lowongan-logo">
                                    </div>
                                    <div class="text-start">
                                        <h6 class="text-uppercase">{{ $data->nama }}</h6>
                                        @if ($data->verifikasi == 1)
                                            <p class="lowongan-text text-danger">Belum Diverifikasi</p>
                                        @endif
                                        @if ($data->verifikasi == 3)
                                            <p class="lowongan-text text-success">Sudah Diverifikasi</p>
                                        @endif
                                        <p class="lowongan-text"><i class="bi bi-geo-alt-fill"></i> {{ $data->lokasi }}
                                        </p>
                                        <p class="lowongan-text"><i class="bi bi-currency-dollar"></i>
                                            {{ $data->gaji }}/Month</p>
                                        <p class="lowongan-text"><i class="bi bi-briefcase-fill"></i>
                                            {{ $data->periode }}
                                            Tahun
                                        </p>
                                        <p class="lowongan-text"><i class="bi bi-calendar3"></i>
                                            {{ \Carbon\Carbon::parse($data->regis_start)->format('j F, Y') }} -
                                            {{ \Carbon\Carbon::parse($data->regis_end)->format('j F, Y') }} </p>
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
                        <a href="/admin/lowongan/detail/{{ $data->id }}" class="text-decoration-none text-dark">
                            <div class="card p-2">
                                <div class="d-flex">
                                    <div class="text-center">
                                        <img src="{{ URL::asset('storage/' . $data->perusahaan->foto) }}"
                                            class="lowongan-logo">
                                    </div>
                                    <div class="text-start">
                                        <h6 class="text-uppercase">{{ $data->nama }}</h6>
                                        @if ($data->verifikasi == 1)
                                            <p class="lowongan-text text-danger">Belum Diverifikasi</p>
                                        @endif
                                        @if ($data->verifikasi == 3)
                                            <p class="lowongan-text text-success">Sudah Diverifikasi</p>
                                        @endif
                                        <p class="lowongan-text"><i class="bi bi-geo-alt-fill"></i> {{ $data->lokasi }}
                                        </p>
                                        <p class="lowongan-text"><i class="bi bi-currency-dollar"></i>
                                            {{ $data->gaji }}/Month</p>
                                        <p class="lowongan-text"><i class="bi bi-briefcase-fill"></i>
                                            {{ $data->periode }}
                                            Tahun
                                        </p>
                                        <p class="lowongan-text"><i class="bi bi-calendar3"></i>
                                            {{ \Carbon\Carbon::parse($data->regis_start)->format('j F, Y') }} -
                                            {{ \Carbon\Carbon::parse($data->regis_end)->format('j F, Y') }} </p>
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

        <h5>Lowongan Tolak Diverifikasi</h5>
        @php
            $jumlah_tolak = $tolak->count();
            $count = 1;
        @endphp
        <div class="row mb-3 ps-2 g-3">
            @foreach ($tolak as $data)
                @if ($count <= 3)
                    <div class="col-md-4">
                        <a href="/admin/lowongan/detail/{{ $data->id }}" class="text-decoration-none text-dark">
                            <div class="card p-2">
                                <div class="d-flex">
                                    <div class="text-center">
                                        <img src="{{ URL::asset('storage/' . $data->perusahaan->foto) }}"
                                            class="lowongan-logo">
                                    </div>
                                    <div class="text-start">
                                        <h6 class="text-uppercase">{{ $data->nama }}</h6>
                                        @if ($data->verifikasi == 4)
                                            <p class="lowongan-text text-danger">Verifikasi Ditolak</p>
                                        @endif
                                        @if ($data->verifikasi == 3)
                                            <p class="lowongan-text text-success">Sudah Diverifikasi</p>
                                        @endif
                                        <p class="lowongan-text"><i class="bi bi-geo-alt-fill"></i> {{ $data->lokasi }}
                                        </p>
                                        <p class="lowongan-text"><i class="bi bi-currency-dollar"></i>
                                            {{ $data->gaji }}/Month</p>
                                        <p class="lowongan-text"><i class="bi bi-briefcase-fill"></i>
                                            {{ $data->periode }}
                                            Tahun
                                        </p>
                                        <p class="lowongan-text"><i class="bi bi-calendar3"></i>
                                            {{ \Carbon\Carbon::parse($data->regis_start)->format('j F, Y') }} -
                                            {{ \Carbon\Carbon::parse($data->regis_end)->format('j F, Y') }} </p>
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
                        <a href="/admin/lowongan/detail/{{ $data->id }}" class="text-decoration-none text-dark">
                            <div class="card p-2">
                                <div class="d-flex">
                                    <div class="text-center">
                                        <img src="{{ URL::asset('storage/' . $data->perusahaan->foto) }}"
                                            class="lowongan-logo">
                                    </div>
                                    <div class="text-start">
                                        <h6 class="text-uppercase">{{ $data->nama }}</h6>
                                        @if ($data->verifikasi == 4)
                                            <p class="lowongan-text text-danger">Verifikasi Ditolak</p>
                                        @endif
                                        @if ($data->verifikasi == 3)
                                            <p class="lowongan-text text-success">Sudah Diverifikasi</p>
                                        @endif
                                        <p class="lowongan-text"><i class="bi bi-geo-alt-fill"></i> {{ $data->lokasi }}
                                        </p>
                                        <p class="lowongan-text"><i class="bi bi-currency-dollar"></i>
                                            {{ $data->gaji }}/Month</p>
                                        <p class="lowongan-text"><i class="bi bi-briefcase-fill"></i>
                                            {{ $data->periode }}
                                            Tahun
                                        </p>
                                        <p class="lowongan-text"><i class="bi bi-calendar3"></i>
                                            {{ \Carbon\Carbon::parse($data->regis_start)->format('j F, Y') }} -
                                            {{ \Carbon\Carbon::parse($data->regis_end)->format('j F, Y') }} </p>
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
