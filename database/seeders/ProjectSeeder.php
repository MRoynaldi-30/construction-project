<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'project_code' => 'PRJ-001',
                'project_name' => 'Pembangunan Gedung Perkantoran',
                'client' => 'PT Maju Sejahtera',
                'project_location' => 'Semarang, Jawa Tengah',
                'contract_value' => 2500000000,
                'start_date' => '2026-01-10',
                'target_completion_date' => '2026-12-10',
                'status' => 'Berjalan',
                'description' => 'Pembangunan gedung perkantoran 5 lantai.',
            ],
            [
                'project_code' => 'PRJ-002',
                'project_name' => 'Renovasi Gedung Sekolah',
                'client' => 'Dinas Pendidikan',
                'project_location' => 'Kendal, Jawa Tengah',
                'contract_value' => 850000000,
                'start_date' => '2026-02-01',
                'target_completion_date' => '2026-08-01',
                'status' => 'Berjalan',
                'description' => 'Renovasi ruang kelas dan fasilitas sekolah.',
            ],
            [
                'project_code' => 'PRJ-003',
                'project_name' => 'Pembangunan Jalan Raya',
                'client' => 'Dinas Pekerjaan Umum',
                'project_location' => 'Demak, Jawa Tengah',
                'contract_value' => 1500000000,
                'start_date' => '2026-03-01',
                'target_completion_date' => '2026-11-30',
                'status' => 'Perencanaan',
                'description' => 'Pembangunan dan pengaspalan jalan raya.',
            ],
            [
                'project_code' => 'PRJ-004',
                'project_name' => 'Pembangunan Gudang Logistik',
                'client' => 'PT Sentosa Logistik',
                'project_location' => 'Ungaran, Jawa Tengah',
                'contract_value' => 3200000000,
                'start_date' => '2026-01-15',
                'target_completion_date' => '2026-10-15',
                'status' => 'Selesai',
                'description' => 'Pembangunan gudang penyimpanan barang.',
            ],
            [
                'project_code' => 'PRJ-005',
                'project_name' => 'Pembangunan Saluran Drainase',
                'client' => 'Pemerintah Kabupaten',
                'project_location' => 'Salatiga, Jawa Tengah',
                'contract_value' => 650000000,
                'start_date' => '2026-04-01',
                'target_completion_date' => '2026-09-30',
                'status' => 'Ditunda',
                'description' => 'Pembangunan saluran drainase kawasan pemukiman.',
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}