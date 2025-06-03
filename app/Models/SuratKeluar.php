<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $table = 'surat_keluars';

    protected $fillable = [
        'nomor_surat',
        'tanggal_surat',
        'sifat_surat',
        'lampiran',
        'hal',
        'tujuan_surat',
        'file_path',
    ];

    protected $dates = ['tanggal_surat'];
}
