@extends('components.layouts.app')

@section('content')

{{-- Success Notification --}}
@if (session('success'))
    <div id="success-notification" class="fixed top-4 right-4 z-50 bg-green-600 text-white px-6 py-3 rounded-lg shadow-xl animate-fade-in-down">
        {{ session('success') }}
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const notification = document.getElementById('success-notification');
            if (notification) {
                setTimeout(() => {
                    notification.classList.add('animate-fade-out-up');
                    notification.addEventListener('animationend', () => notification.remove());
                }, 3000);
            }
        });
    </script>
    {{-- PASTIKAN tailwind.config.js ANDA SUDAH MENAMBAHKAN KEYFRAMES INI: --}}
    {{--
    // tailwind.config.js
    module.exports = {
      theme: {
        extend: {
          keyframes: {
            fadeInDown: {
              '0%': { opacity: '0', transform: 'translateY(-20px)' },
              '100%': { opacity: '1', transform: 'translateY(0)' },
            },
            fadeOutUp: {
              '0%': { opacity: '1', transform: 'translateY(0)' },
              '100%': { opacity: '0', transform: 'translateY(-20px)' },
            }
          },
          animation: {
            'fade-in-down': 'fadeInDown 0.5s ease-out forwards',
            'fade-out-up': 'fadeOutUp 0.5s ease-out forwards',
          }
        },
      },
    }
    --}}
@endif

{{-- Validation Error Messages --}}
@if($errors->any())
    <div class="mb-6 p-5 bg-red-100 text-red-800 rounded-lg border border-red-300 shadow-sm">
        <div class="flex items-center mb-2">
            <svg class="h-5 w-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <h3 class="font-bold text-red-700">Terjadi Kesalahan:</h3>
        </div>
        <ul class="list-disc pl-8 space-y-1 text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- KONTEN UTAMA FORM --}}
{{-- MODIFIKASI: Pastikan max-w-3xl dan mx-auto diterapkan dengan benar --}}
<div class="bg-white rounded-xl shadow-2xl p-8 w-fullmx-auto border border-gray-100">
    <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-200">
        <h2 class="text-3xl font-extrabold text-gray-900">Form Surat Masuk</h2>
        <a href="{{ route('suratmasuk.index') }}" class="inline-flex items-center text-blue-700 hover:text-blue-900 font-medium transition-colors duration-200 hover:underline">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Daftar Surat
        </a>
    </div>

    <form method="POST" action="{{ route('suratmasuk.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">

            {{-- Kolom Kiri --}}
            <div>
                {{-- Nomor Surat --}}
                <div>
                    <label for="nomor_surat" class="block text-sm font-medium text-gray-700 mb-1">Nomor Surat <span class="text-red-500">*</span></label>
                    <input type="text" name="nomor_surat" id="nomor_surat" value="{{ old('nomor_surat') }}" required
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 ease-in-out text-gray-700 @error('nomor_surat') border-red-500 @enderror"
                           placeholder="Masukkan nomor surat...">
                    @error('nomor_surat')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tanggal Surat --}}
                <div class="mt-6">
                    <label for="tanggal_surat" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Surat <span class="text-red-500">*</span></label>
                    <input type="date" name="tanggal_surat" id="tanggal_surat" value="{{ old('tanggal_surat') }}" required
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 ease-in-out text-gray-700 @error('tanggal_surat') border-red-500 @enderror">
                    @error('tanggal_surat')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Pengirim --}}
                <div class="mt-6">
                    <label for="pengirim" class="block text-sm font-medium text-gray-700 mb-1">Pengirim <span class="text-red-500">*</span></label>
                    <input type="text" name="pengirim" id="pengirim" value="{{ old('pengirim') }}" required
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 ease-in-out text-gray-700 @error('pengirim') border-red-500 @enderror"
                           placeholder="Contoh: Kementerian Agama RI">
                    @error('pengirim')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Perihal --}}
                <div class="mt-6">
                    <label for="perihal" class="block text-sm font-medium text-gray-700 mb-1">Perihal <span class="text-red-500">*</span></label>
                    <input type="text" name="perihal" id="perihal" value="{{ old('perihal') }}" required
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 ease-in-out text-gray-700 @error('perihal') border-red-500 @enderror"
                           placeholder="Contoh: Undangan Rapat Kerja Nasional">
                    @error('perihal')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Kategori --}}
                <div class="mt-6">
                    <label for="kategori" class="block text-sm font-medium text-gray-700 mb-1">Kategori <span class="text-red-500">*</span></label>
                    <input type="text" name="kategori" id="kategori" value="{{ old('kategori') }}" required
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 ease-in-out text-gray-700 @error('kategori') border-red-500 @enderror"
                           placeholder="Contoh: Umum / Dinas / Keuangan">
                    @error('kategori')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Kolom Kanan --}}
            <div>
                {{-- Status Surat --}}
                <div>
                    <label for="status_surat" class="block text-sm font-medium text-gray-700 mb-1">Status Surat <span class="text-red-500">*</span></label>
                    <select name="status_surat" id="status_surat" required
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 ease-in-out text-gray-700 @error('status_surat') border-red-500 @enderror">
                        <option value="">-- Pilih Status --</option>
                        <option value="Asli" {{ old('status_surat') == 'Asli' ? 'selected' : '' }}>Asli</option>
                        <option value="Tembusan" {{ old('status_surat') == 'Tembusan' ? 'selected' : '' }}>Tembusan</option>
                    </select>
                    @error('status_surat')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Sifat Surat --}}
                <div class="mt-6">
                    <label for="sifat_surat" class="block text-sm font-medium text-gray-700 mb-1">Sifat Surat <span class="text-red-500">*</span></label>
                    <select name="sifat_surat" id="sifat_surat" required
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 ease-in-out text-gray-700 @error('sifat_surat') border-red-500 @enderror">
                        <option value="">-- Pilih Sifat --</option>
                        @foreach(['Penting', 'Segera', 'Rahasia', 'Sangat Rahasia', 'Biasa'] as $sifat)
                            <option value="{{ $sifat }}" {{ old('sifat_surat') == $sifat ? 'selected' : '' }}>{{ $sifat }}</option>
                        @endforeach
                    </select>
                    @error('sifat_surat')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tujuan Surat --}}
                <div class="mt-6">
                    <label for="tujuan_surat" class="block text-sm font-medium text-gray-700 mb-1">Tujuan Surat <span class="text-red-500">*</span></label>
                    <select name="tujuan_surat" id="tujuan_surat" required
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 ease-in-out text-gray-700 @error('tujuan_surat') border-red-500 @enderror">
                        <option value="">-- Pilih Tujuan --</option>
                        @php
                            $tujuanList = ['Kepala kantor','Kasubbag TU','PHU','Bimas Islam','Pend. Agama & Keagamaaan Islam','Pend. Madrasah','Penyelenggara Zakat dan Wakaf','Penyelenggara Kristen','Penyelenggara Katolik','Perencana','Keuangan','Kepegawaian','Barang Milik Negara','Humas','Umum'];
                        @endphp
                        @foreach($tujuanList as $tujuan)
                            <option value="{{ $tujuan }}" {{ old('tujuan_surat') == $tujuan ? 'selected' : '' }}>{{ $tujuan }}</option>
                        @endforeach
                    </select>
                    @error('tujuan_surat')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Petunjuk --}}
                <div class="mt-6">
                    <label for="petunjuk" class="block text-sm font-medium text-gray-700 mb-1">Petunjuk <span class="text-red-500">*</span></label>
                    <select name="petunjuk" id="petunjuk" required
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 ease-in-out text-gray-700 @error('petunjuk') border-red-500 @enderror">
                        <option value="">-- Pilih Petunjuk --</option>
                        @foreach(['Kepala Hadir','Tindak Lanjuti','Untuk Diketahui','Edarkan','Jawab','Ingatkan','Simpan / Arsipkan','Harap Hadir / Wakili'] as $petunjuk)
                            <option value="{{ $petunjuk }}" {{ old('petunjuk') == $petunjuk ? 'selected' : '' }}>{{ $petunjuk }}</option>
                        @endforeach
                    </select>
                    @error('petunjuk')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Full width fields --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6 mt-6">
            {{-- Catatan --}}
            <div>
                <label for="catatan" class="block text-sm font-medium text-gray-700 mb-1">Catatan <span class="text-red-500">*</span></label>
                <input type="text" name="catatan" id="catatan" value="{{ old('catatan') }}" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 ease-in-out text-gray-700 @error('catatan') border-red-500 @enderror"
                       placeholder="Catatan tambahan...">
                @error('catatan')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Isi Disposisi --}}
            <div>
                <label for="isi_disposisi" class="block text-sm font-medium text-gray-700 mb-1">Isi Disposisi <span class="text-red-500">*</span></label>
                <textarea name="isi_disposisi" id="isi_disposisi" required rows="3"
                          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 ease-in-out text-gray-700 @error('isi_disposisi') border-red-500 @enderror"
                          placeholder="Tulis isi disposisi di sini...">{{ old('isi_disposisi') }}</textarea>
                @error('isi_disposisi')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Disposisi Kasubbag --}}
            <div>
                <label for="disposisi_kasubbag" class="block text-sm font-medium text-gray-700 mb-1">Disposisi Kasubbag <span class="text-red-500">*</span></label>
                <textarea name="disposisi_kasubbag" id="disposisi_kasubbag" required rows="2"
                          class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 ease-in-out text-gray-700 @error('disposisi_kasubbag') border-red-500 @enderror"
                          placeholder="Tulis disposisi dari Kasubbag...">{{ old('disposisi_kasubbag') }}</textarea>
                @error('disposisi_kasubbag')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- File (Scan Surat) --}}
            <div>
                <label for="file" class="block text-sm font-medium text-gray-700 mb-1">File (Scan Surat) <span class="text-red-500">*</span></label>
                <input type="file" name="file" id="file" required
                       class="mt-1 block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-all duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 @error('file') border border-red-500 rounded-lg @enderror" />
                <p class="text-xs text-gray-500 mt-2">
                    * Upload file dalam format PDF, JPG, PNG, atau DOCX. Ukuran maksimal 2MB.
                </p>
                @error('file')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-10 flex justify-end space-x-4">
            <button type="submit" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 ease-in-out">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path></svg>
                Simpan Surat Masuk
            </button>
            <button type="reset" class="inline-flex items-center px-6 py-3 border border-gray-300 text-base font-medium rounded-lg shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 ease-in-out">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                Reset Form
            </button>
        </div>
    </form>
</div>
@endsection