<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\SimpleExcel\SimpleExcelWriter;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;

class LaporanController extends Controller
{
    public function exportSuratMasuk(Request $request)
    {
        $startDate = $request->input('start_date') ?? now()->subMonth()->startOfMonth();
        $endDate = $request->input('end_date') ?? now()->endOfMonth();

        $data = SuratMasuk::whereBetween('tanggal_surat', [$startDate, $endDate])
            ->select('nomor_surat', 'tanggal_surat', 'pengirim', 'perihal', 'kategori', 'sifat_surat')
            ->get();

        $path = storage_path('app/public/laporan_surat_masuk.csv');

        SimpleExcelWriter::create($path)
            ->addHeader(['Nomor Surat', 'Tanggal Surat', 'Pengirim', 'Perihal', 'Kategori', 'Sifat Surat'])
            ->addRows($data->map(function ($row) {
                return [
                    'Nomor Surat'   => $row->nomor_surat,
                    'Tanggal Surat' => $row->tanggal_surat,
                    'Pengirim'      => $row->pengirim,
                    'Perihal'       => $row->perihal,
                    'Kategori'      => $row->kategori,
                    'Sifat Surat'   => $row->sifat_surat,
                ];
            }));

        return response()->download($path)->deleteFileAfterSend(true);
    }

    public function exportSuratKeluar(Request $request)
    {
        $startDate = $request->input('start_date') ?? now()->subMonth()->startOfMonth();
        $endDate = $request->input('end_date') ?? now()->endOfMonth();

        $data = SuratKeluar::whereBetween('tanggal_surat', [$startDate, $endDate])
            ->select('nomor_surat', 'tanggal_surat', 'sifat_surat', 'lampiran', 'hal', 'tujuan_surat')
            ->get();

        $path = storage_path('app/public/laporan_surat_keluar.csv');

        SimpleExcelWriter::create($path)
            ->addHeader(['Nomor Surat', 'Tanggal Surat', 'Sifat Surat', 'Lampiran', 'Hal', 'Tujuan Surat'])
            ->addRows($data->map(function ($row) {
                return [
                    'Nomor Surat'   => $row->nomor_surat,
                    'Tanggal Surat' => $row->tanggal_surat,
                    'Sifat Surat'   => $row->sifat_surat,
                    'Lampiran'      => $row->lampiran,
                    'Hal'           => $row->hal,
                    'Tujuan Surat'  => $row->tujuan_surat,
                ];
            }));

        return response()->download($path)->deleteFileAfterSend(true);
    }
}
