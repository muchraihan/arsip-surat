<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratKeluar;
use Illuminate\Support\Facades\Storage;

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
        return view('editkeluar', compact('surat'));
    }

    public function update(Request $request, $id)
    {
        $surat = SuratKeluar::findOrFail($id);

        // Validasi hanya kolom yang sesuai dengan model
        $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal_surat' => 'required|date',
            'sifat_surat' => 'required|string',
            'lampiran' => 'nullable|string|max:255',
            'hal' => 'required|string|max:255',
            'tujuan_surat' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,jpg,jpeg,png|max:5120',
        ]);

        // Update field biasa (tanpa file)
        $surat->fill($request->except('file'));

        // Proses upload file jika ada
        if ($request->hasFile('file')) {
            // Hapus file lama jika ada
            if ($surat->file_path && Storage::disk('public')->exists($surat->file_path)) {
                Storage::disk('public')->delete($surat->file_path);
            }

            // Simpan file baru
            $file = $request->file('file');
            $originalName = $file->getClientOriginalName();
            $path = $file->storeAs('suratkeluar', $originalName, 'public');
            $surat->file_path = $path;
        }

        $surat->save();

        return redirect()->route('suratkeluar.index')->with('success', 'Surat keluar berhasil diperbarui!');
    }


    public function destroy($id)
    {
        $surat = SuratKeluar::findOrFail($id);

        // Hapus file jika ada
        if ($surat->file && Storage::exists('public/surat_keluar/' . $surat->file)) {
            Storage::delete('public/surat_keluar/' . $surat->file);
        }

        // Hapus data dari database
        $surat->delete();

        return redirect()->route('suratkeluar.index')->with('success', 'Surat keluar berhasil dihapus.');
    }

}
