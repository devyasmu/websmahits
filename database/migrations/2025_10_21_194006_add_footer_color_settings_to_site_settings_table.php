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
            $table->string('footer_link_color')->nullable();
            $table->string('footer_link_hover_color')->nullable();
            $table->string('footer_border_color')->nullable();
            $table->string('footer_social_bg_color')->nullable();
            $table->string('footer_social_hover_color')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'footer_link_color',
                'footer_link_hover_color',
                'footer_border_color',
                'footer_social_bg_color',
                'footer_social_hover_color'
            ]);
        });
    }
};
