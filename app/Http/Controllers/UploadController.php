<?php

namespace App\Http\Controllers;

use App\Models\Lamaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function upload_resume(Request $request,$id)
    {
        $user = User::find($id);

        if ($user->cv != null) {
            Storage::delete($user->cv);
        }

        $user->cv = $request->file('resume')->storeAs('file-pelamar', 'Resume/CV ' . $user->nama . '.pdf');

        $user->save();

        return back();
    }

    public function download_resume($id)
    {
        $user = User::find($id);

        return Storage::download($user->cv);
    }

    public function upload_organisasi(Request $request,$id)
    {
        $user = User::find($id);

        if ($user->organisasi != null) {
            Storage::delete($user->organisasi);
        }

        $user->organisasi = $request->file('organisasi')->storeAs('file-pelamar', 'Pengalaman Organisasi ' . $user->nama . '.pdf');

        $user->save();

        return back();
    }

    public function download_organisasi($id)
    {
        $user = User::find($id);

        return Storage::download($user->organisasi);
    }

    public function upload_sertifikasi(Request $request,$id)
    {
        $user = User::find($id);

        if ($user->sertifikasi != null) {
            Storage::delete($user->sertifikasi);
        }

        $user->sertifikasi = $request->file('sertifikasi')->storeAs('file-pelamar', 'Sertifikasi ' . $user->nama . '.pdf');

        $user->save();

        return back();
    }

    public function download_sertifikasi($id)
    {
        $user = User::find($id);

        return Storage::download($user->sertifikasi);
    }

    public function upload_portofolio(Request $request,$id)
    {
        $user = User::find($id);

        if ($user->portofolio != null) {
            Storage::delete($user->portofolio);
        }

        $user->portofolio = $request->file('portofolio')->storeAs('file-pelamar', 'Portofolio ' . $user->nama . '.pdf');

        $user->save();

        return back();
    }

    public function download_portofolio($id)
    {
        $user = User::find($id);

        return Storage::download($user->portofolio);
    }

    public function download_dokumen($id)
    {
        $lamaran = Lamaran::find($id);

        return Storage::download($lamaran->dokumen);
    }
}   

