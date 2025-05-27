@extends('components.layouts.app')

@section('content')
<div class="bg-white shadow-md rounded p-6 w-full">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-xl font-semibold">Edit Surat Masuk</h2>
        <a href="{{ route('suratmasuk.index') }}" class="text-blue-600 hover:underline text-sm">← Kembali</a>
    </div>

    {{-- Menampilkan pesan sukses jika ada --}}
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('suratmasuk.update', $surat->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Kolom Kiri --}}
            <div>
                <div class="mb-4">
                    <label for="nomor_surat" class="block text-sm font-medium text-gray-700">Nomor Surat</label>
                    <input type="text" name="nomor_surat" id="nomor_surat" value="{{ $surat->nomor_surat }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                </div>

                <div class="mb-4">
                    <label for="tanggal_surat" class="block text-sm font-medium text-gray-700">Tanggal Surat</label>
                    <input type="date" name="tanggal_surat" id="tanggal_surat" value="{{ $surat->tanggal_surat }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                </div>

                <div class="mb-4">
                    <label for="pengirim" class="block text-sm font-medium text-gray-700">Pengirim</label>
                    <input type="text" name="pengirim" id="pengirim" value="{{ $surat->pengirim }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                </div>

                <div class="mb-4">
                    <label for="perihal" class="block text-sm font-medium text-gray-700">Perihal</label>
                    <input type="text" name="perihal" id="perihal" value="{{ $surat->perihal }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                </div>

                <div class="mb-4">
                    <label for="kategori" class="block text-sm font-medium text-gray-700">Kategori</label>
                    <select name="kategori" id="kategori" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach(['Kepala', 'Wakil', 'Sekretaris'] as $item)
                            <option value="{{ $item }}" {{ $surat->kategori == $item ? 'selected' : '' }}>{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Kolom Kanan --}}
            <div>
                <div class="mb-4">
                    <label for="status_surat" class="block text-sm font-medium text-gray-700">Status Surat</label>
                    <select name="status_surat" id="status_surat" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                        @foreach(['Asli', 'Tembusan'] as $status)
                            <option value="{{ $status }}" {{ $surat->status_surat == $status ? 'selected' : '' }}>{{ $status }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="sifat_surat" class="block text-sm font-medium text-gray-700">Sifat Surat</label>
                    <select name="sifat_surat" id="sifat_surat" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                        @foreach(['Penting', 'Segera', 'Rahasia', 'Sangat Rahasia', 'Biasa'] as $sifat)
                            <option value="{{ $sifat }}" {{ $surat->sifat_surat == $sifat ? 'selected' : '' }}>{{ $sifat }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="tujuan_surat" class="block text-sm font-medium text-gray-700">Tujuan Surat</label>
                    <select name="tujuan_surat" id="tujuan_surat" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                        @php
                            $tujuanList = ['Kepala kantor', 'Kasubbag TU', 'PHU', 'Bimas Islam', 'Pend. Agama & Keagamaaan Islam', 'Pend. Madrasah', 'Penyelenggara Zakat dan Wakaf', 'Penyelenggara Kristen', 'Penyelenggara Katolik', 'Perencana', 'Keuangan', 'Kepegawaian', 'Barang Milik Negara', 'Humas', 'Umum'];
                        @endphp
                        @foreach($tujuanList as $tujuan)
                            <option value="{{ $tujuan }}" {{ $surat->tujuan_surat == $tujuan ? 'selected' : '' }}>{{ $tujuan }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="petunjuk" class="block text-sm font-medium text-gray-700">Petunjuk</label>
                    @php
                        $petunjukList = ['Kepala hadir', 'Tindak Lanjuti', 'Untuk Diketahui', 'Edarkan', 'Jawab', 'Ingatkan', 'Simpan / Arsipkan', 'Harap Hadir / Wakili'];
                    @endphp
                    <select name="petunjuk" id="petunjuk" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                        @foreach($petunjukList as $petunjuk)
                            <option value="{{ $petunjuk }}" {{ $surat->petunjuk == $petunjuk ? 'selected' : '' }}>{{ $petunjuk }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        {{-- Full width: bawah --}}
        <div class="mt-6">
            <div class="mb-4">
                <label for="catatan" class="block text-sm font-medium text-gray-700">Catatan</label>
                <input type="text" name="catatan" id="catatan" value="{{ $surat->catatan }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
            </div>

            <div class="mb-4">
                <label for="isi_disposisi" class="block text-sm font-medium text-gray-700">Isi Disposisi</label>
                <textarea name="isi_disposisi" id="isi_disposisi" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">{{ $surat->isi_disposisi }}</textarea>
            </div>

            <div class="mb-4">
                <label for="disposisi_kasubbag" class="block text-sm font-medium text-gray-700">Disposisi Kasubbag</label>
                <textarea name="disposisi_kasubbag" id="disposisi_kasubbag" rows="2" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">{{ $surat->disposisi_kasubbag }}</textarea>
            </div>

            <div class="mb-6">
                <label for="file" class="block text-sm font-medium text-gray-700">Ganti File (opsional)</label>
                <input type="file" name="file" id="file" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                <p class="text-xs text-gray-500 mt-1">* Kosongkan jika tidak ingin mengganti file</p>
            </div>

            <div class="flex space-x-2">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
                <a href="{{ route('suratmasuk.index') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">Cancel</a>
            </div>
        </div>
    </form>
</div>
@endsection
