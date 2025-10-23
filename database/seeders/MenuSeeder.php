<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            [
                'title' => 'Beranda',
                'url' => '/',
                'order' => 1,
            ],
            [
                'title' => 'Tentang Kami',
                'url' => '/tentang-kami',
                'order' => 2,
            ],
            [
                'title' => 'Program',
                'url' => '/program',
                'order' => 3,
            ],
            [
                'title' => 'Berita',
                'url' => '/berita',
                'order' => 4,
            ],
            [
                'title' => 'Galeri',
                'url' => '/galeri',
                'order' => 5,
            ],
            [
                'title' => 'Download',
                'url' => '/download',
                'order' => 6,
            ],
            [
                'title' => 'Kontak',
                'url' => '/kontak',
                'order' => 7,
            ],
        ];

        foreach ($menus as $menu) {
            \App\Models\Menu::create($menu);
        }
    }
}
