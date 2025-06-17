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

<div class="bg-white rounded-xl shadow-2xl p-8 w-full  mx-auto border border-gray-100">
    <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-200">
        <h2 class="text-3xl font-extrabold text-gray-900">Form Surat Keluar</h2>
        <a href="{{ route('suratkeluar.index') }}" class="inline-flex items-center text-blue-700 hover:text-blue-900 font-medium transition-colors duration-200 hover:underline">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Daftar Surat
        </a>
    </div>

    <form method="POST" action="{{ route('suratkeluar.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">

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
            <div>
                <label for="tanggal_surat" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Surat <span class="text-red-500">*</span></label>
                <input type="date" name="tanggal_surat" id="tanggal_surat" value="{{ old('tanggal_surat') }}" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 ease-in-out text-gray-700 @error('tanggal_surat') border-red-500 @enderror">
                @error('tanggal_surat')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Sifat Surat --}}
            <div>
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

            {{-- Lampiran --}}
            <div>
                <label for="lampiran" class="block text-sm font-medium text-gray-700 mb-1">Lampiran <span class="text-red-500">*</span></label>
                <input type="text" name="lampiran" id="lampiran" value="{{ old('lampiran') }}" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 ease-in-out text-gray-700 @error('lampiran') border-red-500 @enderror"
                       placeholder="Contoh: 1 (satu) Berkas">
                @error('lampiran')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Hal --}}
            <div class="md:col-span-2">
                <label for="hal" class="block text-sm font-medium text-gray-700 mb-1">Hal <span class="text-red-500">*</span></label>
                <input type="text" name="hal" id="hal" value="{{ old('hal') }}" required
                       class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 ease-in-out text-gray-700 @error('hal') border-red-500 @enderror"
                       placeholder="Contoh: Undangan Rapat Koordinasi">
                @error('hal')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Tujuan Surat --}}
            <div class="md:col-span-2">
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

            {{-- File (Scan Surat) --}}
            <div class="md:col-span-2">
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
                Simpan Surat
            </button>
            <button type="reset" class="inline-flex items-center px-6 py-3 border border-gray-300 text-base font-medium rounded-lg shadow-sm text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 ease-in-out">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                Reset Form
            </button>
        </div>
    </form>
</div>
@endsection