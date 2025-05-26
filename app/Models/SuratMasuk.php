<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_surat',
        'tanggal_surat',
        'pengirim',
        'perihal',
        'kategori',
        'status_surat',
        'sifat_surat',
        'tujuan_surat',
        'petunjuk',
        'catatan',
        'isi_disposisi',
        'disposisi_kasubbag',
        'file',
    ];
}