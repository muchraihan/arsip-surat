<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasuk;
use Illuminate\Support\Facades\Storage;

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
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:5120', // max 5MB
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $originalName = $file->getClientOriginalName();
            $path = $file->storeAs('surat_masuk', $originalName, 'public');
            $validated['file'] = $path;
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
            })
            ->latest()
            ->paginate(10)
            ->appends(['search' => $search]); // Tambahkan ini agar pagination mempertahankan query pencarian

            return view('tablesuratmasuk', compact('suratMasuk'));
        }


    public function show($id)
    {
        $surat = SuratMasuk::findOrFail($id);
        return view('Dsuratmasuk', compact('surat'));
    }
    
    
    public function edit($id)
    {
        $surat = SuratMasuk::findOrFail($id);
        return view('edit', compact('surat'));
    }

    public function update(Request $request, $id)
    {
        $surat = SuratMasuk::findOrFail($id);

        $request->validate([
            'nomor_surat' => 'required',
            'tanggal_surat' => 'required|date',
            'pengirim' => 'required',
            'perihal' => 'required',
            'kategori' => 'required',
            'status_surat' => 'required',
            'sifat_surat' => 'required',
            'tujuan_surat' => 'required',
            'petunjuk' => 'required',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:5120',
        ]);

        $surat->fill($request->except('file'));

        if ($request->hasFile('file')) {
            if ($surat->file && Storage::exists('public/surat/' . $surat->file)) {
                Storage::delete('public/surat/' . $surat->file);
            }

            $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
            $request->file('file')->storeAs('public/surat_masuk', $fileName);
            $surat->file = $fileName;
        }

        $surat->save();

        return redirect()->route('suratmasuk.index')->with('success', 'Surat berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $surat = SuratMasuk::findOrFail($id);

        // Hapus file jika ada
        if ($surat->file && Storage::disk('public')->exists($surat->file)) {
            Storage::disk('public')->delete($surat->file);
        }

        // Hapus data dari database
        $surat->delete();

        return redirect()->route('suratmasuk.index')->with('success', 'Surat berhasil dihapus.');
    }
        
}
