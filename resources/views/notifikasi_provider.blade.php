@extends('template.karrir_template')

@section('content')
    <div class="mb-3">
        <h3 class="fw-bold bg-light w-100 p-3">NOTIFIKASI</h3>
    </div>

    <div class="bg-informasi-user p-3">

        @foreach ($notifikasi as $data)
            <div class="bg-white m-3 p-3 row">
                <div class="col-md-3">
                    <img src="{{ url('storage/' . $data->perusahaan->foto) }}" alt="" class="foto-profile">
                </div>
                <div class="col-md-6">
                    <p>{{ $data->pesan }}</p>
                </div>

                <div class="col-md-3 p-3">
                    <p class="text-secondary">{{ $data->created_at }}</p>
                    <a href="/notifikasi/detail/{{ $data->id }}" class="bottom-align-text p-3">Lihat Detail</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
