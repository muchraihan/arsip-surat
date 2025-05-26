<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasuk;

class SuratMasukController extends Controller
{
    public function create()
    {
        return view('suratmasuk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required|string',
            'tanggal_surat' => 'required|date',
            'pengirim' => 'required|string',
            'perihal' => 'required|string',
            'kategori' => 'required|string',
            'status_surat' => 'required|string',
            'sifat_surat' => 'required|string',
            'tujuan_surat' => 'required|string',
            'petunjuk' => 'required|string',
            'catatan' => 'nullable|string',
            'isi_disposisi' => 'nullable|string',
            'disposisi_kasubbag' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('surat_masuk', 'public');
        }

        SuratMasuk::create($validated);

        return redirect()->back()->with('success', 'Surat berhasil disimpan.');
    }

    public function index(Request $request)
    {
        $search = $request->query('search');

        $suratMasuk = SuratMasuk::when($search, function ($query, $search) {
            return $query->where('nomor_surat', 'like', "%{$search}%")
                        ->orWhere('pengirim', 'like', "%{$search}%")
                        ->orWhere('perihal', 'like', "%{$search}%");
        })->latest()->paginate(10);

        return view('tablesuratmasuk', compact('suratMasuk'));
    }


}
