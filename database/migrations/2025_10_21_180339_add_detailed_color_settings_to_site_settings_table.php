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
            // Detailed color settings for better contrast
            $table->string('section_bg_color')->nullable()->comment('Section background color');
            $table->string('section_text_color')->nullable()->comment('Section text color');
            $table->string('button_text_color')->nullable()->comment('Button text color');
            $table->string('button_outline_color')->nullable()->comment('Button outline color');
            $table->string('link_text_color')->nullable()->comment('Link text color');
            $table->string('badge_bg_color')->nullable()->comment('Badge background color');
            $table->string('badge_text_color')->nullable()->comment('Badge text color');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'section_bg_color',
                'section_text_color',
                'button_text_color',
                'button_outline_color',
                'link_text_color',
                'badge_bg_color',
                'badge_text_color'
            ]);
        });
    }
};
