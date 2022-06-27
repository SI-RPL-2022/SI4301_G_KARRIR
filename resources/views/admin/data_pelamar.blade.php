@extends('admin.layout')

@section('content')
    <h2 class="fw-bold mb-3">Data Pelamar</h2>
    <div class="">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Lamaran</th>
                    <th>Nama Lowongan</th>
                    <th>Nama Perusahaan</th>
                    <th>Nama Pelamar</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lamaran as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->lowongan->nama }}</td>
                        <td>{{ $data->perusahaan->nama_perusahaan }}</td>
                        <td>{{ $data->user->nama }}</td>
                        <td>
                            @if ($data->status == 'Pending')
                                <a href="#" class="btn btn-secondary">Pending</a>
                            @endif

                            @if ($data->status == 'Terima')
                                <a href="#" class="btn btn-success">Diterima</a>
                            @endif

                            @if ($data->status == 'Tolak')
                                <a href="#" class="btn btn-danger">Ditolak</a>
                            @endif
                        </td>
                        <td><a href="/admin/lamaran/detail/{{ $data->id }}" class="btn btn-primary">Detail</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
