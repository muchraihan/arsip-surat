@extends('components.layouts.app')

@section('content')
<div class="bg-white shadow-md rounded p-6 w-full">
    <h2 class="text-xl font-semibold mb-4">Form Surat Keluar</h2>

    <form method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Kolom Kiri --}}
            <div>
                <div class="mb-4">
                    <label for="nomor_surat" class="block text-sm font-medium text-gray-700">Nomor Surat</label>
                    <input type="text" name="nomor_surat" id="nomor_surat" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                </div>

                <div class="mb-4">
                    <label for="tanggal_surat" class="block text-sm font-medium text-gray-700">Tanggal Surat</label>
                    <input type="date" name="tanggal_surat" id="tanggal_surat" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                </div>

                <div class="mb-4">
                    <label for="pengirim" class="block text-sm font-medium text-gray-700">Pengirim</label>
                    <input type="text" name="pengirim" id="pengirim" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                </div>

                <div class="mb-4">
                    <label for="perihal" class="block text-sm font-medium text-gray-700">Perihal</label>
                    <input type="text" name="perihal" id="perihal" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                </div>

                <div class="mb-4">
                    <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <select name="kategori" id="kategori" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Kepala">Kepala</option>
                        <option value="Wakil">Wakil</option>
                        <option value="Sekretaris">Sekretaris</option>
                    </select>
                </div>
            </div>

            {{-- Kolom Kanan --}}
            <div>
                <div class="mb-4">
                    <label for="status_surat" class="block text-sm font-medium text-gray-700">Status Surat</label>
                    <select name="status_surat" id="status_surat" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                        <option value="">-- Pilih Status --</option>
                        <option value="Asli">Asli</option>
                        <option value="Tembusan">Tembusan</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="sifat_surat" class="block text-sm font-medium text-gray-700">Sifat Surat</label>
                    <select name="sifat_surat" id="sifat_surat" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                        <option value="">-- Pilih Sifat --</option>
                        <option value="Penting">Penting</option>
                        <option value="Segera">Segera</option>
                        <option value="Rahasia">Rahasia</option>
                        <option value="Sangat Rahasia">Sangat Rahasia</option>
                        <option value="Biasa">Biasa</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="tujuan_surat" class="block text-sm font-medium text-gray-700">Tujuan Surat</label>
                    <select name="tujuan_surat" id="tujuan_surat" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                        <option value="">-- Pilih Tujuan --</option>
                        <option value="Kepala kantor">Kepala kantor</option>
                        <option value="Kasubbag TU">Kasubbag TU</option>
                        <option value="PHU">PHU</option>
                        <option value="Bimas Islam">Bimas Islam</option>
                        <option value="Pend. Agama & Keagamaaan Islam">Pend. Agama & Keagamaaan Islam</option>
                        <option value="Pend. Madrasah">Pend. Madrasah</option>
                        <option value="Penyelenggara Zakat dan Wakaf">Penyelenggara Zakat dan Wakaf</option>
                        <option value="Penyelenggara Kristen">Penyelenggara Kristen</option>
                        <option value="Penyelenggara Katolik">Penyelenggara Katolik</option>
                        <option value="Perencana">Perencana</option>
                        <option value="Keuangan">Keuangan</option>
                        <option value="Kepegawaian">Kepegawaian</option>
                        <option value="Barang Milik Negara">Barang Milik Negara</option>
                        <option value="Humas">Humas</option>
                        <option value="Umum">Umum</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="petunjuk" class="block text-sm font-medium text-gray-700">Petunjuk</label>
                    <select name="petunjuk" id="petunjuk" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                        <option value="">-- Pilih Petunjuk --</option>
                        <option value="Kepala Hadir">Kepala hadir</option>
                        <option value="Tindak Lanjuti">Tindak Lanjuti</option>
                        <option value="Untuk Diketahui">Untuk Diketahui</option>
                        <option value="Edarkan">Edarkan</option>
                        <option value="Jawab">Jawab</option>
                        <option value="Ingatkan">Ingatkan</option>
                        <option value="Simpan / Arsipkan">Simpan / Arsipkan</option>
                        <option value="Harap Hadir / Wakili">Harap Hadir / Wakili</option>
                    </select>
                </div>
            </div>
        </div>

        {{-- Full width: bawah --}}
        <div class="mt-6">
            <div class="mb-4">
                <label for="catatan" class="block text-sm font-medium text-gray-700">Catatan</label>
                <input type="text" name="catatan" id="catatan" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            </div>

            <div class="mb-4">
                <label for="isi_disposisi" class="block text-sm font-medium text-gray-700">Isi Disposisi</label>
                <textarea name="isi_disposisi" id="isi_disposisi" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"></textarea>
            </div>

            <div class="mb-4">
                <label for="disposisi_kasubbag" class="block text-sm font-medium text-gray-700">Disposisi Kasubbag</label>
                <textarea name="disposisi_kasubbag" id="disposisi_kasubbag" rows="2" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"></textarea>
            </div>

            <div class="mb-6">
                <label for="file" class="block text-sm font-medium text-gray-700">File (Scan Surat)</label>
                <input type="file" name="file" id="file" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                <p class="text-xs text-gray-500 mt-1">* File / Gambar / Hasil Scan Surat</p>
            </div>

            <div class="flex space-x-2">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
                <button type="reset" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Cancel</button>
            </div>
        </div>
    </form>
</div>
@endsection
