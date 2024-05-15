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
        Schema::create('circle_memberships', function (Blueprint $table) {
            $table->id();
            $table->foreignId('learner_id')->constrained('learners')->onDelete('cascade');
            $table->foreignId('circle_id')->constrained('quran_circles')->onDelete('cascade');
            $table->string('status');
            $table->date('request_date');
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
