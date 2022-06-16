@extends('template.karrir_template')

@section('content')
    <div class="container">

        @foreach ($lamaran as $data)
            <div class="bg-white m-3 p-3 row">
                <div class="col-md-3">
                    <img src="{{ url('storage/' . auth()->user()->foto) }}" alt="" class="foto-profile">
                </div>
                <div class="col-md-6">
                    <p>Anda Melamar Di Perusahaan <b> {{ $data->perusahaan->nama_perusahaan }}</b></p>
                </div>

                <div class="col-md-3 p-3">
                    <p class="text-secondary">{{ $data->created_at }}</p>
                    <a href="/karrir/lamaran/{{ $data->id }}" class="bottom-align-text p-3">Lihat Detail</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
