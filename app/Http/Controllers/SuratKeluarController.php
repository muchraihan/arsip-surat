<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratKeluar;

class SuratKeluarController extends Controller
{
    public function create()
    {
        return view('suratkeluar.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal_surat' => 'required|date',
            'sifat_surat' => 'required|string',
            'lampiran' => 'required|string|max:255',
            'hal' => 'required|string|max:255',
            'tujuan_surat' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('suratkeluar', 'public');
            $validated['file_path'] = $path;
        }

        SuratKeluar::create($validated);

        return redirect()->back()->with('success', 'Surat keluar berhasil disimpan.');
    }

    public function index(Request $request)
    {
        $search = $request->search;
        $query = SuratKeluar::query();

        if ($search) {
            $query->where('nomor_surat', 'like', "%$search%")
                  ->orWhere('hal', 'like', "%$search%")
                  ->orWhere('tujuan_surat', 'like', "%$search%");
        }

        $suratKeluar = $query->orderBy('tanggal_surat', 'desc')->paginate(10);

        return view('suratkeluar.index', compact('suratKeluar'));
    }

    public function show($id)
    {
        $surat = SuratKeluar::findOrFail($id);
        return view('suratkeluar.show', compact('surat'));
    }

    public function edit($id)
    {
        $surat = SuratKeluar::findOrFail($id);
        return view('suratkeluar.edit', compact('surat'));
    }

    public function destroy($id)
    {
        $surat = SuratKeluar::findOrFail($id);
        $surat->delete();
        return redirect()->route('suratkeluar.index')->with('success', 'Surat berhasil dihapus.');
    }
}
