@extends('components.layouts.app')

@section('content')
<div class="bg-white shadow-md rounded p-6 w-full">
    <h2 class="text-xl font-semibold mb-4">Form Surat Masuk</h2>

    {{-- Menampilkan pesan sukses jika ada --}}
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Menampilkan pesan error validasi jika ada --}}
    @if($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Potongan bagian formulir --}}
   <form method="POST" action="{{ route('suratmasuk.store') }}" enctype="multipart/form-data">
    @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Kolom Kiri --}}
            <div>
                <div class="mb-4">
                    <label for="nomor_surat" class="block text-sm font-medium text-gray-700">Nomor Surat</label>
                    <input type="text" name="nomor_surat" id="nomor_surat" value="{{ old('nomor_surat') }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>

                <div class="mb-4">
                    <label for="tanggal_surat" class="block text-sm font-medium text-gray-700">Tanggal Surat</label>
                    <input type="date" name="tanggal_surat" id="tanggal_surat" value="{{ old('tanggal_surat') }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>

                <div class="mb-4">
                    <label for="pengirim" class="block text-sm font-medium text-gray-700">Pengirim</label>
                    <input type="text" name="pengirim" id="pengirim" value="{{ old('pengirim') }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>

                <div class="mb-4">
                    <label for="perihal" class="block text-sm font-medium text-gray-700">Perihal</label>
                    <input type="text" name="perihal" id="perihal" value="{{ old('perihal') }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>

                <div class="mb-4">
                    <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <input type="text" name="kategori" id="kategori" value="{{ old('kategori') }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>
            </div>

            {{-- Kolom Kanan --}}
            <div>
                <div class="mb-4">
                    <label for="status_surat" class="block text-sm font-medium text-gray-700">Status Surat</label>
                    <select name="status_surat" id="status_surat" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                        <option value="">-- Pilih Status --</option>
                        <option value="Asli" {{ old('status_surat') == 'Asli' ? 'selected' : '' }}>Asli</option>
                        <option value="Tembusan" {{ old('status_surat') == 'Tembusan' ? 'selected' : '' }}>Tembusan</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="sifat_surat" class="block text-sm font-medium text-gray-700">Sifat Surat</label>
                    <select name="sifat_surat" id="sifat_surat" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                        <option value="">-- Pilih Sifat --</option>
                        @foreach(['Penting', 'Segera', 'Rahasia', 'Sangat Rahasia', 'Biasa'] as $sifat)
                            <option value="{{ $sifat }}" {{ old('sifat_surat') == $sifat ? 'selected' : '' }}>{{ $sifat }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="tujuan_surat" class="block text-sm font-medium text-gray-700">Tujuan Surat</label>
                    <select name="tujuan_surat" id="tujuan_surat" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                        <option value="">-- Pilih Tujuan --</option>
                        @php
                            $tujuanList = ['Kepala kantor','Kasubbag TU','PHU','Bimas Islam','Pend. Agama & Keagamaaan Islam','Pend. Madrasah','Penyelenggara Zakat dan Wakaf','Penyelenggara Kristen','Penyelenggara Katolik','Perencana','Keuangan','Kepegawaian','Barang Milik Negara','Humas','Umum'];
                        @endphp
                        @foreach($tujuanList as $tujuan)
                            <option value="{{ $tujuan }}" {{ old('tujuan_surat') == $tujuan ? 'selected' : '' }}>{{ $tujuan }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="petunjuk" class="block text-sm font-medium text-gray-700">Petunjuk</label>
                    <select name="petunjuk" id="petunjuk" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                        <option value="">-- Pilih Petunjuk --</option>
                        @foreach(['Kepala Hadir','Tindak Lanjuti','Untuk Diketahui','Edarkan','Jawab','Ingatkan','Simpan / Arsipkan','Harap Hadir / Wakili'] as $petunjuk)
                            <option value="{{ $petunjuk }}" {{ old('petunjuk') == $petunjuk ? 'selected' : '' }}>{{ $petunjuk }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        {{-- Full width: bawah --}}
        <div class="mt-6">
            <div class="mb-4">
                <label for="catatan" class="block text-sm font-medium text-gray-700">Catatan</label>
                <input type="text" name="catatan" id="catatan" value="{{ old('catatan') }}" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            </div>

            <div class="mb-4">
                <label for="isi_disposisi" class="block text-sm font-medium text-gray-700">Isi Disposisi</label>
                <textarea name="isi_disposisi" id="isi_disposisi" required rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">{{ old('isi_disposisi') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="disposisi_kasubbag" class="block text-sm font-medium text-gray-700">Disposisi Kasubbag</label>
                <textarea name="disposisi_kasubbag" id="disposisi_kasubbag" required rows="2" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">{{ old('disposisi_kasubbag') }}</textarea>
            </div>

            <div class="mb-6">
                <label for="file" class="block text-sm font-medium text-gray-700">File (Scan Surat)</label>
                <input type="file" name="file" id="file" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
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
