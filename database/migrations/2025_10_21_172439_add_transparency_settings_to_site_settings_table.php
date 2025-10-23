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
            // Transparency settings
            $table->integer('navbar_transparency')->default(100)->comment('Navbar transparency percentage (0-100)');
            $table->integer('header_transparency')->default(100)->comment('Header transparency percentage (0-100)');
            $table->integer('footer_transparency')->default(100)->comment('Footer transparency percentage (0-100)');
            $table->boolean('enable_blur_effect')->default(false)->comment('Enable blur effect for transparent elements');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'navbar_transparency',
                'header_transparency', 
                'footer_transparency',
                'enable_blur_effect'
            ]);
        });
    }
};
