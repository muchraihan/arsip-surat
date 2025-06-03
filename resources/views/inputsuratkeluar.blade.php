@extends('components.layouts.app')

@section('content')
<div class="bg-white shadow-md rounded p-6 w-full max-w-3xl mx-auto">
    <h2 class="text-xl font-semibold mb-6">Form Surat Keluar</h2>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div id="success-notification" class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(() => {
                const notif = document.getElementById('success-notification');
                if (notif) notif.style.display = 'none';
            }, 3000);
        </script>
    @endif

    {{-- Pesan error validasi --}}
    @if($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('suratkeluar.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <label for="nomor_surat" class="block text-sm font-medium text-gray-700">Nomor Surat</label>
                <input type="text" name="nomor_surat" id="nomor_surat" value="{{ old('nomor_surat') }}" required
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" />
            </div>

            <div>
                <label for="tanggal_surat" class="block text-sm font-medium text-gray-700">Tanggal Surat</label>
                <input type="date" name="tanggal_surat" id="tanggal_surat" value="{{ old('tanggal_surat') }}" required
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" />
            </div>

            <div>
                <label for="sifat_surat" class="block text-sm font-medium text-gray-700">Sifat Surat</label>
                <select name="sifat_surat" id="sifat_surat" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    <option value="">-- Pilih Sifat --</option>
                    @foreach(['Penting', 'Segera', 'Rahasia', 'Sangat Rahasia', 'Biasa'] as $sifat)
                        <option value="{{ $sifat }}" {{ old('sifat_surat') == $sifat ? 'selected' : '' }}>{{ $sifat }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="lampiran" class="block text-sm font-medium text-gray-700">Lampiran</label>
                <input type="text" name="lampiran" id="lampiran" value="{{ old('lampiran') }}" required
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" />
            </div>

            <div class="md:col-span-2">
                <label for="hal" class="block text-sm font-medium text-gray-700">Hal</label>
                <input type="text" name="hal" id="hal" value="{{ old('hal') }}" required
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" />
            </div>

            <div class="md:col-span-2">
                <label for="tujuan_surat" class="block text-sm font-medium text-gray-700">Tujuan Surat</label>
                <select name="tujuan_surat" id="tujuan_surat" required
                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    <option value="">-- Pilih Tujuan --</option>
                    @php
                        $tujuanList = ['Kepala kantor','Kasubbag TU','PHU','Bimas Islam','Pend. Agama & Keagamaaan Islam','Pend. Madrasah','Penyelenggara Zakat dan Wakaf','Penyelenggara Kristen','Penyelenggara Katolik','Perencana','Keuangan','Kepegawaian','Barang Milik Negara','Humas','Umum'];
                    @endphp
                    @foreach($tujuanList as $tujuan)
                        <option value="{{ $tujuan }}" {{ old('tujuan_surat') == $tujuan ? 'selected' : '' }}>{{ $tujuan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="md:col-span-2">
                <label for="file" class="block text-sm font-medium text-gray-700">File (Scan Surat)</label>
                <input type="file" name="file" id="file" required
                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" />
                <p class="text-xs text-gray-500 mt-1">* File / Gambar / Hasil Scan Surat</p>
            </div>
        </div>

        <div class="mt-6 flex space-x-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
            <button type="reset" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Cancel</button>
        </div>
    </form>
</div>
@endsection