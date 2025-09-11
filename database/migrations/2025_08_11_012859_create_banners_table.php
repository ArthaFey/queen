<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration //Membuat class anonim (tanpa nama) yang mewarisi Migration. 
{
    /**
     * Run the migrations.
     */
    public function up(): void //digunakan ketika migration dijalankan (php artisan migrate). dan perintahnya dijalankan di db
    {
        Schema::create('banners', function (Blueprint $table) { // membuat tabelbaru bernama banner
            $table->id();
            $table->string('src');
            $table->string('alt');
            $table->timestamps();               
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void //untuk membatalkan migrations
    {
        Schema::dropIfExists('banners');
    }
};
