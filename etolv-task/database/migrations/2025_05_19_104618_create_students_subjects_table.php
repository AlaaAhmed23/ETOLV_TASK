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
        Schema::create('student_subject', function (Blueprint $table) {
            $table->id();

            
    
    
            // $table->unsignedBigInteger('student_id');
            // $table->unsignedBigInteger('subject_id');

            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->foreignId('subject_id')->constrained()->onDelete('cascade');
            
            // $table->foreign('student_id')
            //     ->references('id')
            //     ->on('students')
            //     ->onDelete('cascade');

            // $table->foreign('subject_id')
            //     ->references('id')
            //     ->on('subjects')
            //     ->onDelete('cascade');

            $table->timestamps();

            // To avoid duplicates
            $table->unique(['student_id', 'subject_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_subject');
    }
};