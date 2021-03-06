<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $berita = Berita::all();
        return view('home_karrir', compact('berita'));
    }

    public function register()
    {
        return view('daftar_karrir');
    }

    public function proses_regis(Request $request)
    {

        // Register Perusahaan
        if ($request->role == 'Perusahaan') {

            $perusahaan = new Perusahaan;

            $perusahaan->nama_perusahaan = $request->nama;
            $perusahaan->email = $request->email;
            $perusahaan->password = Hash::make($request->password);
            $perusahaan->telepon = $request->telepon;

            $perusahaan->save();

            if (Auth::guard('perusahaan')->attempt(['email' => $request->email, 'password' => $request->password])) {

                $request->session()->regenerate();

                $request->session()->put('Verification', $request->nama);

                return redirect()->intended('/daftar/verifikasi');
            }

            return back();


            // Register Pelamar    
        } elseif ($request->role == 'Pelamar') {

            $user = new User();

            $user->nama = $request->nama;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->status = $request->status;
            $user->telepon = $request->telepon;

            $user->save();

            return redirect('/login')->with('berhasil', 'Berhasil Daftar');
        }
    }

    public function login()
    {
        return view('login_karrir');
    }

    public function proses_login(Request $request)
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Login Cekk Admin
        if ($request->role == 'Admin') {

            $users = User::where([['email', '=', $request->email], ['roles', '=', 'Admin']])->first();

            if (!$users) {
                return back()->with('pesan', 'Login Gagal');
            }

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('/admin/dashboard');
            }
        }

        //Login cek Pelamar
        elseif ($request->role == 'Pelamar') {

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                return redirect()->intended('/');
            }

            return back()->with('pesan', 'Login Gagal');
        }

        // Login Perusahaan
        elseif ($request->role == 'Perusahaan') {

            $perusahaan = Perusahaan::where('email', '=', $request->email)->first();

            if ($perusahaan == null) {
                return back()->with('pesan', 'Login Gagal');
            }

            if ($perusahaan->verifikasi == 1) {

                if (Auth::guard('perusahaan')->attempt($credentials)) {

                    $request->session()->regenerate();

                    $request->session()->put('Verification', $request->nama);
                    return redirect('/daftar/verifikasi');
                }
            }

            if ($perusahaan->verifikasi == 2) {
                return back()->with('pesan', 'Akun perusahaan Anda masih dalam proses verifikasi, mohon tunggu beberapa menit');
            }

            if ($perusahaan->verifikasi == 4) {
                return back()->with('pesan', 'Akun anda tersuspen karena proses verifikasi Ditolak');
            }

            if ($perusahaan->verifikasi == 3) {

                if (Auth::guard('perusahaan')->attempt($credentials)) {

                    $request->session()->regenerate();

                    return redirect()->intended('/');
                }
            }
        }
    }

    // Verifikasi Perusahaan
    public function verifikasi(Request $request, $id)
    {

        $perusahaan = Perusahaan::find($id);

        $perusahaan->email = $request->email;
        $perusahaan->telepon = $request->telepon;
        $perusahaan->alamat = $request->alamat;
        $perusahaan->industri = $request->industri;
        $perusahaan->tentang_kami = $request->deskripsi;
        $perusahaan->visi = $request->visi;
        $perusahaan->misi = $request->misi;
        $perusahaan->foto = $request->file('foto')->store('foto-perusahaan');
        $perusahaan->verifikasi = 2;

        $perusahaan->save();

        $notif = new Notifikasi();

        $notif->perusahaan_id = $perusahaan->id;
        $notif->pesan = "Perusahaan " . $perusahaan->nama_perusahaan . " Meminta verifikasi akun";
        $notif->tipe = "Verifikasi Akun";
        $notif->save();

        if (session()->has('Verification')) {
            session()->pull('Verification');
        }

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('pesan', 'Akun anda sudah masuk tahap verifikasi, Mohon tunggu beberapa menit untuk lagi untuk login');
    }

    public function update(Request $request, $id)
    {
        $perusahaan = Perusahaan::find($id);

        $perusahaan->email = $request->email;
        $perusahaan->telepon = $request->telepon;
        $perusahaan->alamat = $request->alamat;
        $perusahaan->industri = $request->industri;
        $perusahaan->tentang_kami = $request->deskripsi;
        $perusahaan->visi = $request->visi;
        $perusahaan->misi = $request->misi;

        if ($request->foto) {
            
            Storage::delete($perusahaan->foto);

            $perusahaan->foto = $request->file('foto')->store('foto-perusahaan');

        }


        $perusahaan->save();

        return back();
    }

    public function profile(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $umur = Carbon::parse($user->tanggal_lahir)->diff(Carbon::now())->y;

        $tanggal = Carbon::parse($user->tanggal_lahir)->format('d');
        $bulan = Carbon::parse($user->tanggal_lahir)->format('m');
        $tahun = Carbon::parse($user->tanggal_lahir)->format('Y');

        return view('profile_karrir', compact('umur', 'tanggal', 'bulan', 'tahun'));
    }

    public function proses_update(Request $request, $id)
    {
        $user = User::find($id);

        $user->nama = $request->nama;
        $user->telepon = $request->telepon;
        $user->email = $request->email;
        $user->alamat = $request->alamat;

        if ($request->foto) {
            $user->foto = $request->file('foto')->store('foto-pelamar');
        }

        $hari = $request->hari;
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $tanggal = $hari . "/" . $bulan . "/" . $tahun;
        $tanggal_lahir = Carbon::createFromFormat('d/m/Y', $tanggal)->format('Y-m-d');

        $user->tanggal_lahir = $tanggal_lahir;
        $user->kelamin = $request->kelamin;

        $user->save();

        return redirect('/karrir/profile');
    }


    public function logout(Request $request)
    {
        if (session()->has('Verification')) {
            session()->pull('Verification');
        }
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
