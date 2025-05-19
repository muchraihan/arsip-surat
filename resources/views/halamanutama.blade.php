@extends('components.layouts.app')


@section('content')
    <div class="mb-4">
        <h1 class="text-2xl font-bold text-gray-800">Dashboard <span class="text-sm font-normal text-gray-500">Overview & statistic</span></h1>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-blue-600 text-white rounded shadow p-4">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm">TOTAL USER</p>
                    <h2 class="text-3xl font-bold">5</h2>
                </div>
                <svg class="w-10 h-10 opacity-30" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a6 6 0 100 12A6 6 0 0010 2zM2 18a8 8 0 1116 0H2z" /></svg>
            </div>
            <div class="mt-4 text-sm font-semibold">
                <a href="#" class="hover:underline">View Detail</a>
            </div>
        </div>

        <div class="bg-cyan-600 text-white rounded shadow p-4">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm">DISPOSISI</p>
                    <h2 class="text-3xl font-bold">15</h2>
                </div>
                <svg class="w-10 h-10 opacity-30" fill="currentColor" viewBox="0 0 24 24"><path d="M17.5 13L13 17.5 14.5 19 21.5 12 14.5 5 13 6.5 17.5 11H2v2h15.5z" /></svg>
            </div>
            <div class="mt-4 text-sm font-semibold">
                <a href="#" class="hover:underline">View Detail</a>
            </div>
        </div>

        <div class="bg-purple-600 text-white rounded shadow p-4">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm">SURAT MASUK</p>
                    <h2 class="text-3xl font-bold">15</h2>
                </div>
                <svg class="w-10 h-10 opacity-30" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h14a1 1 0 011 1v2l-8 5-8-5V3z" /><path d="M18 8l-8 5-8-5v7a1 1 0 001 1h14a1 1 0 001-1V8z" /></svg>
            </div>
            <div class="mt-4 text-sm font-semibold">
                <a href="#" class="hover:underline">View Detail</a>
            </div>
        </div>

        <div class="bg-orange-500 text-white rounded shadow p-4">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm">SURAT KELUAR</p>
                    <h2 class="text-3xl font-bold">6</h2>
                </div>
                <svg class="w-10 h-10 opacity-30" fill="currentColor" viewBox="0 0 24 24"><path d="M4 4h16v2H4V4zm0 5h16v2H4V9zm0 5h10v2H4v-2z" /></svg>
            </div>
            <div class="mt-4 text-sm font-semibold">
                <a href="#" class="hover:underline">View Detail</a>
            </div>
        </div>
    </div>

    <div class="mt-10 text-center text-gray-500 text-sm">
        © 2025. <a href="#" class="text-blue-500 hover:underline">Arsip-Surat Kemenag</a> - All Rights Reserved
    </div>
@endsection
