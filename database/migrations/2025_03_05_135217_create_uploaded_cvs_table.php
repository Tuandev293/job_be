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
        Schema::create('uploaded_cvs', function (Blueprint $table) {
            $table->id('cv_id');
            $table->unsignedBigInteger('candidate_id');
            $table->string('file_url', 255);
            $table->string('file_name', 255);
            $table->timestamp('uploaded_at')->useCurrent();

            // foreign key
            $table->foreign('candidate_id')->references('candidate_id')->on('candidates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uploaded_cvs');
    }
};