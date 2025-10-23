<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\SiteSetting::create([
            'site_name' => 'Yayasan Pendidikan Islam',
            'site_tagline' => 'Membangun Generasi Berkarakter dan Berprestasi',
            'site_description' => 'Yayasan Pendidikan Islam yang berkomitmen untuk memberikan pendidikan berkualitas dengan nilai-nilai Islam yang kuat.',
            'email' => 'info@yayasanpendidikan.com',
            'phone' => '+62 21 1234 5678',
            'address' => 'Jl. Pendidikan No. 123, Jakarta Selatan 12345',
            'facebook' => 'https://facebook.com/yayasanpendidikan',
            'instagram' => 'https://instagram.com/yayasanpendidikan',
            'youtube' => 'https://youtube.com/yayasanpendidikan',
            'meta_title' => 'Yayasan Pendidikan Islam - Membangun Generasi Berkarakter',
            'meta_description' => 'Yayasan Pendidikan Islam yang berkomitmen untuk memberikan pendidikan berkualitas dengan nilai-nilai Islam yang kuat.',
            'meta_keywords' => 'yayasan, pendidikan, islam, sekolah, madrasah, karakter, prestasi',
            // Theme Colors
            'primary_color' => '#007bff',
            'secondary_color' => '#6c757d',
            'accent_color' => '#28a745',
            'header_bg_color' => '#ffffff',
            'footer_bg_color' => '#343a40',
            'body_bg_color' => '#f8f9fa',
            'header_text_color' => '#000000',
            'footer_text_color' => '#ffffff',
            'body_text_color' => '#333333',
            'button_primary_color' => '#007bff',
            'button_primary_hover' => '#0056b3',
            'button_secondary_color' => '#6c757d',
            'button_secondary_hover' => '#545b62',
            'link_color' => '#007bff',
            'link_hover_color' => '#0056b3',
            'card_bg_color' => '#ffffff',
            'card_border_color' => '#dee2e6',
            'card_shadow_color' => '#000000',
            'admin_sidebar_bg' => '#343a40',
            'admin_sidebar_text' => '#ffffff',
            'admin_sidebar_hover' => '#495057',
            'admin_header_bg' => '#ffffff',
            'admin_header_text' => '#333333',
            // Transparency settings
            'navbar_transparency' => 100,
            'header_transparency' => 100,
            'footer_transparency' => 100,
            'enable_blur_effect' => false,
            // Card button colors
            'card_button_bg' => '#007bff',
            'card_button_text' => '#ffffff',
            'card_button_border' => '#007bff',
            'card_button_hover_bg' => '#0056b3',
            'card_button_hover_text' => '#ffffff',
            'card_button_hover_border' => '#0056b3',
            // Detailed color settings
            'section_bg_color' => '#f8f9fa',
            'section_text_color' => '#333333',
            'button_text_color' => '#007bff',
            'button_outline_color' => '#007bff',
            'link_text_color' => '#007bff',
            'badge_bg_color' => '#007bff',
            'badge_text_color' => '#ffffff',
            // Footer color settings
            'footer_link_color' => '#ffffff',
            'footer_link_hover_color' => '#007bff',
            'footer_border_color' => '#333333',
            'footer_social_bg_color' => '#333333',
            'footer_social_hover_color' => '#007bff',
        ]);
    }
}
