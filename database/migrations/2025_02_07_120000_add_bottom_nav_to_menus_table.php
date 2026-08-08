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
        Schema::table('menus', function (Blueprint $table) {
            $table->boolean('show_in_bottom_nav')->default(false)->after('is_active');
            $table->string('icon', 100)->nullable()->after('show_in_bottom_nav')->comment('Bootstrap Icons class, e.g. bi-house-door');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->dropColumn(['show_in_bottom_nav', 'icon']);
        });
    }
};
