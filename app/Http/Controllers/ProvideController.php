<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use App\Models\Lowongan;
use App\Models\Notifikasi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        $lowongan = Lowongan::where('perusahaan_id','=',auth()->user()->id)->get();
        return view('lowongan_provider', compact('lowongan'));
    }

    public function create_lowongan()
    {   
        return view('create_lowongan');
    }

    public function store_lowongan(Request $request)
    {
        $validated = $request->validate([

            'nama' => 'required|max:255',
            'email' => 'required|email',
            'jabatan' => 'required',
            'lokasi' => 'required',
            'tipe' => 'required',
            'gaji_start' => 'required',
            'gaji_end' => 'required',
            'periode_start' => 'required',
            'periode_end' => 'required',
            'regis_start' => 'required',
            'regis_end' => 'required',
            'deskripsi' => 'required'

        ]);

        $lowongan = new Lowongan();
        $lowongan->nama = $request->nama;
        $lowongan->email = $request->email;
        $lowongan->jabatan = $request->jabatan;
        $lowongan->lokasi = $request->lokasi;
        $lowongan->tipe = $request->tipe;
        $lowongan->gaji = $request->duit." ".$request->gaji_start." - ".$request->gaji_end;
        $lowongan->periode = $request->periode_start." - ".$request->periode_end;
        $lowongan->regis_start = $request->regis_start;
        $lowongan->regis_end = $request->regis_end;
        $lowongan->deskripsi = $request->deskripsi;
        $lowongan->perusahaan_id = auth()->user()->id;
        $lowongan->save();

        $notif = new Notifikasi();
        $notif->perusahaan_id = auth()->user()->id;
        $notif->pesan = "Perusahaan " . auth()->user()->nama_perusahaan . " Meminta verifikasi Lowongan";
        $notif->tipe = "Verifikasi Lowongan";
        $notif->lowongan_id = $lowongan->id;
        $notif->save();

        return redirect('/provider/lowongan');
    }

    public function detail_lowongan($id)
    {
        $lowongan = Lowongan::find($id)->first();

        return view('detail_lowongan', compact('lowongan'));
    }

    public function update_lowongan($id)
    {
        $lowongan = Lowongan::find($id)->first();

        $gaji = explode(" ", $lowongan->gaji);
        $duit = $gaji[0];
        $gaji_awal = $gaji[1];
        $gaji_akhir = $gaji[3];

        $pengalaman = explode(" ", $lowongan->periode);
        $pengalaman_min = $pengalaman[0];
        $pengalaman_max = $pengalaman[2];

        return view('update_lowongan', compact('lowongan','duit','gaji_awal','gaji_akhir', 'pengalaman_min', 'pengalaman_max'));
    }

    public function change_lowongan(Request $request, $id)
    {

        $validated = $request->validate([

            'nama' => 'required|max:255',
            'email' => 'required|email',
            'jabatan' => 'required',
            'lokasi' => 'required',
            'tipe' => 'required',
            'gaji_start' => 'required',
            'gaji_end' => 'required',
            'periode_start' => 'required',
            'periode_end' => 'required',
            'regis_start' => 'required',
            'regis_end' => 'required',
            'deskripsi' => 'required'

        ]);

        $lowongan = Lowongan::find($id)->first();
        $lowongan->nama = $request->nama;
        $lowongan->email = $request->email;
        $lowongan->jabatan = $request->jabatan;
        $lowongan->lokasi = $request->lokasi;
        $lowongan->tipe = $request->tipe;
        $lowongan->gaji = $request->duit." ".$request->gaji_start." - ".$request->gaji_end;
        $lowongan->periode = $request->periode_start." - ".$request->periode_end;
        $lowongan->regis_start = $request->regis_start;
        $lowongan->regis_end = $request->regis_end;
        $lowongan->deskripsi = $request->deskripsi;
        $lowongan->save();

        return redirect('/provider/lowongan/detail/'.$lowongan->id);
    }
    
    public function notifikasi()
    {
        $notifikasi = Notifikasi::where('perusahaan_id','=',auth()->user()->id)->get();
        return view('notifikasi_provider', compact('notifikasi'));
    }

    public function rekrutmen()
    {
        $lamaran = Lamaran::where('perusahaan_id','=',auth()->user()->id)->get();
        return view('rekrutmen', compact('lamaran'));
    }

    public function rekrutmen_detail($id)
    {
        $lamaran = Lamaran::find($id);

        $umur = Carbon::parse($lamaran->user->tanggal_lahir)->diff(Carbon::now())->y;
        return view('rekrutmen_detail', compact('lamaran','umur'));
    }

    public function rekrutmen_update(Request $request,$id)
    {
        $lamaran = Lamaran::find($id);

        $lamaran->status = $request->status;
        $lamaran->pesan = $request->deskripsi;
        $lamaran->save();

        return back();
    }
}
