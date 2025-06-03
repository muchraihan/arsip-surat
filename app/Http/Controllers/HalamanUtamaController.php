<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasuk;

class HalamanUtamaController extends Controller
{
    public function index()
    {
        $jumlahSuratMasuk = SuratMasuk::count();
        return view('halamanutama', compact('jumlahSuratMasuk'));
    }
}
