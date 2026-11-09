@extends('layouts.app')

@section('title', 'Tambah Proyek')

@section('content')

<div class="max-w-4xl mx-auto">

    <div class="mb-8">
        <a href="{{ route('projects.index') }}"
           class="text-blue-600 hover:text-blue-800 text-sm font-medium">
            ← Kembali ke Daftar Proyek
        </a>

        <h2 class="text-2xl font-bold text-slate-800 mt-4">
            Tambah Proyek Baru
        </h2>

        <p class="text-slate-500 mt-1">
            Masukkan informasi proyek konstruksi yang akan didaftarkan.
        </p>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 md:p-8">

        @if ($errors->any())
            <div class="mb-6 bg-red-50 border border-red-200 text-red-700 p-4 rounded-lg">
                <p class="font-semibold mb-2">Terdapat kesalahan:</p>
                <ul class="list-disc list-inside text-sm space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('projects.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Kode Proyek
                    </label>
                    <input type="text" name="project_code"
                           value="{{ old('project_code') }}"
                           placeholder="Contoh: PRJ-007"
                           class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                           required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Nama Proyek
                    </label>
                    <input type="text" name="project_name"
                           value="{{ old('project_name') }}"
                           placeholder="Nama proyek"
                           class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                           required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Klien
                    </label>
                    <input type="text" name="client"
                           value="{{ old('client') }}"
                           placeholder="Nama klien"
                           class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                           required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Lokasi Proyek
                    </label>
                    <input type="text" name="project_location"
                           value="{{ old('project_location') }}"
                           placeholder="Contoh: Semarang"
                           class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                           required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Nilai Kontrak (Rp)
                    </label>
                    <input type="number" name="contract_value"
                           value="{{ old('contract_value') }}"
                           step="0.01"
                           placeholder="Contoh: 500000000"
                           class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                           required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Status Proyek
                    </label>
                    <select name="status"
                            class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                            required>
                        <option value="">Pilih Status</option>
                        @foreach (['Perencanaan', 'Berjalan', 'Selesai', 'Ditunda'] as $status)
                            <option value="{{ $status }}"
                                {{ old('status', 'Perencanaan') == $status ? 'selected' : '' }}>
                                {{ $status }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Tanggal Mulai
                    </label>
                    <input type="date" name="start_date"
                           value="{{ old('start_date') }}"
                           class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                           required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Target Penyelesaian
                    </label>
                    <input type="date" name="target_completion_date"
                           value="{{ old('target_completion_date') }}"
                           class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none"
                           required>
                </div>

                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Deskripsi (Opsional)
                    </label>
                    <textarea name="description" rows="4"
                              placeholder="Tambahkan deskripsi proyek..."
                              class="w-full border border-slate-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">{{ old('description') }}</textarea>
                </div>

            </div>

            <div class="flex flex-col sm:flex-row justify-end gap-3 mt-8">
                <a href="{{ route('projects.index') }}"
                   class="px-6 py-3 rounded-lg border border-slate-300 text-slate-700 text-center hover:bg-slate-50 font-semibold">
                    Batal
                </a>

                <button type="submit"
                        class="px-6 py-3 rounded-lg bg-blue-600 hover:bg-blue-700 text-white font-semibold transition">
                    Simpan Proyek
                </button>
            </div>

        </form>
    </div>
</div>

@endsection