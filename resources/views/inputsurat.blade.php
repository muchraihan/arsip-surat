@extends('components.layouts.app')

@section('content')
<div class="bg-white shadow-md rounded p-6 w-full">
    <h2 class="text-xl font-semibold mb-4">Form Master Surat Masuk</h2>

    <form method="POST" enctype="multipart/form-data">
        @csrf

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
            <label for="disposisi" class="block text-sm font-medium text-gray-700">Disposisi</label>
            <select name="disposisi" id="disposisi" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                <option value="">-- Pilih Disposisi --</option>
                <option value="Kepala">Kepala</option>
                <option value="Wakil">Wakil</option>
                <option value="Sekretaris">Sekretaris</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="isi_disposisi" class="block text-sm font-medium text-gray-700">Isi Disposisi</label>
            <input type="text" name="isi_disposisi" id="isi_disposisi" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
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
    </form>
</div>
@endsection
