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
        Schema::create('dat_lich_tu_vans', function (Blueprint $table) {
            $table->id();
               $table->string('fullname');
            $table->string('phone');
            $table->string('email');
            $table->text('message')->nullable(); // Nội dung có thể có hoặc không
            $table->string('status')->default('Mới');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dat_lich_tu_vans');
    }
};
