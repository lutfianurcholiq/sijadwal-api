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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faculty_id')->constrained();
            $table->foreignId('major_id')->constrained();
            $table->string('nim')->unique();
            $table->string('name');
            $table->date('date_in');
            $table->date('date_out')->nullable();
            $table->string('birth_place');
            $table->date('birth_date');
            $table->timestamps();

            // $table->foreign('faculty_id')->references('id')->on('faculties');
            // $table->foreign('major_id')->references('id')->on('majors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
