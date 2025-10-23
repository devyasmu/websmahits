<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            // Primary Colors
            $table->string('primary_color', 7)->default('#007bff')->after('meta_keywords');
            $table->string('secondary_color', 7)->default('#6c757d')->after('primary_color');
            $table->string('accent_color', 7)->default('#28a745')->after('secondary_color');
            
            // Background Colors
            $table->string('header_bg_color', 7)->default('#ffffff')->after('accent_color');
            $table->string('footer_bg_color', 7)->default('#343a40')->after('header_bg_color');
            $table->string('body_bg_color', 7)->default('#f8f9fa')->after('footer_bg_color');
            
            // Text Colors
            $table->string('header_text_color', 7)->default('#000000')->after('body_bg_color');
            $table->string('footer_text_color', 7)->default('#ffffff')->after('header_text_color');
            $table->string('body_text_color', 7)->default('#333333')->after('footer_text_color');
            
            // Button Colors
            $table->string('button_primary_color', 7)->default('#007bff')->after('body_text_color');
            $table->string('button_primary_hover', 7)->default('#0056b3')->after('button_primary_color');
            $table->string('button_secondary_color', 7)->default('#6c757d')->after('button_primary_hover');
            $table->string('button_secondary_hover', 7)->default('#545b62')->after('button_secondary_color');
            
            // Link Colors
            $table->string('link_color', 7)->default('#007bff')->after('button_secondary_hover');
            $table->string('link_hover_color', 7)->default('#0056b3')->after('link_color');
            
            // Card Colors
            $table->string('card_bg_color', 7)->default('#ffffff')->after('link_hover_color');
            $table->string('card_border_color', 7)->default('#dee2e6')->after('card_bg_color');
            $table->string('card_shadow_color', 7)->default('#000000')->after('card_border_color');
            
            // Admin Theme Colors
            $table->string('admin_sidebar_bg', 7)->default('#343a40')->after('card_shadow_color');
            $table->string('admin_sidebar_text', 7)->default('#ffffff')->after('admin_sidebar_bg');
            $table->string('admin_sidebar_hover', 7)->default('#495057')->after('admin_sidebar_text');
            $table->string('admin_header_bg', 7)->default('#ffffff')->after('admin_sidebar_hover');
            $table->string('admin_header_text', 7)->default('#333333')->after('admin_header_bg');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'primary_color', 'secondary_color', 'accent_color',
                'header_bg_color', 'footer_bg_color', 'body_bg_color',
                'header_text_color', 'footer_text_color', 'body_text_color',
                'button_primary_color', 'button_primary_hover', 'button_secondary_color', 'button_secondary_hover',
                'link_color', 'link_hover_color',
                'card_bg_color', 'card_border_color', 'card_shadow_color',
                'admin_sidebar_bg', 'admin_sidebar_text', 'admin_sidebar_hover',
                'admin_header_bg', 'admin_header_text'
            ]);
        });
    }
};