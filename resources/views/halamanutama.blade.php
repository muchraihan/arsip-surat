@extends('components.layouts.app')


@section('content')
    <div class="mb-4">
        <h1 class="text-2xl font-bold text-gray-800">Dashboard <span class="text-sm font-normal text-gray-500">Overview & statistic</span></h1>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">

        <div class="bg-green-400 text-white rounded shadow p-4">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm">SURAT MASUK</p>
                    <h2 class="text-3xl font-bold">6</h2>
                </div>
                <svg class="w-10 h-10 opacity-30" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h14a1 1 0 011 1v2l-8 5-8-5V3z" /><path d="M18 8l-8 5-8-5v7a1 1 0 001 1h14a1 1 0 001-1V8z" /></svg>
            </div>
            <div class="mt-4 text-sm font-semibold">
                <a href="{{ route('suratmasuk.index') }}" class="hover:underline">View Detail</a>
            </div>
        </div>

        <div class="bg-red-400 text-white rounded shadow p-4">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm">SURAT KELUAR</p>
                    <h2 class="text-3xl font-bold">6</h2>
                </div>
                <svg class="w-10 h-10 opacity-30" fill="currentColor" viewBox="0 0 24 24"><path d="M4 4h16v2H4V4zm0 5h16v2H4V9zm0 5h10v2H4v-2z" /></svg>
            </div>
            <div class="mt-4 text-sm font-semibold">
                <a href="{{ route('suratkeluar.index') }}" class="hover:underline">View Detail</a>
            </div>
        </div>
    </div>
@endsection
