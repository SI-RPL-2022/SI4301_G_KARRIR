<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index()
    {
        return view('home_provider');
    }

    public function create_lowongan()
    {
        return view('create_lowongan');
    }
}
