<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Menampilkan daftar seluruh proyek.
     */
    public function index()
    {
        $projects = Project::latest()->get();

        return view('projects.index', compact('projects'));
    }

    /**
     * Menampilkan form tambah proyek.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Menyimpan proyek baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_code' => 'required|string|max:255|unique:projects,project_code',
            'project_name' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'project_location' => 'required|string|max:255',
            'contract_value' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'target_completion_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:Perencanaan,Berjalan,Selesai,Ditunda',
            'description' => 'nullable|string',
        ], [
            'project_code.unique' => 'Kode proyek sudah digunakan.',
            'contract_value.min' => 'Nilai kontrak tidak boleh negatif.',
            'target_completion_date.after_or_equal' => 'Tanggal target penyelesaian tidak boleh sebelum tanggal mulai.',
        ]);

        Project::create($validated);

        return redirect()
            ->route('projects.index')
            ->with('success', 'Proyek berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit proyek.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Memperbarui data proyek.
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'project_code' => 'required|string|max:255|unique:projects,project_code,' . $project->id,
            'project_name' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'project_location' => 'required|string|max:255',
            'contract_value' => 'required|numeric|min:0',
            'start_date' => 'required|date',
            'target_completion_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:Perencanaan,Berjalan,Selesai,Ditunda',
            'description' => 'nullable|string',
        ], [
            'project_code.unique' => 'Kode proyek sudah digunakan.',
            'contract_value.min' => 'Nilai kontrak tidak boleh negatif.',
            'target_completion_date.after_or_equal' => 'Tanggal target penyelesaian tidak boleh sebelum tanggal mulai.',
        ]);

        $project->update($validated);

        return redirect()
            ->route('projects.index')
            ->with('success', 'Proyek berhasil diperbarui.');
    }

    /**
     * Menghapus data proyek.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()
            ->route('projects.index')
            ->with('success', 'Proyek berhasil dihapus.');
    }
}
