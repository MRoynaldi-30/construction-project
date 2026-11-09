@extends('layouts.app')

@section('title', 'Daftar Proyek')

@section('content')

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
    <div>
        <h2 class="text-2xl font-bold text-slate-800">
            Daftar Proyek
        </h2>
        <p class="text-slate-500 mt-1">
            Kelola seluruh data proyek konstruksi.
        </p>
    </div>

    <a href="{{ route('projects.create') }}"
       class="inline-flex items-center justify-center bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-lg font-semibold transition">
        + Tambah Proyek
    </a>
</div>

@if (session('success'))
    <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-lg">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="bg-slate-50 text-slate-600 uppercase text-xs">
                <tr>
                    <th class="px-6 py-4">Kode Proyek</th>
                    <th class="px-6 py-4">Nama Proyek</th>
                    <th class="px-6 py-4">Klien</th>
                    <th class="px-6 py-4">Nilai Kontrak</th>
                    <th class="px-6 py-4">Target Selesai</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-100">
                @forelse ($projects as $project)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="px-6 py-4 font-semibold text-blue-700">
                            {{ $project->project_code }}
                        </td>

                        <td class="px-6 py-4 font-medium">
                            {{ $project->project_name }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $project->client }}
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            Rp {{ number_format($project->contract_value, 0, ',', '.') }}
                        </td>

                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $project->target_completion_date->format('d-m-Y') }}
                        </td>

                        <td class="px-6 py-4">
                            @php
                                $statusClass = match ($project->status) {
                                    'Perencanaan' => 'bg-blue-100 text-blue-700',
                                    'Berjalan' => 'bg-yellow-100 text-yellow-700',
                                    'Selesai' => 'bg-green-100 text-green-700',
                                    'Ditunda' => 'bg-red-100 text-red-700',
                                    default => 'bg-slate-100 text-slate-700',
                                };
                            @endphp

                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $statusClass }}">
                                {{ $project->status }}
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-3">
                                <a href="{{ route('projects.edit', $project->id) }}"
                                   class="text-blue-600 hover:text-blue-800 font-semibold">
                                    Edit
                                </a>

                                <form action="{{ route('projects.destroy', $project->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Apakah kamu yakin ingin menghapus proyek ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="text-red-600 hover:text-red-800 font-semibold">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-10 text-center text-slate-500">
                            Belum ada data proyek.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection