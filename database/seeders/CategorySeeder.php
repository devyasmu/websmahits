<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Berita',
                'slug' => 'berita',
                'description' => 'Berita dan informasi terkini dari yayasan',
                'color' => '#007bff',
            ],
            [
                'name' => 'Pengumuman',
                'slug' => 'pengumuman',
                'description' => 'Pengumuman penting untuk siswa dan orang tua',
                'color' => '#28a745',
            ],
            [
                'name' => 'Kegiatan',
                'slug' => 'kegiatan',
                'description' => 'Kegiatan dan acara yayasan',
                'color' => '#ffc107',
            ],
            [
                'name' => 'Prestasi',
                'slug' => 'prestasi',
                'description' => 'Prestasi dan pencapaian siswa',
                'color' => '#dc3545',
            ],
            [
                'name' => 'Galeri',
                'slug' => 'galeri',
                'description' => 'Foto dan video kegiatan',
                'color' => '#6f42c1',
            ],
            [
                'name' => 'Dokumen',
                'slug' => 'dokumen',
                'description' => 'Dokumen dan file penting',
                'color' => '#17a2b8',
            ],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
