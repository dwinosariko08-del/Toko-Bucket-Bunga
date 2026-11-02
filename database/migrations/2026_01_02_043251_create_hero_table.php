<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // <-- penting

return new class extends Migration {
    public function up(): void
    {
        Schema::create('hero', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable(); // menyimpan path image
            $table->timestamps();
        });

        // Insert default hero image
        DB::table('hero')->insert([
            'image' => 'img/hero.JPG', // path default
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('hero');
    }
};
