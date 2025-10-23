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
            // Card button colors
            $table->string('card_button_bg')->nullable()->comment('Card button background color');
            $table->string('card_button_text')->nullable()->comment('Card button text color');
            $table->string('card_button_border')->nullable()->comment('Card button border color');
            $table->string('card_button_hover_bg')->nullable()->comment('Card button hover background color');
            $table->string('card_button_hover_text')->nullable()->comment('Card button hover text color');
            $table->string('card_button_hover_border')->nullable()->comment('Card button hover border color');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'card_button_bg',
                'card_button_text',
                'card_button_border',
                'card_button_hover_bg',
                'card_button_hover_text',
                'card_button_hover_border'
            ]);
        });
    }
};
