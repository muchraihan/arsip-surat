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
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $originalName = $file->getClientOriginalName();
            $path = $file->storeAs('suratkeluar', $originalName, 'public');
            $validated['file_path'] = $path;
        }

        

        SuratKeluar::create($validated);

        return redirect()->back()->with('success', 'Surat keluar berhasil disimpan.');
    }

    public function index(Request $request)
    {
        $search = $request->query('search');

        $suratKeluar = SuratKeluar::when($search, function ($query, $search) {
            return $query->where('nomor_surat', 'like', "%{$search}%")
                        ->orWhere('hal', 'like', "%{$search}%")
                        ->orWhere('tujuan_surat', 'like', "%{$search}%");
        })
        ->latest('tanggal_surat')
        ->paginate(10)
        ->appends(['search' => $search]); // Menjaga query search saat pagination

        return view('tablesuratkeluar', compact('suratKeluar'));
    }


    public function show($id)
    {
        $surat = SuratKeluar::findOrFail($id);
        return view('Dsuratkeluar', compact('surat'));
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
