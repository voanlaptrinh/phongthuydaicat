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
        Schema::create('news_faqs', function (Blueprint $table) {
            $table->id();
             $table->foreignId('news_id')->nullable()->constrained('news')->onDelete('cascade');
            $table->string('question');
            $table->text('answer');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        Schema::dropIfExists('news_faqs');
    }
};
