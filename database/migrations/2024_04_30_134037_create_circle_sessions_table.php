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
        Schema::create('circle_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quran_circle_id')->constrained('quran_circles')->onDelete('cascade');
            $table->string('meeting_link');
            $table->string('progress');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('circle_sessions');
    }
};
