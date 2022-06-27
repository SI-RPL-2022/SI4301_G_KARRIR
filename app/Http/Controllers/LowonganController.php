<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use App\Models\Lowongan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
    public function index()
    {
        $lowongan = Lowongan::where('verifikasi', '=', 3)->get();
        return view('lowongan', compact('lowongan'));
    }

    public function detail_lowongan($id)
    {
        $lowongan = Lowongan::find($id)->first();

        return view('detail_lowongan', compact('lowongan'));
    }

    public function melamar(Request $request, $id)
    {
        $lowongan = Lowongan::find($id);

        $lamaran = new Lamaran();
        $lamaran->lowongan_id = $id;
        $lamaran->perusahaan_id = $lowongan->perusahaan_id;
        $lamaran->user_id = auth()->user()->id;
        $lamaran->telepon = $request->nomor . '' . $request->telepon;
        $lamaran->status = 'Pending';

        if ($request->dokumen) {
            $lamaran->dokumen = $request->file('dokumen')->storeAs('file-pelamar', 'Dokumen Pendukung ' .auth()->user()->nama . '.pdf');
        }
        $lamaran->save();

        return redirect('/karrir/notifikasi');
    }

    public function notif_lamaran()
    {
        $lamaran = Lamaran::where('user_id','=',auth()->user()->id)->get();
        return view('karrir_notifikasi', compact('lamaran'));
    }

    public function detail_lamaran($id)
    {
        $lamaran = Lamaran::find($id);
        $umur = Carbon::parse(auth()->user()->tanggal_lahir)->diff(Carbon::now())->y;
        return view('lamaran_karrir', compact('lamaran','umur'));
    }
}
