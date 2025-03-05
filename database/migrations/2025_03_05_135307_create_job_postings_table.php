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
        Schema::create('job_postings', function (Blueprint $table) {
            $table->id('job_id');
            $table->unsignedBigInteger('employer_id');
            $table->string('title', 255);
            $table->text('description');
            $table->string('location', 255);
            $table->string('salary', 50)->nullable();
            $table->enum('job_type', ['Full-time', 'Part-time', 'Internship']);
            $table->string('experience_required', 50)->nullable();
            $table->enum('status', ['Open', 'Closed', 'Draft'])->default('Draft');
            $table->integer('views')->default(0);
            $table->timestamps();

            //foreign key
            $table->foreign('employer_id')->references('employer_id')->on('employers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_postings');
    }
};