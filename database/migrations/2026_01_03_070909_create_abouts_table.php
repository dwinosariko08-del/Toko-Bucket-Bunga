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
       Schema::create('abouts', function (Blueprint $table) {
    $table->id();
    $table->string('section_title')->default('Kenapa FA.STORYBUCKET');
    $table->string('headline')->default('Filosofi Cerita Kami');

    $table->string('item1_title');
    $table->text('item1_desc');

    $table->string('item2_title');
    $table->text('item2_desc');

    $table->string('item3_title');
    $table->text('item3_desc');

    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
