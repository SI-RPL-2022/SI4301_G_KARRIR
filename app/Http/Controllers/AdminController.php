<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Lamaran;
use App\Models\Lowongan;
use App\Models\Notifikasi;
use App\Models\Perusahaan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::whereNot('roles', '=', 'Admin');
        $lamaran = Lamaran::all();

        if ($lamaran->count() == 0) {
            $persen_user = 0;
        } else {

            $persen_user = $user->count() / $lamaran->count() * 100;
        }


        $perusahaan = Perusahaan::where('verifikasi', '=', 3);
        $perusahaan_all = Perusahaan::all();

        if ($perusahaan_all->count() == 0) {
            $persen_perusahaan = 0;
        } else {

            $persen_perusahaan = $perusahaan->count() / $perusahaan_all->count() * 100;
        }

        $lowongan = Lowongan::where('verifikasi', '=', '3')->where('regis_end', '>=', Carbon::now())->get();
        $lowongan_all = Lowongan::all();

        if ($lowongan_all->count() == 0) {
            $persen_lowongan = 0;
        } else {

            $persen_lowongan = $lowongan->count() / $lowongan_all->count() * 100;
        }


        $notifikasi = Notifikasi::all();
        return view('admin.dashboard', compact('user', 'persen_user', 'perusahaan_all', 'persen_perusahaan', 'lowongan_all', 'persen_lowongan', 'notifikasi'));
    }

    public function notifikasi()
    {
        $notifikasi = Notifikasi::orderBy('created_at', 'desc')->get();
        return view('admin.notifikasi', compact('notifikasi'));
    }

    public function detail_notifikasi($id)
    {
        $notifikasi = Notifikasi::find($id);
        return view('admin.detail_notifikasi', compact('notifikasi'));
    }

    public function verifikasi(Request $request, $id)
    {
        if ($request->verifikasi == "perusahaan") {
            $perusahaan = Perusahaan::find($id);

            if ($request->konfirmasi) {

                $perusahaan->verifikasi = 3;

                $perusahaan->save();

                return back();
            } elseif ($request->tolak) {

                $perusahaan->verifikasi = 4;

                $perusahaan->save();

                return back();
            }
        } elseif ($request->verifikasi == 'lowongan') {
            $lowongan = Lowongan::find($id);

            if ($request->konfirmasi) {

                $lowongan->verifikasi = 3;

                $lowongan->save();

                return back();
            } elseif ($request->tolak) {

                $lowongan->verifikasi = 4;

                $lowongan->save();

                return back();
            }
        }
    }

    public function berita()
    {
        $berita = Berita::all();
        return view('admin.berita', compact('berita'));
    }

    public function tambahberita(Request $request)
    {
        $berita = new Berita();

        $berita->judul = $request->nama;
        $berita->link = $request->link;
        $berita->deskripsi = $request->deskripsi;
        $berita->foto = $request->file('foto')->store('foto-berita');

        $berita->save();

        return redirect('/admin/berita');
    }

    public function lowongan()
    {
        $pending = Lowongan::where('verifikasi', '=', '1')->get();
        $accept = Lowongan::where('verifikasi', '=', '3')->get();
        $tolak = Lowongan::where('verifikasi', '=', '4')->get();
        return view('admin.lowongan', compact('pending', 'accept', 'tolak'));
    }

    public function detail_lowongan($id)
    {
        $lowongan = Lowongan::find($id);
        return view('admin.detail_lowongan', compact('lowongan'));
    }

    public function perusahaan()
    {
        $pending = Perusahaan::where('verifikasi', '=', '2')->get();
        $accept = Perusahaan::where('verifikasi', '=', '3')->get();
        $tolak = Perusahaan::where('verifikasi', '=', '4')->get();
        return view('admin.perusahaan', compact('pending', 'accept', 'tolak'));
    }

    public function detail_perusahaan($id)
    {
        $perusahaan = Perusahaan::find($id);
        return view('admin.detail_perusahaan', compact('perusahaan'));
    }

    public function data_pelamar()
    {
        $lamaran = Lamaran::all();
        return view('admin.data_pelamar', compact('lamaran'));
    }

    public function detail_pelamar($id)
    {
        $lamaran = Lamaran::find($id);
        $umur = Carbon::parse($lamaran->user->tanggal_lahir)->diff(Carbon::now())->y;
        return view('admin.detail_pelamar', compact('lamaran', 'umur'));
    }
}
