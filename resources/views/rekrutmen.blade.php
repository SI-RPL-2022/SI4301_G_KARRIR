@extends('template.karrir_template')

@section('content')
    <div class="container py-5">
        <div class="mb-3">
            <h2>Data Pelamar</h2>
        </div>
        @foreach ($lamaran as $data)
            <div class="bg-white m-3 p-3 row">
                <div class="col-md-3">
                    <img src="{{ url('storage/' . $data->user->foto) }}" alt="" class="foto-profile">
                </div>
                <div class="col-md-6">
                    <p><b>{{$data->user->nama}}</b> Melamar Di Perusahaan Anda pada Lowongan <b> {{ $data->lowongan->nama }}</b></p>
                </div>

                <div class="col-md-3 p-3">
                    <p class="text-secondary">{{ $data->created_at }}</p>
                    <a href="/provider/rekrutmen/{{ $data->id }}" class="bottom-align-text p-3">Lihat Detail</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
