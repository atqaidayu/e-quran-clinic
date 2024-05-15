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
        Schema::create('booking_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tutor_id')->constrained('tutors')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('learner_id')->constrained('learners')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('payment_id')->constrained('payments')->cascadeOnUpdate()->cascadeOnDelete();
            $table->dateTime('datetime');
            $table->string('type');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_sessions');
    }
};
