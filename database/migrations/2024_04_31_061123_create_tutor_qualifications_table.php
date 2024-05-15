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
        Schema::create('tutor_qualifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tutor_id')->constrained('tutors')->onDelete('cascade');
            $table->string('title');
            $table->string('document');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutor_qualifications');
    }
};
