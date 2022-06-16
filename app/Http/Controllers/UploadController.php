<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function upload_resume(Request $request)
    {
        $user = User::find(auth()->user()->id);

        if ($user->cv != null) {
            Storage::delete($user->cv);
        }

        $user->cv = $request->file('resume')->storeAs('file-pelamar', 'Resume/CV ' . $user->nama . '.pdf');

        $user->save();

        return back();
    }

    public function download_resume()
    {
        $user = User::find(auth()->user()->id);

        return Storage::download($user->cv);
    }

    public function upload_organisasi(Request $request)
    {
        $user = User::find(auth()->user()->id);

        if ($user->organisasi != null) {
            Storage::delete($user->organisasi);
        }

        $user->organisasi = $request->file('organisasi')->storeAs('file-pelamar', 'Pengalaman Organisasi ' . $user->nama . '.pdf');

        $user->save();

        return back();
    }

    public function download_organisasi()
    {
        $user = User::find(auth()->user()->id);

        return Storage::download($user->organisasi);
    }

    public function upload_sertifikasi(Request $request)
    {
        $user = User::find(auth()->user()->id);

        if ($user->sertifikasi != null) {
            Storage::delete($user->sertifikasi);
        }

        $user->sertifikasi = $request->file('sertifikasi')->storeAs('file-pelamar', 'Sertifikasi ' . $user->nama . '.pdf');

        $user->save();

        return back();
    }

    public function download_sertifikasi()
    {
        $user = User::find(auth()->user()->id);

        return Storage::download($user->sertifikasi);
    }

    public function upload_portofolio(Request $request)
    {
        $user = User::find(auth()->user()->id);

        if ($user->portofolio != null) {
            Storage::delete($user->portofolio);
        }

        $user->portofolio = $request->file('portofolio')->storeAs('file-pelamar', 'Portofolio ' . $user->nama . '.pdf');

        $user->save();

        return back();
    }

    public function download_portofolio()
    {
        $user = User::find(auth()->user()->id);

        return Storage::download($user->portofolio);
    }
}   

